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
            'products'  => $user->products()->with(['category', 'status', 'comments', 'images'])->paginate(10)
        ];
    }
}
