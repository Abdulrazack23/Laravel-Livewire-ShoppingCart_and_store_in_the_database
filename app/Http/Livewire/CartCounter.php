<?php

namespace App\Http\Livewire;

use App\Models\order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;


class CartCounter extends Component
{
    public $quantity;
    protected $listeners = ['cart_updated' => 'render'];
    public $cart= [];
    public function savecartOder()
    {
   $cart_count = Cart::content()->count();
   if($cart_count !=0){

    $cart = Cart::content();
    // dd($cart);
    foreach($cart as $c)
    {
    order::create(['name'=>$c->name, 'price'=>$c->price, 'quantity'=>$c->qty]);
   }
   cart::destroy();
   return redirect()->route('cart.store');
}

 }
    public function render()
    {
        // $name=$cart['name'];
        $cart_count = Cart::content()->count();
        return view('livewire.cart-counter', compact('cart_count'));
    }
}
