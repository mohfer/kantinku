@extends('layouts.app')

@section('title', 'Home')

@section('content')


<div class="bg-white min-h-screen px-6 py-4 font-[Montserrat] relative overflow-y-auto">    
    <!-- Header -->
    <div class="flex justify-center items-center mt-4">
        <h1 class="text-[#03045E] text-2xl font-bold">List Warung</h1>
    </div>

    <!-- Search Bar -->
    <div class="flex items-center bg-white border border-gray-300 rounded-full px-4 py-2 mt-6 shadow-sm">
        <img src="{{ asset('images/Logo Search.png') }}" alt="Search Icon" class="w-5 h-5 opacity-70">
        <input
            type="text"
            placeholder="Cari makanan favoritmu..."
            class="ml-3 bg-transparent outline-none w-full text-sm text-gray-700"
        />
    </div>

    <!-- List Warung -->
    <div class="space-y-6 mt-8 pb-16">
        @foreach ([ 
            ['img' => 'Nasi Goreng Spesial.png', 'nama' => 'Warung Bu Ani', 'jam' => '08.00 - 15.00'],
            ['img' => 'Soto Ayam.png', 'nama' => 'Warung Pak Didi', 'jam' => '07.00 - 16.00'],
            ['img' => 'Chitato Sapi Panggang.png', 'nama' => 'Warung Pak Niah', 'jam' => '07.00 - 16.00'],
            ['img' => 'ES Teh.png', 'nama' => 'Warung Bu Endah', 'jam' => '08.15 - 16.00'],
        ] as $warung)
        <div class="bg-[#D9D9D9] rounded-xl px-5 py-4 pb-8 shadow-sm hover:shadow-md transition-all duration-200 relative min-h-[130px]">
            <!-- Kiri: Gambar + Info -->
            <div class="flex items-center">
                <img src="{{ asset('images/' . $warung['img']) }}" 
                     alt="{{ $warung['nama'] }}" 
                     class="w-20 h-20 rounded-full object-cover"> <!-- proporsional -->
                <div class="ml-4 text-[#000]">
                    <h3 class="font-semibold text-base leading-tight">{{ $warung['nama'] }}</h3>
                    <div class="flex items-center mt-1">
                        <img src="{{ asset('images/location_on.png') }}" 
                             alt="Location" 
                             class="w-3.5 h-3.5 mr-1.5">
                        <p class="text-[10px] font-medium leading-tight">Gedung BR - Kabel</p>
                    </div>
                    <div class="flex items-center mt-0.5">
                        <img src="{{ asset('images/schedule.png') }}" 
                             alt="Schedule" 
                             class="w-3.5 h-3.5 mr-1.5">
                        <p class="text-[10px] font-medium leading-tight">Buka : {{ $warung['jam'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Tombol kanan bawah -->
            <div class="absolute bottom-3 right-4">
                <button class="bg-[#48CAE4] text-black px-2.5 py-0.5 rounded-md text-[10px] font-semibold shadow hover:bg-[#00B4D8] transition-colors duration-200">
                    Lihat Menu
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection
