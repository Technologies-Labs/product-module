<?php


namespace Modules\ProductModule\Repositories;


use App\Models\User;
use Modules\ProductModule\Entities\Product;
use Spatie\QueryBuilder\QueryBuilder;

class ProductRepository implements ProductRepositoryInterface
{
    public function getUserProducts(User $user)
    {
        return [
            'user'      => $user,
            'products'  => $user->products()->paginate(10)
        ];
    }
}
