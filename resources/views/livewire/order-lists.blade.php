<div wire:poll.3s>
    <style>
        .orders-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        @media (min-width: 768px) {
            .orders-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .orders-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .order-description {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .order-timestamp {
            font-size: 0.75rem;
            color: rgb(107 114 128);
            margin-top: 0.25rem;
        }

        .dark .order-timestamp {
            color: rgb(156 163 175);
        }

        .items-container {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.875rem;
        }

        .item-name {
            color: rgb(55 65 81);
        }

        .dark .item-name {
            color: rgb(209 213 219);
        }

        .details-container {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            font-size: 0.875rem;
            margin: 1rem 0;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
        }

        .detail-label {
            color: rgb(107 114 128);
        }

        .dark .detail-label {
            color: rgb(156 163 175);
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            font-size: 1rem;
            padding-top: 0.5rem;
            border-top: 1px solid rgb(229 231 235);
        }

        .dark .total-row {
            border-top-color: rgb(55 65 81);
        }

        .total-amount {
            color: rgb(37 99 235);
        }

        .dark .total-amount {
            color: rgb(96 165 250);
        }

        .notes-section {
            margin-top: 0.75rem;
            padding: 0.75rem;
            background: rgb(254 249 195);
            border: 1px solid rgb(253 224 71);
            border-radius: 0.5rem;
        }

        .dark .notes-section {
            background: rgb(113 63 18 / 0.2);
            border-color: rgb(161 98 7);
        }

        .notes-text {
            font-size: 0.875rem;
            color: rgb(113 63 18);
        }

        .dark .notes-text {
            color: rgb(253 224 71);
        }

        .footer-actions {
            display: flex;
            gap: 0.5rem;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 3rem 0;
        }

        .empty-icon {
            color: rgb(156 163 175);
            margin-bottom: 1rem;
        }

        .dark .empty-icon {
            color: rgb(75 85 99);
        }

        .empty-title {
            color: rgb(107 114 128);
            font-weight: 500;
            font-size: 1.125rem;
            margin: 0.5rem 0;
        }

        .dark .empty-title {
            color: rgb(156 163 175);
        }

        .empty-subtitle {
            font-size: 0.875rem;
            color: rgb(156 163 175);
            margin-top: 0.5rem;
        }

        .dark .empty-subtitle {
            color: rgb(75 85 99);
        }
    </style>

    <div class="orders-grid">
        @forelse ($orders as $order)
            <x-filament::section>
                <x-slot name="heading">
                    Pesanan {{ $order->order_number }}
                </x-slot>

                <x-slot name="description">
                    <div class="order-description">
                        <span>{{ $order->user->name }}</span>
                        <x-filament::badge
                            color="{{ match ($order->order_status) {
                                'PENDING' => 'warning',
                                'PROCESSING' => 'info',
                                'READY' => 'success',
                                'COMPLETED' => 'gray',
                                'CANCELLED' => 'danger',
                                default => 'secondary',
                            } }}">
                            {{ ucfirst(strtolower($order->order_status)) }}
                        </x-filament::badge>
                    </div>
                    <div class="order-timestamp">
                        {{ $order->created_at->format('d M Y, H:i') }}
                    </div>
                </x-slot>

                <div class="items-container">
                    <div style="font-weight: 600; font-size: 0.875rem;">Item Pesanan:</div>
                    @foreach ($order->orderItems as $item)
                        <div class="item-row">
                            <span class="item-name">
                                {{ $item->product->name }} <strong>x{{ $item->quantity }}</strong>
                            </span>
                            <span style="font-weight: 500;">
                                Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="details-container">
                    <div class="detail-row">
                        <span class="detail-label">Metode Makan:</span>
                        <span
                            style="font-weight: 500;">{{ $order->service_type === 'dine_in' ? 'Dine In' : 'Take Away' }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Metode Pembayaran:</span>
                        <span style="font-weight: 500;">{{ strtoupper($order->payment->method ?? '-') }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Biaya Layanan:</span>
                        <span style="font-weight: 500;">Rp {{ number_format($order->tax ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <div class="total-row">
                        <span>Total Pembayaran:</span>
                        <span class="total-amount">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                </div>

                @if ($order->notes)
                    <div class="notes-section">
                        <div class="notes-text">
                            <strong>Catatan:</strong> {{ $order->notes }}
                        </div>
                    </div>
                @endif

                <div
                    style="margin-top: 1rem; display: flex; gap: 0.5rem; padding-top: 1rem; border-top: 1px solid rgb(229 231 235);">
                    @if ($order->order_status === 'PENDING')
                        <x-filament::button color="danger" wire:click="rejectOrder({{ $order->id }})"
                            size="sm">
                            Tolak
                        </x-filament::button>
                        <x-filament::button color="success" wire:click="acceptOrder({{ $order->id }})"
                            size="sm">
                            Terima
                        </x-filament::button>
                    @elseif ($order->order_status === 'PROCESSING')
                        <x-filament::button color="warning" wire:click="markAsReady({{ $order->id }})"
                            size="sm">
                            Tandai Siap
                        </x-filament::button>
                    @elseif ($order->order_status === 'READY')
                        <x-filament::button color="success" wire:click="markAsCompleted({{ $order->id }})"
                            size="sm">
                            Selesai
                        </x-filament::button>
                    @endif
                </div>
            </x-filament::section>
        @empty
            <div class="empty-state">
                <x-filament::section>
                    <div style="padding: 3rem 0; text-align: center;">
                        <div class="empty-icon">
                            <svg style="margin: 0 auto; height: 4rem; width: 4rem;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <p class="empty-title">Belum ada pesanan aktif.</p>
                        <p class="empty-subtitle">Pesanan baru akan muncul di sini.</p>
                    </div>
                </x-filament::section>
            </div>
        @endforelse
    </div>
</div>
