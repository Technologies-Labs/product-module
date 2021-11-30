<ul class="cart-optionz">
    <li>
        <livewire:productmodule::favorite.option-favorite
            :product="$product"
            :wire:key="$product->id"
            :favorites="$favorites"
            :favoriteCssClass="$favoriteCssClass"/>
    </li>
    <li>
        <livewire:productmodule::cart.option-cart
            :product="$product"
            :wire:key="$product->id"
            :cart="$cart"
            :items="$items"
            :cartCssClass="$cartCssClass"/>
    </li>
</ul>
