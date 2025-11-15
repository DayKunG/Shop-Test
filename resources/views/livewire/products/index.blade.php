<div>
    <h1 class="text-3xl font-bold mb-6">สินค้าทั้งหมด</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                    @else
                        <span class="text-gray-400">ไม่มีรูปภาพ</span>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-2">{{ $product->description }}</p>
                    <p class="text-2xl font-bold text-blue-600 mb-4">{{ number_format($product->price, 2) }} บาท</p>
                    <p class="text-sm text-gray-500 mb-4">คงเหลือ: {{ $product->stock }} ชิ้น</p>
                    
                    <div class="flex gap-2">
                        <button 
                            wire:click="addToCart({{ $product->id }})"
                            class="flex-1 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
                        >
                            ใส่ตะกร้า
                        </button>
                        <button 
                            class="flex-1 bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600"
                            disabled
                        >
                            ซื้อ
                        </button>
                        <button 
                            class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600"
                            disabled
                        >
                            ♥
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($products->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">ยังไม่มีสินค้า</p>
        </div>
    @endif
</div>
