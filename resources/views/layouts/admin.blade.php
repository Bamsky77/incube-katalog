<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Martfury</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Public Sans', sans-serif; }
        .sidebar-item-active {
            background-color: #f6d32d;
            color: #111827;
        }
        .sidebar-item-inactive {
            color: #94a3b8;
        }
        .sidebar-item-inactive:hover {
            background-color: #7c3aed;
            color: #ffffff;
        }
    </style>
</head>
<body class="bg-[#f8fafc] flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-[280px] bg-[#111827] text-white flex flex-col flex-shrink-0 z-20">
        <div class="h-20 px-8 flex items-center border-b border-slate-800">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#f6d32d] rounded-lg flex items-center justify-center text-[#111827]">
                    <i data-lucide="layout-grid" class="w-6 h-6"></i>
                </div>
                <span class="text-xl font-bold tracking-tight">Mart<span class="text-[#f6d32d]">fury</span></span>
            </div>
        </div>
        
        <div class="flex-1 px-4 py-8 space-y-8 overflow-y-auto">
            <div>
                <p class="px-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest mb-4">Management</p>
                <div class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'sidebar-item-active' : 'sidebar-item-inactive' }}">
                        <i data-lucide="pie-chart" class="w-5 h-5"></i>
                        <span class="font-semibold text-sm">Dashboard</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.products.*') ? 'sidebar-item-active' : 'sidebar-item-inactive' }}">
                        <i data-lucide="package" class="w-5 h-5"></i>
                        <span class="font-semibold text-sm">Products</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.categories.*') ? 'sidebar-item-active' : 'sidebar-item-inactive' }}">
                        <i data-lucide="list-tree" class="w-5 h-5"></i>
                        <span class="font-semibold text-sm">Categories</span>
                    </a>
                    <a href="{{ route('admin.inquiries.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.inquiries.*') ? 'sidebar-item-active' : 'sidebar-item-inactive' }}">
                        <i data-lucide="mails" class="w-5 h-5"></i>
                        <span class="font-semibold text-sm">Inquiries</span>
                    </a>
                </div>
            </div>

            <div>
                <p class="px-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest mb-4">Quick Links</p>
                <div class="space-y-1">
                    <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors sidebar-item-inactive">
                        <i data-lucide="globe" class="w-5 h-5"></i>
                        <span class="font-semibold text-sm">Visit Website</span>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="p-6 border-t border-slate-800 bg-[#0f172a]">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-slate-800 border-2 border-[#f6d32d] flex items-center justify-center font-bold text-[#f6d32d]">
                    {{ strtoupper(substr(Auth::user()->name ?? 'I', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-white truncate">{{ Auth::user()->name ?? 'ibam' }}</p>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-wider truncate">Owner Account</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-10">
            <h2 class="text-xl font-bold text-slate-900">@yield('page-title', 'Dashboard Overview')</h2>
            
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-3 pr-6 border-r border-slate-100">
                    <p class="text-sm font-bold text-slate-700">{{ Auth::user()->name ?? 'ibam' }}</p>
                    <div class="w-8 h-8 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center text-xs font-bold text-slate-400">
                        {{ strtoupper(substr(Auth::user()->name ?? 'I', 0, 1)) }}
                    </div>
                </div>
                <button class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                </button>
            </div>
        </header>

        <section class="flex-1 overflow-y-auto p-10">
            @if(session('success'))
                <div class="bg-emerald-50 text-emerald-800 p-4 rounded-lg mb-8 border border-emerald-100 flex items-center gap-3 shadow-sm">
                    <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-500"></i>
                    <span class="font-semibold text-sm">{{ session('success') }}</span>
                </div>
            @endif
            @yield('content')
        </section>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
