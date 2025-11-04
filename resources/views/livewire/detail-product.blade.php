<div class="mx-auto">
    <header class="pb-6 flex items-center justify-center relative">
        <button onclick="history.back()" class="absolute left-0 ml-4 p-2 rounded-full hover:bg-gray-100 transition"
            aria-label="Kembali">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-6 h-6 text-gray-800">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <h1 class="text-3xl font-bold text-center text-gray-800">
            Keranjang
        </h1>
    </header>
    <main class="space-y-5 pb-48">
        <section class="flex bg-gray-200 items-center rounded-xl shadow-md p-2 space-x-4">
            <img src="{{ asset('storage/images/NasiGorengSpesial.png') }}" alt="NasiGorengSpesial"
                class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm">
            <div class="flex-1">
                <h2 class="font-bold text-lg text-gray-900">Nasi Goreng Spesial</h2>
                <p class="text-gray-700 font-medium">Rp 15.000</p>
            </div>
            <div class="flex items-center rounded-lg overflow-hidden shadow-sm">
                <button class="bg-primary text-black p-2 flex items-center justify-center h-8 w-8 font-bold">-</button>
                <span class="bg-primary text-black px-4 py-1 font-bold text-lg h-8 flex items-center">1</span>
                <button class="bg-primary text-black p-2 flex items-center justify-center h-8 w-8 font-bold">+</button>
            </div>
        </section>
        <section class="flex bg-gray-200 items-center rounded-xl shadow-md p-2 space-x-4">
            <img src="{{ asset('storage/images/MieGorengTelur.png') }}" alt="MieGorengTelur"
                class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm">
            <div class="flex-1">
                <h2 class="font-bold text-lg text-gray-900">Mie Goreng + Telur</h2>
                <p class="text-gray-700 font-medium">Rp 8.000</p>
            </div>
            <div class="flex items-center rounded-lg overflow-hidden shadow-sm">
                <button class="bg-primary text-black p-2 flex items-center justify-center h-8 w-8 font-bold">-</button>
                <span class="bg-primary text-black px-4 py-1 font-bold text-lg h-8 flex items-center">1</span>
                <button class="bg-primary text-black p-2 flex items-center justify-center h-8 w-8 font-bold">+</button>
            </div>
        </section>
        <div>
            <textarea rows="3" placeholder="Catatan! Jika perlu"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
        </div>
        <div class="space-y-3">
            <h3 class="text-lg font-semibold text-gray-800">Pilih Metode Makan</h3>
            <div class="flex space-x-3">
                <button class="flex-1 bg-gray-200 text-gray-700 font-semibold py-3 rounded-lg shadow-sm">
                    Dine In
                </button>
                <button class="flex-1 bg-primary text-black font-semibold py-3 rounded-lg shadow-md">
                    Take Away
                </button>
            </div>
        </div>
        <div class="space-y-3">
            <h3 class="text-lg font-semibold text-gray-800">Metode Pembayaran</h3>
            <div class="flex space-x-3">
                <button class="flex-1 bg-gray-200 text-gray-700 font-semibold py-3 rounded-lg shadow-sm">
                    Cash
                </button>
                <button class="flex-1 bg-primary text-black font-semibold py-3 rounded-lg shadow-md">
                    QRIS
                </button>
            </div>
        </div>
        <div class="bg-gray-200 rounded-xl p-4 space-y-2">
            <div class="flex justify-between text-gray-800">
                <p>Total Pesanan (2 menu)</p>
                <p class="font-medium">Rp 23.000,00</p>
            </div>
            <div class="flex justify-between text-gray-800">
                <p>Biaya Layanan</p>
                <p class="font-medium">Rp 0</p>
            </div>
        </div>
    </main>
    <div class="fixed bottom-0 left-0 right-0 max-w-sm mx-auto mb-16">
        <div class="bg-white p-4 border-gray-200 flex justify-between items-center rounded-lg">
            <div>
                <span class="text-sm text-gray-600">Total</span>
                <p class="font-bold text-xl text-gray-900">Rp 23.000</p>
            </div>
            <a href="{{ route('status-pemesanan') }}" wire:navigate
                class="bg-primary text-black font-bold py-3 px-6 rounded-lg shadow-md">
                Pesan Sekarang
            </a>
        </div>
    </div>
</div>
