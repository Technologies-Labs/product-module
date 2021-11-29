<?php

namespace Modules\ProductModule\Http\Livewire\Positions;

use Livewire\Component;
use Modules\ProductModule\Enum\ProductPositionsEnum;
use Modules\ProductModule\Repositories\ProductRepository;

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

        return view('productmodule::livewire.positions.related-products',[
            'products'  => $products
        ]);
    }
}
