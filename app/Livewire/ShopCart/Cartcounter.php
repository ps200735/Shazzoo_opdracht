<?php

namespace App\Livewire\ShopCart;

use App\Models\Shopcart;
use Livewire\Component;

class Cartcounter extends Component
{
    public $total = 0;

    protected $listeners = ['updateCartCount' => 'getCartItemCount'];

    public function render()
    {
        $this->getCartItemCount();

        return view('livewire.shop-cart.cartcounter');
    }

    public function getCartItemCount()
    {
        $this->total = Shopcart::whereUserId(auth()->user()->id)->count();
    }
}
