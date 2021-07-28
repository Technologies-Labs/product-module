@extends('layouts.simple.master')
@section('css')
@endsection

@section('style')
@endsection

@section('user-profile')
    @widget('user-profile',['user_id'=>1])
@endsection

@section('content')
<section>
    <div class="gap100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="prod-detail">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="prod-avatar">
                                    <ul class="slider-for-gold product-detail-gallery">
                                        @foreach ($product->images as $image)
                                            <li>
                                                <a href="{{asset($image->image)}}"  data-fancybox="gallery">
                                                    <img src="{{asset($image->image)}}" alt="product image">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="slider-nav-gold">

                                        @foreach ($product->images as $image)
                                            <li>
                                                <img src="{{asset($image->image)}}" alt="product image">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="full-postmeta">

                                    <span class="prices style2">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span>{{$product->price}}
                                            </span>
                                        </ins>
                                        <del>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span>{{$product->old_price}}
                                            </span>
                                        </del>
                                    </span>

                                    <h4>{{$product->name}}</h4>

                                    <div class="description">
                                        <p>
                                            <span class="cat-heading">Category  :</span><span  class="detail">{{$product->category->name}}</span> <br>
                                            <span class="cat-heading">Status    :</span><span  class="detail">{{$product->status->name}} </span> <br>

                                        </p>

                                    </div>

                                    <p style="margin-top: 10px;">
                                        {{$product->description}}
                                    </p>


                                    <a class="add_to_cart" title="" href="#"><i class="fa fa-shopping-cart"></i></a>

                                    <a class="add_to_wishlist fav" href="#" title=""><i class="fa fa-heart filled"></i></a>
                                    <div class="share">
                                        <span>share</span>
                                        <a href="#" title=""><i class="fa fa-facebook-square"></i></a>
                                        <a href="#" title=""><i class="fa fa-twitter-square"></i></a>
                                        <a href="#" title=""><i class="fa fa-google-plus-square"></i></a>
                                    </div>
                                    <div class="extras">
                            <a href="https://www.youtube.com/watch?v=MIbbtEjdYrc" title="" data-strip-group="mygroup" class="strip btn2" data-strip-options="width: 700,height: 450,youtube: { autoplay: 1 }"><i class="fa fa-play-circle"></i>Watch video</a>
                        </div><!-- play video btn -->
                                </div>
                            </div>
                        </div>

                        <div class="gap no-bottom">
                            <div class="tab-section">
                                <ul class="nav nav-tabs single-btn">
                                     <li class="nav-item"><a class="active" href="#desc" data-toggle="tab">Description</a></li>

                                     <li class="nav-item"><a class="" href="#review" data-toggle="tab">Reviews (2)</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                  <div class="tab-pane active fade show " id="desc" >
                                    <div class="more-pix">
                                        <h2 class="main-title text-center">{{   $product->name}}</h2>
                                        <div class="row">
                                            <div class="offset-md-1 col-lg-10">
                                                <p class="prod-info text-center"> {{$product->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="review">
                                        <div class="woocommerce-Reviews">
                                           @widget('comment',['product'=>$product])
                                        </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- shop detail meta -->

    <section >
        <div class="container">
            <div class="section-heading">
                <h2>Related Products</h2>
            </div>

            <div class="wrap-related-slick">

              <div class="related-slick">
                <div class="product-box related">
                    <figure>
                        <img src="images/resources/shop3.jpg" alt="">
                        <ul class="cart-optionz">
                            <li><a href="#" title="Add Cart" data-toggle="tooltip"><i class="ti-shopping-cart"></i></a></li>
                            <li><a href="#" title="Quick Shop" data-toggle="tooltip"><i class="ti-eye"></i></a></li>
                            <li><a href="#" title="Wishlist" data-toggle="tooltip"><i class="ti-heart"></i></a></li>
                            <li><a href="#" title="Compare" data-toggle="tooltip"><i class="ti-split-v-alt"></i></a></li>
                        </ul>
                    </figure>
                    <div class="product-name">
                        <h5><a href="#" title="">Shoes for Men</a></h5>
                        <ul class="starz">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <div class="prices">
                            <ins>$49</ins>
                            <del>$59</del>
                        </div>
                    </div>
                </div>
                <div class="product-box related">
                    <figure>
                        <img src="images/resources/shop3.jpg" alt="">
                        <ul class="cart-optionz">
                            <li><a href="#" title="Add Cart" data-toggle="tooltip"><i class="ti-shopping-cart"></i></a></li>
                            <li><a href="#" title="Quick Shop" data-toggle="tooltip"><i class="ti-eye"></i></a></li>
                            <li><a href="#" title="Wishlist" data-toggle="tooltip"><i class="ti-heart"></i></a></li>
                            <li><a href="#" title="Compare" data-toggle="tooltip"><i class="ti-split-v-alt"></i></a></li>
                        </ul>
                    </figure>
                    <div class="product-name">
                        <h5><a href="#" title="">Shoes for Men</a></h5>
                        <ul class="starz">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <div class="prices">
                            <ins>$49</ins>
                            <del>$59</del>
                        </div>
                    </div>
                </div>
                <div class="product-box related">
                    <figure>
                        <img src="images/resources/shop4.jpg" alt="">
                        <ul class="cart-optionz">
                            <li><a href="#" title="Add Cart" data-toggle="tooltip"><i class="ti-shopping-cart"></i></a></li>
                            <li><a href="#" title="Quick Shop" data-toggle="tooltip"><i class="ti-eye"></i></a></li>
                            <li><a href="#" title="Wishlist" data-toggle="tooltip"><i class="ti-heart"></i></a></li>
                            <li><a href="#" title="Compare" data-toggle="tooltip"><i class="ti-split-v-alt"></i></a></li>
                        </ul>
                    </figure>
                    <div class="product-name">
                        <h5><a href="#" title="">Shoes for Men</a></h5>
                        <ul class="starz">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <div class="prices">
                            <ins>$49</ins>
                            <del>$59</del>
                        </div>
                    </div>
                </div>
                <div class="product-box related">
                    <figure>
                        <img src="images/resources/shop2.jpg" alt="">
                        <ul class="cart-optionz">
                            <li><a href="#" title="Add Cart" data-toggle="tooltip"><i class="ti-shopping-cart"></i></a></li>
                            <li><a href="#" title="Quick Shop" data-toggle="tooltip"><i class="ti-eye"></i></a></li>
                            <li><a href="#" title="Wishlist" data-toggle="tooltip"><i class="ti-heart"></i></a></li>
                            <li><a href="#" title="Compare" data-toggle="tooltip"><i class="ti-split-v-alt"></i></a></li>
                        </ul>
                    </figure>
                    <div class="product-name">
                        <h5><a href="#" title="">Shoes for Men</a></h5>
                        <ul class="starz">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <div class="prices">
                            <ins>$49</ins>
                            <del>$59</del>
                        </div>
                    </div>
                </div>

                <div class="product-box related">
                    <figure>
                        <img src="images/resources/shop1.jpg" alt="">
                        <ul class="cart-optionz">
                            <li><a href="#" title="Add Cart" data-toggle="tooltip"><i class="ti-shopping-cart"></i></a></li>
                            <li><a href="#" title="Quick Shop" data-toggle="tooltip"><i class="ti-eye"></i></a></li>
                            <li><a href="#" title="Wishlist" data-toggle="tooltip"><i class="ti-heart"></i></a></li>
                            <li><a href="#" title="Compare" data-toggle="tooltip"><i class="ti-split-v-alt"></i></a></li>
                        </ul>
                    </figure>
                    <div class="product-name">
                        <h5><a href="#" title="">Shoes for Men</a></h5>
                        <ul class="starz">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <div class="prices">
                            <ins>$49</ins>
                            <del>$59</del>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection



@section('scripts')
@endsection
