<?php

namespace Modules\Product\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ProductScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('id','DESC');
    }
}
