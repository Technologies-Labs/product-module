<?php

namespace Modules\ProductModule\Http\Livewire\Product;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\CartModule\Repositories\CartRepository;
use Modules\CartModule\Repositories\FavoriteRepository;
use Modules\CartModule\Services\CartService;
use Modules\ProductModule\Repositories\ProductRepository;

class ListView extends Component
{
    private $cartRepository;
    private $favoriteRepository;
    private $productRepository;

    public  $isCurrantUser;

    public  $data;
    private $cartService;
    public  $cart;
    public  $items;
    public  $favorites;
    public  $currantUser;

    public function __construct()
    {
        $this->cartRepository       = new CartRepository();
        $this->favoriteRepository   = new FavoriteRepository();
        $this->cartService          = new CartService();
        $this->productRepository    = new ProductRepository();
    }

    public function mount()
    {
        $this->data                 = $this->productRepository->getProducts();
        $this->currantUser          = Auth::user();
        $this->cart                 = $this->cartService->getUserCart($this->currantUser);
        $this->items                = $this->cartRepository->getCartItems($this->cart);
        $this->favorites            = $this->favoriteRepository->getUserFavoriteProduct($this->currantUser);
    }

    public function render()
    {
        return view('productmodule::livewire.product.list-view');
    }
}
