<a wire:click="addCartItem()" title="" href="javascript:void(0);"><i style="color: {{$cssClass}}" class="icofont-shopping-cart mr-2"></i>
    @if (!$cssClass) Add To Cart @else Remove From Cart @endif
    <span wire:loading class="sp sp-circle"></span>
</a>
{{-- <span class="like  fav {{$cssClass}}" data-toggle="tooltip"
    title = @if (!$cssClass) 'Add To Cart' @else 'Remove From Cart' @endif>
    <i wire:click="addCartItem()" class="fa  fa-shopping-cart"></i>
</span> --}}
