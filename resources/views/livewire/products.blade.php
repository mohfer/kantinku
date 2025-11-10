<div class="mx-auto">
    <header class="bg-primary rounded-b-3xl p-6 -m-6 mb-6">
        <h1 class="text-2xl font-bold text-center text-black">{{ $merchant->name }}</h1>
        <div class="flex items-center justify-center text-black text-sm mt-3 space-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
            </svg>
            <span>{{ $merchant->location }}</span>
        </div>
        <div class="flex items-center justify-center text-black text-sm mt-1 space-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Buka : {{ $merchant->open_time->format('H:i') }} - {{ $merchant->close_time->format('H:i') }}</span>
        </div>
    </header>
    <main class="py-4 pb-32 ">
        @foreach ($products as $product)
            <section
                class="flex items-center bg-gray-200 p-2 space-x-4 border-b border-white
            @if ($loop->first) rounded-t-lg @elseif($loop->last) rounded-b-lg @endif">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm">
                <div class="flex-1">
                    <h2 class="font-bold text-lg text-gray-900">{{ $product->name }}</h2>
                    <p class="text-gray-700 font-medium">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <span
                        class="inline-block mt-2 px-3 py-1 bg-{{ $product->is_available == 0 ? 'red-500' : 'green-500' }} text-white text-sm rounded-lg">
                        {{ $product->is_available == 1 ? 'Tersedia' : 'Tidak Tersedia' }}
                    </span>
                </div>
                @if ($product->is_available == 0)
                    <div class="flex items-center rounded-lg overflow-hidden shadow-sm opacity-50">
                        <button disabled
                            class="bg-gray-400 p-2 flex items-center justify-center h-8 w-8 font-bold cursor-not-allowed">-</button>
                        <span class="bg-gray-400 px-4 py-1 font-bold text-lg h-8 flex items-center">
                            0
                        </span>
                        <button disabled
                            class="bg-gray-400 p-2 flex items-center justify-center h-8 w-8 font-bold cursor-not-allowed">+</button>
                    </div>
                @else
                    <div class="flex items-center rounded-lg overflow-hidden shadow-sm">
                        <button wire:click="decrement({{ $product->id }})"
                            class="cursor-pointer bg-primary p-2 flex items-center justify-center h-8 w-8 font-bold hover:bg-secondary">-</button>
                        <span class="bg-primary px-4 py-1 font-bold text-lg h-8 flex items-center">
                            {{ $quantities[$product->id] ?? 0 }}
                        </span>
                        <button wire:click="increment({{ $product->id }})"
                            class="cursor-pointer bg-primary p-2 flex items-center justify-center h-8 w-8 font-bold hover:bg-secondary">+</button>
                    </div>
                @endif
            </section>
        @endforeach
    </main>
    <div class="fixed bottom-0 left-0 right-0 max-w-sm mx-auto mb-20 px-4">
        <button wire:click="addToCart" wire:loading.attr="disabled"
            class="cursor-pointer w-full bg-primary hover:bg-secondary transition-colors rounded-xl py-4 flex items-center justify-center space-x-3 shadow-lg">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" wire:loading.remove>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="font-semibold" wire:loading.remove>
                Keranjang : {{ $totalItems }} Hidangan
            </span>
            <span class="font-semibold" wire:loading>
                Processing…
            </span>
        </button>
    </div>

    @script
        <script>
            $wire.on('showEmptyCartAlert', () => {
                alert('Keranjang tidak boleh kosong! Silakan pilih minimal 1 produk.');
            });

            $wire.on('showCartConfirm', (event) => {
                const data = event[0];
                const message =
                    `Anda sudah memiliki keranjang di ${data.merchantName} (${data.itemCount} item).\n\nPilih:\n- OK: Gunakan keranjang lama\n- Cancel: Buat keranjang baru (keranjang lama akan dihapus)`;

                if (confirm(message)) {
                    window.location.href = `/merchants/${data.merchantSlug}/carts`;
                } else {
                    $wire.call('createNewCart');
                }
            });
        </script>
    @endscript
</div>
