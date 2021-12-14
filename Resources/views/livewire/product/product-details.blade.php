<div class="main-wraper">
    @php
    use Modules\ProductModule\Enum\ProductEnum;
    @endphp
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6" style="padding: 0 38px;">
            <div class="product-details-left">
                <span id="new">{{$product['status']->name}}</span>
                <div class="product-details-images slider-navigation-1">
                    @foreach ($product['images'] as $image)
                    <div class="lg-image">
                        <a class="popup-img venobox vbox-item" href="{{ asset('storage') }}/{{$image->image}}"
                            data-gall="myGallery">
                            <img src="{{ asset('storage') }}/{{ProductEnum::IMAGE}}{{$image->image}}" alt="product image">
                        </a>
                    </div>
                    @endforeach


                </div>

                <div class="product-details-thumbs slider-thumbs-1">
                    @foreach ($product['images'] as $image)
                    <div class="sm-image"><img src="{{ asset('storage') }}/{{ProductEnum::IMAGE}}{{$image->image}}" alt="product image thumb">
                    </div>
                    @endforeach


                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="prod-detail">
                <div class="friend-info">
                    <figure>
                        @if ($product['user']->is_verified)
                        <em>
                            <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="15"
                                height="15" viewBox="0 0 24 24">
                                <path fill="#7fba00" stroke="#7fba00"
                                    d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
                                </path>
                            </svg></em>
                        @endif

                        <img alt="" src="{{ asset('storage') }}/{{$product['user']->image}}">
                    </figure>
                    <div class="friend-name">
                        <ins><a title=""
                                href="{{ route('user.profile', ['name' => $product['user']->name]) }}">{{$product['user']->full_name}}</a></ins>
                        <span><i class="icofont-globe"></i> published:
                            {{$product['product']->created_at->diffForHumans()}}</span>
                    </div>
                </div>

                <h4 class="uk-heading-line"><span>{{$product['product']->name}}</span></h4>
                <span class="mb-0">
                    <p class="product-single__price mt-3">
                        @empty(!$product['product']->old_price)
                        <s class="old-price">
                            <span>YEM {{$product['product']->old_price}}</span>
                        </s>
                        @endempty

                        <span class="new-price">
                            <span>YEM {{$product['product']->price}}</span>
                        </span>

                        @if ($product['product']->is_offer && $product['product']->offer_ratio != null)
                        <span class="discount">
                            <span>|</span>&nbsp;
                            <span class="off">(<span>{{$product['product']->offer_ratio}}</span>%)</span>
                        </span>
                        @endif

                    </p>
                </span>
                <p>
                    {!!$product['product']->description!!}
                </p>
                <ul class="item-info">
                    <li><span>Category : </span> <a>{{$product['category']->name}}</a></li>
                    <li><span>Quantity : </span> {{$product['product']->count}}</li>
                    <li><span>Status : </span> {{$product['status']->name}} </li>
                </ul>

                <div class="sale-button">
                    <livewire:productmodule::cart.cart
                    :product="$product['product']"
                    :wire:key="$product['product']->id"
                    :cart="$cart"
                    :items="$items"
                    :template="'product'" />

                    <livewire:productmodule::favorite.favorite
                    :product="$product['product']"
                    :wire:key="$product['product']->id"
                    :favorites="$favorites"
                    :template="'product'"
                     />
                </div>

                <div class="social-media mt-5">
                    @php
                        $facebook =  Share::page(url()->current())->facebook()->getRawLinks();
                        $twitter =  Share::page(url()->current())->twitter()->getRawLinks();
                        $whatsapp =  Share::page(url()->current())->whatsapp()->getRawLinks();

                    @endphp
                    <ul>
                        <li><a href="{{$facebook}}"  target="_blank" class="facebook"><i class="icofont-facebook"></i></a></li>
                        <li><a href="{{$twitter}}" target="_blank" class="twitter"><i class="icofont-twitter"></i></a></li>
                        <li><a href="{{$whatsapp}}" target="_blank" class="whatsapp"><i class="icofont-whatsapp"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
    <ul class="nav nav-tabs post-detail-btn" id="details">
        <li class="nav-item"><a class="active" href="#desc" data-toggle="tab">تفاصيل</a></li>
        <li class="nav-item"><a class="" href="#comment" data-toggle="tab">تعليقات</a></li>
    </ul>

    <div class="tab-content" style="padding: 0 30px">

        <div class="tab-pane fade show active" id="desc">
            <div class="event-desc mt-5">
                {!! $product['product']->details !!}
            </div>
        </div>

        <div class="tab-pane fade" id="comment">
            <livewire:productmodule::product.product-comments :product="$product['product']" :template="'product'"/>
        </div>
    </div>

</div>
