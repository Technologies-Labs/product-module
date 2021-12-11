@if (!$isCurrantUser && Auth::check())
@can('favourite-item-create')
<livewire:productmodule::favorite.favorite
    :product="$product"
    :wire:key="$product->id"
    :favorites="$favorites"
    :favoriteCssClass="$favoriteCssClass" />
@endcan

@can('cart-item-create')
<livewire:productmodule::cart.cart
    :product="$product"
    :wire:key="$product->id"
    :cart="$cart"
    :items="$items"
    :cssClass="$cssClass" />
@endcan

@endif

<a  title="" href="#" class="comment-to"><i class="icofont-comment"></i> Comment</a>
