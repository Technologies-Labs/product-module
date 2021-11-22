<?php

namespace Modules\ProductModule\Http\Livewire\Cart;

use Livewire\Component;
use Modules\CartModule\Entities\CartItem;
class Cart extends Component
{
    public  $product;
    public  $cart;
    public  $items;
    public  $cssClass;


    public function render()
    {
        return view('productmodule::livewire.cart.cart');
    }

    public function addCartItem()
    {
       $item = $this->items->where('product_id',$this->product->id)->first();
       if(!$item)
       {
         $product = CartItem::create([
               'cart_id'    => $this->cart->id,
               'product_id' => $this->product->id,
           ]);
           $this->items     = $this->items->push($product);
           $this->cssClass  = 'filled';
           $this->emit('cartItemAdded','added');
           return ;
       }
       $item->delete();
       $this->items = $this->items->reject(function($value) use ($item) {
            return $value->id == $item->id;
       });
       $this->cssClass = '';
    }
}
