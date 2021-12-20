<?php

namespace Modules\Product\Http\Livewire\Positions;

use Livewire\Component;
use Modules\Product\Enum\ProductPositionsEnum;
use Modules\Product\Repositories\ProductRepository;

class RelatedProducts extends Component
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository        = New ProductRepository();
    }


    public function render()
    {
        $products =  $this->productRepository->getProductsByPosition(ProductPositionsEnum::RELATED);

        return view('product::livewire.positions.related-products',[
            'products'  => $products
        ]);
    }
}
