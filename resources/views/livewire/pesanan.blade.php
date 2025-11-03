<div class="min-h-screen bg-white pb-20">
    <div class="bg-white border-gray-200 flex items-center pb-4">
        <h1 class="text-2xl font-bold text-gray-800">List Pesanan</h1>
    </div>
    <div class="bg-white border-gray-200">
        <div class="flex space-x-6">
            <a class="py-3 border-b-2 border-cyan-500 text-cyan-500 font-medium">
                Berlangsung
            </a>
            <a href="{{ route('riwayat-pesanan') }}" wire:navigate
                class="py-3 border-b-2 border-transparent text-gray-500 font-medium hover:text-gray-700">
                Riwayat
            </a>
        </div>
    </div>
    <div class="py-4 space-y-4">
        <a href="{{ route('status-pemesanan') }}" wire:navigate>
            <div class="bg-gray-200 rounded-lg p-4 mb-4 shadow-sm">
                <div class="mb-3">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Warung Bu Ani</h3>
                    <p class="text-sm text-gray-600">Dipesan 12:30 PM</p>
                    <p class="text-sm text-gray-600">Metode Makan: Dine In</p>
                    <p class="text-sm text-gray-600">Metode Pembayaran: QRIS</p>
                    <p class="text-lg font-bold my-4">Rp 23.000</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button
                        class="text-sm flex-1 bg-cyan-400 text-white p-2 rounded-lg font-medium hover:bg-cyan-500 transition">
                        Sedang Diproses
                    </button>
                    <button
                        class="text-sm flex items-center space-x-2 bg-cyan-400 text-white p-2 rounded-lg font-medium hover:bg-cyan-500 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <span>Hubungi Warung</span>
                    </button>
                </div>
            </div>
        </a>
        <a href="{{ route('status-pemesanan') }}" wire:navigate>
            <div class="bg-gray-200 rounded-lg p-4 mb-4 shadow-sm">
                <div class="mb-3">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Warung Bu Ani</h3>
                    <p class="text-sm text-gray-600">Dipesan 12:30 PM</p>
                    <p class="text-sm text-gray-600">Metode Makan: Dine In</p>
                    <p class="text-sm text-gray-600">Metode Pembayaran: QRIS</p>
                    <p class="text-lg font-bold my-4">Rp 23.000</p>
                </div>
                <div class="flex items-center space-x-3">
                    <button
                        class="text-sm flex-1 bg-cyan-400 text-white p-2 rounded-lg font-medium hover:bg-cyan-500 transition">
                        Sedang Diproses
                    </button>
                    <button
                        class="text-sm flex items-center space-x-2 bg-cyan-400 text-white p-2 rounded-lg font-medium hover:bg-cyan-500 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <span>Hubungi Warung</span>
                    </button>
                </div>
            </div>
        </a>
    </div>
</div>
