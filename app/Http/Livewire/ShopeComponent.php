<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;
use Cart;
class ShopeComponent extends Component
{
    use WithPagination;
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session->flush('success_message','Item added successfully');
        return redirect()->route('cart');
    }
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shope-component',['products' =>$products]);
    }
}
