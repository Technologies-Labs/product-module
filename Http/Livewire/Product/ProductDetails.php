<?php

namespace Modules\ProductModule\Http\Livewire\Product;

use Livewire\Component;
use Modules\ProductModule\Entities\Product;

class ProductDetails extends Component
{
    public $product;
    public $cart;
    public $items;
    public $favorites;


    public function render()
    {
        //dd($this->product);
        return view('productmodule::livewire.product.product-details');
    }
}
