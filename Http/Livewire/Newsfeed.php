<?php

namespace Modules\ProductModule\Http\Livewire;

use Auth;
use Livewire\Component;
use Modules\CartModule\Repositories\CartRepository;
use Modules\CartModule\Repositories\FavoriteRepository;
use Modules\CartModule\Services\CartService;
use Modules\ProductModule\Repositories\ProductRepository;

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

    public  $perPage = 1;

    public function loadMore()
    {
        $this->perPage += 1;
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

        return view('productmodule::livewire.newsfeed',[
            'products'      => $products,
        ]);
    }
}
