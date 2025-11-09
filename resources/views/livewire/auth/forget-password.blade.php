<div class="min-h-screen flex flex-col bg-white">
    <a href="{{ route('login') }}" wire:navigate class="absolute left-0 ml-4 p-2 rounded-full hover:bg-gray-100 transition"
        aria-label="Kembali">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-6 h-6 text-gray-800">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </a>
    <div class="flex-1 flex items-center justify-center">
        <div class="w-full max-w-md">
            <div class="text-center mb-4">
                <div class="flex justify-center">
                    <img src="{{ asset('storage/images/Group 93.png') }}" alt="Logo Kantinku"
                        class="w-60 object-contain opacity-95">
                </div>
                <p class="text-gray-600 text-sm">Eat smart, order Fast</p>
            </div>
            <h1 class="text-xl font-bold text-center my-4">Forget Password</h1>
            <form wire:submit.prevent="forgetPassword" class="space-y-4">
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
                    <button type="submit"
                        class="cursor-pointer w-full py-2 bg-primary hover:bg-secondary font-semibold rounded-md transition-all duration-200 shadow-sm hover:shadow-md">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
