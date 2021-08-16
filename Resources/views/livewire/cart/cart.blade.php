<span class="like  fav {{$cssClass}}" data-toggle="tooltip"
    title = @if (!$cssClass) 'Add To Cart' @else 'Remove From Cart' @endif>
    <i wire:click="addCartItem()" class="fa  fa-shopping-cart"></i>
</span>
