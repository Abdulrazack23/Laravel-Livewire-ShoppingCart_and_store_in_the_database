<?php

namespace App\Http\Livewire;

use App\Models\order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductsTable extends Component
{
    public $products;
    public array $quantity = [];


    // public function updateToCart($product_id)
    //     {

    //     $cart = Cart::content();
    //     dd($cart);
    //     foreach($cart as $c)
    //     {
    //     order::create(['name'=>$c->name, 'price'=>$c->price, 'quantity'=>$c->qty]);
    //    }
    //    cart::destroy();
    //    return redirect()->route('cart.store');
    // }
    //     }

    public function updateToCart($product_id)
    {

        $product = Cart::content()->where('id', $product_id);
        foreach ($product as $pro) {
            $this->quantity[$pro->id];
            // dd($this->quantity[$pro->id]);
            Cart::update(
                $pro->rowId,
                   [
                        'qty' => $this->quantity[$pro->id],
                    ],

            );
            $this->emit('cart_updated');
        }
    }
    public function mount()
    {
        $this->products = Product::all();
        foreach ($this->products as $product) {
            $this->quantity[$product->id] = 1;
        }
    }

    public function render()
    {
        $cart = Cart::content();

        return view(
            'livewire.products-table',
            compact('cart')
        );
    }

    public function addToCart($product_id)
    {
        $product = Product::findOrFail($product_id);
        Cart::add(
            $product->id,
            $product->name,
            $this->quantity[$product_id],
            $product->price / 100,
        );

        $this->emit('cart_updated');
    }
}
