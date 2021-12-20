<?php

namespace Modules\Product\Http\Livewire;

use App\Traits\ModalHelper;
use Livewire\Component;

class ShowProduct extends Component
{
    use ModalHelper;
    public $isCurrantUser;

    public $user;
    public $product;

    public $items;
    public $cart;

    public $cssClass;
    public $favoriteCssClass;

    public $favorites;

    public function render()
    {
        // $item                       = $this->items->where('product_id',$this->product->id)->first();
        // $this->cssClass             = $item ? '#088dcd' : '';

        // $favoriteProduct            = $this->favorites->where('id',$this->product->id)->first();
        // $this->favoriteCssClass     = $favoriteProduct ? '#088dcd' : '';

        return view('product::livewire.show-product');
    }

    public function delete()
    {
        if (!$this->product) {
            $this->modalClose('','error','Error','Error');
            return null;
        }

        $this->product->delete();
        $this->emit('deleteItem', "#user-product-".$this->product->id);
        $this->modalClose('','success','Your Product Deleted Successfully','Product Delete');
    }
}
