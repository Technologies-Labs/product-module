<livewire:productmodule::favorite.favorite
:product="$product"
:wire:key="$product->id"
:favorites="$favorites"
:favoriteCssClass="$favoriteCssClass" />

<livewire:productmodule::cart.cart
:product="$product"
:wire:key="$product->id"
:cart="$cart"
:items="$items"
:cssClass="$cssClass" />

<a  title="" href="#" class="comment-to"><i class="icofont-comment"></i> Comment</a>

{{-- <a title="" href="#" class="share-to"><i class="icofont-share-alt"></i> Share</a> --}}
{{-- <div class="we-video-info">
    <ul>
        <li>
            <span class="comment" data-toggle="tooltip" title="Comments">
                <a class="edit-link" data-toggle="modal" href="#comments_product{{$product->id}}">
                    <i class="fa fa-comments-o"></i>
                </a>
                <ins>52</ins>
            </span>
        </li>
        @if(!$isCurrantUser)
        <li>
            <livewire:productmodule::favorite.favorite :product="$product" :wire:key="$product->id"
                :favorites="$favorites" :favoriteCssClass="$favoriteCssClass" />
        </li>
        <li>
            <livewire:productmodule::cart.cart :product="$product" :wire:key="$product->id" :cart="$cart"
                :items="$items" :cssClass="$cssClass" />
        </li>
        @endif
        @include('productmodule::website.products.product.social_media')
    </ul>
</div> --}}
