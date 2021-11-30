<?php

namespace Modules\ProductModule\Http\Livewire\Slide;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\CartModule\Repositories\CartRepository;
use Modules\CartModule\Repositories\FavoriteRepository;
use Modules\CartModule\Services\CartService;
use Modules\ProductModule\Repositories\ProductRepository;

class Slide extends Component
{
    private $cartRepository;
    private $favoriteRepository;
    private $productRepository;

    public  $data;
    public  $currantUser;
    private $cartService;
    public  $cart;
    public  $items;
    public  $favorites;

    public function __construct()
    {
        $this->cartRepository       = new CartRepository();
        $this->favoriteRepository   = new FavoriteRepository();
        $this->productRepository    = new ProductRepository();
        $this->cartService          = new CartService();
    }

    public function mount()
    {
        $this->currantUser          = Auth::user();
        $this->data                 = $this->productRepository->getProducts();
        $this->cart                 = $this->cartService->getUserCart($this->currantUser);
        $this->items                = $this->cartRepository->getCartItems($this->cart);
        $this->favorites            = $this->favoriteRepository->getUserFavoriteProduct($this->currantUser);
    }

    public function render()
    {
        return view('productmodule::livewire.slide.slide');
    }
}