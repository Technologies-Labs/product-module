<?php
namespace Modules\ProductModule\Services;

use Modules\ProductModule\Entities\ProductStatus;
use Modules\ProductModule\Enum\ProductStatusEnum;

use function PHPUnit\Framework\isNull;

class ProductStatusService{

 //class attributes
    public $name;
    public $description;

    public function createProductStatus()
    {
        return ProductStatus::create(
            [
                'name'              =>$this->name,
                'description'       =>$this->description,
            ]
        );
    }

    public function updateProductStatus(ProductStatus $productStatus)
    {
         $productStatus->update(
            [
                'name'              =>$this->name,
                'description'       =>$this->description,
            ]
        );
        return ProductStatus::find($productStatus->id);

    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

}
