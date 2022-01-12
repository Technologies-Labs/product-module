<div class="widget stick-widget">
    @php
    use Modules\Product\Enum\ProductEnum;
    @endphp
    <h4 class="widget-title">المنتجات الشائعة</h4>
    @foreach ($products as $product)
    <div class="popular-book">
        <figure><img src="{{ asset('storage') }}/{{ProductEnum::IMAGE}}{{$product->image}}" alt=""></figure>
        <div class="book-about">
            <h6><a href="{{ route('show.product', ['product' => $product]) }}" title="">{{$product->name}}</a></h6>
            <span><a href="{{ route('user.profile', ['name' => $product->user->name]) }}">{{$product->user->full_name}}</a></span>
            {{-- <a href="#" title="Book Mark"><i class="icofont-cart-alt ml-2"></i></a>
            <a href="#" title="Book Mark"><i class="icofont-heart"></i></a> --}}
        </div>
    </div>
    @endforeach

</div>
