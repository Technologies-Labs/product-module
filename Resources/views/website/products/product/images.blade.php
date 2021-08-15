<div class="post-details text-center">
    <ul class="product-gallery">
        <li>
            <a href="{{asset($product->image)}}" data-fancybox="{{$product->id}}">
                <img src="{{asset($product->image)}}" alt="">
            </a>
        </li>
        @foreach ($product->images as $image)
            <li >
                <a href="{{asset($image->image)}}" data-fancybox="{{$product->id}}">
                    <img src="{{asset($image->image)}}" alt="">
                </a>
            </li>
        @endforeach
    </ul>

</div>
