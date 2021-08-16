<?php

namespace Modules\ProductModule\Http\Livewire;

use Livewire\Component;

class ShowProduct extends Component
{
    public $user;
    public $product;
    public $items;
    public $cart;
    public $cssClass;
    public $isCurrantUser;

    public function render()
    {
        $item           = $this->items->where('product_id',$this->product->id)->first();
        $this->cssClass = empty($item) ? '' : 'filled';
        return view('productmodule::livewire.show-product');
    }
}
