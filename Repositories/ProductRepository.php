<?php

namespace Modules\ProductModule\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\ProductModule\Entities\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getProducts()
    {
        return [
            'user'      => Auth::user(),
            'products'  => Product::with(['category', 'status', 'comments', 'images'])->paginate(10)
        ];
    }

    public function getUserProducts(User $user)
    {
        return [
            'user'      => $user,
            'products'  => $user->products()->with(['category', 'status', 'comments', 'images'])->paginate(10)
        ];
    }
}
