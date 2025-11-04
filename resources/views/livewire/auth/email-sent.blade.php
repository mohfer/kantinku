<div class="min-h-screen flex flex-col bg-white">
    <button onclick="history.back()" class="absolute left-0 ml-4 p-2 rounded-full hover:bg-gray-100 transition"
        aria-label="Kembali">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-6 h-6 text-gray-800">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <div class="flex-1 flex items-center justify-center">
        <div class="w-full max-w-md">
            <div class="text-center mb-4">
                <div class="flex justify-center">
                    <img src="{{ asset('storage/images/Group 93.png') }}" alt="Logo Kantinku"
                        class="w-60 object-contain opacity-95">
                </div>
                <p class="text-gray-600 text-sm">Eat smart, order Fast</p>
            </div>
            <h1 class="text-xl font-bold text-center my-4">Email Sent</h1>
            <div class="p-4 bg-primary rounded-lg text-center">
                <p class="text-sm">Please check your email for the password reset link.</p>
            </div>
        </div>
    </div>
</div>
