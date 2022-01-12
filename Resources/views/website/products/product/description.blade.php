@php
    use Modules\Product\Enum\ProductEnum;
@endphp
<figure id="main">
    <a href="{{route('show.product',$product)}}"><img src="{{asset('storage')}}/{{ProductEnum::IMAGE}}{{$product->image}}" alt=""></a>
</figure>
<a href="{{route('show.product',$product)}}" class="post-title" target="_blank">{{$product->name}}</a>
<div class="details">
    {!!$product->description !!}
    {{-- <p class="details"></p> --}}
</div>
<p class="product-single__price" style="margin-bottom: 9px;">
    @if(!$product->old_price)
        <span class="price">YEM {{$product->price}}</span>
    @else
        <span class="new-price">YEM {{$product->price}}</span>
        <s class="old-price">
            <span>YEM {{$product->old_price}}</span>
        </s>
    @endif
{{--    @empty(!$product->old_price)--}}
{{--    <s class="old-price">--}}
{{--        <span>YEM {{$product->old_price}}</span>--}}
{{--    </s>--}}
{{--    @endempty--}}

{{--    <span class="new-price">--}}
{{--        <span>YEM {{$product->price}}</span>--}}
{{--    </span>--}}
    @if ($product->is_offer && $product->offer_ratio != null)
    <span class="discount">
        <span>|</span>&nbsp;
        <span class="off">(<span>{{$product->offer_ratio}}</span>%)</span>
    </span>
    @endif

</p>

{{-- <div class="description">
    <p>
        <span class="cat-heading">Name     :</span> <a href="{{route('products.show',$product->id)}}" title="">{{$product->name}}</a>,
        <span class="cat-heading">Category :</span> {{$product->category->name}},
        <span class="cat-heading">Status   :</span> {{$product->status->name}} ,
        <span class="cat-heading">Price    :</span> {{$product->price}}
    </p>

    <p> {{$product->description}} </p>
</div> --}}
