@extends('layouts.app')

@section('content')
<div class="py-20">
    <div class="container">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-16">
            <div>
                <nav class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">
                    <a href="/" class="hover:text-primary-purple transition-colors">Beranda</a>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-slate-900">Produk Favorit</span>
                </nav>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Koleksi <span class="text-primary-purple">Favorit</span></h1>
            </div>
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-primary-purple hover:text-slate-900 transition-all group">
                Kembali ke Katalog
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M13 7l5 5-5 5M6 7l5 5-5 5"></path></svg>
            </a>
        </div>

        @if($favorites->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($favorites as $product)
            <div class="card-sovereign flex flex-col h-full bg-white border border-slate-100 rounded-xl overflow-hidden hover:shadow-sovereign-lg transition-all">
                <div class="relative group aspect-square overflow-hidden bg-slate-50">
                    @php
                        $imgPath = $product->images->where('is_primary', true)->first()->image_path ?? asset('assets/images/gaming_setup.png');
                        if (!str_starts_with($imgPath, 'http')) {
                            $imgPath = asset($imgPath);
                        }
                    @endphp
                    <img src="{{ $imgPath }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-700">
                    
                    <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3 backdrop-blur-[2px]">
                        <a href="{{ route('products.show', $product->slug) }}" class="px-6 py-2.5 bg-white text-slate-900 text-[10px] font-bold uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all shadow-lg">Detail</a>
                        <button onclick="toggleFavorite(this, {{ $product->id }})" class="p-2.5 rounded-full bg-red-500 border border-red-400 transition-all shadow-lg">
                            <svg class="w-4 h-4 fill-white text-white transition-colors" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </button>
                    </div>
                </div>
                
                <div class="p-5 flex flex-col flex-1">
                    <h3 class="text-sm font-bold text-slate-900 mb-3 line-clamp-2 leading-relaxed mt-[10px]">
                        <a href="{{ route('products.show', $product->slug) }}" class="hover:text-primary-purple transition-colors">{{ $product->name }}</a>
                    </h3>
                    

                    <div class="mt-auto flex items-end justify-between">
                        <div class="text-[15px] font-bold text-primary-purple">
                            <span class="text-[10px] font-medium mr-0.5">Rp</span>{{ number_format($product->price, 0, ',', '.') }}
                        </div>
                        <div class="text-[10px] text-slate-400 font-medium">
                            {{ $product->sold_count > 1000 ? number_format($product->sold_count/1000, 1) . 'RB+' : $product->sold_count }} terjual
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="py-32 text-center bg-white border border-dashed border-slate-200 rounded-3xl">
            <div class="w-20 h-20 bg-slate-50 flex items-center justify-center rounded-full mx-auto mb-6">
                <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">Belum Ada Favorit</h3>
            <p class="text-slate-400 text-sm mb-10 max-w-sm mx-auto leading-relaxed">Simpan aset favoritmu untuk memudahkan pencarian di masa mendatang.</p>
            <a href="{{ route('products.index') }}" class="px-8 py-4 bg-primary-purple text-white text-xs font-bold uppercase tracking-widest rounded-full hover:bg-slate-900 transition-all shadow-lg shadow-primary-purple/20">Mulai Menjelajah</a>
        </div>
        @endif
    </div>
</div>

<script>
    function toggleFavorite(btn, productId) {
        fetch(`/products/${productId}/favorite`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data && data.status === 'success') {
                if (!data.is_favorited) {
                    // Remove card from favorites page
                    btn.closest('.card-sovereign').remove();
                    
                    // If no more favorites, reload to show empty state
                    if (document.querySelectorAll('.card-sovereign').length === 0) {
                        window.location.reload();
                    }
                }
            }
        })
        .catch(err => console.error('Error toggling favorite:', err));
    }
</script>
@endsection
