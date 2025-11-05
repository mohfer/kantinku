<div class="min-h-screen relative overflow-y-auto">
    <div class="flex justify-center items-center">
        <h1 class="text-2xl font-bold">List Warung</h1>
    </div>
    <div class="flex items-center my-4 bg-white rounded-full px-4 py-2 md:py-3 shadow-sm">
        <img src="{{ asset('storage/images/Logo Search.png') }}" alt="Search Icon"
            class="w-5 h-5 md:w-6 md:h-6 opacity-70">
        <input type="text" placeholder="Cari makanan favoritmu..."
            class="ml-2 bg-transparent outline-none w-full text-sm md:text-base text-gray-700" />
    </div>
    <div class="space-y-6 mt-8 pb-16">
        @foreach($merchants as $merchant)
            <a href="{{ route('products', ['slug' => $merchant->slug]) }}" wire:navigate>
                <div
                    class="bg-primary rounded-xl px-5 py-4 mb-4 pb-8 shadow-sm hover:shadow-md transition-all duration-200 relative min-h-[130px]">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/images/' . $merchant->image) }}" alt="{{ $merchant->name }}"
                            class="w-20 h-20 rounded-full object-cover">
                        <div class="ml-4 text-black">
                            <h3 class="font-semibold text-base leading-tight">{{ $merchant->name }}</h3>
                            <div class="flex items-center mt-1">
                                <img src="{{ asset('storage/images/location_on.png') }}" alt="Location"
                                    class="w-3.5 h-3.5 mr-1.5">
                                <p class="text-[10px] font-medium leading-tight">{{ $merchant->location }}</p>
                            </div>
                            <div class="flex items-center mt-0.5">
                                <img src="{{ asset('storage/images/schedule.png') }}" alt="Schedule"
                                    class="w-3.5 h-3.5 mr-1.5">
                                <p class="text-[10px] font-medium leading-tight">Buka : {{ $merchant->open_time }} - {{ $merchant->close_time }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-3 right-4">
                        <button
                            class="bg-white text-black px-2.5 py-0.5 rounded-md text-[10px] font-semibold shadow hover:bg-[#00B4D8] transition-colors duration-200">
                            Lihat Menu
                        </button>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
