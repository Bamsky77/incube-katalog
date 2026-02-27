@extends('layouts.admin')

@section('page-title', 'Customer Inquiries')

@section('content')
<div class="bg-white rounded-lg shadow-sm border overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 text-xs font-bold uppercase text-gray-500 border-b">
            <tr>
                <th class="px-6 py-3">Customer</th>
                <th class="px-6 py-3">Subject</th>
                <th class="px-6 py-3">Product</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y text-sm">
            @foreach($inquiries as $inquiry)
            <tr>
                <td class="px-6 py-4">
                    <div class="font-bold">{{ $inquiry->name }}</div>
                    <div class="text-xs text-gray-400">{{ $inquiry->email }}</div>
                </td>
                <td class="px-6 py-4">{{ $inquiry->subject }}</td>
                <td class="px-6 py-4">{{ $inquiry->product->name ?? 'General' }}</td>
                <td class="px-6 py-4 flex gap-4">
                    <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="text-primary-yellow font-bold">View</a>
                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
