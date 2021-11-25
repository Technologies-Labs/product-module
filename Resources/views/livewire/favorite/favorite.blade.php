<a wire:click="addFavoriteProduct()"  title="" href="javascript:void(0);"><i style="color: {{$favoriteCssClass}}" class="icofont-heart mr-2"></i>
    @if (!$favoriteCssClass) Add To Favorites @else Remove From Favorites @endif
    <span wire:loading class="sp sp-circle"></span>
</a>

{{-- <span class="like  fav {{$favoriteCssClass}}" data-toggle="tooltip"
    title = @if (!$favoriteCssClass) 'Add To Favorites' @else 'Remove From Favorites' @endif>
    <i wire:click="addFavoriteProduct()" class="fa  fa-heart"></i>
</span> --}}
