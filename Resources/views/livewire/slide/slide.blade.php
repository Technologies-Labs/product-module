<div class="col-lg-12" id="grid-view">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="title area" >
            <h1 class="uk-heading-line uk-text-center"><a href="#">Popular Products</a></h1>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="product-caro row" style="margin-left: -5px">

            @foreach($data['products'] as $product)
                <livewire:productmodule::product.single-product
                    :user='$data["user"]'
                    :product='$product'
                    :cart='$cart' :items='$items'
                    :favorites="$favorites"
                    :wire:key="$product->id" />
            @endforeach

        </div>
    </div>
</div>
