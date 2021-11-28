<?php

namespace Modules\ProductModule\Http\Livewire\Product;

use Livewire\Component;
use Modules\ProductModule\Repositories\ProductRepository;

class GridView extends Component
{
    private $productRepository;

    public  $user;
    public  $data;

    public function __construct()
    {
        $this->productRepository    = new ProductRepository();
    }

    public function mount()
    {
        $this->data                 = $this->productRepository->getUserProducts($this->user);
    }

    public function render()
    {
        return view('productmodule::livewire.product.grid-view');
    }
}
