<div class="min-h-screen flex flex-col bg-white">
    <div class="flex-1 flex items-center justify-center">
        <div class="w-full max-w-md">
            <div class="text-center mb-4">
                <div class="flex justify-center">
                    <img src="{{ asset('storage/images/Group 93.png') }}" alt="Logo Kantinku"
                        class="w-60 object-contain opacity-95">
                </div>
                <p class="text-gray-600 text-sm">Eat smart, order Fast</p>
            </div>
            <form wire:submit.prevent="login" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-black mb-1 ml-2">Email</label>
                    <input type="email" wire:model="email"
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        placeholder="123tes@gmail.com">
                    @error('email')
                        <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-black mb-1 ml-2">Password</label>
                    <input type="password" wire:model="password"
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        placeholder="tes123">
                    @error('password')
                        <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                @error('login')
                    <p class="text-sm text-red-500 text-center">{{ $message }}</p>
                @enderror
                <div>
                    <button
                        class="w-full h-[47px] bg-[#023E8A] hover:bg-blue-800 text-white font-semibold rounded-[30px] transition-all duration-200 shadow-sm hover:shadow-md">
                        Sign In
                    </button>
                </div>
            </form>
            <div class="text-center">
                <a href="#"
                    class="text-gray-900 text-sm hover:text-blue-700 transition-colors duration-200 underline">
                    Forgot password?
                </a>
            </div>
            <div class="text-center pt-4">
                <p class="text-gray-900 text-sm">
                    Dont have an account?
                    <a href="{{ route('register') }}" wire:navigate
                        class="text-blue-700 hover:text-blue-800 font-semibold ml-1 transition-colors duration-200">
                        Create
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
