@extends('layouts.admin')

@section('page-title', 'Add New Product')

@section('content')
<div class="max-w-4xl bg-white p-8 rounded-lg shadow-sm border">
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-bold mb-2">Product Name *</label>
                <input type="text" name="name" required class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-primary-yellow outline-none">
            </div>
            <div>
                <label class="block text-sm font-bold mb-2">Category *</label>
                <select name="category_id" required class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-primary-yellow outline-none">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-bold mb-2">Description *</label>
                <textarea name="description" rows="4" required class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-primary-yellow outline-none"></textarea>
            </div>
            <div>
                <label class="block text-sm font-bold mb-2">Specifications</label>
                <textarea name="specs" rows="4" class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-primary-yellow outline-none" placeholder="Key value specs..."></textarea>
            </div>
            <div>
                <label class="block text-sm font-bold mb-2">Technical Specs</label>
                <textarea name="technical_specs" rows="4" class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-primary-yellow outline-none" placeholder="Model, Power, etc..."></textarea>
            </div>
        </div>
        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-2 text-gray-500 font-bold">Cancel</a>
            <button type="submit" class="bg-primary-yellow text-primary-dark px-10 py-2 rounded font-bold shadow-sm">Save Product</button>
        </div>
    </form>
</div>
@endsection
