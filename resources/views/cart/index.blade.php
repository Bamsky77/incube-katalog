@extends('layouts.app')

@section('title', 'Keranjang Belanja - IncubeShop')

@section('content')
<!-- Sovereign Breadcrumb -->
<div class="bg-slate-50 py-8 border-b border-slate-100 mb-12">
    <div class="container text-[11px] font-bold uppercase tracking-widest text-slate-400">
        <a href="/" class="hover:text-slate-900 transition-colors">Beranda</a>
        <span class="mx-3 opacity-30">/</span>
        <span class="text-slate-900">Keranjang Belanja</span>
    </div>
</div>

<div class="container pb-32">
    <h1 class="text-3xl font-extrabold text-slate-900 mb-12">Keranjang Belanja Anda</h1>

    @if($cartItems->count() > 0)
    <div class="flex flex-col lg:flex-row gap-12">
        <!-- Cart Items List -->
        <div class="flex-1 space-y-6">
            @foreach($cartItems as $item)
            @php
                $imgPath = $item->product->images->where('is_primary', true)->first()->image_path ?? asset('assets/images/gaming_setup.png');
                if (!str_starts_with($imgPath, 'http')) {
                    $imgPath = asset($imgPath);
                }
            @endphp
            <div class="bg-white border border-slate-100 rounded-3xl p-6 flex flex-col sm:flex-row items-center gap-8 hover:shadow-sovereign-sm transition-all group">
                <!-- Product Image -->
                <div class="w-24 h-24 bg-slate-50 rounded-2xl overflow-hidden shrink-0">
                    <img src="{{ $imgPath }}" alt="{{ $item->product->name }}" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                </div>

                <!-- Product Info -->
                <div class="flex-1 text-center sm:text-left">
                    <h3 class="font-bold text-slate-900 mb-1 leading-snug">
                        <a href="{{ route('products.show', $item->product->slug) }}" class="hover:text-primary-purple transition-colors">{{ $item->product->name }}</a>
                    </h3>
                    <p class="text-xs font-bold text-primary-purple uppercase tracking-widest">{{ $item->product->category->name }}</p>
                </div>

                <!-- Quantity Control -->
                <div class="flex items-center gap-3 bg-slate-50 rounded-2xl p-2 border border-slate-100">
                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                        <button type="submit" class="w-8 h-8 rounded-xl flex items-center justify-center text-slate-400 hover:text-slate-900 hover:bg-white transition-all {{ $item->quantity <= 1 ? 'opacity-30 pointer-events-none' : '' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                        </button>
                    </form>
                    
                    <span class="text-sm font-black text-slate-900 w-8 text-center">{{ $item->quantity }}</span>

                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                        <button type="submit" class="w-8 h-8 rounded-xl flex items-center justify-center text-slate-400 hover:text-slate-900 hover:bg-white transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </button>
                    </form>
                </div>

                <!-- Price -->
                <div class="text-right min-w-[120px]">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Subtotal</p>
                    <p class="text-lg font-black text-slate-900">
                        <span class="text-xs mr-0.5">Rp</span>{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                    </p>
                </div>

                <!-- Remove -->
                <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="shrink-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-10 h-10 rounded-full border border-slate-100 flex items-center justify-center text-slate-300 hover:text-red-500 hover:border-red-100 hover:bg-red-50 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </form>
            </div>
            @endforeach
        </div>

        <!-- Cart Summary -->
        <div class="w-full lg:w-96">
            <div class="bg-slate-900 rounded-[32px] p-10 text-white shadow-sovereign-lg sticky top-32">
                <h3 class="text-xl font-bold mb-8">Ringkasan Pesanan</h3>
                
                <div class="space-y-4 mb-10">
                    <div class="flex justify-between text-sm text-slate-400">
                        <span>Total Items</span>
                        <span class="text-white font-bold">{{ $cartItems->sum('quantity') }}</span>
                    </div>
                </div>

                <div class="pt-8 border-t border-slate-800 mb-10">
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Total Pembayaran</p>
                    <p class="text-4xl font-black">
                        <span class="text-lg mr-1 text-primary-purple italic">Rp</span>{{ number_format($total, 0, ',', '.') }}
                    </p>
                </div>

                <button onclick="openInquiryModalForCart()" class="w-full bg-white text-slate-900 py-5 rounded-2xl text-xs font-black uppercase tracking-[0.2em] hover:bg-primary-purple hover:text-white transition-all shadow-xl shadow-white/5 active:scale-95">
                    Minta Penawaran Kustom
                </button>
                
                <p class="text-[9px] text-center text-slate-500 mt-6 uppercase tracking-widest font-bold italic">
                    <span class="text-primary-purple">100% Secure</span> Industrial Transactions
                </p>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-32 bg-slate-50 rounded-[48px] border-2 border-dashed border-slate-200">
        <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-8 shadow-sovereign-sm">
            <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
        </div>
        <h2 class="text-2xl font-bold text-slate-900 mb-4">Keranjang Kosong</h2>
        <p class="text-slate-400 mb-10 max-w-sm mx-auto">Anda belum menambahkan aset apapun ke keranjang Anda. Jelajahi katalog industri kami untuk mulai mengumpulkan sumber daya.</p>
        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-3 bg-primary-purple text-white px-10 py-5 rounded-2xl text-xs font-black uppercase tracking-widest hover:shadow-xl hover:shadow-primary-purple/20 transition-all active:scale-95">
            Jelajahi Katalog
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
    @endif
</div>

@include('partials.inquiry_modal', ['product' => $cartItems->first()->product ?? null])

<script>
    function openInquiryModalForCart() {
        @if($cartItems->count() > 0)
            const firstItem = {!! json_encode($cartItems->first()->product) !!};
            openInquiryModal(firstItem.id, 'PENAWARAN BUNDLE: ' + firstItem.name + ' (+ {{ $cartItems->count() - 1 }} ASET LAIN)');
        @endif
    }
</script>
@endsection
