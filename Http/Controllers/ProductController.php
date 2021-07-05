<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\ProductModule\Http\Requests\ProductRequest;
use Modules\ProductModule\Services\ProductService;
use App\Traits\UploadTrait;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\ProductImage;
use Modules\ProductModule\Entities\ProductStatus;
use Modules\ProductModule\Enum\ProductEnum;
use Modules\ProductModule\Enum\ProductImageEnum;
use Modules\ProductModule\Services\ProductImageService;
use Modules\CategoryModule\Entities\Category;

class ProductController extends Controller
{
    use UploadTrait;

    private $productStatuses;
    private $categories;

    public function __construct(){

    //    $this->middleware('permission:product-list'   ,['only' => ['index']]);
    //    $this->middleware('permission:product-show'   ,['only' => ['show']]);
    //    $this->middleware('permission:product-create' ,['only' => ['store']]);
    //    $this->middleware('permission:product-edit'   ,['only' => ['edit','update']]);
    //    $this->middleware('permission:product-delete' ,['only' => ['destroy']]);

       $this->productStatuses =ProductStatus::all();
        //$this->categories   =Category::all();
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(request()->ajax()){

            $products = Product::get();
            return datatables($products)->make(true);
        }
        
        return view('productmodule::dashboard.products.index');
    }
    public function getProducts()
    {
        $products = Product::get();
        return datatables($products)
        ->addColumn('action', function($products){
            return view('productmodule::dashboard.products.action',compact('products'));
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('productmodule::website.create',
        [
            'productStatuses'=>$this->productStatuses,
            'categories'=>$this->categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProductRequest $request)
    {
        $productService =new ProductService();
        $productService ->setName           ($request->name)
                        ->setPrice          ($request->price)
                        ->setOldPrice       ($request->old_price)
                        ->setCount          ($request->count)
                        ->setUserID         (Auth::user()->id)
                        ->setCategoryID     ($request->category_id)
                        ->setProductStatusID($request->product_status_id)
                        ->setDescription    ($request->description)
                        ->setIsOffer        ($request->is_offer)
                        ->setOfferRatio     ($request->offer_ratio);
                        $productService->setImage($request->image);
                        if($request->has('image')){
                            $productService->setImage($request->image);
                        }
        $newProduct= $productService->createProduct();

        if ($request->hasfile('product_images')) {
            foreach ($request->file('product_images') as $file) {
                $image        =$this->storeImage($file,ProductImageEnum::PRODUCT_IMAGES_PATH);
                $productImage = new ProductImageService();
                $productImage->setProductID($newProduct->id);
                $productImage->setImage($image);
                $productImage->createProductImage();
            }
        }
        return 'saved';
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
     $product= Product::find($id);
     if(!$product){
        return 'product not found';
    }
      return $product;
        // return view('productmodule::website.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product= Product::find($id);
        if(!$product){
            return 'product not found';
        }
        $productStatuses = ProductStatus::get();
        return view('productmodule::website.edit',
        [
            'product'         =>$product,
            'productStatuses' =>$this->productStatuses,
            'categories'      =>$this->categories,
        ]);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if(!$product){
            return "product not found";
        }

        $productService =new ProductService();
        $productService ->setName           ($request->name)
                        ->setPrice          ($request->price)
                        ->setOldPrice       ($request->old_price)
                        ->setCount          ($request->count)
                        ->setCategoryID     ($request->category_id)
                        ->setProductStatusID($request->product_status_id)
                        ->setDescription    ($request->description)
                        ->setIsOffer        ($request->is_offer)
                        ->setOfferRatio     ($request->offer_ratio);
                        if($request->has('image')){
                        $productService->updateImg($request->image ,$product->image);
                        }
        $updatedProduct = $productService->updateProduct($product);

        if ($request->hasfile('product_images')) {
            foreach ($request->file('product_images') as $file) {

                $image        =$this->storeImage($file,ProductImageEnum::PRODUCT_IMAGES_PATH);
                $productImage =new ProductImageService();
                $productImage->setProductID($product->id);
                $productImage->setImage($image);
                $productImage->createProductImage();
            }
        }

         return $updatedProduct->name;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(!$product)
        {
            return 'product not found';
        }

        return $product->delete();
    }

      /**
     * Remove the specified product image storage.
     * @param int $id
     * @return Renderable
     */
    public function deleteProductImage($id)
    {
        $image = ProductImage::find($id);
        if(!$image)
        {
            return 'product image not found';
        }

        return $this->deleteImage($image->image);

    }


}
