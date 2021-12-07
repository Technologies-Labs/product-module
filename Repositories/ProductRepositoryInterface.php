<?php

namespace Modules\ProductModule\Repositories;

use App\Models\User;

interface ProductRepositoryInterface
{
    public function getUserProducts(User $user , $perPage , $page);
}
