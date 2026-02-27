@extends('layouts.app')

@section('title', 'Daftar Akun - IncubeShop Sovereign')

@section('content')
<div class="container min-h-[70vh] flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-10 lg:p-12 rounded-3xl border border-slate-100 shadow-sovereign-lg relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-primary-purple"></div>
        
        <div class="text-center mb-12">
            <h1 class="text-3xl font-black uppercase tracking-tight mb-3">Daftar <span class="text-primary-purple">Portal</span></h1>
            <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Buat akun untuk mulai berbelanja</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf
            <div class="flex flex-col gap-3">
                <label class="text-[11px] font-bold uppercase text-slate-500 tracking-widest">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full border-b-2 border-slate-100 focus:border-primary-purple py-3 outline-none text-sm font-bold transition-all bg-slate-50/50 px-4 rounded-lg text-slate-600">
                @error('name') <span class="text-red-500 text-[10px] uppercase font-bold tracking-widest">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col gap-3">
                <label class="text-[11px] font-bold uppercase text-slate-500 tracking-widest">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full border-b-2 border-slate-100 focus:border-primary-purple py-3 outline-none text-sm font-bold transition-all bg-slate-50/50 px-4 rounded-lg text-slate-600">
                @error('email') <span class="text-red-500 text-[10px] uppercase font-bold tracking-widest">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col gap-3">
                <label class="text-[11px] font-bold uppercase text-slate-500 tracking-widest">Kata Sandi</label>
                <input type="password" name="password" required class="w-full border-b-2 border-slate-100 focus:border-primary-purple py-3 outline-none text-sm font-bold transition-all bg-slate-50/50 px-4 rounded-lg text-slate-600">
                @error('password') <span class="text-red-500 text-[10px] uppercase font-bold tracking-widest">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col gap-3">
                <label class="text-[11px] font-bold uppercase text-slate-500 tracking-widest">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" required class="w-full border-b-2 border-slate-100 focus:border-primary-purple py-3 outline-none text-sm font-bold transition-all bg-slate-50/50 px-4 rounded-lg text-slate-600">
            </div>
            
            <button type="submit" class="w-full btn-sovereign-purple py-4 uppercase tracking-widest text-xs font-bold shadow-xl shadow-indigo-200 mt-4 rounded-xl">
                Daftar Sekarang
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-[10px] font-medium text-slate-400">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-primary-purple font-bold hover:underline">Masuk</a></p>
        </div>

        <div class="mt-12 pt-8 border-t border-slate-50 text-center">
            <p class="text-[9px] font-bold uppercase text-slate-300 tracking-widest">Protokol Keamanan v5.0.1 Sovereign</p>
        </div>
    </div>
</div>
@endsection
