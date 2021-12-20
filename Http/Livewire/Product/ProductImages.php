<?php

namespace Modules\Product\Http\Livewire\Product;

use Livewire\Component;
use Modules\Product\Entities\ProductImage;

class ProductImages extends Component
{
    public $product;
    public $images;

    public function mount()
    {
        $this->images = $this->product->images;
    }

    public function render()
    {
        return view('product::livewire.product.product-images');
    }

    public function deleteProductImage(ProductImage $image)
    {
        $image = $this->images->find($image->id);
        if (!$image) {
            abort(404);
            return 'product image not found';
        }
        $this->emit('deleteItem', "#product-image-".$image->id);
        $image->delete();
    }
}
