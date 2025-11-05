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
        @foreach ($cartItems as $item)
            <section class="flex bg-gray-200 items-center rounded-xl shadow-md p-2 space-x-4">
                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}"
                    class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm">
                <div class="flex-1">
                    <h2 class="font-bold text-lg text-gray-900">{{ $item->product->name }}</h2>
                    <p class="text-gray-700 font-medium">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    <p class="text-gray-600 text-sm">Subtotal: Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                </div>
                <div class="flex items-center rounded-lg overflow-hidden shadow-sm">
                    <button wire:click="decrementQuantity({{ $item->id }})"
                        class="bg-primary text-black p-2 flex items-center justify-center h-8 w-8 font-bold hover:bg-secondary transition">-</button>
                    <span
                        class="bg-primary text-black px-4 py-1 font-bold text-lg h-8 flex items-center">{{ $item->quantity }}</span>
                    <button wire:click="incrementQuantity({{ $item->id }})"
                        class="bg-primary text-black p-2 flex items-center justify-center h-8 w-8 font-bold hover:bg-secondary transition">+</button>
                </div>
            </section>
        @endforeach
        <div>
            <textarea wire:model="notes" rows="3" placeholder="Catatan! Jika perlu"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
        </div>
        <div class="space-y-3">
            <h3 class="text-lg font-semibold text-gray-800">Pilih Metode Makan</h3>
            <div class="flex space-x-3">
                <button wire:click="setServiceType('dine_in')"
                    class="flex-1 font-semibold py-3 rounded-lg shadow-sm transition
                    {{ $serviceType === 'dine_in' ? 'bg-primary text-black' : 'bg-gray-200 text-gray-700' }}">
                    Dine In
                </button>
                <button wire:click="setServiceType('takeaway')"
                    class="flex-1 font-semibold py-3 rounded-lg shadow-sm transition
                    {{ $serviceType === 'takeaway' ? 'bg-primary text-black' : 'bg-gray-200 text-gray-700' }}">
                    Take Away
                </button>
            </div>
        </div>
        <div class="space-y-3">
            <h3 class="text-lg font-semibold text-gray-800">Pilih Metode Pembayaran</h3>
            <div class="flex space-x-3">
                <button wire:click="setPaymentMethod('cash')"
                    class="flex-1 font-semibold py-3 rounded-lg shadow-sm transition
                    {{ $paymentMethod === 'cash' ? 'bg-primary text-black' : 'bg-gray-200 text-gray-700' }}">
                    Cash
                </button>
                <button wire:click="setPaymentMethod('qris')"
                    class="flex-1 font-semibold py-3 rounded-lg shadow-sm transition
                    {{ $paymentMethod === 'qris' ? 'bg-primary text-black' : 'bg-gray-200 text-gray-700' }}">
                    QRIS
                </button>
            </div>
        </div>
        <div class="bg-gray-200 rounded-xl p-4 space-y-2">
            <div class="flex justify-between text-gray-800">
                <p>Total Pesanan ({{ $cartItems->sum('quantity') }} item)</p>
                <p class="font-medium">Rp {{ number_format($cartItems->sum('subtotal'), 0, ',', '.') }}</p>
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
                <p class="font-bold text-xl text-gray-900">Rp
                    {{ number_format($cartItems->sum('subtotal'), 0, ',', '.') }}</p>
            </div>
            <button wire:click="orderNow" class="bg-primary text-black font-bold py-3 px-6 rounded-lg shadow-md">
                Pesan Sekarang
            </button>
        </div>
    </div>
</div>
