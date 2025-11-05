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
            <span>Buka : {{ $merchant->open_time }} - {{ $merchant->close_time }}</span>
        </div>
    </header>
    <main class="py-4 pb-32 ">
        @foreach ($products as $product)
            <section
                class="flex items-center bg-gray-200 p-2 space-x-4 border-b border-white
            @if ($loop->first) rounded-t-lg @elseif($loop->last) rounded-b-lg @endif">
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-20 h-20 rounded-lg object-cover">
                <div class="flex-1">
                    <h2 class="font-bold text-lg text-gray-900">{{ $product->name }}</h2>
                    <p class="text-gray-700 font-medium">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>
                <div class="flex items-center rounded-lg overflow-hidden shadow-sm">
                    <button wire:click="decrement({{ $product->id }})"
                        class="bg-primary p-2 flex items-center justify-center h-8 w-8 font-bol">-</button>
                    <span class="bg-primary px-4 py-1 font-bold text-lg h-8 flex items-center">
                        {{ $quantities[$product->id] ?? 0 }}
                    </span>
                    <button wire:click="increment({{ $product->id }})"
                        class="bg-primary p-2 flex items-center justify-center h-8 w-8 font-bol">+</button>
                </div>
            </section>
        @endforeach
    </main>
    <div class="fixed bottom-0 left-0 right-0 max-w-sm mx-auto mb-20 px-4">
        <button wire:click="addToCart"
            class="w-full bg-primary hover:bg-primary/90 transition-colors rounded-xl py-4 flex items-center justify-center space-x-3 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c.51 0 .962-.343 1.087-.835l.383-1.437M8.25 12h7.5M3.75 6h16.5m-16.5 0l.383 1.437M19.5 6l-.383 1.437M3.75 6l-.383-1.437A1.125 1.125 0 013.386 3H2.25z" />
            </svg>
            <span class="font-semibold">
                Keranjang : {{ $totalItems }} Hidangan
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
                    window.location.href = `/merchants/${data.merchantSlug}/cart`;
                } else {
                    $wire.call('createNewCart');
                }
            });
        </script>
    @endscript
</div>
