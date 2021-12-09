<?php

namespace Modules\ProductModule\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\ProductModule\Http\Requests\ProductRequest;
use Modules\ProductModule\Repositories\ProductRepository;
use Modules\ProductModule\Services\ProductService;
use App\Traits\UploadTrait;
use Modules\CartModule\Repositories\CartRepository;
use Modules\CartModule\Repositories\FavoriteRepository;
use Modules\CartModule\Services\CartService;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\ProductImage;
use Modules\ProductModule\Entities\ProductStatus;
use Modules\ProductModule\Enum\ProductEnum;
use Modules\ProductModule\Enum\ProductImageEnum;
use Modules\ProductModule\Services\ProductImageService;
use Modules\CategoryModule\Entities\Category;
use Modules\NotificationModule\Enums\NotificationTemplateKeysEnums;
use Modules\ProductModule\Enum\ProductPositionsEnum;
use Modules\ProductModule\Notifications\ProductNotification;

class ProductController extends Controller
{
    use UploadTrait;

    private $productStatuses;
    private $categories;
    private $productRepository;
    private $cartService;
    private $cartRepository;
    private $favoriteRepository;


    public function __construct()
    {

        //    $this->middleware('permission:product-list'   ,['only' => ['index']]);
        //    $this->middleware('permission:product-show'   ,['only' => ['show']]);
        //    $this->middleware('permission:product-create' ,['only' => ['store']]);
        //    $this->middleware('permission:product-edit'   ,['only' => ['edit','update']]);
        //    $this->middleware('permission:product-delete' ,['only' => ['destroy']]);

        $this->productStatuses          = ProductStatus::all();
        $this->categories               = Category::all();
        $this->productRepository        = new ProductRepository();
        $this->cartService              = new CartService();
        $this->cartRepository           = new CartRepository();
        $this->favoriteRepository       = new FavoriteRepository();
    }

    public function index()
    {
        // if(request()->ajax()){
        //     $products = Product::get();
        //     return datatables($products)->make(true);
        // }

        // return view('productmodule::dashboard.products.index');
    }
    // public function getProducts()
    // {
    //     $products = Product::get();
    //     return datatables($products)
    //     ->addColumn('action', function($products){
    //         return view('productmodule::dashboard.products.action',compact('products'));
    //     })
    //     ->rawColumns(['action'])
    //     ->make(true);
    // }

    public function create()
    {
        return view(
            'productmodule::website.pages.create_update_product',
            [
                'edit'          => false,
                'statuses'      => $this->productStatuses,
                'categories'    => $this->categories,
            ]
        );
    }

    public function store(ProductRequest $request)
    {
        $productService = new ProductService();
        $product = $productService
            ->setName($request->name)
            ->setPrice($request->price)
            ->setOldPrice($request->old_price)
            ->setCount($request->count)
            ->setUserID(Auth::user()->id)
            ->setCategoryID($request->category_id)
            ->setProductStatusID($request->product_status_id)
            ->setDescription($request->description)
            ->setDetails($request->details)
            ->setIsOffer($request->offer_ratio ? 1 : 0)
            ->setOfferRatio($request->offer_ratio)
            ->setImage($request->image)
            ->createProduct();


        if ($request->hasfile('product_images')) {
            foreach ($request->file('product_images') as $file) {
                $productImage = new ProductImageService();
                $productImage->setProductID($product->id);
                $productImage->setImage($file);
                $productImage->createProductImage();
            }
        }
        $productNotification = new ProductNotification();
        $productNotification
        ->setTemplate(NotificationTemplateKeysEnums::CREATE_PRODUCT)
        ->setUser(Auth::user())
        ->setProduct($product)
        ->setCreateProductMessage()
        ->handle();
        return redirect()->back()->with('success', 'Product Created');
    }

    // public function show($id)
    // {
    //  $product= Product::find($id);

    //  if(!$product){
    //     return 'product not found';
    //  }

    // return view('productmodule::website.products.show',compact('product'));
    // }

    public function edit(Product $product)
    {
        if (!$product) {
            abort(404);
            return;
        }

        return view(
            'productmodule::website.pages.create_update_product',
            [
                'edit'              => true,
                'product'           => $product,
                'statuses'          => $this->productStatuses,
                'categories'        => $this->categories,
            ]
        );
    }

    public function update(ProductRequest $request, Product $product)
    {
        if (!$product) {
            abort(404);
            return;
        }
        $productService = new ProductService();

        $productService
            ->setName($request->name)
            ->setPrice($request->price)
            ->setOldPrice($request->old_price)
            ->setCount($request->count)
            ->setCategoryID($request->category_id)
            ->setProductStatusID($request->product_status_id)
            ->setDescription($request->description)
            ->setDetails($request->details)
            ->setIsOffer($request->offer_ratio ? 1 : 0)
            ->setOfferRatio($request->offer_ratio);
        if ($request->has('image')) {
            $productService->setImage($request->image);
        }
        $product = $productService->updateProduct($product);

        if ($request->hasfile('product_images')) {
            foreach ($request->file('product_images') as $file) {
                $productImage = new ProductImageService();
                $productImage->setProductID($product->id);
                $productImage->setImage($file);
                $productImage->createProductImage();
            }
        }
        return redirect()->back()->with('success', 'Product Updated');
    }



    public function getProductDetails(Product $product)
    {
        $user               = Auth::user();
        $product            = $this->productRepository->getProductDetails($product);
        $cart               = $this->cartService->getUserCart($user);
        $items              = $this->cartRepository->getCartItems($cart);
        $favorites          = $this->favoriteRepository->getUserFavoriteProduct($user);

        return view('productmodule::website.product.index', compact('product', 'cart', 'items', 'favorites'));
    }

    // public function getUserProducts($name)
    // {
    //     $user           = User::where('name' , $name)->first();
    //     if (!$user){
    //         abort(404);
    //     }

    //     $currantUser    = Auth::user();
    //     $isCurrantUser  = $currantUser->name === $user->name;

    //     $data           = $this->productRepository->getUserProducts($user);

    //     $categories     = Category::all();
    //     $statuses       = ProductStatus::all();

    //     return view('productmodule::website.products.index', compact('data','user','categories', 'statuses','isCurrantUser'));
    // }


}
