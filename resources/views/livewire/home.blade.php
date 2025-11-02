@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="bg-white min-h-screen px-6 py-4 font-[Montserrat] relative overflow-y-auto"> 
    <!-- Header -->
    <div class="flex justify-between items-start">
        <div>
            <h1 class="text-[#0077B6] font-bold text-lg leading-tight">Selamat Datang!</h1>
            <p class="text-[#0077B6] text-sm mt-1 font-semibold">Kurniawan Saputra</p>
        </div>

        <!-- Notifikasi Bell -->
        <img src="{{ asset('images/Notifikasi Bell.png') }}" 
             alt="Notifikasi" 
             class="w-5 h-5 mt-1 cursor-pointer">
    </div>

    <!-- Logo Kantinku -->
    <div class="flex justify-center mt-3 mb-2">
        <img src="{{ asset('images/Group 93.png') }}" 
             alt="Logo Kantinku" 
             class="w-40 h-40 object-contain opacity-95">
    </div>

    <!-- Waktunya Makan -->
    <h3 class="text-[#0077B6] text-lg font-semibold mt-2">Waktunya Makan!</h3>

    <!-- Search Bar -->
    <div class="flex items-center mt-2 bg-gray-100 rounded-full px-4 py-2 shadow-sm">
        <img src="{{ asset('images/Logo Search.png') }}" 
             alt="Search Icon" 
             class="w-5 h-5 opacity-70">
        <input
            type="text"
            placeholder="Cari makanan favoritmu..."
            class="ml-2 bg-transparent outline-none w-full text-sm text-gray-700"
        />
    </div>

    <!-- Kategori -->
    <div class="flex justify-around mt-5 text-[#0077B6] text-sm font-medium">
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/logonasikategorynasimenu.png') }}" 
                 alt="Nasi" 
                 class="w-12 h-12 mb-1 object-contain">
            <span>Nasi</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/foto gelas kategory menu.png') }}" 
                 alt="Minuman" 
                 class="w-12 h-12 mb-1 object-contain">
            <span>Minuman</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/logo kentang kategory menu.png') }}" 
                 alt="Snack" 
                 class="w-12 h-12 mb-1 object-contain">
            <span>Snack</span>
        </div>
    </div>

    <!-- Makanan Populer Hari Ini -->
    <div class="mt-7 mb-20">
        <h3 class="text-[#0077B6] text-lg font-semibold mb-4">Makanan Populer Hari ini</h3>

        <div class="space-y-5">
            <div class="flex items-center">
                <img src="{{ asset('images/Nasi Goreng Spesial.png') }}" 
                     alt="Warung Bu Ani" 
                     class="w-16 h-16 rounded-full object-cover border border-gray-200 shadow-sm">
                <p class="text-[#0077B6] text-base font-medium ml-4">Warung Bu Ani</p>
            </div>

            <div class="flex items-center">
                <img src="{{ asset('images/Soto Ayam.png') }}" 
                     alt="Warung Pak Didi" 
                     class="w-16 h-16 rounded-full object-cover border border-gray-200 shadow-sm">
                <p class="text-[#0077B6] text-base font-medium ml-4">Warung Pak Didi</p>
            </div>
        </div>
    </div>
</div>


@endsection


