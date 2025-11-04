<div class="mx-auto">
    <header class="bg-primary rounded-b-3xl p-6 -m-6 mb-6">
        <h1 class="text-2xl font-bold text-center text-black">Warung Pak Didi</h1>
        <div class="flex items-center justify-center text-black text-sm mt-3 space-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
            </svg>
            <span>GEDUNG BR - Kabel</span>
        </div>
        <div class="flex items-center justify-center text-black text-sm mt-1 space-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Buka : 08.00-15.00</span>
        </div>
    </header>
    <main class="py-4 pb-32 ">
        <section class="flex items-center bg-gray-200 p-2 space-x-4 border-b border-white rounded-t-lg">
            <img src="{{ asset('storage/images/SotoAyam.png') }}" alt="SotoAyam"
                class="w-20 h-20 rounded-lg object-cover">
            <div class="flex-1">
                <h2 class="font-bold text-lg text-gray-900">Soto Ayam</h2>
                <p class="text-gray-700 font-medium">Rp 13.000</p>
            </div>
            <div class="flex items-center rounded-lg overflow-hidden shadow-sm">
                <button class="bg-primary p-2 flex items-center justify-center h-8 w-8 font-bold">-</button>
                <span class="bg-primary px-4 py-1 font-bold text-lg h-8 flex items-center">0</span>
                <button class="bg-primary p-2 flex items-center justify-center h-8 w-8 font-bold">+</button>
            </div>
        </section>
        <section class="flex items-center bg-gray-200 p-2 space-x-4 border-b border-white">
            <img src="{{ asset('storage/images/MieAyam.png') }}" alt="MieAyam"
                class="w-20 h-20 rounded-lg object-cover">
            <div class="flex-1">
                <h2 class="font-bold text-lg text-gray-900">Mie Ayam</h2>
                <p class="text-gray-700 font-medium">Rp 12.000</p>
            </div>
            <div class="flex items-center rounded-lg overflow-hidden shadow-sm">
                <button class="bg-primary p-2 flex items-center justify-center h-8 w-8 font-bold">-</button>
                <span class="bg-primary px-4 py-1 font-bold text-lg h-8 flex items-center">0</span>
                <button class="bg-primary p-2 flex items-center justify-center h-8 w-8 font-bold">+</button>
            </div>
        </section>
        <section class="flex items-center bg-gray-200 p-2 space-x-4 border-b border-white">
            <img src="{{ asset('storage/images/MieRebus.png') }}" alt="MieRebus"
                class="w-20 h-20 rounded-lg object-cover">
            <div class="flex-1">
                <h2 class="font-bold text-lg text-gray-900">Mie Rebus</h2>
                <p class="text-gray-700 font-medium">Rp 8.000</p>
            </div>
            <div class="flex items-center rounded-lg overflow-hidden shadow-sm">
                <button class="bg-primary p-2 flex items-center justify-center h-8 w-8 font-bold">-</button>
                <span class="bg-primary px-4 py-1 font-bold text-lg h-8 flex items-center">0</span>
                <button class="bg-primary p-2 flex items-center justify-center h-8 w-8 font-bold">+</button>
            </div>
        </section>
        <section class="flex items-center bg-gray-200 p-2 space-x-4 border-b border-white rounded-b-lg">
            <img src="{{ asset('storage/images/Bakso.png') }}" alt="Bakso" class="w-20 h-20 rounded-lg object-cover">
            <div class="flex-1">
                <h2 class="font-bold text-lg text-gray-900">Bakso</h2>
                <p class="text-gray-700 font-medium">Rp 12.000</p>
            </div>
            <div class="flex items-center rounded-lg overflow-hidden shadow-sm">
                <button class="bg-primary p-2 flex items-center justify-center h-8 w-8 font-bold">-</button>
                <span class="bg-primary px-4 py-1 font-bold text-lg h-8 flex items-center">0</span>
                <button class="bg-primary p-2 flex items-center justify-center h-8 w-8 font-bold">+</button>
            </div>
        </section>
    </main>
    <div class="fixed bottom-0 left-0 right-0 max-w-sm mx-auto mb-16">
        <a href="{{ route('detail-product') }}" wire:navigate class="block">
            <div class="bg-primary rounded-lg py-4 m-4 flex items-center justify-center space-x-3 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c.51 0 .962-.343 1.087-.835l.383-1.437M8.25 12h7.5M3.75 6h16.5m-16.5 0l.383 1.437M19.5 6l-.383 1.437M3.75 6l-.383-1.437A1.125 1.125 0 013.386 3H2.25z" />
                </svg>
                <span class="font-semibold">Keranjang : 0 Hidangan</span>
            </div>
        </a>
    </div>
</div>
