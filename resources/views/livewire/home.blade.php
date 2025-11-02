<div class="bg-white min-h-screen">
    <div class="relative overflow-y-auto">
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-[#0077B6] font-bold text-lg md:text-2xl leading-tight">Selamat Datang!</h1>
                <p class="text-[#0077B6] text-sm md:text-base mt-1 font-semibold">Kurniawan Saputra</p>
            </div>

            <img src="{{ asset('storage/images/Notifikasi Bell.png') }}" alt="Notifikasi"
                class="w-5 h-5 md:w-7 md:h-7 mt-1 cursor-pointer hover:opacity-80 transition-opacity">
        </div>

        {{-- <div class="flex justify-center mt-3 mb-2">
            <img src="{{ asset('storage/images/Group 93.png') }}" alt="Logo Kantinku"
                class="w-40 md:w-60 lg:w-72 object-contain opacity-95">
        </div>

        <h3 class="text-[#0077B6] text-lg md:text-2xl font-semibold mt-2">Waktunya Makan!</h3> --}}

        <div class="flex items-center my-4 bg-gray-100 rounded-full px-4 py-2 md:py-3 shadow-sm">
            <img src="{{ asset('storage/images/Logo Search.png') }}" alt="Search Icon"
                class="w-5 h-5 md:w-6 md:h-6 opacity-70">
            <input type="text" placeholder="Cari makanan favoritmu..."
                class="ml-2 bg-transparent outline-none w-full text-sm md:text-base text-gray-700" />
        </div>

        <div class="flex justify-start gap-8 md:gap-12 mt-5 text-[#0077B6] text-sm md:text-base font-medium">
            <div class="flex flex-col items-center cursor-pointer hover:opacity-80 transition-opacity">
                <img src="{{ asset('storage/images/logonasikategorynasimenu.png') }}" alt="Nasi"
                    class="w-12 h-12 md:w-16 md:h-16 lg:w-20 lg:h-20 mb-1 object-contain">
                <span>Nasi</span>
            </div>
            <div class="flex flex-col items-center cursor-pointer hover:opacity-80 transition-opacity">
                <img src="{{ asset('storage/images/foto gelas kategory menu.png') }}" alt="Minuman"
                    class="w-12 h-12 md:w-16 md:h-16 lg:w-20 lg:h-20 mb-1 object-contain">
                <span>Minuman</span>
            </div>
            <div class="flex flex-col items-center cursor-pointer hover:opacity-80 transition-opacity">
                <img src="{{ asset('storage/images/logo kentang kategory menu.png') }}" alt="Snack"
                    class="w-12 h-12 md:w-16 md:h-16 lg:w-20 lg:h-20 mb-1 object-contain">
                <span>Snack</span>
            </div>
        </div>

        <div class="mt-7 mb-20">
            <h3 class="text-[#0077B6] text-lg md:text-2xl font-semibold mb-4">Makanan Populer Hari ini</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <div
                    class="flex items-center cursor-pointer hover:bg-gray-50 p-2 md:p-4 rounded-lg transition-colors border border-gray-100">
                    <img src="{{ asset('storage/images/Nasi Goreng Spesial.png') }}" alt="Warung Bu Ani"
                        class="w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-full object-cover border border-gray-200 shadow-sm shrink-0">
                    <p class="text-[#0077B6] text-base md:text-lg font-medium ml-4">Warung Bu Ani</p>
                </div>

                <div
                    class="flex items-center cursor-pointer hover:bg-gray-50 p-2 md:p-4 rounded-lg transition-colors border border-gray-100">
                    <img src="{{ asset('storage/images/Soto Ayam.png') }}" alt="Warung Pak Didi"
                        class="w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-full object-cover border border-gray-200 shadow-sm shrink-0">
                    <p class="text-[#0077B6] text-base md:text-lg font-medium ml-4">Warung Pak Didi</p>
                </div>
            </div>
        </div>
    </div>
</div>
