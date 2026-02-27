@extends('layouts.admin')

@section('page-title', 'Edit Category')

@section('content')
<div class="max-w-2xl bg-white rounded-lg shadow-sm border p-8">
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label class="block text-sm font-bold mb-2">Category Name</label>
            <input type="text" name="name" class="w-full border rounded p-2 @error('name') border-red-500 @enderror" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex gap-4">
            <button type="submit" class="bg-primary-yellow text-primary-dark px-6 py-2 rounded font-bold">Update Category</button>
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-100 px-6 py-2 rounded font-bold">Cancel</a>
        </div>
    </form>
</div>
@endsection
