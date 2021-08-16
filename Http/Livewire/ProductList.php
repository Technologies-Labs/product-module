<?php

namespace Modules\ProductModule\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\CartModule\Repositories\CartRepository;
use Modules\CartModule\Services\CartService;

class ProductList extends Component
{
    public  $data;
    private $cartRepository;
    private $cartService;
    public  $cart;
    public  $items;
    public  $currantUser;
    public  $isCurrantUser;

    public function mount()
    {
        $this->cartRepository   = new CartRepository();
        $this->cartService      = new CartService();
        $this->currantUser      = Auth::user();
        $this->cart             = $this->cartService->getUserCart($this->currantUser);
        $this->items            = $this->cartRepository->getCartItems($this->cart);
        $this->isCurrantUser    = $this->currantUser->name === $this->data['user']->name;
    }
    public function render()
    {
        return view('productmodule::livewire.product-list');
    }
}
