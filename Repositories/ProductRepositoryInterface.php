<?php

namespace Modules\ProductModule\Repositories;

use App\Models\User;

interface ProductRepositoryInterface
{
    public function getProducts();

    public function getUserProducts(User $user);
}
