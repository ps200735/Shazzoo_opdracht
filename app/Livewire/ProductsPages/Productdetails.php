<?php

namespace App\Livewire\ProductsPages;

use App\Livewire\ShopCart\Cartcounter;
use App\Models\Product;
use App\Models\Shopcart;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Productdetails extends Component
{
    public $product;

    #[Validate('required', message: 'Dit is een verplicht veld')]
    #[Validate('min:1', message: 'Dit moet minimaal 1 zijn')]
    #[Validate('numeric', message: ' Dit moet een nummer zijn')]
    #[Validate('max:50', message: 'Dit mag niet meer dan 50 zijn')]
    public $quantity = 1;

    public function mount($id)
    {
        $this->product = Product::find($id);
    }

    public function add_to_cart($id)
    {

        $product = Product::find($id);

        $cart = Shopcart::whereUserId(auth()->user()->id)->whereProductId($id)->first();
        if ($cart) {
            if ($cart->quantity + $this->quantity > 50) {

                session()->flash('error', 'U kunt niet meer dan 50 hoeveelheid hebben!');
            } else {
                $cart->update([
                    'quantity' => $cart->quantity + $this->quantity,
                    'shopcartitem_price' => ($product->price * $cart->quantity),

                ]);

                session()->flash('success', 'Product is toegevoegd in uw winkelwagen');
            }
        } else {

            if ($this->quantity > 50) {
                session()->flash('error', 'U kunt niet meer dan 50 hoeveelheid hebben!');
            } else {

                $shopcart = Shopcart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $id,
                    'quantity' => $this->quantity,
                    'shopcartitem_price' => ($product->price * $this->quantity),
                ]);

                if ($shopcart) {
                    session()->flash('success', 'Product is toegevoegd in uw winkelwagen');
                    // call the  updateCartCount method in the Cartcounter component
                    $this->dispatch('updateCartCount');
                } else {
                    session()->flash('message', 'Er is een fout opgetreden tijdens het opslaan van uw winkel');
                    //return redirect()->route('cart');
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.products-pages.productdetails', ['product' => $this->product]);
    }
}
