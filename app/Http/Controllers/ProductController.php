<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('images', 'category');

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Category Filter
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Brand Filter
        if ($request->filled('brand')) {
            $brands = is_array($request->brand) ? $request->brand : explode(',', $request->brand);
            $query->whereIn('brand', $brands);
        }

        // Price Filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Rating Filter
        if ($request->filled('rating')) {
            $query->where('rating', '>=', $request->rating);
        }

        // Sorting
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'rating_desc':
                $query->orderBy('rating', 'desc');
                break;
            case 'reviews_desc':
                $query->orderBy('review_count', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = \App\Models\Category::all();
        $brands = Product::whereNotNull('brand')->distinct()->pluck('brand');
        
        $selectedCategory = $request->has('category') 
            ? \App\Models\Category::where('slug', $request->category)->first() 
            : null;

        return view('products.index', compact('products', 'categories', 'brands', 'selectedCategory'));
    }

    public function show($slug)
    {
        $product = Product::with(['images', 'category', 'reviews.user'])->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
