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
            <div class="space-y-3">
                <div>
                    <label class="block text-sm font-medium text-black mb-2 ml-2">Full Name</label>
                    <input type="text"
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        placeholder="Kantinkinku Sign/Id">
                </div>
                <div>
                    <label class="block text-sm font-medium text-black mb-2 ml-2">Email Address</label>
                    <input type="email"
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        placeholder="kati.123@gmail.com">
                </div>
                <div>
                    <label class="block text-sm font-medium text-black mb-2 ml-2">Password</label>
                    <input type="password"
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        placeholder="Enter your password">
                </div>
                <div>
                    <label class="block text-sm font-medium text-black mb-2 ml-2">Confirm Password</label>
                    <input type="password"
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        placeholder="Confirm your password">
                </div>
                <div>
                    <label class="block text-sm font-medium text-black mb-2 ml-2">Contact</label>
                    <input type="tel"
                        class="w-full h-12 border-2 border-gray-300 rounded-[15px] px-4 text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        placeholder="0852*****">
                </div>
                <div class="pt-2">
                    <button
                        class="w-full py-2 bg-primary hover:bg-secondary font-semibold rounded-md transition-all duration-200 shadow-sm hover:shadow-md">
                        Register
                    </button>
                </div>
                <div class="text-start pt-4">
                    <p class="text-gray-900 text-sm">
                        Already have an account?
                        <a href="{{ route('login') }}" wire:navigate
                            class="p-2 rounded-lg bg-primary hover:bg-secondary font-semibold ml-1 transition-colors duration-200">
                            Log In
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
