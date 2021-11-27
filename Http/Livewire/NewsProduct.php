<?php

namespace Modules\ProductModule\Http\Livewire;

use Livewire\Component;

class NewsProduct extends Component
{
    public  $user;

    public function render()
    {
        return view('productmodule::livewire.news-product');
    }
}
