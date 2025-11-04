<div class="min-h-screen bg-white pb-20">
    <div class="bg-white border-gray-200 flex items-center pb-4">
        <h1 class="text-2xl font-bold text-gray-800">List Pesanan</h1>
    </div>
    <div class="bg-white border-gray-200">
        <div class="flex space-x-6">
            <a href="{{ route('pesanan') }}" wire:navigate
                class="py-3 border-b-2 border-transparent text-gray-500 font-medium hover:text-gray-700">
                Berlangsung
            </a>
            <button class="py-3 border-b-2 border-primary font-medium">
                Riwayat
            </button>
        </div>
    </div>
    <div class="py-4 space-y-4">
        <a href="{{ route('status-pemesanan') }}" wire:navigate>
            <div class="bg-gray-200 rounded-lg p-4 mb-4 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Warung Bu Ani</h3>
                <p class="text-sm text-gray-600">Dipesan 12:30 PM</p>
                <p class="text-sm text-gray-600">Metode Makan: Dine In</p>
                <p class="text-sm text-gray-600">Metode Pembayaran: QRIS</p>
                <p class="text-sm text-gray-600">Selesai 13:00 PM</p>
                <p class="text-lg font-bold mt-4">Rp 23.000</p>
            </div>
        </a>
        <a href="{{ route('status-pemesanan') }}" wire:navigate>
            <div class="bg-gray-200 rounded-lg p-4 mb-4 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Warung Bu Ani</h3>
                <p class="text-sm text-gray-600">Dipesan 12:30 PM</p>
                <p class="text-sm text-gray-600">Metode Makan: Dine In</p>
                <p class="text-sm text-gray-600">Metode Pembayaran: QRIS</p>
                <p class="text-sm text-gray-600">Selesai 13:00 PM</p>
                <p class="text-lg font-bold mt-4">Rp 23.000</p>
            </div>
        </a>
    </div>
</div>
