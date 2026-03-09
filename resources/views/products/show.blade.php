@extends('layouts.app')

@section('title', $product->name . ' - Detail Aset IncubeShop')

@section('content')
<!-- Sovereign Breadcrumb -->
<div class="bg-slate-50 py-8 border-b border-slate-100 mb-12">
    <div class="container text-[11px] font-bold uppercase tracking-widest text-slate-400">
        <a href="/" class="hover:text-slate-900 transition-colors">Beranda</a>
        <span class="mx-3 opacity-30">/</span>
        <a href="{{ route('products.index') }}" class="hover:text-slate-900 transition-colors">Katalog</a>
        <span class="mx-3 opacity-30">/</span>
        <span class="text-slate-900">{{ strtoupper($product->name) }}</span>
    </div>
</div>

<div class="container pb-32">
    <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 mb-20">
        <!-- Gallery Sovereign -->
        <div class="w-full lg:w-1/2">
            <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden aspect-square group shadow-sovereign-md p-2">
                @php
                    $primaryImg = $product->images->where('is_primary', true)->first();
                    $imgPath = $primaryImg ? $primaryImg->image_path : asset('assets/images/gaming_setup.png');
                    if(!str_starts_with($imgPath, 'http')) {
                        $imgPath = asset($imgPath);
                    }
                @endphp
                <img src="{{ $imgPath }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-xl transition-transform duration-700 group-hover:scale-105">
            </div>
        </div>

        <!-- Info Panel Sovereign -->
        <div class="flex-1">
            <div class="mb-10">
                <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="inline-block text-xs font-bold text-primary-purple uppercase tracking-widest mb-4 hover:underline">
                    {{ $product->category->name }}
                </a>
                <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight mb-6">
                    {{ $product->name }}
                </h1>
                <div class="flex items-center gap-4 text-sm mb-8">
                    <div class="border-b border-slate-300 pb-0.5">
                        <span class="text-slate-900 font-bold underline">{{ $product->review_count }}</span>
                        <span class="text-slate-500 text-xs">Penilaian</span>
                    </div>
                    <span class="w-px h-4 bg-slate-200"></span>
                    <div class="pb-0.5">
                        <span class="text-slate-900 font-bold">{{ $product->sold_count }}</span>
                        <span class="text-slate-500 text-xs">Terjual</span>
                    </div>
                </div>

                <!-- Price Sovereign -->
                <div class="bg-slate-50 border border-slate-100 rounded-xl p-8 mb-10 shadow-sm flex items-end gap-3 transition-all hover:border-primary-purple/20">
                    <span class="text-lg font-bold text-primary-purple mb-1">Rp</span>
                    <span class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tighter">
                        {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    <span class="text-sm text-slate-400 font-bold mb-1 opacity-50 ml-4 line-through italic">Rp {{ number_format($product->price * 1.5, 0, ',', '.') }}</span>
                </div>

                <!-- Description Sovereign -->
                <div class="prose prose-slate max-w-none text-slate-600 mb-10 leading-relaxed italic text-lg border-l-4 border-slate-100 pl-6">
                    {!! nl2br(e($product->description)) !!}
                </div>

                <!-- Action Hub -->
                <div class="flex flex-col sm:flex-row gap-4 mb-20">
                    <form action="{{ route('cart.store') }}" method="POST" class="flex-1">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="w-full bg-slate-900 text-white py-4 text-sm tracking-widest uppercase rounded-lg hover:bg-slate-800 transition-all font-bold">
                             Tambah ke Keranjang
                        </button>
                    </form>
                    <button onclick="openInquiryModal({{ $product->id }}, '{{ addslashes($product->name) }}')" class="flex-1 btn-sovereign-purple py-4 text-sm tracking-widest uppercase">
                         INQUIRY SEKARANG
                    </button>
                    <button onclick="toggleFavorite(this, {{ $product->id }})" class="w-14 h-14 border border-slate-200 rounded-lg flex items-center justify-center transition-all duration-300 group">
                        <svg class="w-6 h-6 {{ $product->isFavoritedBy(auth()->user()) ? 'fill-red-500 text-red-500' : 'text-slate-400 group-hover:text-red-500' }}" fill="{{ $product->isFavoritedBy(auth()->user()) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                </div>

                <!-- Meta Info Sovereign -->
                <div class="grid grid-cols-2 gap-6 pt-10 border-t border-slate-100 text-xs font-bold uppercase tracking-widest text-slate-400">
                    <div>
                        <p class="mb-2">ID Produk</p>
                        <p class="text-slate-900 font-black">INC-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div>
                        <p class="mb-2">Lokasi Distribusi</p>
                        <p class="text-slate-900 font-black">Jakarta Pusat (Sektor 07)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews Section Sovereign -->
    <div class="bg-white border border-slate-100 rounded-3xl shadow-sm overflow-hidden mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-3">
            <!-- Review Summary -->
            <div class="p-10 bg-slate-50 border-r border-slate-100">
                <h3 class="text-xl font-bold text-slate-900 mb-8 font-primary">Penilaian Pelanggan</h3>
                @auth
                <div class="pt-10 border-t border-slate-200">
                    <h4 class="text-sm font-bold text-slate-900 mb-6 uppercase tracking-widest">Tulis Ulasan Anda</h4>
                    <form action="{{ route('products.reviews.store', $product->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="rating" value="5">
                        <textarea name="comment" rows="4" placeholder="Bagikan pengalaman Anda menggunakan aset ini..." class="w-full bg-white border-slate-200 rounded-xl text-xs font-medium px-4 py-3 focus:ring-primary-purple focus:border-primary-purple"></textarea>
                        <button type="submit" class="w-full bg-slate-900 text-white text-[10px] font-bold uppercase tracking-widest py-4 rounded-xl hover:bg-slate-800 transition-all shadow-lg">Kirim Ulasan</button>
                    </form>
                </div>
                @else
                <div class="p-6 bg-white border border-dashed border-slate-200 rounded-2xl text-center">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4 leading-relaxed">Silakan login untuk memberikan ulasan aset</p>
                    <a href="{{ route('login') }}" class="inline-block text-[10px] font-bold text-primary-purple border-b-2 border-primary-purple pb-0.5">MASUK SEKARANG</a>
                </div>
                @endauth
            </div>

            <!-- Review List -->
            <div class="lg:col-span-2 p-10">
                <div class="space-y-10 max-h-[600px] overflow-y-auto pr-4 custom-scrollbar">
                    @forelse($product->reviews as $review)
                    <div class="border-b border-slate-50 pb-10 last:border-0 last:pb-0">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-primary-purple/10 rounded-full flex items-center justify-center text-xs font-bold text-primary-purple">
                                    {{ substr($review->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900">{{ $review->user->name }}</h4>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $review->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-slate-600 leading-relaxed font-medium bg-slate-50/50 p-4 rounded-xl border-l-4 border-slate-100 italic">
                            "{{ $review->comment }}"
                        </p>
                    </div>
                    @empty
                    <div class="text-center py-20">
                        <svg class="w-12 h-12 text-slate-100 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <p class="text-sm text-slate-400 font-bold uppercase tracking-widest">Cek integritas: Belum ada ulasan untuk aset ini.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products Sovereign -->
    @if($relatedProducts->count() > 0)
    <div class="mb-24">
        <div class="flex items-center justify-between mb-10">
            <div>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Produk Terkait</h3>
                <div class="w-12 h-1.5 bg-primary-purple rounded-full"></div>
            </div>
            <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="text-xs font-bold text-primary-purple uppercase tracking-widest hover:underline transition-all">
                Lihat Semua
            </a>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedProducts as $related)
            @php
                $relImgPath = $related->images->where('is_primary', true)->first()->image_path ?? asset('assets/images/gaming_setup.png');
                if (!str_starts_with($relImgPath, 'http')) {
                    $relImgPath = asset($relImgPath);
                }
            @endphp
            <div class="bg-white rounded-[16px] shadow-sm hover:shadow-md transition-all duration-200 p-4 group flex flex-col h-full overflow-hidden">
                <!-- Image Container (Square 1:1) -->
                <div class="relative aspect-square rounded-xl overflow-hidden mb-3 bg-[#f8fafc] flex items-center justify-center shrink-0">
                    <img src="{{ $relImgPath }}" alt="{{ $related->name }}" class="w-full h-full object-contain group-hover:scale-[1.03] transition-transform duration-300">
                    
                    <!-- Hover Overlay (Action Hub) -->
                    <div class="absolute inset-0 bg-black/[0.12] opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center gap-2 z-30 pointer-events-none group-hover:pointer-events-auto backdrop-blur-[2px]">
                        <a href="{{ route('products.show', $related->slug) }}" class="flex-shrink-0 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 opacity-0 group-hover:opacity-100">
                             <span class="px-3 py-1.5 bg-white text-gray-800 text-[10px] font-bold rounded-full shadow-xl hover:bg-gray-50 transition-colors inline-block uppercase whitespace-nowrap">DETAIL</span>
                         </a>
                         <form action="{{ route('cart.store') }}" method="POST" class="m-0 p-0 flex-shrink-0 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 delay-[50ms] opacity-0 group-hover:opacity-100">
                             @csrf
                             <input type="hidden" name="product_id" value="{{ $related->id }}">
                             <input type="hidden" name="quantity" value="1">
                             <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-full bg-white text-primary-purple shadow-xl hover:bg-primary-purple hover:text-white transition-all">
                                 <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                             </button>
                         </form>
                         <button onclick="openInquiryModal({{ $related->id }}, '{{ addslashes($related->name) }}')" class="px-3 py-1.5 bg-primary-purple text-white text-[10px] font-bold rounded-full shadow-xl hover:opacity-90 transition-opacity uppercase tracking-wider whitespace-nowrap transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 delay-100 opacity-0 group-hover:opacity-100">INQUIRY</button>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="flex flex-col flex-1 px-1">
                    <!-- Product Name -->
                    <h3 class="text-xs font-bold text-[#1e293b] line-clamp-2 leading-snug mb-2 min-h-[2.5rem]">
                        <a href="{{ route('products.show', $related->slug) }}" class="hover:text-primary-purple transition-colors">{{ $related->name }}</a>
                    </h3>

                    <!-- Price -->
                    <div class="flex items-end justify-between mt-auto pt-3 border-t border-gray-100/50">
                        <div class="text-[13px] font-bold text-primary-purple leading-tight">
                            <span class="text-[10px] mr-1 font-black uppercase tracking-tighter">Rp</span>{{ number_format($related->price, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Technical Specs Sovereign -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white border border-slate-100 p-8 rounded-2xl shadow-sm hover:shadow-sovereign-lg transition-all">
            <h3 class="flex items-center gap-3 text-xl font-bold text-slate-900 mb-8">
                <span class="w-2 h-8 bg-primary-purple rounded-full"></span>
                Spesifikasi Aset
            </h3>
            <div class="text-sm text-slate-500 leading-loose">
                {!! nl2br(e($product->specs ?? 'Spesifikasi standar industri untuk model ' . $product->name)) !!}
            </div>
        </div>
        <div class="bg-slate-900 p-8 rounded-2xl shadow-sovereign-lg border border-slate-800 text-white">
            <h3 class="flex items-center gap-3 text-xl font-bold text-white mb-8">
                <span class="w-2 h-8 bg-white/20 rounded-full"></span>
                Integritas Teknis
            </h3>
            <div class="text-sm text-slate-400 leading-loose">
                {!! nl2br(e($product->technical_specs ?? 'Data teknis internal diklasifikasikan sebagai data korporat terenkripsi.')) !!}
            </div>
        </div>
    </div>
</div>

@include('partials.inquiry_modal')

<script>
    function buyProduct(productId) {
        @auth
            alert('Fitur pembelian akan segera hadir! Menyiapkan checkout untuk produk ID: ' + productId);
        @else
            window.location.href = "{{ route('login') }}";
        @endauth
    }

    function toggleFavorite(btn, productId) {
        fetch(`/products/${productId}/favorite`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (response.status === 401) {
                window.location.href = "{{ route('login') }}";
                return;
            }
            return response.json();
        })
        .then(data => {
            if (data && data.status === 'success') {
                const svg = btn.querySelector('svg');
                if (data.is_favorited) {
                    svg.classList.add('fill-red-500', 'text-red-500');
                    svg.setAttribute('fill', 'currentColor');
                } else {
                    svg.classList.remove('fill-red-500', 'text-red-500');
                    svg.classList.add('text-slate-400');
                    svg.setAttribute('fill', 'none');
                }
            }
        })
        .catch(err => console.error('Error toggling favorite:', err));
    }
</script>
@endsection
