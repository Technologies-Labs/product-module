<div class="tab-pane fade active show" id="timeline" wire:ignore.self>
    <div class="main-wraper">
        <span class="new-title">Create New Post</span>
        <div class="new-post">
            <form method="post">
                <i class="icofont-pen-alt-1"></i>
                <input type="text" placeholder="Create New Post">
            </form>
            <ul class="upload-media">
                <li>
                    <i><img src="{{ asset('images/image.png') }}" alt=""></i>
                    <span>Photo/Video</span>
                </li>
                <li>
                    <i><img src="{{ asset('images/file.png') }}" alt="" style="width: 22px;"></i>
                    <span>File</span>
                </li>

            </ul>
        </div>
    </div><!-- create new post -->

    @foreach ($data['products'] as $product)

    {{-- @livewire('productmodule::show-product', [
    "user"=>$data['user'],
    "product"=>$product,
    "cart"=>$cart ,
    "items"=>$items,
    "isCurrantUser"=>$isCurrantUser ,
    "favorites"=>$favorites
    ], key(time().$product->id)) --}}

    <livewire:productmodule::show-product  :user='$data["user"]' :product='$product'
        :cart='$cart' :items='$items' :isCurrantUser='$isCurrantUser' :favorites="$favorites"   :wire:key="$product->id" />
    @endforeach

    @include('components.loading')
    {{-- <div class="sp sp-bars"></div> --}}
</div>
