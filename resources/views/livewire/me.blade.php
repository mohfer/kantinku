{{-- 
  File: resources/views/livewire/my-profile.blade.php
  Versi ini HANYA FOKUS PADA TAMPILAN (UI)
  Semua fungsi Livewire (wire:model, wire:click) sudah dinonaktifkan.
--}}

<div class="relative w-full max-w-[440px] h-[956px] bg-white mx-auto border shadow-lg font-['Poppins']">
    
    <header class="relative flex items-center justify-center pt-[87px] pb-4">
        <button class="absolute left-6 top-[90px] text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        <h1 class="text-[27px] font-semibold text-black">
            My Profile
        </h1>
    </header>

    <main class="px-10">
        
        <div class="relative w-[150px] h-[150px] mx-auto mt-[27px] mb-12">
            
            {{-- URL GAMBAR SUDAH DIPERBAIKI --}}
            <img class="w-full h-full rounded-full object-cover" 
                 src="https://placehold.co/150" {{-- URL placeholder diganti ke yang berfungsi --}}
                 alt="Profile Picture">
            
            <button class="absolute bottom-0 right-0 w-[45px] h-[43px] bg-[#D9D9D9] rounded-full flex items-center justify-center border-2 border-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9E9D9D" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.82 47.82 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.19 2.19 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.19 2.19 0 00-1.736 1.04l-.821 1.316z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                </svg>
            </button>
        </div>

        {{-- wire:submit.prevent="save" DIHAPUS DARI <form> --}}
        <form>
            
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-black mb-2 ml-2">Username</label>
                {{-- wire:model DIHAPUS, diganti 'value' --}}
                <input type="text" id="username" 
                       value="Kurniawan Saputra"
                       class="w-full h-[50px] border-2 border-[#0077B6] rounded-[15px] px-4 font-['Instrument_Sans'] text-base text-[#695C5C]">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-black mb-2 ml-2">Email</label>
                {{-- wire:model DIHAPUS, diganti 'value' --}}
                <input type="email" id="email" 
                       value="Kurniawan@gmail.com"
                       class="w-full h-[50px] border-2 border-[#0077B6] rounded-[15px] px-4 font-['Poppins'] text-sm text-[#9E9D9D]">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-black mb-2 ml-2">Phone Number</label>
                {{-- wire:model DIHAPUS, diganti 'value' --}}
                <input type="tel" id="phone" 
                       value="+62-857-3356-4180"
                       class="w-full h-[50px] border-2 border-[#0077B6] rounded-[15px] px-4 font-['Instrument_Sans'] text-base text-[#695C5C]">
            </div>

            <div class="flex justify-end mt-4">
                <button type="button" {{-- type="button" agar form tidak ter-submit --}}
                        class="w-[156px] h-[40px] bg-[#E50004]/75 border border-[#2C2C2C] rounded-[8px] 
                               text-white font-['Inter'] text-base">
                    Change Password
                </button>
            </div>

            <div class="mt-6">
                <button type="button" {{-- type="button" agar form tidak ter-submit --}}
                        class="w-full h-[47px] bg-[#023E8A] rounded-[30px] text-white text-base font-semibold">
                    Save
                </button>
            </div>
        </form>

        <div class="flex justify-center items-center mt-4">
            {{-- wire:click DIHAPUS --}}
            <button class="flex items-center space-x-2 text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
                <span class="text-base font-semibold">Log Out</span>
            </button>
        </div>

    </main>
</div>