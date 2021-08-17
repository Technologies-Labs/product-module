<?php

namespace Modules\ProductModule\Http\Livewire\Favorite;

use Auth;
use Livewire\Component;

class Favorite extends Component
{
    public $product;
    public $favoriteCssClass;
    public $favorites;

    public function render()
    {
        return view('productmodule::livewire.favorite.favorite');
    }

    public function addFavoriteProduct()
    {
        $product = $this->favorites->where('id',$this->product->id)->first();
        if(!$product)
        {
            Auth::user()->favorites()->attach($this->product->id);
            $this->favorites         = $this->favorites->push($this->product);
            $this->favoriteCssClass  = 'filled';;
            return ;
        }
        Auth::user()->favorites()->detach($this->product->id);
        $this->favorites = $this->favorites->reject(function($value) use ($product) {
            return $value->id == $product->id;
        });
        $this->favoriteCssClass = '';
    }
}
