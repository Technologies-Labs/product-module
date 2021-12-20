<?php

namespace Modules\Product\Http\Livewire\Product;

use Livewire\Component;
use Modules\Product\Entities\Product;

class ProductDetails extends Component
{
    public $product;
    public $cart;
    public $items;
    public $favorites;


    public function render()
    {
        //dd($this->product);
        return view('product::livewire.product.product-details');
    }
}
