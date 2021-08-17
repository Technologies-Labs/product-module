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
    public  $currantUser;
    public  $isCurrantUser;

    public function mount()
    {
        $this->cartRepository       = new CartRepository();
        $this->favoriteRepository   = new FavoriteRepository();
        $this->cartService          = new CartService();
        $this->currantUser          = Auth::user();
        $this->cart                 = $this->cartService->getUserCart($this->currantUser);
        $this->items                = $this->cartRepository->getCartItems($this->cart);
        $this->isCurrantUser        = $this->currantUser->name === $this->data['user']->name;
        $this->favorites            = $this->favoriteRepository->getUserFavoriteProduct($this->currantUser);
    }
    public function render()
    {
        return view('productmodule::livewire.product-list');
    }
}
