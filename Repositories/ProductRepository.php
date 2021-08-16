<?php

namespace Modules\ProductModule\Repositories;
use App\Models\User;
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
