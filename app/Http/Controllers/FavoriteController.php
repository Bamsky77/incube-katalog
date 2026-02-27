<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('admin.login');
        }

        $favorites = $user->favorites()->latest()->get();
        return view('favorites.index', compact('favorites'));
    }

    public function toggle(Request $request, Product $product)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Silakan login untuk menambahkan favorit.'], 401);
        }
        $isFavorited = $user->favorites()->toggle($product->id);
        
        $status = count($isFavorited['attached']) > 0;

        return response()->json([
            'status' => 'success',
            'is_favorited' => $status,
            'message' => $status ? 'Ditambahkan ke favorit.' : 'Dihapus dari favorit.'
        ]);
    }
}
