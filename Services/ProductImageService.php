<?php
namespace Modules\ProductModule\Services;

use App\Traits\UploadTrait;
use Modules\ProductModule\Entities\ProductImage;
use Modules\ProductModule\Enum\ProductEnum;

use function PHPUnit\Framework\isNull;

class ProductImageService{

    use UploadTrait;
    public $image;
    public $product_id;


    public function createProductImage()
    {

        return ProductImage::create(
            [
                'image'      =>$this->image,
                'product_id' =>$this->product_id,

            ]
        );
    }



    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {

         $this->image =$image;

    }

    /**
     * @param mixed $product_id
     */
    public function setProductID($product_id): void
    {
        $this->product_id = $product_id;
    }



}
