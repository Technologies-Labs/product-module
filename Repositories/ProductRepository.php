<?php

namespace Modules\ProductModule\Repositories;
use App\Models\User;
use Modules\ProductModule\Entities\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getUserProducts(User $user)
    {
        return [
            'user'      => $user,
            'products'  => $user->products()->with(['category', 'status', 'comments'])->paginate(10)
        ];
    }

    public function getProducts($paginate = 10)
    {
        return [
            'products'  => Product::with(['user','comments'])->orderBy('id','DESC')->paginate($paginate)
        ];
    }

    public function getProductDetails(Product $product)
    {

        return [
            'product'       => $product,
            'user'          => $product->user,
            'category'      => $product->category,
            'status'        => $product->status,
            'comments'      => $product->comments()->with('user')->get(),
            'images'        => $product->images,
        ];
    }

    public function getProductsByPosition($type,$paginate = 30)
    {
        return Product::wherePosition($type)->orderBy('id','DESC')->with(['user','status'])->paginate(30);

    }


}
