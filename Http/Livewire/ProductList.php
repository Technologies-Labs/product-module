<?php

namespace Modules\ProductModule\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\CartModule\Repositories\CartRepository;
use Modules\CartModule\Repositories\FavoriteRepository;
use Modules\CartModule\Services\CartService;

class ProductList extends Component
{
    public  $data;
    private $cartRepository;
    private $cartService;
    public  $cart;
    public  $items;
    public  $favorites;

    public function __construct()
    {
        $this->cartRepository       = new CartRepository();
        $this->cartService          = new CartService();
        $this->favoriteRepository   = new FavoriteRepository();
        $this->cart                 = $this->cartService->getUserCart(Auth::user());
        $this->items                = $this->cartRepository->getCartItems($this->cart);
        $this->favorites            = $this->favoriteRepository->getUserFavoriteProduct(Auth::user());
    }
    public function render()
    {
        return view('productmodule::livewire.product-list');
    }
}
