<div id="list-view" class="tab-pane fade active show">
    @foreach ($data['products'] as $product)
        <livewire:productmodule::show-product  :user='$data["user"]' :product='$product'
            :cart='$cart' :items='$items' :isCurrantUser='$isCurrantUser' :favorites="$favorites"   :wire:key="$product->id" />
    @endforeach
    @include('components.loading')
</div>
