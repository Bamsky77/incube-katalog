<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request, Product $product)
    {
        // Simulation of purchase
        Order::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'price' => $product->price,
            'status' => 'completed',
        ]);

        // Increment sold count (industrial standard simulation)
        $product->increment('sold_count');

        return back()->with('success', 'Pembelian berhasil! Aset ' . $product->name . ' telah ditambahkan ke dashboard Anda.');
    }
}
