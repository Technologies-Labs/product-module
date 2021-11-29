<?php

namespace Modules\ProductModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;

    protected $guarded = [];


    //////  Relationships /////

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // protected static function newFactory()
    // {
    //     return \Modules\ProductModule\Database\factories\ProductImagesFactory::new();
    // }
}
