<div>
    <h1 class="text-3xl font-bold mb-6">ตะกร้าสินค้า</h1>

    @if($carts->isEmpty())
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <p class="text-gray-500 text-lg mb-4">ตะกร้าของคุณว่างเปล่า</p>
            <a href="{{ route('products.index') }}" class="inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                ไปเลือกซื้อสินค้า
            </a>
        </div>
    @else
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">สินค้า</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ราคา</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">จำนวน</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">รวม</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($carts as $cart)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-12 w-12 bg-gray-200 rounded mr-4 flex items-center justify-center">
                                            @if($cart->product->image)
                                                <img src="{{ asset('storage/' . $cart->product->image) }}" alt="{{ $cart->product->name }}" class="h-full w-full object-cover rounded">
                                            @else
                                                <span class="text-gray-400 text-xs">ไม่มีรูป</span>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $cart->product->name }}</div>
                                            <div class="text-sm text-gray-500">{{ Str::limit($cart->product->description, 50) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ number_format($cart->product->price, 2) }} บาท
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $cart->quantity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ number_format($cart->product->price * $cart->quantity, 2) }} บาท
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button 
                                        wire:click="removeFromCart({{ $cart->id }})"
                                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                                    >
                                        ลบ
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-50">
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-right text-sm font-medium text-gray-900">
                                รวมทั้งหมด:
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                {{ number_format($total, 2) }} บาท
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endif
</div>
