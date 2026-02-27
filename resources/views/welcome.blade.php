@extends('layouts.app')

@section('title', 'IncubeShop - Katalog Aset Teknologi Premium')

@section('content')
<!-- Sovereign Hero 5.0 -->
<div class="container py-12">
    <div class="relative bg-slate-950 rounded-2xl overflow-hidden h-[450px] lg:h-[600px] shadow-sovereign-lg border border-slate-900">
        <!-- Background Asset -->
        <div class="absolute inset-0 z-0">
             <img src="{{ asset('assets/images/hero_banner.png') }}" class="w-full h-full object-cover opacity-60">
             <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/40 to-transparent"></div>
        </div>

        <!-- Hero Content -->
        <div class="absolute inset-0 z-10 flex items-center">
            <div class="px-12 lg:px-24 max-w-2xl">
                <span class="inline-block bg-primary-purple/20 text-blue-400 text-[10px] font-bold tracking-[0.3em] px-3 py-1 rounded-md mb-8 uppercase">Edisi Sovereign 5.0</span>
                <h2 class="text-4xl lg:text-6xl font-extrabold text-white leading-tight mb-8 tracking-tight">
                    Teknologi <span class="text-primary-purple">Terverifikasi.</span>
                </h2>
                <p class="text-slate-300 text-lg leading-relaxed mb-12 max-w-lg">
                    Kurasi aset premium untuk profil industri dan gaya hidup eksklusif. Dijamin dengan protokol keamanan tanpa kompromi.
                </p>
                <div class="flex gap-4">
                    <a href="/products" class="btn-sovereign-purple px-10 py-4 h-auto shadow-xl">Jelajahi Produk</a>
                    <a href="/about" class="btn-sovereign h-auto px-10 py-4 border border-slate-800 bg-transparent text-white hover:bg-slate-900">Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Category Focus -->
<div class="container py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <a href="/products?category=tech-gaming" class="group relative bg-slate-100 rounded-xl overflow-hidden h-96 flex flex-col justify-end p-10 hover:shadow-sovereign-lg transition-all border border-slate-50">
            <img src="{{ asset('assets/images/gaming_setup.png') }}" class="absolute inset-0 w-full h-full object-cover grayscale opacity-40 group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700">
            <div class="relative z-10">
                <span class="text-primary-purple font-bold text-xs uppercase tracking-widest mb-2 block">Divisi Teknis</span>
                <h3 class="text-3xl font-bold text-slate-900 mb-6">Gaming & Workstation</h3>
                <div class="w-10 h-1 bg-slate-900 group-hover:w-24 transition-all duration-500"></div>
            </div>
        </a>
        <a href="/products?category=future-apparel" class="group relative bg-slate-100 rounded-xl overflow-hidden h-96 flex flex-col justify-end p-10 hover:shadow-sovereign-lg transition-all border border-slate-50">
            <img src="{{ asset('assets/images/watch_purple.png') }}" class="absolute inset-0 w-full h-full object-cover grayscale opacity-40 group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700">
            <div class="relative z-10">
                <span class="text-primary-purple font-bold text-xs uppercase tracking-widest mb-2 block">Lifestyle</span>
                <h3 class="text-3xl font-bold text-slate-900 mb-6">Aksesori Premium</h3>
                <div class="w-10 h-1 bg-slate-900 group-hover:w-24 transition-all duration-500"></div>
            </div>
        </a>
    </div>
</div>

<!-- Highlight Inventory -->
<div class="bg-slate-50 py-24 mb-24 border-y border-slate-100">
    <div class="container">
        <div class="flex flex-col sm:flex-row justify-between items-end mb-16 gap-6">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold mb-4 text-slate-900">Pilihan Produk.</h2>
                <p class="text-slate-500 text-sm">Update katalog harian dengan standar kurasi industri.</p>
            </div>
            <a href="/products" class="btn-sovereign-outline h-fit">Lihat Seluruh Katalog</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach(\App\Models\Product::orderBy('created_at', 'desc')->limit(5)->get() as $product)
            <div class="card-sovereign group">
                <div class="card-sovereign-img">
                    @php
                        $imgPath = $product->images->where('is_primary', true)->first()->image_path ?? asset('assets/images/gaming_setup.png');
                        if (!str_starts_with($imgPath, 'http')) {
                            $imgPath = asset($imgPath);
                        }
                    @endphp
                    <img src="{{ $imgPath }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="flex flex-col grow">
                    <span class="text-[10px] font-bold text-primary-purple uppercase tracking-widest mb-2">{{ $product->category->name }}</span>
                    <h3 class="card-sovereign-title text-sm">
                        <a href="{{ route('products.show', $product->slug) }}" class="hover:text-primary-purple transition-colors">{{ $product->name }}</a>
                    </h3>
                    <div class="mt-auto pt-6 border-t border-slate-100">
                        <div class="card-sovereign-price text-slate-900">
                             <span class="currency">Rp</span>
                             {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Call to Join -->
<div class="container mb-32">
    <div class="bg-primary-purple rounded-2xl p-12 lg:p-20 text-white flex flex-col lg:flex-row items-center justify-between gap-12 shadow-sovereign-lg overflow-hidden relative">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
        <div class="text-center lg:text-left relative z-10">
            <h3 class="text-3xl font-bold mb-4">Ingin Akses Prioritas?</h3>
            <p class="text-indigo-100 text-base max-w-sm">Dapatkan info stok terbaru dan promo eksklusif langsung di email Anda.</p>
        </div>
        <div class="w-full lg:w-auto min-w-[350px] relative z-10">
            <form class="flex gap-2">
                <input type="email" placeholder="Email Anda" class="flex-1 h-12 px-6 bg-white/10 border border-white/20 rounded-md text-white placeholder-indigo-200 outline-none focus:border-white transition-all">
                <button class="bg-white text-primary-purple px-8 font-bold h-12 rounded-md hover:bg-slate-100 transition-colors uppercase text-xs">Aktivasi</button>
            </form>
        </div>
    </div>
</div>
@endsection
