<div class="min-h-screen bg-white pb-20">
    <div class="bg-white border-gray-200 flex items-center pb-4">
        <h1 class="text-2xl font-bold text-gray-800">List Pesanan</h1>
    </div>
    <div class="bg-white border-gray-200">
        <div class="flex space-x-6">
            <a href="{{ route('orders') }}" wire:navigate
                class="py-3 border-b-2 border-transparent text-gray-500 font-medium hover:text-gray-700">
                Berlangsung
            </a>
            <button class="py-3 border-b-2 border-primary font-medium">
                Riwayat
            </button>
        </div>
    </div>
    <div class="py-4 space-y-4">
        @if ($orders->isEmpty())
            <div class="text-center py-8">
                <p class="text-gray-500 text-sm">Tidak ada riwayat pesanan.</p>
            </div>
        @endif
        @foreach ($orders as $order)
            <a href="{{ route('order-status', ['order_number' => $order->order_number]) }}" wire:navigate>
                <div class="bg-gray-200 rounded-lg p-4 mb-4 shadow-sm">
                    <div class="mb-3">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ $order->merchant->name }}</h3>
                        <p class="text-sm text-gray-600">Dipesan: {{ $order->created_at->format('d-m-Y H:i') }}</p>
                        <p class="text-sm text-gray-600">Metode Makan:
                            {{ $order->service_type == 'dine_in' ? 'Dine In' : 'Take Away' }}</p>
                        <p class="text-sm text-gray-600">Metode Pembayaran: {{ $order->payment->payment_method }}</p>
                        <p class="text-sm text-gray-600">Selesai: {{ $order->completed_at->format('d-m-Y H:i') }}</p>
                        <p class="text-lg font-bold my-4">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex items-center justify-between space-x-3">
                        @if ($order->order_status == 'COMPLETED')
                            <span
                                class="px-3 py-1 text-sm font-medium rounded-lg bg-green-100 text-green-700 border border-green-300">
                                Selesai
                            </span>
                        @elseif($order->order_status == 'CANCELLED')
                            <span
                                class="px-3 py-1 text-sm font-medium rounded-lg bg-red-100 text-red-700 border border-red-300">
                                Dibatalkan
                            </span>
                        @endif

                        @if ($order->order_status == 'CANCELLED')
                            <a href="https://wa.me/62{{ ltrim($order->merchant->user->phone, '0') }}?text=Halo%20{{ urlencode($order->merchant->name) }},%20saya%20ingin%20menanyakan%20pesanan%20yang%20dibatalkan%20({{ $order->order_number }})"
                                target="_blank" onclick="event.stopPropagation();"
                                class="flex items-center space-x-2 bg-primary text-black px-3 py-1 rounded-lg text-sm font-medium hover:bg-secondary transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                <span>Hubungi Warung</span>
                            </a>
                        @endif
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
