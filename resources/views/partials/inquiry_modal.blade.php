<!-- Professional Inquiry Modal -->
<div id="inquiryModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6 transition-all duration-500">
    <!-- Backdrop with Glassmorphism -->
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-md transition-opacity duration-500" onclick="closeInquiryModal()"></div>
    
    <!-- Modal Container -->
    <div class="bg-white w-full max-w-4xl rounded-3xl shadow-[0_20px_70px_-10px_rgba(0,0,0,0.15)] border border-slate-100 overflow-hidden animate-in fade-in zoom-in duration-300 relative z-10 flex flex-col md:flex-row max-h-[90vh]">
        
        <!-- Left Panel: Context & Branding (Visible on MD+) -->
        <div class="hidden md:flex md:w-1/3 bg-slate-50 p-10 flex-col justify-between border-r border-slate-100">
            <div>
                <div class="w-12 h-12 bg-primary-purple/10 rounded-2xl flex items-center justify-center mb-8">
                    <svg class="w-6 h-6 text-primary-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4 leading-tight">Minta Penawaran Spesial</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Tim kami akan membantu Anda mendapatkan penawaran terbaik untuk aset terpilih dalam waktu kurang dari 12 jam.</p>
            </div>
            
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-600">Respon Cepat</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-600">Terpercaya</span>
                </div>
            </div>
        </div>

        <!-- Right Panel: Form -->
        <div class="flex-1 p-8 sm:p-12 overflow-y-auto custom-scrollbar bg-white">
            <div class="flex justify-between items-start mb-10">
                <div>
                    <span class="text-[10px] font-bold text-primary-purple uppercase tracking-widest mb-1 block">Product Inquiry</span>
                    <h4 id="modalProductName" class="text-xl font-extrabold text-slate-900 truncate max-w-[280px] sm:max-w-md">{{ $product->name ?? '' }}</h4>
                </div>
                <button onclick="closeInquiryModal()" class="text-slate-400 hover:text-slate-900 transition-colors p-2 -mr-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form action="{{ route('inquiries.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="product_id" id="modalProductId" value="{{ $product->id ?? '' }}">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Nama Lengkap</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-300 group-focus-within:text-primary-purple transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input type="text" name="name" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl py-3.5 pl-11 pr-4 text-sm font-medium focus:outline-none focus:ring-4 focus:ring-primary-purple/5 focus:border-primary-purple/30 transition-all placeholder:text-slate-300" placeholder="Contoh: John Doe">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Email Bisnis</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-300 group-focus-within:text-primary-purple transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <input type="email" name="email" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl py-3.5 pl-11 pr-4 text-sm font-medium focus:outline-none focus:ring-4 focus:ring-primary-purple/5 focus:border-primary-purple/30 transition-all placeholder:text-slate-300" placeholder="john@company.com">
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Nomor WhatsApp</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-300 group-focus-within:text-primary-purple transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 2 0 01.948.684l1.498 4.493a1 2 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 2 0 011.21-.502l4.493 1.498a1 2 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <input type="text" name="phone" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl py-3.5 pl-11 pr-4 text-sm font-medium focus:outline-none focus:ring-4 focus:ring-primary-purple/5 focus:border-primary-purple/30 transition-all placeholder:text-slate-300" placeholder="0812...">
                        </div>
                    </div>

                    <!-- Company -->
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Nama Perusahaan</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-300 group-focus-within:text-primary-purple transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <input type="text" name="company_name" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl py-3.5 pl-11 pr-4 text-sm font-medium focus:outline-none focus:ring-4 focus:ring-primary-purple/5 focus:border-primary-purple/30 transition-all placeholder:text-slate-300" placeholder="PT. Sukses Bersama">
                        </div>
                    </div>
                </div>

                <!-- Message -->
                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Pesan atau Kebutuhan Khusus</label>
                    <textarea name="message" rows="4" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 text-sm font-medium focus:outline-none focus:ring-4 focus:ring-primary-purple/5 focus:border-primary-purple/30 transition-all placeholder:text-slate-300 resize-none" placeholder="Tuliskan detail kebutuhan Anda di sini..."></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-primary-purple text-white py-4 px-8 rounded-2xl text-sm font-extrabold uppercase tracking-widest hover:bg-primary-purple/90 hover:shadow-lg hover:shadow-primary-purple/20 transition-all transform active:scale-[0.98] shadow-md">
                        Kirim Permintaan Inkuiri
                    </button>
                    <p class="text-[10px] text-center text-slate-400 mt-4 leading-relaxed font-medium">
                        Dengan menekan tombol di atas, Anda menyetujui <a href="#" class="text-primary-purple hover:underline">Syarat & Ketentuan</a> kami.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 5px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #f1f5f9;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #e2e8f0;
    }
</style>

<script>
    function openInquiryModal(productId, productName) {
        const modal = document.getElementById('inquiryModal');
        const idInput = document.getElementById('modalProductId');
        const nameSpan = document.getElementById('modalProductName');
        
        if (productId) idInput.value = productId;
        if (productName) nameSpan.innerText = productName;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Modal Entrance Animation
        const modalContent = modal.querySelector('.max-w-4xl');
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
        
        document.body.style.overflow = 'hidden';
    }

    function closeInquiryModal() {
        const modal = document.getElementById('inquiryModal');
        const modalContent = modal.querySelector('.max-w-4xl');
        
        // Modal Exit Animation
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }, 200);
    }

    // Close on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeInquiryModal();
        }
    });
</script>
