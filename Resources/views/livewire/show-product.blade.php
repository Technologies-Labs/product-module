<div class="main-wraper" id="user-product-{{$product->id}}">
    
    <div class="user-post">
        <div class="friend-info">
            @include('productmodule::website.products.product.user')

            <div class="post-meta">
                @include('productmodule::website.products.product.description')

                <div class="we-video-info">
                    <div class="stat-tools" style="width: auto;">

                        @include('productmodule::website.products.product.info')

                        <livewire:productmodule::product.product-comments :product="$product"/>

                    </div>
                    <a href="{{ route('show.product', ['product' => $product]) }}" title="" class="reply" style="margin-top: 20px;">Read more <i
                            class="icofont-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- <div class="central-meta item" id="delete_products_{{$product->id}}">
    <div class="user-post">
        <div class="friend-info ">
            <div class="post-head">
                <div class="row">


                </div>
            </div>

            <div class="post-meta" id="post">

                @include('productmodule::website.products.product.images')

                @include('productmodule::website.products.product.info')



            </div>
        </div>
    </div>
    @include('productmodule::website.products.modals.edit')
    @include('productmodule::website.products.modals.comments')
</div><!-- centerl meta --> --}}
