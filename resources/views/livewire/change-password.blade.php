<div class="flex flex-col bg-white mb-14">
    <div class="flex-1 flex items-center justify-center">
        <div class="w-full max-w-md">
            <header class="relative flex items-center justify-center mb-6">
                <a href="{{ route('me') }}" wire:navigate
                    class="absolute left-0 text-gray-800 hover:text-gray-600 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </a>
                <h1 class="text-2xl font-semibold text-black">
                    Edit Password
                </h1>
            </header>
            <div class="relative w-[150px] h-[150px] mx-auto mt-8 mb-10">
                <img class="w-full h-full rounded-full object-cover" src="https://placehold.co/150"
                    alt="Profile Picture">
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
                    <label for="old_password" class="block text-sm font-medium text-black mb-2 ml-2">Old
                        Password</label>
                    <div class="relative">
                        <input type="password" id="old_password" placeholder="Enter old password"
                            class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 pr-12 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        <button type="button"
                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label for="new_password" class="block text-sm font-medium text-black mb-2 ml-2">New
                        Password</label>
                    <div class="relative">
                        <input type="password" id="new_password" placeholder="Enter new password"
                            class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 pr-12 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        <button type="button"
                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label for="new_password_confirmation"
                        class="block text-sm font-medium text-black mb-2 ml-2">Confirm
                        Password</label>
                    <div class="relative">
                        <input type="password" id="new_password_confirmation" placeholder="Confirm new password"
                            class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 pr-12 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">

                        <button type="button"
                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="button"
                        class="w-full h-[47px] bg-[#023E8A] hover:bg-blue-800 rounded-[30px] text-white text-base font-semibold transition-all duration-200 shadow-sm hover:shadow-md">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
