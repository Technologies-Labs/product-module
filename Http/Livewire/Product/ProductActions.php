<?php

namespace Modules\Product\Http\Livewire\Product;

use Livewire\Component;

class ProductActions extends Component
{
    public $user;

    public function render()
    {
        return view('product::livewire.product.product-actions');
    }
}
