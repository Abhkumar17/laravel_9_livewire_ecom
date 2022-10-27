<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;
class ShopeComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shope-component',['products' =>$products]);
    }
}
