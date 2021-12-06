<?php

namespace Modules\ProductModule\Http\Livewire\Product;

use Livewire\Component;

class ProductActions extends Component
{
    public $user;

    public function render()
    {
        return view('productmodule::livewire.product.product-actions');
    }
}
