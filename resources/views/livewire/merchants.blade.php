<div class="min-h-screen relative overflow-y-auto">
    <div class="flex justify-center items-center">
        <h1 class="text-2xl font-bold">List Warung</h1>
    </div>
    <div class="flex items-center my-4 bg-white rounded-full px-4 py-2 md:py-3 shadow-sm">
        <svg class="w-5 h-5 md:w-6 md:h-6 opacity-70 text-gray-600" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <input type="text" placeholder="Cari makanan favoritmu..." wire:model.live='search'
            class="ml-2 bg-transparent outline-none w-full text-sm md:text-base text-gray-700" />
    </div>
    <div class="space-y-6 mt-8 pb-16">
        @if (!empty($search))
            @forelse ($products as $product)
                <a href="{{ route('products', ['slug' => $product->merchant->slug]) }}" wire:navigate>
                    <div
                        class="bg-primary rounded-xl px-5 py-4 mb-4 shadow-sm hover:bg-secondary transition-all duration-200 flex items-center gap-4">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm">
                        <div class="flex-1">
                            <h3 class="font-semibold text-base text-black">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ $product->merchant->name }}</p>
                            <div class="flex items-center justify-between mt-2">
                                <p class="text-sm font-bold">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}</p>
                                <span
                                    class="bg-white text-black px-2.5 py-0.5 rounded-md text-[10px] font-semibold shadow cursor-pointer hover:bg-gray-100 transition">Lihat
                                    Warung</span>
                            </div>
                            <span
                                class="inline-block mt-2 px-3 py-1 bg-{{ $product->is_available == 0 ? 'red-500' : 'green-500' }} text-white text-sm rounded-lg">
                                {{ $product->is_available == 1 ? 'Tersedia' : 'Tidak Tersedia' }}
                            </span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center py-8">
                    <p class="text-gray-500 text-sm">Tidak ada produk yang ditemukan untuk "{{ $search }}"</p>
                </div>
            @endforelse
        @else
            @forelse ($merchants as $merchant)
                <a href="{{ route('products', ['slug' => $merchant->slug]) }}" wire:navigate>
                    <div
                        class="bg-primary rounded-xl px-5 py-4 mb-4 pb-8 shadow-sm hover:shadow-md hover:bg-secondary transition-all duration-200 relative min-h-[130px]">
                        <div class="flex items-center">
                            <img src="{{ asset('storage/' . $merchant->image) }}" alt="{{ $merchant->name }}"
                                class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-sm">
                            <div class="ml-4 text-black">
                                <h3 class="font-semibold text-base leading-tight">{{ $merchant->name }}</h3>
                                <div class="flex items-center mt-1">
                                    <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                    </svg>
                                    <p class="text-[10px] font-medium leading-tight">{{ $merchant->location }}</p>
                                </div>
                                <div class="flex items-center mt-0.5">
                                    <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                                    </svg>
                                    <p class="text-[10px] font-medium leading-tight">Buka :
                                        {{ $merchant->open_time->format('H:i') }}
                                        -
                                        {{ $merchant->close_time->format('H:i') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-3 right-4">
                            <button
                                class="bg-white text-black px-2.5 py-0.5 rounded-md text-[10px] font-semibold shadow cursor-pointer hover:bg-gray-100 transition">
                                Lihat Menu
                            </button>
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center py-8">
                    <p class="text-gray-500 text-sm">Tidak ada warung tersedia</p>
                </div>
            @endforelse
        @endif
    </div>
</div>
