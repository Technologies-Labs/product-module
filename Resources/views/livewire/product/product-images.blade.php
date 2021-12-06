<div class="">
    @php
    use Modules\ProductModule\Enum\ProductEnum;
    @endphp
    @foreach ($images as $image)
    <div class="image-area" id="product-image-{{$image->id}}">
        <img width="150px" height="150px" src="{{ asset('storage') }}/{{ProductEnum::IMAGE}}{{$image->image}}" alt="">

        <a wire:click="deleteProductImage({{$image}})" class="remove-image" href="javascript:void(0)" style="display: inline;">&#215;</a>
    </div>
    @endforeach
</div>
