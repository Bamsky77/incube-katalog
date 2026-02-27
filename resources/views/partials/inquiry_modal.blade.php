<!-- Sultan Inquiry Modal (Indonesian) -->
<div id="inquiryModal" class="fixed inset-0 bg-slate-950/98 z-[100] hidden items-center justify-center p-6 backdrop-blur-3xl transition-all duration-700">
    <div class="bg-white w-full max-w-5xl rounded-sm shadow-[0_100px_200px_-50px_rgba(124,58,237,0.3)] border-t-[16px] border-primary-purple overflow-hidden animate-in fade-in zoom-in duration-700 relative selection:bg-primary-purple selection:text-white">
        <div class="p-16 border-b-4 border-slate-50 flex justify-between items-start bg-slate-50/50">
            <div>
                <h3 class="text-5xl font-black uppercase italic tracking-tighter text-slate-900">Request <span class="text-primary-purple">Inkuiri.</span></h3>
                <p class="text-[10px] font-black text-slate-400 mt-6 uppercase tracking-[0.5em] flex items-center gap-6 italic">
                    <span class="w-12 h-[2px] bg-primary-purple"></span>
                    Permintaan Sumber Daya: <span class="text-slate-900 font-extrabold not-italic tracking-[0.1em] ml-2">{{ $product->name }}</span>
                </p>
            </div>
            <button onclick="closeInquiryModal()" class="group bg-white p-6 rounded-full shadow-2xl border-2 border-slate-100 hover:bg-red-500 hover:border-red-500 transition-all duration-700 transform hover:scale-110 active:scale-90">
                <svg class="w-8 h-8 text-slate-300 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="4" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <div class="p-20 max-h-[70vh] overflow-y-auto no-scrollbar bg-white">
            <form action="{{ route('inquiries.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-16">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                <!-- Anti-Spam Honey-pot -->
                <div class="hidden">
                    <input type="text" name="system_integrity_check" tabindex="-1" autocomplete="off">
                </div>

                <div class="flex flex-col gap-6">
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-[0.4em] italic">Otentikasi Nama Lengkap *</label>
                    <input type="text" name="name" required class="w-full border-b-4 border-slate-100 focus:border-primary-purple py-6 outline-none text-lg font-black transition-all bg-transparent focus:pl-8 placeholder-slate-200" placeholder="MASUKKAN NAMA ANDA">
                </div>
                <div class="flex flex-col gap-6">
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-[0.4em] italic">Email Korporat *</label>
                    <input type="email" name="email" required class="w-full border-b-4 border-slate-100 focus:border-primary-purple py-6 outline-none text-lg font-black transition-all bg-transparent focus:pl-8 placeholder-slate-200" placeholder="ALAMAT@EMAIL.COM">
                </div>
                <div class="flex flex-col gap-6">
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-[0.4em] italic">Nomor Kontak / WhatsApp</label>
                    <input type="text" name="phone" class="w-full border-b-4 border-slate-100 focus:border-primary-purple py-6 outline-none text-lg font-black transition-all bg-transparent focus:pl-8 placeholder-slate-200" placeholder="+62 ...">
                </div>
                <div class="flex flex-col gap-6">
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-[0.4em] italic">Kuantitas Kebutuhan Aset</label>
                    <input type="number" name="quantity" class="w-full border-b-4 border-slate-100 focus:border-primary-purple py-6 outline-none text-lg font-black transition-all bg-transparent focus:pl-8 placeholder-slate-200" placeholder="JUMLAH UNIT">
                </div>
                <div class="md:col-span-2 flex flex-col gap-6">
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-[0.4em] italic">Nama Entitas / Perusahaan</label>
                    <input type="text" name="company_name" class="w-full border-b-4 border-slate-100 focus:border-primary-purple py-6 outline-none text-lg font-black transition-all bg-transparent focus:pl-8 placeholder-slate-200" placeholder="NAMA CORPORATE">
                </div>
                <div class="md:col-span-2 flex flex-col gap-8 pt-10">
                    <label class="text-[10px] font-black uppercase text-slate-400 tracking-[0.4em] italic">Ringkasan Kebutuhan Proyek *</label>
                    <textarea name="message" rows="6" required class="w-full border-4 border-slate-100 focus:border-primary-purple p-10 outline-none text-lg font-black transition-all bg-slate-50/50 shadow-inner resize-none placeholder-slate-200" placeholder="DESKRIPSIKAN KEBUTUHAN ANDA SECARA RINCI..."></textarea>
                </div>
                <div class="md:col-span-2 pt-12 pb-10">
                    <button type="submit" class="w-full btn-incube py-10 rounded-none shadow-[0_30px_60px_-15px_rgba(124,58,237,0.4)] transform hover:scale-[1.01] active:scale-95 transition-all text-sm tracking-[0.5em]">
                        VALIDASI & KIRIM INKUIRI
                    </button>
                    <p class="text-[9px] text-center text-slate-300 mt-10 font-black uppercase tracking-[0.4em] italic">Protokol Incube: Respon akan dikirim dalam waktu <span class="text-primary-purple">12 Jam Kerja</span>.</p>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openInquiryModal() {
        const modal = document.getElementById('inquiryModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    function closeInquiryModal() {
        const modal = document.getElementById('inquiryModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
</script>
