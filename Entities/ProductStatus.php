<?php

namespace Modules\ProductModule\Entities;
use Modules\ProductModule\Entities\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // protected static function newFactory()
    // {
    //     return \Modules\ProductModule\Database\factories\ProductStatusFactory::new();
    // }
}
