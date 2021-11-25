<?php

namespace Modules\ProductModule\Http\Livewire;

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
        $item                       = $this->items->where('product_id',$this->product->id)->first();
        $this->cssClass             = $item ? '#088dcd' : '';

        $favoriteProduct            = $this->favorites->where('id',$this->product->id)->first();
        $this->favoriteCssClass     = $favoriteProduct ? '#088dcd' : '';

        return view('productmodule::livewire.show-product');
    }

    public function delete()
    {
        //dd($this->product );
        //$this->product->delete();

        //$this->emit('productDeleted');
        $this->modalClose('','success','Your Product Deleted Successfully','Product Delete');
    }
}
