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
    public $favoriteCssClass;
    public $favorites;

    public function render()
    {
        $item                       = $this->items->where('product_id',$this->product->id)->first();
        $this->cssClass             = empty($item) ? '' : 'filled';
        $favoriteProduct            = $this->favorites->where('id',$this->product->id)->first();
        $this->favoriteCssClass     = empty($favoriteProduct) ? '' : 'filled';
        return view('productmodule::livewire.show-product');
    }
}
