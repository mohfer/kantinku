<div class="relative min-h-screen flex justify-center bg-gray-100">

  <div class="max-w-sm w-full px-4 pt-12 pb-32 flex flex-col items-center bg-white text-center rounded-lg shadow-md">

    <h2 class="text-2xl font-bold mb-6">Pesanan Anda sedang disiapkan</h2>

    <!-- STATUS PEMESANAN -->
    <div class="relative flex justify-center items-center mb-8 w-full max-w-xs">
      <!-- Garis hitam penghubung (hanya di antara ikon) -->
      <div class="absolute top-1/2 left-14 right-14 h-1 bg-black -translate-y-1/2"></div>

      <!-- Icon 1 -->
      <div class="w-14 h-14 flex items-center justify-center bg-white border-2 border-black rounded-full z-10">
        <img src="{{ asset('icons/icon1.png') }}" alt="Icon 1" class="w-8 h-8">
      </div>

      <!-- Icon 2 -->
      <div class="w-14 h-14 flex items-center justify-center bg-white border-2 border-black rounded-full z-10 mx-6">
        <img src="{{ asset('icons/icon2.png') }}" alt="Icon 2" class="w-8 h-8">
      </div>

      <!-- Icon 3 -->
      <div class="w-14 h-14 flex items-center justify-center bg-white border-2 border-black rounded-full z-10">
        <img src="{{ asset('icons/icon3.png') }}" alt="Icon 3" class="w-8 h-8">
      </div>
    </div>

    <!-- DETAIL PESANAN -->
    <div class="bg-gray-100 inline-block text-left p-6 rounded-lg leading-relaxed w-80 mx-auto">
      <div class="flex justify-between mb-2">
        <span>Nasi Goreng Special x1</span>
        <span>Rp 15.000</span>
      </div>
      <div class="flex justify-between mb-2">
        <span>Mie Goreng + Telur x1</span>
        <span>Rp 8.000</span>
      </div>
      <div class="flex justify-between mb-2">
        <span>Biaya Layanan</span>
        <span>Rp 0</span>
      </div>
      <div class="flex justify-between font-bold border-t border-gray-300 pt-2">
        <span>Total Pembayaran</span>
        <span>Rp 23.000</span>
      </div>
      <div class="flex justify-between mt-2">
        <span>Metode Makan</span>
        <span>Dine In</span>
      </div>
    </div>

    <!-- Tombol Hubungi -->
    <a href="tel:081234567890" class="inline-block mt-6 px-5 py-2 rounded-lg bg-sky-400 hover:bg-sky-500 text-white font-semibold">
      📞 HUBUNGI WARUNG
    </a>

  </div>
</div>
