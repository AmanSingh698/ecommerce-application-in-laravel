<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
// use Gloudemans\Shoppingcart\Cart;

class ShopComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = "Default Sorting";

    public $min_value = 0;
    public $max_value = 1000;

    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id, $product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item added in the cart.');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size){
        $this->pageSize = $size;
    }

    public function changeOrderBy($order){
        $this->orderBy = $order;
    }

    public function render()
    {
        if($this->orderBy == 'Price: Low to High')
        {
            //this is for displaying the products in ascending order i.r. price low to high.
            // $products = Product::orderBy('regular_price','ASC')->paginate($this->pageSize);

            //this apply's the filteration on the price section.
            $products = Product::whereBetween('regular_price',[$this->min_value, $this->max_value])->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        elseif($this->orderBy == 'Price: High to Low')
        {
            // $products = Product::orderBy('regular_price','DESC')->paginate($this->pageSize);
            $products = Product::whereBetween('regular_price',[$this->min_value, $this->max_value])->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        elseif($this->orderBy == 'Sort by Newness')
        {
            // $products = Product::orderBy('created_at','DESC')->paginate($this->pageSize);
            $products = Product::whereBetween('regular_price',[$this->min_value, $this->max_value])->orderBy('regular_price','ASC')->paginate($this->pageSize);
        }
        else{
            // $products = Product::paginate($this->pageSize);
            $products = Product::whereBetween('regular_price',[$this->min_value, $this->max_value])->paginate($this->pageSize);
        }

        //getting all the categories
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.shop-component',['products'=>$products, 'categories'=>$categories]);
    }
}
