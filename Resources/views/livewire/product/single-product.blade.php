<div class="book-post" id="single-product">
    <div class="friend-info">
        @include('productmodule::website.products.slide.user')
    </div>
    <div class="uk-card uk-card-default uk-card-body friendz">
        <figure class="uk-inline uk-margin">
            <img src={{asset('storage')}}/{{$product->image}} alt="">
            @if ($product->is_offer && $product->offer_ratio != null)
                 <em id="discount">{{$product->offer_ratio}}</em>
            @endif
            @include('productmodule::website.products.slide.cart_options')
        </figure>
        <p class="details">{{$product->description}}</p>
    </div>
    <span id="product-name"><a href="{{route('products.show',$product->id)}}" title="">{{$product->name}}</a></span>
    <p class="product-single__price ">
        @if(!$product->old_price)
            <span class="price">YEM {{$product->price}}</span>
        @else
            <span class="new-price">YEM {{$product->price}}</span>
            <s class="old-price">
                <span>YEM {{$product->old_price}}</span>
            </s>
        @endif
    </p>
</div>
