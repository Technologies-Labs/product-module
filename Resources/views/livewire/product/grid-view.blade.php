<div id="grid-view" class="tab-pane fade">
    <div class=" main-wraper" id="product">
        <div class="row">
            @foreach ($data['products'] as $product)
            <div class="col-lg-4 col-md-4 col-sm-6" id="single-product">
                <div class="friend-info">
                    <figure>
                        @if ($user->is_verified)
                            <em>
                                <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                     viewBox="0 0 24 24">
                                    <path fill="#7fba00" stroke="#7fba00"
                                          d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                    </path>
                                </svg>
                            </em>
                        @endif
                        <img alt="" src="{{ asset('storage') }}/{{$user->image}}">
                    </figure>
                    <div class="friend-name">
                        <ins><a title="" href="time-line.html">{{$user->name}}</a></ins>
                    </div>
                </div>
                <div class="uk-card uk-card-default uk-card-body friendz">
                    <figure class="uk-inline uk-margin">
                        <img src="{{asset('storage')}}/{{$product->image}}" alt="">
                        @if ($product->is_offer && $product->offer_ratio != null)
                            <em id="discount">{{$product->offer_ratio}}%</em>
                        @endif
                    </figure>
                </div>
                <span id="product-name"><a href="{{route('products.show',$product->id)}}" title="">{{$product->name}}</a></span>
                <p class="product-single__price ">
                    <span>
                        @if(!$product->old_price)
                            <span class="price">YEM {{$product->price}}</span>
                        @else
                            <span class="new-price">YEM {{$product->price}}</span>
                            <s class="old-price" style="margin-left: 0">
                                <span>YEM {{$product->old_price}}</span>
                            </s>
                        @endif
                    </span>
                </p>
            </div>
            @endforeach
        </div>
    </div>
    @include('components.loading')
</div>