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

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
        $this->cartService    = new CartService();
        $this->cart           = $this->cartService->getUserCart(Auth::user());
        $this->items          = $this->cartRepository->getCartItems($this->cart);
    }
    public function render()
    {
        return view('productmodule::livewire.product-list');
    }
}
