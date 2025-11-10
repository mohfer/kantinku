<div class="fixed bottom-0 left-0 right-0 bg-gray-200 border-t border-gray-200 md:hidden z-50">
    <nav class="flex justify-around items-center h-16">
        <a href="{{ route('home') }}" wire:navigate
            class="flex flex-col items-center justify-center flex-1 py-2 {{ request()->is('/', 'notifications') ? 'text-black' : 'text-gray-600' }} hover:text-black transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="text-xs mt-1">Home</span>
        </a>
        <a href="{{ route('merchants') }}" wire:navigate
            class="flex flex-col items-center justify-center flex-1 py-2 {{ request()->is('merchants*', 'products') ? 'text-black' : 'text-gray-600' }} hover:text-black transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="text-xs mt-1">Warung</span>
        </a>
        <a href="{{ route('orders') }}" wire:navigate
            class="flex flex-col items-center justify-center flex-1 py-2 {{ request()->is('orders*', 'order-history', 'order-status') ? 'text-black' : 'text-gray-600' }} hover:text-black transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span class="text-xs mt-1">Pesanan</span>
        </a>
        <a href="{{ route('me') }}" wire:navigate
            class="flex flex-col items-center justify-center flex-1 py-2 {{ request()->is('me', 'change-password') ? 'text-black' : 'text-gray-600' }} hover:text-black transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="text-xs mt-1">Me</span>
        </a>
    </nav>
</div>
