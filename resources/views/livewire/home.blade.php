<div class="bg-white min-h-screen flex flex-col">
    <div class="flex-1 overflow-y-auto mb-60">
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-black font-bold text-lg md:text-2xl leading-tight">
                    Selamat Datang!
                </h1>
                <p class="text-black text-sm md:text-base mt-1 font-semibold">
                    {{ $name }}
                </p>
            </div>
            <div class="flex items-center space-x-4 mt-1">
                @if ($merchant)
                    <a href="{{ route('carts', ['slug' => $merchant->slug]) }}" wire:navigate class="relative">
                        <svg class="w-8 h-8 text-gray-800 hover:text-gray-600 transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </a>
                @endif
                <a href="{{ route('notifications') }}" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-8 h-8 md:w-7 md:h-7 text-gray-800 cursor-pointer hover:text-gray-600 transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.966 8.966 0 0118 9.75V9a6 6 0 00-12 0v.75a8.966 8.966 0 01-2.311 6.022 23.85 23.85 0 005.454 1.31m5.714 0A23.848 23.848 0 0112 18a23.848 23.848 0 01-2.857-.918m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="flex justify-center mt-4 mb-2">
            <img src="{{ asset('storage/images/Logo.webp') }}" alt="Logo Kantinku"
                class="w-40 md:w-60 lg:w-72 object-contain opacity-95">
        </div>
        <h3 class="text-lg font-semibold text-start mt-2 mb-4">
            Waktunya Makan!
        </h3>
        <section class="space-y-4">
            <h2 class="text-xl font-bold mb-2">Makanan Populer Hari ini!</h2>
            @forelse ($popularProducts as $item)
                <a href="{{ route('products', ['slug' => $item['product']->merchant->slug]) }}" wire:navigate>
                    <div
                        class="flex items-center gap-4 p-4 border border-gray-300 rounded-xl shadow-sm hover:bg-gray-100 transition-all bg-white my-3">
                        <img src="{{ asset('storage/' . $item['product']->image) }}" alt="{{ $item['product']->name }}"
                            class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm">
                        <div class="flex-1">
                            <p class="text-lg font-semibold">{{ $item['product']->name }}</p>
                            <p class="text-base text-gray-700 font-medium">{{ $item['product']->merchant->name }}</p>
                            <div class="flex items-center justify-between mt-2">
                                <span
                                    class="inline-block px-3 py-1 {{ $item['product']->is_available ? 'bg-green-500' : 'bg-red-500' }} text-white text-sm rounded-lg">
                                    {{ $item['product']->is_available ? 'Tersedia' : 'Habis' }}
                                </span>
                                <span class="text-xs text-gray-600 font-medium">
                                    {{ $item['total_quantity'] }}x dipesan hari ini
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center py-8">
                    <p class="text-gray-500 text-sm">Belum ada produk yang dipesan hari ini</p>
                </div>
            @endforelse
        </section>
    </div>
    @if ($orders->isNotEmpty())
        <div class="fixed bottom-0 left-0 right-0 z-40 bg-white border-t border-gray-200 shadow-lg mb-16">
            <div class="p-3 space-y-2 max-h-64 overflow-y-auto">
                <h3 class="text-base font-semibold text-center mb-1">Pesanan Berlangsung</h3>
                @foreach ($orders as $order)
                    <a href="{{ route('orders') }}" wire:navigate
                        class="block text-black rounded-lg border border-gray-200 p-3 hover:bg-gray-50 transition-all">
                        <p class="font-medium text-sm">
                            {{ $order->merchant->name }}
                            <span class="font-normal">x{{ $order->orderItems->sum('quantity') }}</span>
                        </p>
                        <p class="text-xs text-gray-600 mt-0.5">{{ $order->order_status }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
