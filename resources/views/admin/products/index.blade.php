@extends('layouts.admin')

@section('page-title', 'Manage Products')

@section('content')
<div class="bg-white rounded-lg shadow-sm border overflow-hidden">
    <div class="p-6 border-b flex justify-between items-center">
        <h3 class="font-bold">All Products</h3>
        <a href="{{ route('admin.products.create') }}" class="bg-primary-yellow text-primary-dark px-4 py-2 rounded font-bold text-sm">Add New Product</a>
    </div>
    <table class="w-full text-left">
        <thead class="bg-gray-50 text-xs font-bold uppercase text-gray-500 border-b">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Category</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y text-sm">
            @foreach($products as $product)
            <tr>
                <td class="px-6 py-4 font-medium">{{ $product->name }}</td>
                <td class="px-6 py-4">{{ $product->category->name }}</td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4 border-t">
        {{ $products->links() }}
    </div>
</div>
@endsection
