<div class="flex h-screen items-center justify-center bg-white my-4" wire:poll.3s>
    <div class="w-full flex flex-col items-center text-center">
        @php
            $statuses = ['PENDING', 'PROCESSING', 'READY', 'COMPLETED'];
            $currentIndex = array_search($order->order_status, $statuses);
            $isCanceled = $order->order_status == 'CANCELED';
        @endphp

        <img src="{{ asset('storage/images/Logo.webp') }}" alt=""
            class="w-32 md:w-48 lg:w-56 mb-6 md:mb-8 lg:mb-10">

        <h2 class="text-xl md:text-2xl lg:text-3xl font-bold mb-4 md:mb-6 lg:mb-8">
            @switch($order->order_status)
                @case('PENDING')
                    Pesanan Anda sedang menunggu konfirmasi
                @break

                @case('PROCESSING')
                    Pesanan Anda sedang disiapkan
                @break

                @case('READY')
                    Pesanan Anda siap diambil
                @break

                @case('COMPLETED')
                    Pesanan Anda telah selesai
                @break

                @case('CANCELED')
                    Pesanan Anda dibatalkan
                @break

                @default
                    Status Pesanan
            @endswitch
        </h2>

        <div class="flex justify-center items-center mb-6 md:mb-8 lg:mb-10 w-full max-w-xs md:max-w-sm lg:max-w-md">

            @foreach ($statuses as $index => $status)
                @php
                    $isActive = $currentIndex === $index;
                    $isDone = $currentIndex > $index;
                @endphp

                <div
                    class="shrink-0 w-12 h-12 md:w-14 md:h-14 lg:w-16 lg:h-16 flex items-center justify-center rounded-full border-2 transition-all duration-300
            {{ $isCanceled
                ? 'bg-red-500 border-red-600'
                : ($isDone
                    ? 'bg-green-600 border-green-700'
                    : ($isActive
                        ? 'bg-green-500 border-green-600'
                        : 'bg-gray-200 border-gray-400')) }}">

                    @switch($status)
                        @case('PENDING')
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="{{ $isCanceled ? '#fff' : ($isDone || $isActive ? '#fff' : '#9ca3af') }}"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M8.5 13L10.5 15L15.5 10M7 3V5M17 3V5M6 9H18M5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V7C21 6.46957 20.7893 5.96086 20.4142 5.58579C20.0391 5.21071 19.5304 5 19 5H5C4.46957 5 3.96086 5.21071 3.58579 5.58579C3.21071 5.96086 3 6.46957 3 7V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21Z" />
                            </svg>
                        @break

                        @case('PROCESSING')
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="{{ $isCanceled ? '#fff' : ($isDone || $isActive ? '#fff' : '#9ca3af') }}"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M4 8H20V18C20 18.5304 19.7893 19.0391 19.4142 19.4142C19.0391 19.7893 18.5304 20 18 20H6C5.46957 20 4.96086 19.7893 4.58579 19.4142C4.21071 19.0391 4 18.5304 4 18V8Z" />
                                <path d="M9 6V4M12 5V3M15 6V4" />
                            </svg>
                        @break

                        @case('READY')
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="{{ $isCanceled ? '#fff' : ($isDone || $isActive ? '#fff' : '#9ca3af') }}"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2C7 2 4 7 4 10C4 13.5 7 17.5 12 22C17 17.5 20 13.5 20 10C20 7 17 2 12 2Z" />
                                <circle cx="12" cy="10" r="2" />
                            </svg>
                        @break

                        @case('COMPLETED')
                            @if ($isCanceled)
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6L6 18M6 6l12 12" />
                                </svg>
                            @else
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="{{ $isDone || $isActive ? '#fff' : '#9ca3af' }}" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 11l3 3L22 4" />
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                                </svg>
                            @endif
                        @break
                    @endswitch
                </div>

                @if (!$loop->last)
                    <div
                        class="w-12 md:w-16 lg:w-24 h-0.5 mx-3 md:mx-4 lg:mx-6 
                {{ $isCanceled ? 'bg-red-500' : ($currentIndex > $index ? 'bg-green-500' : 'bg-gray-300') }}">
                    </div>
                @endif
            @endforeach
        </div>
        <p class="font-bold mb-4">Order Number: {{ $order->order_number }}</p>
        <div
            class="bg-gray-200 text-left p-5 md:p-6 lg:p-8 rounded-lg leading-relaxed w-full max-w-xs md:max-w-sm lg:max-w-md mx-auto text-sm md:text-base">
            @foreach ($order->orderItems as $item)
                <div class="flex justify-between mb-2">
                    <span>{{ $item->product->name }} x{{ $item->quantity }}</span>
                    <span class="font-medium">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                </div>
            @endforeach
            <div class="flex justify-between mb-2">
                <span>Biaya Layanan</span>
                <span class="font-medium">Rp {{ number_format($order->tax, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between font-bold border-t border-gray-300 pt-2 mt-2">
                <span>Total Pembayaran</span>
                <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
            </div>
            <div class="mt-4">
                <div class="flex justify-between mb-2">
                    <span>Metode Makan</span>
                    <span class="font-medium">{{ $order->service_type == 'dine_in' ? 'Dine In' : 'Take Away' }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Metode Pembayaran</span>
                    <span
                        class="font-medium">{{ $order->payment->method == 'qris' ? 'QRIS' : strtoupper($order->payment->method) }}</span>
                </div>
                @if ($order->order_status == 'CANCELED')
                    <div class="flex justify-between mb-2">
                        <span class="text-red-600 font-semibold">Alasan Pembatalan</span>
                        <span class="font-medium text-red-600">{{ $order->cancellation_reason }}</span>
                    </div>
                @endif
                @if ($order->notes)
                    <div class="mb-2">
                        <span class="block font-semibold mb-1">Catatan</span>
                        <div class="bg-gray-100 p-3 rounded-xl text-gray-800 text-sm italic border border-gray-200">
                            “{{ $order->notes }}”
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('orders') }}" wire:navigate
                class="inline-block bg-primary hover:bg-secondary text-black font-bold py-3 px-6 rounded-lg shadow-md transition">
                Kembali ke Pesanan
            </a>
        </div>
    </div>
</div>
</div>
