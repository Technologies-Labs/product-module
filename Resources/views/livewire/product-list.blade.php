<div>
    @foreach ($data['products'] as $product)
        <livewire:productmodule::show-product :user="$data['user']" :product="$product" :cart="$cart" :items="$items" :favorites="$favorites"/>
    @endforeach
</div>
