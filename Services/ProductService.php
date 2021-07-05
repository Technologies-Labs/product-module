<?php
namespace Modules\ProductModule\Services;

use Modules\ProductModule\Entities\Product;
use App\Traits\UploadTrait;
use Modules\ProductModule\Entities\ProductImage;
use Modules\ProductModule\Enum\ProductEnum;
use PhpParser\Node\Expr\Cast\Double;

use function PHPUnit\Framework\isNull;

class ProductService{
    use UploadTrait;

 //class attributes
    public $name;
    public $description;
    public $image ;
    public $price;
    public $old_price;
    public $count;
    public $user_id;
    public $category_id;
    public $product_status_id;
    public $is_offer;
    public $offer_ratio;

    public function createProduct()
    {

        return Product::create(
            [
                'name'              =>$this->name,
                'description'       =>$this->description,
                'image'             =>$this->image,
                'price'             =>$this->price,
                'old_price'         =>$this->old_price,
                'count'             =>$this->count,
                'user_id'           =>$this->user_id,
                'category_id'       =>$this->category_id,
                'product_status_id' =>$this->product_status_id,
                'is_offer'          =>$this->is_offer,
                'offer_ratio'       =>$this->offer_ratio,
            ]
        );
    }

    public function updateProduct(Product $product)
    {
         $product->update(
            [
                'name'              =>$this->name,
                'description'       =>$this->description,
                'image'             =>($this->image??$product->image),
                'price'             =>$this->price,
                'old_price'         =>$this->old_price,
                'count'             =>$this->count,
                'category_id'       =>$this->category_id,
                'product_status_id' =>$this->product_status_id,
                'is_offer'          =>$this->is_offer,
                'offer_ratio'       =>$this->offer_ratio,
            ]
        );
        return Product::find($product->id);

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

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        if(isNull($image) ){
            $this->image=ProductEnum::PRODUCT_DEFAULT_IMAGE;
        }else
        $this->image =$this->storeImage($image,ProductEnum::PRODUCT_IMAGE_PATH);
        return $this;
    }

     /**
     * @param mixed $image
     */
    public function updateImg($image ,$old_image)
    {
        if($old_image === ProductEnum::PRODUCT_DEFAULT_IMAGE){
            $this->image =$this->storeImage($image,ProductEnum::PRODUCT_IMAGE_PATH);
        }else
        $this->image =$this->updateImage($image,ProductEnum::PRODUCT_IMAGE_PATH,$old_image);

    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param mixed $olde_price
     */
    public function setOldPrice($old_price)
    {
        $this->old_price = $old_price;
        return $this;
    }


    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryID($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

     /**
     * @param mixed $product_status_id
     */
    public function  setProductStatusID($product_status_id)
    {
        $this->product_status_id = $product_status_id;
        return $this;
    }

    /**
     * @param mixed $is_offer
     */
    public function  setIsOffer($is_offer)
    {
        $this->is_offer = $is_offer;
        return $this;
    }

     /**
     * @param mixed $offer_ratio
     */
    public function  setOfferRatio($offer_ratio)
    {
        $this->offer_ratio = $offer_ratio;
        return $this;
    }
    ///////// Getters  ////////////////


     /**
     * get product name
     */
    public function getName(): string
    {
       return $this->name;
    }

    /**
     * get description
     */
    public function getDescription(): string
    {
        return $this->description ;
    }

    /**
     * get image
     */
    public function getImage():string
    {
       return $this->image;
    }

    /**
     * get price
     */
    public function getPrice(): double
    {
       return $this->price;
    }

    /**
     * get olde_price
     */
    public function getOldPrice(): double
    {
        return $this->old_price;
    }


    /**
     * get count
     */
    public function getCount(): int
    {
       return $this->count;
    }

    /**
     *get user_id
     */
    public function getUserID(): int
    {
        return $this->user_id;
    }

    /**
     *get category_id
     */
    public function getCategoryID(): int
    {
        return $this->category_id;
    }

    /**
     *get product_status_id
     */
    public function  getProductStatusID(): int
    {
       return $this->product_status_id;
    }

    /**
     * @get is_offer
     */
    public function  getIsOffer(): int
    {
       return $this->is_offer ;
    }

     /**
     * @get offer_ratio
     */
    public function  getOfferRatio(): double
    {
       return $this->offer_ratio;
    }
}
