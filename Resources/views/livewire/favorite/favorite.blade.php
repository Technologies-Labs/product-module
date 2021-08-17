<span class="like  fav {{$favoriteCssClass}}" data-toggle="tooltip"
    title = @if (!$favoriteCssClass) 'Add To Favorites' @else 'Remove From Favorites' @endif>
    <i wire:click="addFavoriteProduct()" class="fa  fa-heart"></i>
</span>
