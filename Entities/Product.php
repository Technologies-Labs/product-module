<?php

namespace Modules\ProductModule\Entities;

use  Modules\ProductModule\Entities\ProductImage;
use  Modules\ProductModule\Entities\ProductStatus;
use  Modules\CommentModule\Entities\Comment;
use  Modules\CategoryModule\Entities\Category;
use  App\Models\User;
use  Modules\UserModule\Entities\Company;
use  Modules\UserModule\Entities\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CartModule\Entities\Cart;
use Modules\ProductModule\Scopes\ProductScope;

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
        return \Modules\ProductModule\Database\factories\ProductFactory::new();
    }
}
