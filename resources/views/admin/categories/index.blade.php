@extends('layouts.admin')

@section('page-title', 'Manage Categories')

@section('content')
<div class="bg-white rounded-lg shadow-sm border overflow-hidden">
    <div class="p-6 border-b flex justify-between items-center">
        <h3 class="font-bold">All Categories</h3>
        <a href="{{ route('admin.categories.create') }}" class="bg-primary-yellow text-primary-dark px-4 py-2 rounded font-bold text-sm">Add New Category</a>
    </div>
    <table class="w-full text-left">
        <thead class="bg-gray-50 text-xs font-bold uppercase text-gray-500 border-b">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Slug</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y text-sm">
            @foreach($categories as $category)
            <tr>
                <td class="px-6 py-4 font-medium">{{ $category->name }}</td>
                <td class="px-6 py-4">{{ $category->slug }}</td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4 border-t">
        {{ $categories->links() }}
    </div>
</div>
@endsection
