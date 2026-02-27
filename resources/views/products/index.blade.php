@extends('layouts.app')

@section('title', 'Katalog Produk - IncubeShop Sovereign')

@section('content')
<!-- Sovereign Breadcrumb -->
<div class="bg-slate-50 py-8 border-b border-slate-100 mb-12">
    <div class="container text-[11px] font-bold uppercase tracking-widest text-slate-400">
        <a href="/" class="hover:text-slate-900 transition-colors">Beranda</a>
        <span class="mx-3 opacity-30">/</span>
        <span class="text-slate-900">Katalog Produk</span>
    </div>
</div>

<div class="container pb-32">
    <div class="flex flex-col lg:flex-row gap-12">
        <!-- Sidebar Navigation -->
        <aside class="w-full lg:w-64 flex-shrink-0">
            <!-- Category Filter -->
            <div class="mb-10">
                <button onclick="toggleSection('category-content', 'category-icon')" class="w-full flex items-center justify-between text-sm font-bold text-slate-900 mb-4 focus:outline-none group text-left">
                    Kategori
                    <svg id="category-icon" class="w-4 h-4 text-slate-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div id="category-content" class="filter-content">
                    <ul class="space-y-2 pb-2">
                        <li>
                            <a href="{{ url()->current() }}" class="text-xs font-medium hover:text-primary-purple transition-all {{ !request('category') ? 'text-primary-purple font-bold' : 'text-slate-500' }}">
                                Semua Produk
                            </a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ request()->fullUrlWithQuery(['category' => $category->slug]) }}" 
                               class="text-xs font-medium hover:text-primary-purple transition-all {{ request('category') == $category->slug ? 'text-primary-purple font-bold' : 'text-slate-500' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Brand Filter -->
            @if($brands->count() > 0)
            <div class="mb-10 pt-6 border-t border-slate-100">
                <button onclick="toggleSection('brand-content', 'brand-icon')" class="w-full flex items-center justify-between text-sm font-bold text-slate-900 mb-4 focus:outline-none group text-left">
                    Brand
                    <svg id="brand-icon" class="w-4 h-4 text-slate-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div id="brand-content" class="filter-content">
                    <div class="space-y-2 max-h-60 overflow-y-auto pr-2 custom-scrollbar pb-2">
                        @foreach($brands as $brand)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="brand[]" value="{{ $brand }}" class="brand-filter w-4 h-4 rounded border-slate-300 text-primary-purple focus:ring-primary-purple/20 transition-all" {{ in_array($brand, (array)request('brand')) ? 'checked' : '' }}>
                            <span class="text-xs font-medium text-slate-500 group-hover:text-slate-900 transition-colors">{{ $brand }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Price Filter -->
            <div class="mb-10 pt-6 border-t border-slate-100">
                <button onclick="toggleSection('price-content', 'price-icon')" class="w-full flex items-center justify-between text-sm font-bold text-slate-900 mb-4 focus:outline-none group text-left">
                    Harga
                    <svg id="price-icon" class="w-4 h-4 text-slate-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div id="price-content" class="filter-content">
                    <div class="space-y-3 pb-2">
                        <div class="flex items-center h-10 px-4 bg-slate-50 border border-slate-200 rounded-lg focus-within:border-primary-purple transition-all">
                            <input type="number" id="min_price" placeholder="Minimum" value="{{ request('min_price') }}" class="w-full bg-transparent border-0 p-0 text-xs font-medium focus:ring-0 placeholder:text-slate-400">
                        </div>
                        <div class="flex items-center h-10 px-4 bg-slate-50 border border-slate-200 rounded-lg focus-within:border-primary-purple transition-all">
                            <input type="number" id="max_price" placeholder="Maksimum" value="{{ request('max_price') }}" class="w-full bg-transparent border-0 p-0 text-xs font-medium focus:ring-0 placeholder:text-slate-400">
                        </div>
                        <button onclick="applyPriceFilter()" class="w-full h-10 bg-slate-900 text-white text-[10px] font-bold uppercase tracking-widest rounded-lg hover:bg-slate-800 transition-all">Terapkan</button>
                    </div>
                </div>
            </div>

            <!-- Rating Filter -->
            <div class="mb-10 pt-6 border-t border-slate-100">
                <button onclick="toggleSection('rating-content', 'rating-icon')" class="w-full flex items-center justify-between text-sm font-bold text-slate-900 mb-4 focus:outline-none group text-left">
                    Rating
                    <svg id="rating-icon" class="w-4 h-4 text-slate-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div id="rating-content" class="filter-content">
                    <div class="space-y-3 pb-2">
                        @foreach([4, 3, 2, 1] as $r)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="rating" value="{{ $r }}" class="rating-filter w-4 h-4 border-slate-300 text-primary-purple focus:ring-primary-purple/20 transition-all" {{ request('rating') == $r ? 'checked' : '' }}>
                            <div class="flex items-center gap-1.5">
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-3 h-3 {{ $i <= $r ? 'text-yellow-400 fill-yellow-400' : 'text-slate-200 fill-slate-200' }} transition-colors" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                                <span class="text-[10px] font-bold text-slate-500 leading-none whitespace-nowrap">{{ $r }} & Ke Atas</span>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Ad Space Clean -->
            <div class="bg-slate-900 p-8 rounded-xl text-white shadow-sovereign-lg relative overflow-hidden group mt-12">
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary-purple opacity-20 rounded-full -mr-16 -mt-16 blur-xl"></div>
                <h4 class="text-xl font-bold mb-4 relative z-10">Integritas 5.0</h4>
                <p class="text-slate-400 text-xs leading-relaxed mb-8 relative z-10">Standar kurasi aset industri nomor satu di Indonesia.</p>
                <a href="/about" class="text-xs font-bold uppercase tracking-widest border-b border-primary-purple pb-1 hover:text-primary-purple transition-all relative z-10">Pelajari</a>
            </div>
        </aside>

        <!-- Main Product Grid -->
        <div class="flex-1">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900 mb-2">
                        @if($selectedCategory)
                            {{ $selectedCategory->name }}
                        @elseif(request('category'))
                            Kategori: {{ request('category') }}
                        @else
                            Seluruh Katalog
                        @endif
                    </h1>
                    <p class="text-slate-400 text-sm">Menampilkan <span class="text-slate-700 font-bold">{{ $products->total() }}</span> aset terverifikasi.</p>
                </div>
                <div class="flex items-center gap-4 bg-white border border-slate-200 rounded-md p-1 pl-4 h-11 min-w-[200px]">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Urutkan:</span>
                    <select id="sortSelect" class="border-none bg-transparent text-xs font-bold text-slate-700 focus:ring-0 cursor-pointer flex-1">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="rating_desc" {{ request('sort') == 'rating_desc' ? 'selected' : '' }}>Rating Tertinggi</option>
                        <option value="reviews_desc" {{ request('sort') == 'reviews_desc' ? 'selected' : '' }}>Ulasan Terbanyak</option>
                    </select>
                </div>
            </div>

            <!-- Static Search Zenith (Cleaner) -->
            <div class="mb-12 relative group">
                <input type="text" id="sovereignSearch" value="{{ request('search') }}" placeholder="Cari nama atau deskripsi aset..." class="w-full h-14 bg-white border border-slate-200 rounded-xl px-12 text-sm font-medium focus:outline-none focus:border-primary-purple focus:ring-4 focus:ring-primary-purple/5 transition-all shadow-sm">
                <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            <!-- Solid Cards Grid -->
            <div class="grid grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-8" id="productGrid">
                @forelse($products as $product)
                @php
                    $imgPath = $product->images->where('is_primary', true)->first()->image_path ?? asset('assets/images/gaming_setup.png');
                    if (!str_starts_with($imgPath, 'http')) {
                        $imgPath = asset($imgPath);
                    }
                @endphp
                <div class="bg-white rounded-[16px] shadow-sm hover:shadow-md transition-all duration-200 p-4 group flex flex-col h-full overflow-hidden" data-name="{{ strtolower($product->name) }}">
                    <!-- Image Container (Square 1:1) -->
                    <div class="relative aspect-square rounded-xl overflow-hidden mb-3 bg-[#f8fafc] flex items-center justify-center shrink-0">
                        <img src="{{ $imgPath }}" alt="{{ $product->name }}" class="w-full h-full object-contain group-hover:scale-[1.03] transition-transform duration-300">
                        
                        <!-- Badges Stack (Top-Left) -->
                        <div class="badge-stack absolute top-3 left-3 flex flex-col items-start gap-1.5 z-10 transition-all duration-300 pointer-events-none origin-top-left group-hover:opacity-0 group-hover:scale-95">
                            @if($product->is_free_shipping)
                            <div class="bg-[#4ade80] text-white text-[9px] font-black px-3 py-1.5 rounded-[10px] shadow-sm flex items-center gap-1 leading-none uppercase tracking-widest">
                                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                Gratis Ongkir
                            </div>
                            @endif
                            @if($product->has_installment)
                            <div class="bg-primary-purple text-white text-[9px] font-black px-3 py-1.5 rounded-[10px] shadow-sm leading-none uppercase tracking-widest">
                                Cicilan 0%
                            </div>
                            @endif
                        </div>

                        <!-- Hover Overlay (Action Hub) -->
                        <div class="absolute inset-0 bg-black/[0.12] opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center gap-2 z-30 pointer-events-none group-hover:pointer-events-auto backdrop-blur-[2px]">
                            <a href="{{ route('products.show', $product->slug) }}" class="flex-shrink-0 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 opacity-0 group-hover:opacity-100">
                                <span class="px-3.5 py-1.5 bg-white text-gray-800 text-[10px] font-bold rounded-full shadow-xl hover:bg-gray-50 transition-colors inline-block uppercase whitespace-nowrap">DETAIL</span>
                            </a>
                            <form action="{{ route('products.buy', $product->id) }}" method="POST" class="m-0 p-0 flex-shrink-0 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 delay-75 opacity-0 group-hover:opacity-100">
                                @csrf
                                <button type="submit" class="px-3.5 py-1.5 bg-primary-purple text-white text-[10px] font-bold rounded-full shadow-xl hover:opacity-90 transition-opacity uppercase tracking-wider whitespace-nowrap">BELI</button>
                            </form>
                            <button onclick="toggleFavorite(this, {{ $product->id }})" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/20 border border-white/40 hover:bg-white text-white hover:text-red-500 transition-all backdrop-blur-md shadow-xl flex-shrink-0 transform translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 delay-150">
                                <svg class="w-3.5 h-3.5 {{ $product->isFavoritedBy(auth()->user()) ? 'fill-red-500 text-red-500' : 'fill-none' }} transition-all duration-300" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="flex flex-col flex-1 px-1">
                        <!-- Product Name -->
                        <h3 class="text-sm font-bold text-[#1e293b] line-clamp-2 leading-snug mb-1 min-h-[2.5rem]">
                            <a href="{{ route('products.show', $product->slug) }}" class="hover:text-primary-purple transition-colors">{{ $product->name }}</a>
                        </h3>

                        <!-- Rating -->
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex items-center text-yellow-400">
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <span class="text-[11px] font-bold ml-1 text-gray-700">{{ number_format($product->rating, 1) }}</span>
                            </div>
                        </div>

                        <!-- Price + Sold -->
                        <div class="flex items-end justify-between mt-auto pt-3 border-t border-gray-100/50">
                            <div class="flex flex-col">
                                <div class="text-[15px] font-bold text-primary-purple leading-tight">
                                    <span class="text-xs mr-0.5 font-black uppercase tracking-tighter">Rp</span>{{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            </div>
                            <span class="text-[10px] text-gray-400 lowercase leading-none mb-0.5 font-medium whitespace-nowrap">{{ $product->sold_count > 1000 ? number_format($product->sold_count/1000, 1) . 'r b+' : $product->sold_count }} terjual</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-24 text-center">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Aset Tidak Ditemukan</h3>
                    <p class="text-sm text-slate-400">Kami tidak dapat menemukan aset yang sesuai dengan kriteria filter Anda.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-16">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #cbd5e1;
    }
    
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    .filter-content {
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transition: all 0.3s ease-out;
    }

    .rotate-collapsed {
        transform: rotate(-90deg);
    }
</style>

<script>
    function toggleSection(contentId, iconId) {
        const content = document.getElementById(contentId);
        const icon = document.getElementById(iconId);
        
        if (content.style.maxHeight && content.style.maxHeight !== '0px') {
            content.style.maxHeight = '0px';
            content.style.opacity = '0';
            icon.classList.add('rotate-collapsed');
        } else {
            content.style.maxHeight = content.scrollHeight + 'px';
            content.style.opacity = '1';
            icon.classList.remove('rotate-collapsed');
        }
    }

    // Initialize filter states
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        
        const config = [
            { id: 'category-content', icon: 'category-icon', active: urlParams.has('category') },
            { id: 'brand-content', icon: 'brand-icon', active: urlParams.has('brand') },
            { id: 'price-content', icon: 'price-icon', active: urlParams.has('min_price') || urlParams.has('max_price') },
            { id: 'rating-content', icon: 'rating-icon', active: urlParams.has('rating') }
        ];

        config.forEach(section => {
            const el = document.getElementById(section.id);
            const icon = document.getElementById(section.icon);
            if (el && icon) {
                if (section.active) {
                    el.style.maxHeight = el.scrollHeight + 'px';
                    el.style.opacity = '1';
                    icon.classList.remove('rotate-collapsed');
                } else {
                    el.style.maxHeight = '0px';
                    el.style.opacity = '0';
                    icon.classList.add('rotate-collapsed');
                }
            }
        });
    });

    function updateFilters() {
        const url = new URL(window.location.href);
        const searchParams = url.searchParams;

        // Brand filters
        const selectedBrands = Array.from(document.querySelectorAll('.brand-filter:checked'))
            .map(cb => cb.value);
        
        if (selectedBrands.length > 0) {
            searchParams.set('brand', selectedBrands.join(','));
        } else {
            searchParams.delete('brand');
        }

        // Rating filter
        const selectedRating = document.querySelector('.rating-filter:checked');
        if (selectedRating) {
            searchParams.set('rating', selectedRating.value);
        }

        // Keep search, category, sort if they exist
        window.location.href = url.href;
    }

    function applyPriceFilter() {
        const url = new URL(window.location.href);
        const min = document.getElementById('min_price').value;
        const max = document.getElementById('max_price').value;

        if (min) url.searchParams.set('min_price', min);
        else url.searchParams.delete('min_price');

        if (max) url.searchParams.set('max_price', max);
        else url.searchParams.delete('max_price');

        window.location.href = url.href;
    }

    // Sort logic
    document.getElementById('sortSelect').addEventListener('change', function() {
        const url = new URL(window.location.href);
        url.searchParams.set('sort', this.value);
        window.location.href = url.href;
    });

    // Brand and Rating auto-update
    document.querySelectorAll('.brand-filter, .rating-filter').forEach(el => {
        el.addEventListener('change', updateFilters);
    });

    // Search logic with form submission on enter
    document.getElementById('sovereignSearch').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            const url = new URL(window.location.href);
            if (this.value) {
                url.searchParams.set('search', this.value);
            } else {
                url.searchParams.delete('search');
            }
            window.location.href = url.href;
        }
    });

    // Favorite logic
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
                    svg.setAttribute('class', 'w-4 h-4 fill-red-500 text-red-500 transition-all duration-300');
                } else {
                    svg.setAttribute('class', 'w-4 h-4 fill-none text-gray-400 transition-all duration-300');
                }
            }
        })
        .catch(err => console.error('Error toggling favorite:', err));
    }
    function buyProduct(productId) {
        @auth
            alert('Fitur pembelian akan segera hadir! Menyiapkan checkout untuk produk ID: ' + productId);
        @else
            window.location.href = "{{ route('login') }}";
        @endauth
    }
</script>
@endsection
