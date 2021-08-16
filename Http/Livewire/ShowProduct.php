<?php

namespace Modules\ProductModule\Http\Livewire;

use Livewire\Component;

class ShowProduct extends Component
{
    public $user;
    public $product;
    public $isCurrantUser;

    public function render()
    {
        return view('productmodule::livewire.show-product');
    }
}
