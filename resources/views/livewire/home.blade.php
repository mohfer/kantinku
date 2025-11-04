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
            <a href="{{ route('notifikasi') }}" wire:navigate>
                <img src="{{ asset('storage/images/Notifikasi Bell.png') }}" alt="Notifikasi"
                    class="w-5 h-5 md:w-7 md:h-7 mt-1 cursor-pointer hover:opacity-80 transition-opacity">
            </a>
        </div>
        <div class="flex justify-center mt-4 mb-2">
            <img src="{{ asset('storage/images/Group 93.png') }}" alt="Logo Kantinku"
                class="w-40 md:w-60 lg:w-72 object-contain opacity-95">
        </div>
        <h3 class="text-lg font-semibold text-start mt-2 mb-4">
            Waktunya Makan!
        </h3>
        <section class="space-y-4">
            <h2 class="text-xl font-bold mb-2">Makanan Populer Hari ini!</h2>
            <div
                class="flex items-center gap-4 p-4 border border-gray-300 rounded-xl shadow-sm hover:shadow-md transition-all bg-white">
                <img src="{{ asset('storage/images/Nasi Goreng Spesial.png') }}" alt="Nasi Goreng Spesial"
                    class="w-20 h-20 rounded-full object-cover shrink-0">
                <div>
                    <p class="text-lg font-semibold">Nasi Goreng Spesial</p>
                    <p class="text-base text-gray-700 font-medium">Warung Bu Ani</p>
                    <span class="inline-block mt-2 px-3 py-1 bg-primary text-sm rounded-lg">
                        Tersedia
                    </span>
                </div>
            </div>
            <div
                class="flex items-center gap-4 p-4 border border-gray-300 rounded-xl shadow-sm hover:shadow-md transition-all bg-white">
                <img src="{{ asset('storage/images/Soto Ayam.png') }}" alt="Soto Ayam"
                    class="w-20 h-20 rounded-full object-cover shrink-0">
                <div>
                    <p class="text-lg font-semibold">Soto Ayam</p>
                    <p class="text-base text-gray-700 font-medium">Warung Pak Didi</p>
                    <span class="inline-block mt-2 px-3 py-1 bg-primary text-sm rounded-lg">
                        Tersedia
                    </span>
                </div>
            </div>
            <div
                class="flex items-center gap-4 p-4 border border-gray-300 rounded-xl shadow-sm hover:shadow-md transition-all bg-white">
                <img src="{{ asset('storage/images/Soto Ayam.png') }}" alt="Soto Ayam"
                    class="w-20 h-20 rounded-full object-cover shrink-0">
                <div>
                    <p class="text-lg font-semibold">Soto Ayam</p>
                    <p class="text-base text-gray-700 font-medium">Warung Pak Didi</p>
                    <span class="inline-block mt-2 px-3 py-1 bg-primary text-sm rounded-lg">
                        Tersedia
                    </span>
                </div>
            </div>
        </section>
    </div>
    <a href="{{ route('pesanan') }}" wire:navigate
        class="fixed bottom-20 left-4 right-4 z-50 bg-primary text-black rounded-2xl shadow-lg p-4 md:p-5 space-y-3">
        <h3 class="text-lg font-semibold text-center mb-2">
            Pesanan Berlangsung
        </h3>
        <div class="space-y-2 text-sm md:text-base">
            <div class="border-b pb-2">
                <p class="font-medium">Warung Bu Ani <span class="font-normal">x2</span></p>
                <p class="text-sm font-medium mt-0.5">[Sedang di proses]</p>
            </div>
            <div>
                <p class="font-medium">Warung Pak Didi <span class="font-normal">x2</span></p>
                <p class="text-sm font-medium mt-0.5">[Menunggu Konfirmasi]</p>
            </div>
        </div>
    </a>
</div>
