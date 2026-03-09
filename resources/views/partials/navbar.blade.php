<nav class="bg-white border-b border-slate-100 sticky top-0 z-[100] selection:bg-primary-purple selection:text-white h-20">
    <div class="container flex h-full items-center justify-between">
        <!-- Brand Sovereign -->
        <a href="/" class="flex items-center gap-2 group">
            <div class="w-8 h-8 bg-primary-purple rounded flex items-center justify-center text-white font-black text-xl group-hover:bg-slate-900 transition-colors">I</div>
            <h1 class="text-xl font-bold text-slate-900 tracking-tight">
                Incube<span class="text-primary-purple">Shop</span>
            </h1>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-10 h-full">
            <a href="/" class="nav-link-sovereign {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
            <a href="/products" class="nav-link-sovereign {{ request()->is('products*') ? 'active' : '' }}">Katalog</a>
            <a href="{{ route('favorites.index') }}" class="nav-link-sovereign {{ request()->is('favorites*') ? 'active' : '' }}">Favorit</a>
            <a href="/about" class="nav-link-sovereign {{ request()->is('about') ? 'active' : '' }}">Tentang</a>
            <a href="/contact" class="nav-link-sovereign {{ request()->is('contact') ? 'active' : '' }}">Kontak</a>
        </div>

        <!-- Search & User Menu -->
        <div class="flex items-center gap-6">
            <form action="{{ route('products.index') }}" method="GET" class="hidden lg:flex relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama aset..." class="w-64 h-10 px-4 bg-slate-50/50 border border-slate-100 rounded-lg text-xs font-bold focus:outline-none focus:border-primary-purple transition-all placeholder-slate-400 shadow-inner">
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary-purple">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </form>
            <div class="w-px h-6 bg-slate-100 hidden lg:block"></div>
            
            <!-- Cart Icon Sovereign -->
            <a href="{{ route('cart.index') }}" class="relative group p-2">
                <svg class="w-6 h-6 text-slate-400 group-hover:text-primary-purple transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                @auth
                    @php $cartCount = auth()->user()->cartItems->sum('quantity'); @endphp
                    @if($cartCount > 0)
                        <span class="absolute -top-1 -right-1 bg-primary-purple text-white text-[9px] font-black w-5 h-5 rounded-full flex items-center justify-center shadow-lg border-2 border-white animate-bounce-subtle">{{ $cartCount }}</span>
                    @endif
                @endauth
            </a>

            <div class="w-px h-6 bg-slate-100 hidden lg:block"></div>
            
            @auth
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Halo,</span>
            <a href="{{ route('profile.edit') }}" class="text-sm font-bold text-slate-900 hover:text-primary-purple transition-all">{{ Auth::user()->name }}</a>
        </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-red-500 hover:text-red-700 transition-colors uppercase tracking-widest">Keluar</button>
                    </form>
                </div>
            @else
                <div class="flex items-center gap-6">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-slate-900 hover:text-primary-purple transition-colors uppercase tracking-widest">Masuk</a>
                    <a href="{{ route('register') }}" class="px-5 py-2 bg-slate-900 text-white text-[10px] font-bold uppercase tracking-widest rounded-lg hover:bg-slate-800 transition-all shadow-md">Daftar</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
