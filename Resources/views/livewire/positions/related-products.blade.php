<div class="main-wraper" id="grid-view">
    <h4 class="main-title">Related Products
        {{-- <a class="view-all" href="#" title="">view all</a> --}}
    </h4>
    <div class="books-caro row">
        @foreach ($products as $product)
    
        <div class="book-post" id="single-product">

            <div class="friend-info">
                <figure>
                    @if ($product->user->is_verified)
                    <em>
                        <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                            viewBox="0 0 24 24">
                            <path fill="#7fba00" stroke="#7fba00"
                                d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                            </path>
                        </svg>
                    </em>
                    @endif

                    <img alt="" src="{{ asset('storage') }}/{{$product->user->image}}">
                </figure>
                <div class="friend-name">
                    <ins><a title="" href="{{ route('user.profile', ['name' => $product->user->name]) }}">{{$product->user->name}}</a></ins>
                </div>
            </div>

            <div class="uk-card uk-card-default uk-card-body friendz">
                <figure class="uk-inline uk-margin">
                    <img src="{{ asset('storage') }}/{{$product->image}}" alt="">
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
