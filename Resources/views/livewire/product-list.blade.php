<div>
    @foreach ($data['products'] as $product)
        <livewire:productmodule::show-product :user="$data['user']" :product="$product" :cart="$cart" :items="$items" :isCurrantUser="$isCurrantUser"  :wire:key="$product->id"/>
    @endforeach
</div>
