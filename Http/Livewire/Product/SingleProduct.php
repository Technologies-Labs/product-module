<?php

namespace Modules\ProductModule\Http\Livewire\Product;

use Livewire\Component;

class SingleProduct extends Component
{
    public $user;
    public $product;

    public $items;
    public $cart;

    public $cartCssClass;
    public $favoriteCssClass;

    public $favorites;

    public function render()
    {
        $item                       = $this->items->where('product_id',$this->product->id)->first();
        $this->cartCssClass             = $item ? '#088dcd' : '';

        $favoriteProduct            = $this->favorites->where('id',$this->product->id)->first();
        $this->favoriteCssClass     = $favoriteProduct ? '#EB5144' : '';

        return view('productmodule::livewire.product.single-product');
    }
}
