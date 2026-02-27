@extends('layouts.app')

@section('title', 'Kontak - IncubeShop Sovereign 5.0')

@section('content')
<!-- Sovereign Breadcrumb -->
<div class="bg-slate-50 py-8 border-b border-slate-100 mb-20">
    <div class="container text-[11px] font-bold uppercase tracking-widest text-slate-400">
        <a href="/" class="hover:text-slate-900 transition-colors">Beranda</a>
        <span class="mx-3 opacity-30">/</span>
        <span class="text-slate-900">Kontak Operasional</span>
    </div>
</div>

<div class="container pb-48">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-32 items-start">
        <div class="text-left">
            <h1 class="text-4xl lg:text-6xl font-extrabold text-slate-900 mb-8 tracking-tight">
                Hubungi <span class="text-primary-purple">Kami.</span>
            </h1>
            <p class="text-lg text-slate-500 mb-16 leading-relaxed border-l-4 border-slate-100 pl-8">
                Tim dukungan kami siap mendampingi inkuiri aset industri Anda secara personal dan profesional.
            </p>
            
            <div class="space-y-12">
                <div class="flex gap-8 items-start group">
                    <div class="w-14 h-14 bg-slate-50 rounded-xl flex items-center justify-center text-primary-purple group-hover:bg-primary-purple group-hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Panggilan Langsung</p>
                        <p class="text-3xl font-black text-slate-900 tracking-tighter hover:text-primary-purple transition-colors">1-800-INCUBE</p>
                    </div>
                </div>
                <div class="flex gap-8 items-start group">
                    <div class="w-14 h-14 bg-slate-50 rounded-xl flex items-center justify-center text-primary-purple group-hover:bg-primary-purple group-hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Transmisi Email</p>
                        <p class="text-3xl font-black text-slate-900 tracking-tighter uppercase whitespace-nowrap overflow-hidden text-ellipsis hover:text-primary-purple transition-colors">kontak@incubeshop.pro</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-100 p-10 lg:p-12 rounded-3xl shadow-sovereign-lg relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-primary-purple"></div>
            <h3 class="text-2xl font-bold text-slate-900 mb-10">Kirim Transmisi</h3>
            <form class="space-y-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="flex flex-col gap-3">
                        <label class="text-[11px] font-bold uppercase text-slate-400 tracking-widest">Nama Lengkap</label>
                        <input type="text" class="w-full border-b-2 border-slate-100 focus:border-primary-purple py-3 outline-none text-base font-bold transition-all bg-transparent placeholder-slate-200" placeholder="Identitas">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label class="text-[11px] font-bold uppercase text-slate-400 tracking-widest">Email</label>
                        <input type="email" class="w-full border-b-2 border-slate-100 focus:border-primary-purple py-3 outline-none text-base font-bold transition-all bg-transparent placeholder-slate-200" placeholder="mail@pro.id">
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <label class="text-[11px] font-bold uppercase text-slate-400 tracking-widest">Inkuiri</label>
                    <textarea rows="5" class="w-full bg-slate-50 border border-slate-100 rounded-xl p-6 outline-none text-base font-bold focus:border-primary-purple focus:ring-4 focus:ring-primary-purple/5 transition-all shadow-inner placeholder-slate-200" placeholder="Detail inkuiri Anda..."></textarea>
                </div>
                <div>
                    <button type="submit" class="btn-sovereign-purple w-full py-5 text-sm tracking-widest uppercase">
                        Kirim Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
