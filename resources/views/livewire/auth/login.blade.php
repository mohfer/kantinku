<div class="min-h-screen flex flex-col bg-white">
    <div class="flex-1 flex items-center justify-center">
        <div class="w-full max-w-md">
            <div class="text-center mb-4">
                <div class="flex justify-center">
                    <img src="{{ asset('storage/images/Logo.webp') }}" alt="Logo Kantinku"
                        class="w-60 object-contain opacity-95">
                </div>
                <p class="text-gray-600 text-sm">Eat smart, order Fast</p>
            </div>
            <form wire:submit.prevent="login" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-black mb-1 ml-2">Email</label>
                    <input type="email" wire:model="email" required
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        placeholder="123tes@gmail.com">
                    @error('email')
                        <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-black mb-2 ml-2">New
                        Password</label>
                    <div class="relative" x-data="{ showPassword: false }">
                        <input :type="showPassword ? 'text' : 'password'" id="password"
                            placeholder="Enter your password" wire:model="password" required
                            class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 pr-12 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        <button type="button" @click="showPassword = !showPassword"
                            class="cursor-pointer absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                @error('login')
                    <p class="text-sm text-red-500 text-center">{{ $message }}</p>
                @enderror
                <div>
                    <button wire:loading.attr="disabled"
                        class="cursor-pointer w-full py-2 bg-primary hover:bg-secondary font-semibold rounded-md transition-all duration-200 shadow-sm hover:shadow-md">
                        <span wire:loading.remove>Sign In</span>
                        <span wire:loading>Processing…</span>
                    </button>
                </div>
            </form>
            <div class="text-start mt-4">
                <a href="{{ route('forget-password') }}" wire:navigate
                    class="text-gray-900 text-sm transition-colors duration-200 underline">
                    Forgot password?
                </a>
            </div>
            <div class="text-start pt-4">
                <p class="text-gray-900 text-sm">
                    Dont have an account?
                    <a href="{{ route('register') }}" wire:navigate
                        class="p-2 rounded-lg bg-primary hover:bg-secondary font-semibold ml-1 transition-colors duration-200">
                        Create
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
