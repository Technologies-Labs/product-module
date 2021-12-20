<?php

namespace Modules\Product\Entities;

use Modules\Product\Entities\ProductImage;
use Modules\Product\Entities\ProductStatus;
use Modules\Comment\Entities\Comment;
use Modules\Category\Entities\Category;
use App\Models\User;
use Database\Factories\ProductsFactory;
use Modules\User\Entities\Company;
use Modules\User\Entities\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Cart\Entities\Cart;
use Modules\Product\Scopes\ProductScope;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected static function booted()
    {
        static::addGlobalScope(new ProductScope);
    }



    //////  Relationships /////

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_item');
    }
    // public function carts()
    // {
    //     return $this->morphToMany(CartItem::class,'itemable');
    // }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function status()
    {
        return $this->belongsTo(ProductStatus::class, 'product_status_id');
    }

    protected static function newFactory()
    {
        return ProductsFactory::new();
    }
}
