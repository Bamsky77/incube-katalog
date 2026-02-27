@extends('layouts.app')

@section('title', 'Sovereign Account - IncubeShop')

@section('content')
<div class="bg-slate-50 py-8 border-b border-slate-100 mb-12">
    <div class="container text-[11px] font-bold uppercase tracking-widest text-slate-400">
        <a href="/" class="hover:text-slate-900 transition-colors">Beranda</a>
        <span class="mx-3 opacity-30">/</span>
        <span class="text-slate-900">Akun Pengguna</span>
    </div>
</div>

<div class="container pb-32">
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Sidebar -->
            <aside>
                <div class="bg-white border border-slate-100 rounded-2xl p-8 shadow-sm">
                    <div class="w-16 h-16 bg-primary-purple/10 rounded-full flex items-center justify-center mb-6">
                        <span class="text-xl font-bold text-primary-purple">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                    <h2 class="text-xl font-bold text-slate-900 mb-1">{{ $user->name }}</h2>
                    <p class="text-sm text-slate-400 mb-8">{{ $user->email }}</p>
                    
                    <nav class="space-y-1">
                        <button onclick="switchTab('profile')" id="btn-profile" class="w-full text-left px-4 py-3 rounded-xl text-sm font-bold transition-all bg-slate-900 text-white shadow-lg shadow-slate-900/10">Data Profil</button>
                        <button onclick="switchTab('orders')" id="btn-orders" class="w-full text-left px-4 py-3 rounded-xl text-sm font-bold transition-all text-slate-500 hover:bg-slate-50">Riwayat Aset</button>
                    </nav>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="lg:col-span-2">
                <!-- Profile Tab -->
                <div id="tab-profile" class="tab-content">
                    <div class="bg-white border border-slate-100 rounded-2xl p-8 shadow-sm mb-8">
                        <h3 class="text-lg font-bold text-slate-900 mb-6">Informasi Akun</h3>
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full h-12 bg-slate-50 border-slate-100 rounded-xl px-4 text-sm font-medium focus:ring-primary-purple focus:border-primary-purple">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Alamat Email</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full h-12 bg-slate-50 border-slate-100 rounded-xl px-4 text-sm font-medium focus:ring-primary-purple focus:border-primary-purple">
                                </div>
                                
                                <div class="pt-6 border-t border-slate-50">
                                    <h4 class="text-sm font-bold text-slate-900 mb-4">Ganti Password (Opsional)</h4>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <input type="password" name="password" placeholder="Password Baru" class="w-full h-12 bg-slate-50 border-slate-100 rounded-xl px-4 text-sm font-medium focus:ring-primary-purple focus:border-primary-purple">
                                        </div>
                                        <div>
                                            <input type="password" name="password_confirmation" placeholder="Konfirmasi" class="w-full h-12 bg-slate-50 border-slate-100 rounded-xl px-4 text-sm font-medium focus:ring-primary-purple focus:border-primary-purple">
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="w-full h-12 bg-primary-purple text-white text-[11px] font-bold uppercase tracking-widest rounded-xl hover:bg-indigo-700 transition-all shadow-lg shadow-primary-purple/20">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Orders Tab -->
                <div id="tab-orders" class="tab-content hidden">
                    <div class="bg-white border border-slate-100 rounded-2xl p-8 shadow-sm">
                        <h3 class="text-lg font-bold text-slate-900 mb-6">Riwayat Aset Terverifikasi</h3>
                        
                        @forelse($orders as $order)
                        <div class="flex items-center gap-6 p-4 border border-slate-50 rounded-xl mb-4 hover:border-slate-100 transition-colors">
                            <div class="w-16 h-16 bg-slate-50 rounded-lg overflow-hidden flex-shrink-0">
                                @php
                                    $imgPath = $order->product->images->where('is_primary', true)->first()->image_path ?? asset('assets/images/gaming_setup.png');
                                @endphp
                                <img src="{{ asset($imgPath) }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-slate-900">{{ $order->product->name }}</h4>
                                <p class="text-xs text-slate-400">Dibeli pada {{ $order->created_at->format('d M Y') }}</p>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-bold text-primary-purple">Rp{{ number_format($order->price, 0, ',', '.') }}</div>
                                <span class="inline-block px-2 py-0.5 bg-teal-50 text-teal-600 text-[10px] font-bold rounded uppercase">Completed</span>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            </div>
                            <p class="text-sm text-slate-400 font-medium">Belum ada aset industri yang dibeli.</p>
                            <a href="{{ route('products.index') }}" class="inline-block mt-4 text-xs font-bold text-primary-purple border-b border-primary-purple pb-0.5">Mulai Eksplorasi</a>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function switchTab(tab) {
        // Content
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById('tab-' + tab).classList.remove('hidden');

        // Buttons
        document.getElementById('btn-profile').className = "w-full text-left px-4 py-3 rounded-xl text-sm font-bold transition-all " + 
            (tab === 'profile' ? "bg-slate-900 text-white shadow-lg shadow-slate-900/10" : "text-slate-500 hover:bg-slate-50");
        document.getElementById('btn-orders').className = "w-full text-left px-4 py-3 rounded-xl text-sm font-bold transition-all " + 
            (tab === 'orders' ? "bg-slate-900 text-white shadow-lg shadow-slate-900/10" : "text-slate-500 hover:bg-slate-50");
    }
</script>
@endsection
