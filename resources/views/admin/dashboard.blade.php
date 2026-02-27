@extends('layouts.admin')

@section('page-title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <!-- Total Products -->
    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm hover:border-primary-purple transition-colors group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center group-hover:bg-primary-purple/10 group-hover:text-primary-purple transition-colors">
                <i data-lucide="package" class="w-5 h-5"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Katalog</span>
        </div>
        <h3 class="text-slate-500 text-xs font-semibold mb-1">Aset Terverifikasi</h3>
        <p class="text-3xl font-bold text-slate-900">{{ number_format($stats['products_count']) }}</p>
    </div>

    <!-- Total Orders -->
    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm hover:border-primary-purple transition-colors group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center group-hover:bg-primary-purple/10 group-hover:text-primary-purple transition-colors">
                <i data-lucide="shopping-cart" class="w-5 h-5"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Transaksi</span>
        </div>
        <h3 class="text-slate-500 text-xs font-semibold mb-1">Total Pesanan</h3>
        <p class="text-3xl font-bold text-slate-900">{{ number_format($stats['orders_count']) }}</p>
    </div>

    <!-- Total Revenue -->
    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm hover:border-teal-500 transition-colors group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center group-hover:bg-teal-500/10 group-hover:text-teal-600 transition-colors">
                <i data-lucide="banknote" class="w-5 h-5"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Revenue</span>
        </div>
        <h3 class="text-slate-500 text-xs font-semibold mb-1">Total Pendapatan</h3>
        <p class="text-3xl font-bold text-slate-900"><span class="text-sm font-medium text-slate-400 mr-1">Rp</span>{{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
    </div>

    <!-- Total Reviews -->
    <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm hover:border-orange-500 transition-colors group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-10 h-10 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center group-hover:bg-orange-500/10 group-hover:text-orange-600 transition-colors">
                <i data-lucide="star" class="w-5 h-5"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Ulasan</span>
        </div>
        <h3 class="text-slate-500 text-xs font-semibold mb-1">Penilaian Masuk</h3>
        <p class="text-3xl font-bold text-slate-900">{{ number_format($stats['reviews_count']) }}</p>
    </div>
</div>

<div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
        <div>
            <h3 class="text-lg font-bold text-slate-900">Recent Customer Inquiries</h3>
            <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mt-0.5">Live interactions from your store</p>
        </div>
        <a href="{{ route('admin.inquiries.index') }}" class="px-5 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-700 font-bold text-xs hover:bg-slate-50 hover:border-slate-300 transition-all shadow-sm flex items-center gap-2">
            View All Register
            <i data-lucide="arrow-right" class="w-4 h-4 text-slate-400"></i>
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-[11px] font-bold uppercase text-slate-500 tracking-wider">
                    <th class="px-8 py-4 border-b border-slate-100">Customer Portfolio</th>
                    <th class="px-8 py-4 border-b border-slate-100">Message Subject</th>
                    <th class="px-10 py-4 border-b border-slate-100">Product Context</th>
                    <th class="px-8 py-4 border-b border-slate-100">Registration Date</th>
                    <th class="px-8 py-4 border-b border-slate-100 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach(\App\Models\Inquiry::latest()->limit(5)->get() as $inquiry)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-xs border border-slate-200 group-hover:bg-white group-hover:border-[#f6d32d] transition-all">
                                {{ strtoupper(substr($inquiry->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="font-bold text-slate-800 text-sm">{{ $inquiry->name }}</div>
                                <div class="text-[10px] text-slate-400 font-bold uppercase tracking-tight">{{ $inquiry->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-sm text-slate-600 font-medium">{{ $inquiry->subject }}</span>
                    </td>
                    <td class="px-10 py-5">
                        <div class="inline-flex items-center px-3 py-1 rounded-md bg-slate-50 border border-slate-200 text-[10px] font-bold text-slate-500 uppercase tracking-widest group-hover:bg-[#f6d32d]/10 group-hover:text-[#111827] group-hover:border-[#f6d32d]/20 transition-all">
                            {{ $inquiry->product->name ?? 'General Inquiry' }}
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <div class="flex flex-col">
                            <span class="text-sm text-slate-500 font-bold">{{ $inquiry->created_at->format('M d, Y') }}</span>
                            <span class="text-[9px] text-slate-300 font-bold uppercase tracking-wider">{{ $inquiry->created_at->diffForHumans() }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:bg-slate-100 hover:text-slate-900 transition-all ml-auto">
                            <i data-lucide="chevron-right" class="w-5 h-5"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if(\App\Models\Inquiry::count() == 0)
    <div class="p-20 text-center">
        <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-200 mx-auto mb-6">
            <i data-lucide="inbox" class="w-8 h-8"></i>
        </div>
        <h4 class="text-base font-bold text-slate-800 mb-1">No customer inquiries found</h4>
        <p class="text-xs text-slate-400">Items will appear here once customers contact you via product pages.</p>
    </div>
    @endif
</div>
@endsection


