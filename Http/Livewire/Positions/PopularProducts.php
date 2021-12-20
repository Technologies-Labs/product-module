<?php

namespace Modules\Product\Http\Livewire\Positions;

use Livewire\Component;
use Modules\Product\Enum\ProductPositionsEnum;
use Modules\Product\Repositories\ProductRepository;

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
        return view('product::livewire.positions.popular-products',[
            'products' => $products
        ]);
    }
}
