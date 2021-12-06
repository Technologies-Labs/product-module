<div class="main-wraper" id="grid-view">
    @php
    use Modules\ProductModule\Enum\ProductEnum;
    @endphp
    <h4 class="main-title">Related Products
        {{-- <a class="view-all" href="#" title="">view all</a> --}}
    </h4>
    <div class="books-caro row">
        @foreach ($products as $product)

        <div class="book-post" id="single-product">
            @livewire('usermodule::user.user-header-information', ['user' => $product->user , 'product' => $product], key($product->id))


            <div class="uk-card uk-card-default uk-card-body friendz">
                <figure class="uk-inline uk-margin">
                    <img src="{{ asset('storage') }}/{{ProductEnum::IMAGE}}{{$product->image}}" alt="">
                    <em id="discount">{{$product->status->name}}</em>

                </figure>
            </div>
            <span id="product-name">
                <a href="{{ route('show.product', ['product' => $product]) }}" title="">{{$product->name}}</a>
            </span>
            <p class="product-single__price ">
                <span>
                    <span class="new-price">
                        YER {{$product->price}}
                    </span>
                    @empty(!$product->old_price)
                    <s class="old-price">
                        YER {{$product->old_price}}
                    </s>
                    @endempty

                </span>
            </p>
        </div>
        @endforeach

    </div>
</div>
