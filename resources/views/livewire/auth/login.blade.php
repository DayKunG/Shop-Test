<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">เข้าสู่ระบบ</h2>
    
    <form wire:submit="login">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                อีเมล
            </label>
            <input 
                wire:model="email"
                type="email" 
                id="email"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="กรอกอีเมลของคุณ"
            >
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                รหัสผ่าน
            </label>
            <input 
                wire:model="password"
                type="password" 
                id="password"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="กรอกรหัสผ่านของคุณ"
            >
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button 
            type="submit"
            class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
            เข้าสู่ระบบ
        </button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
        ยังไม่มีบัญชี? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">สมัครสมาชิก</a>
    </p>
</div>
