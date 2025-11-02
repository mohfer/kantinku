{{--
  File: resources/views/livewire/change-password.blade.php
  Versi ini HANYA FOKUS PADA TAMPILAN (UI)
  Semua fungsi Livewire (seperti $showOldPassword) sudah dinonaktifkan.
--}}
<div class="relative w-full max-w-[440px] h-[951px] bg-white mx-auto border shadow-lg font-['Poppins']">
    
    <header class="relative flex items-center justify-center pt-[73px] pb-4">
        <button class="absolute left-6 top-[76px] text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        
        <h1 class="text-[27px] font-semibold text-black">
            Edit Password
        </h1>
    </header>

    <main class="px-10">
        
        <div class="relative w-[150px] h-[150px] mx-auto mt-[40px] mb-12">
            <img class="w-full h-full rounded-full object-cover" 
                 src="https://placehold.co/150" {{-- URL Gambar Placeholder --}}
                 alt="Profile Picture">
            
            <button class="absolute bottom-0 right-0 w-[45px] h-[43px] bg-[#D9D9D9] rounded-full flex items-center justify-center border-2 border-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9E9D9D" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.82 47.82 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.19 2.19 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.19 2.19 0 00-1.736 1.04l-.821 1.316z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                </svg>
            </button>
        </div>

        {{-- wire:submit.prevent DIHAPUS DARI <form> --}}
        <form>
            
            <div class="mb-4">
                <label for="old_password" class="block text-sm font-medium text-black mb-2 ml-2">Old Password</label>
                <div class="relative">
                    {{-- type DIUBAH menjadi "password" (statis) --}}
                    <input type="password" 
                           id="old_password"
                           placeholder="Enter old password" {{-- Menambahkan placeholder --}}
                           class="w-full h-[50px] border-2 border-[#0077B6] rounded-[15px] px-4 pr-12 text-base">
                    
                    {{-- wire:click DIHAPUS & Ikon mata dibuat statis --}}
                    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </button>
                </div>
            </div>

            <div class="mb-4">
                <label for="new_password" class="block text-sm font-medium text-black mb-2 ml-2">New Password</label>
                <div class="relative">
                    {{-- type DIUBAH menjadi "password" (statis) --}}
                    <input type="password" 
                           id="new_password"
                           placeholder="Enter new password"
                           class="w-full h-[50px] border-2 border-[#0077B6] rounded-[15px] px-4 pr-12 text-base">
                    
                    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </button>
                </div>
            </div>

            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-sm font-medium text-black mb-2 ml-2">Confirm Password</label>
                <div class="relative">
                    {{-- type DIUBAH menjadi "password" (statis) --}}
                    <input type="password" 
                           id="new_password_confirmation"
                           placeholder="Confirm new password"
                           class="w-full h-[50px] border-2 border-[#0077B6] rounded-[15px] px-4 pr-12 text-base">
                    
                    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </button>
                </div>
            </div>

            <div class="mt-8">
                {{-- type="button" agar form tidak ter-submit --}}
                <button type="button" 
                        class="w-full h-[47px] bg-[#023E8A] rounded-[30px] text-white text-base font-semibold">
                    Save
                </button>
            </div>
        </form>

    </main>
</div>