<?php
namespace Modules\ProductModule\Services;

use App\Traits\ImageHelperTrait;
use App\Traits\UploadTrait;
use Modules\ProductModule\Entities\ProductImage;
use Modules\ProductModule\Enum\ProductEnum;

use function PHPUnit\Framework\isNull;

class ProductImageService{

    use UploadTrait , ImageHelperTrait;
    public $image;
    public $product_id;


    public function createProductImage()
    {

        return ProductImage::create(
            [
                'image'      => $this->image,
                'product_id' => $this->product_id,
            ]
        );
    }



    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {

         $this->image = $this->uploadImageWithIntervention($image, 366, 451 ,ProductEnum::IMAGE)['name'];

    }

    /**
     * @param mixed $product_id
     */
    public function setProductID($product_id): void
    {
        $this->product_id = $product_id;
    }



}
