<?php

namespace Modules\Product\Http\Livewire;

use Auth;
use Livewire\Component;
use Modules\Cart\Repositories\CartRepository;
use Modules\Cart\Repositories\FavoriteRepository;
use Modules\Cart\Services\CartService;
use Modules\Product\Repositories\ProductRepository;

class Newsfeed extends Component
{
    private $cartService;
    private $cartRepository;
    private $favoriteRepository;
    private $productRepository;

    public  $data;

    public  $cart;
    public  $items;
    public  $favorites;
    public  $currantUser;

    public  $perPage = 10;

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function boot()
    {
        $this->currantUser          = Auth::user();
        $this->cartRepository       = new CartRepository();
        $this->favoriteRepository   = new FavoriteRepository();
        $this->cartService          = new CartService();

        $this->productRepository    = new ProductRepository();
    }

    // public function booted()
    // {
    //     $this->cart                 = ($this->currantUser) ? $this->cartService->getUserCart($this->currantUser) : null ;
    //     $this->items                = ($this->currantUser) ? $this->cartRepository->getCartItems($this->cart) : null;

    //     $this->favorites            = ($this->currantUser) ? $this->favoriteRepository->getUserFavoriteProduct($this->currantUser) : null;
    // }

    // public function __construct()
    // {
    //     $this->cartRepository       = new CartRepository();
    //     $this->favoriteRepository   = new FavoriteRepository();
    //     $this->cartService          = new CartService();

    //     $this->productRepository    = new ProductRepository();
    // }

    public function booted()
    {
        $this->cart                 = ($this->currantUser) ? $this->cartService->getUserCart($this->currantUser) : null ;
        $this->items                = ($this->currantUser) ? $this->cartRepository->getCartItems($this->cart) : null;
        $this->favorites            = ($this->currantUser) ? $this->favoriteRepository->getUserFavoriteProduct($this->currantUser) : null;
    }

    public function render()
    {
        $products = $this->productRepository->getProducts($this->perPage)['products'];

        return view('product::livewire.newsfeed',[
            'products'      => $products,
        ]);
    }
}
