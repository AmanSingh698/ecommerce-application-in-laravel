<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class HomeComponent extends Component
{

    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id, $product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item added in the cart.');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        $fproducts = Product::where('featured',1)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component',['lproducts'=>$lproducts,'fproducts'=>$fproducts]);
    }
}
