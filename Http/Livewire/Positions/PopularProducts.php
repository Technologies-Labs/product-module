<?php

namespace Modules\ProductModule\Http\Livewire\Positions;

use Livewire\Component;
use Modules\ProductModule\Enum\ProductPositionsEnum;
use Modules\ProductModule\Repositories\ProductRepository;

class PopularProducts extends Component
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository        = New ProductRepository();
    }

    public function render()
    {
        $products =  $this->productRepository->getProductsByPosition(ProductPositionsEnum::POPULAR , 3);
        return view('productmodule::livewire.positions.popular-products',[
            'products' => $products
        ]);
    }
}
