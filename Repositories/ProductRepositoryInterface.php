<?php

namespace Modules\Product\Repositories;

use App\Models\User;

interface ProductRepositoryInterface
{
    public function getUserProducts(User $user , $perPage , $page);
}
