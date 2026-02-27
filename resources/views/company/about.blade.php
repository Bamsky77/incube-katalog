@extends('layouts.app')

@section('title', 'Tentang IncubeShop - Sovereign 5.0')

@section('content')
<!-- Sovereign Breadcrumb -->
<div class="bg-slate-50 py-8 border-b border-slate-100 mb-20">
    <div class="container text-[11px] font-bold uppercase tracking-widest text-slate-400">
        <a href="/" class="hover:text-slate-900 transition-colors">Beranda</a>
        <span class="mx-3 opacity-30">/</span>
        <span class="text-slate-900">Tentang Kami</span>
    </div>
</div>

<div class="container pb-32">
    <div class="max-w-4xl mx-auto text-center mb-32">
        <h1 class="text-4xl lg:text-6xl font-extrabold text-slate-900 mb-8 tracking-tight">
            Misi Kami Adalah <span class="text-primary-purple underline decoration-primary-purple/20 decoration-8 underline-offset-8">Kualitas.</span>
        </h1>
        <p class="text-xl text-slate-500 leading-relaxed font-medium">
            IncubeShop hadir sebagai pionir dalam penyediaan aset teknologi tingkat industri dengan standar verifikasi yang belum pernah ada sebelumnya.
        </p>
    </div>

    <!-- High-End Storytelling -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 mb-48 items-center">
        <div class="relative bg-slate-50 p-4 rounded-3xl shadow-sovereign-lg border border-slate-100">
            <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=2069&auto=format&fit=crop" class="w-full h-full object-cover rounded-2xl grayscale hover:grayscale-0 transition-all duration-700">
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-primary-purple rounded-2xl shadow-xl flex items-center justify-center text-white font-black text-4xl">5.0</div>
        </div>
        <div class="text-left">
            <h3 class="text-primary-purple font-bold text-xs uppercase tracking-[0.3em] mb-8 flex items-center gap-4">
                <span class="w-12 h-1 bg-primary-purple rounded-full"></span> Filosofi
            </h3>
            <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-10 leading-tight">
                Standar Tertinggi Untuk Profil Eksklusif.
            </h2>
            <div class="space-y-6 text-slate-500 text-lg leading-relaxed">
                <p>Didirikan dengan visi untuk menstandar-kan akses teknologi premium, IncubeShop bertransformasi menjadi titik temu antara inovasi global dan kebutuhan industri lokal.</p>
                <p>Kami meyakini bahwa setiap investasi teknologi harus dibarengi dengan integritas data dan layanan purna jual yang absolut.</p>
            </div>
            <div class="mt-12">
                 <a href="/products" class="btn-sovereign-purple px-12 py-4 h-auto inline-block">Jelajahi Katalog</a>
            </div>
        </div>
    </div>

    <!-- Metrics Sovereign -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-32">
        <div class="p-10 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-sovereign-lg transition-all text-center text-balance">
            <div class="text-4xl font-black text-slate-900 mb-4">99%</div>
            <div class="text-[10px] font-bold uppercase tracking-widest text-primary-purple mb-4">Akurasi Data</div>
            <p class="text-slate-400 text-xs italic">Sistem monitoring aset industri secara real-time.</p>
        </div>
        <div class="p-10 bg-slate-900 border border-slate-800 rounded-2xl shadow-sovereign-lg transition-all text-center text-white text-balance">
            <div class="text-4xl font-black text-white mb-4">4.0+</div>
            <div class="text-[10px] font-bold uppercase tracking-widest text-primary-purple mb-4">Standard Industri</div>
            <p class="text-slate-300 text-xs italic">Protokol keamanan berlapis di setiap transaksi.</p>
        </div>
        <div class="p-10 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-sovereign-lg transition-all text-center text-balance">
            <div class="text-4xl font-black text-slate-900 mb-4">24J</div>
            <div class="text-[10px] font-bold uppercase tracking-widest text-primary-purple mb-4">Dukungan Cepat</div>
            <p class="text-slate-400 text-xs italic">Tim teknis yang siap membantu operasional Anda.</p>
        </div>
    </div>
</div>
@endsection
