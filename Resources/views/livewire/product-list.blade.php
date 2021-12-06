<div class="tab-pane fade active show" id="timeline" wire:ignore.self>

    {{-- @livewire('productmodule::product.product-actions', ['user' => $data["user"]]) --}}

    @foreach ($data['products'] as $product)

    {{-- @livewire('productmodule::show-product', [
    "user"=>$data['user'],
    "product"=>$product,
    "cart"=>$cart ,
    "items"=>$items,
    "isCurrantUser"=>$isCurrantUser ,
    "favorites"=>$favorites
    ], key(time().$product->id)) --}}

    <livewire:productmodule::show-product
    :user='$data["user"]'
    :product='$product'
    :cart='$cart'
    :items='$items'
    :isCurrantUser='$isCurrantUser'
    :favorites="$favorites"
    :wire:key="$product->id" />
    @endforeach

    @include('components.loading')
    {{-- <div class="sp sp-bars"></div> --}}

</div>
