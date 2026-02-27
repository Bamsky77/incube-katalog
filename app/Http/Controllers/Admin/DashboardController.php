<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;
use App\Models\Inquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products_count' => Product::count(),
            'reviews_count' => Review::count(),
            'inquiries_count' => Inquiry::count(),
            'orders_count' => Order::count(),
            'total_revenue' => Order::sum('price'),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
