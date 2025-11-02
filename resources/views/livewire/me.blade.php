<div class="flex flex-col bg-white mb-14">
    <div class="flex-1 flex items-center justify-center">
        <div class="w-full max-w-md">
            <header class="relative flex items-center justify-center mb-6">
                <h1 class="text-2xl font-semibold text-black">
                    My Profile
                </h1>
            </header>
            <div class="relative w-[150px] h-[150px] mx-auto mt-8 mb-10">
                <img class="w-full h-full rounded-full object-cover" src="https://placehold.co/150" alt="Profile Picture">
                <button
                    class="absolute bottom-0 right-0 w-[45px] h-[43px] bg-[#D9D9D9] rounded-full flex items-center justify-center border-2 border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#9E9D9D" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.82 47.82 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.19 2.19 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.19 2.19 0 00-1.736 1.04l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-black mb-2 ml-2">Name</label>
                    <input type="text" id="username" placeholder="Kurniawan Saputra"
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-black mb-2 ml-2">Email</label>
                    <input type="email" id="email" placeholder="Kurniawan@gmail.com"
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-black mb-2 ml-2">Phone Number</label>
                    <input type="tel" id="phone" placeholder="+62-857-3356-4180"
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                </div>
                <div class="flex justify-end pt-2">
                    <a href="{{ route('change-password') }}" wire:navigate
                        class="inline-flex items-center text-[#023E8A] hover:text-[#0077B6] font-medium text-sm underline transition-colors duration-200">
                        Change Password
                    </a>
                </div>
                <div class="pt-2">
                    <button type="button"
                        class="w-full h-[47px] bg-[#023E8A] hover:bg-blue-800 rounded-[30px] text-white text-base font-semibold transition-all duration-200 shadow-sm hover:shadow-md">
                        Save
                    </button>
                </div>
            </form>
            <div class="flex justify-center items-center mt-6">
                <a href="{{ route('login') }}" wire:navigate
                    class="flex items-center space-x-2 text-black hover:text-red-600 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                    <span class="text-base font-semibold">Log Out</span>
                </a>
            </div>
        </div>
    </div>
</div>
