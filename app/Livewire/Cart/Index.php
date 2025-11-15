<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function removeFromCart($cartId)
    {
        Cart::where('id', $cartId)
            ->where('user_id', Auth::id())
            ->delete();

        $this->dispatch('cart-updated');
        session()->flash('message', 'ลบสินค้าออกจากตะกร้าเรียบร้อยแล้ว');
    }

    public function render()
    {
        $carts = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();

        $total = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('livewire.cart.index', compact('carts', 'total'));
    }
}
