<?php

namespace App\Livewire\ShopCart;

use App\Models\Product;
use App\Models\Shopcart as ShopcartModel;
use Livewire\Component;

class ShopCartItems extends Component
{
    public $cartitems;

    public $total = 0;

    public function render()
    {

        $this->cartitems = ShopcartModel::join('users', 'users.id', '=', 'shopcarts.user_id')
            ->join('products', 'products.id', '=', 'shopcarts.product_id')
            ->where('users.id', auth()->id())
            ->select('shopcarts.*', 'products.product_name', 'products.price', 'products.image')
            ->get();

        //  dd( $this->cartitems);
        $this->total = 0;

        foreach ($this->cartitems as $item) {
            $this->total += $item->shopcartitem_price;
        }

        return view('livewire.shop-cart.shop-cart-items');
    }

    public function decrementQty($id)
    {

        $cart = ShopcartModel::whereId($id)->first();
        $product = Product::find($cart->product_id);
        if ($cart->quantity == 1) {
            //session()->flash('info', 'You cannot have less than 1 quantity');
            session()->flash('error', 'U kunt niet minder dan 1 hoeveelheid hebben!');
        } else {
            $cart->quantity -= 1;

            $cart->shopcartitem_price = $product->price * ($cart->quantity);
            $cart->shopcartitem_price = number_format($cart->shopcartitem_price, 2, '.', '');
            $cart->save();
            session()->flash('success', 'Producthoeveelheid is bijgewerkt !!!');

        }

    }

    public function incrementQty($id)
    {

        $cart = ShopcartModel::whereId($id)->first();
        $product = Product::find($cart->product_id);

        if ($cart->quantity + 1 > 50) {

            //session()->flash('info', 'You cannot have more than 50 quantity');
            session()->flash('error', 'U kunt niet meer dan 50 hoeveelheid hebben!');
        } else {

            $cart->quantity += 1;

            $cart->shopcartitem_price = $product->price * ($cart->quantity);
            $cart->shopcartitem_price = number_format($cart->shopcartitem_price, 2, '.', '');
            $cart->save();

            session()->flash('success', 'Producthoeveelheid is bijgewerkt !!!');
        }
    }

    public function removeItem($id)
    {
        $cart = ShopcartModel::whereId($id)->first();

        if ($cart) {
            $cart->delete();
            $this->dispatch('updateCartCount');
        }
        session()->flash('success', 'Product verwijderd uit winkelwagen !!!');
    }
}
