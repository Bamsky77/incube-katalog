@extends('layouts.admin')

@section('page-title', 'Inquiry Details')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="bg-white rounded-lg shadow-sm border p-8">
        <div class="flex justify-between items-start mb-8">
            <div>
                <h3 class="text-xl font-bold text-slate-900 mb-1">{{ $inquiry->subject }}</h3>
                <p class="text-sm text-slate-500">Received on {{ $inquiry->created_at->format('M d, Y H:i') }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.inquiries.index') }}" class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-slate-700 font-bold text-xs hover:bg-slate-100 transition-all">Back to List</a>
                <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-50 border border-red-100 rounded-lg text-red-600 font-bold text-xs hover:bg-red-100 transition-all">Delete Inquiry</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <div>
                    <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Customer Name</h4>
                    <p class="text-sm font-bold text-slate-800">{{ $inquiry->name }}</p>
                </div>
                <div>
                    <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Email Address</h4>
                    <p class="text-sm font-bold text-slate-800">{{ $inquiry->email }}</p>
                </div>
                <div>
                    <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Phone</h4>
                    <p class="text-sm font-bold text-slate-800">{{ $inquiry->phone ?? '-' }}</p>
                </div>
                <div>
                    <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Company</h4>
                    <p class="text-sm font-bold text-slate-800">{{ $inquiry->company_name ?? '-' }}</p>
                </div>
            </div>
            <div class="space-y-4">
                <div>
                    <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Product Context</h4>
                    @if($inquiry->product)
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200">
                            <i data-lucide="package" class="w-4 h-4 text-slate-400"></i>
                            <span class="text-sm font-bold text-slate-800">{{ $inquiry->product->name }}</span>
                        </div>
                    @else
                        <p class="text-sm font-bold text-slate-400 italic">General Inquiry</p>
                    @endif
                </div>
                @if($inquiry->quantity)
                <div>
                    <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Requested Quantity</h4>
                    <p class="text-sm font-bold text-slate-800">{{ $inquiry->quantity }} units</p>
                </div>
                @endif
            </div>
        </div>

        <div class="mt-8 pt-8 border-t border-slate-100">
            <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-3">Message Content</h4>
            <div class="bg-slate-50 rounded-xl p-6 border border-slate-200 text-slate-700 text-sm leading-relaxed whitespace-pre-wrap">
                {{ $inquiry->message }}
            </div>
        </div>
    </div>
</div>
@endsection
