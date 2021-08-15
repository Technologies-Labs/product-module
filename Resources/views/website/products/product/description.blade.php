<div class="description">
    <p>
        <span class="cat-heading">Name     :</span> <a href="{{route('products.show',$product->id)}}" title="">{{$product->name}}</a>,
        <span class="cat-heading">Category :</span> {{$product->category->name}},
        <span class="cat-heading">Status   :</span> {{$product->status->name}} ,
        <span class="cat-heading">Price    :</span> {{$product->price}}
    </p>

    <p> {{$product->description}} </p>
</div>
