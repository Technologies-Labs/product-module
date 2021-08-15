<div class="central-meta item" id="delete_products_{{$product->id}}">
    <div class="user-post">
        <div class="friend-info ">
            <div class="post-head">
                <div class="row">

                    @include('productmodule::website.products.product.user')

                    @include('productmodule::website.products.product.actions')
                </div>
            </div>

            <div class="post-meta" id="post">

                @include('productmodule::website.products.product.images')

                @include('productmodule::website.products.product.info')

                @include('productmodule::website.products.product.description')

            </div>
        </div>
    </div>
    {{--@include('productmodule::website.products.modals.edit')--}}
    @include('productmodule::website.products.modals.comments')
</div><!-- centerl meta -->

