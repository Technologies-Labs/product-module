@extends('productmodule::layouts.master')

@section('content')
    <h1>Hello World</h1>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
         @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
         @endforeach
      </ul>
    </div>
    @endif
    <p>
        This view is loaded from module: {!! config('productmodule.name') !!}
    </p>
    <form action="{{ route('products.update',$product->id) }}" method="Post" enctype="multipart/form-data" >
         @csrf
        @method('PATCH')
        <img src="{{asset($product->image)}}" alt="" style="width: 300px;height">
        <label for="">name</label>
        <input type="text" name="name" id="" value="{{$product->name}}">
        <label for="">description</label>
        <input type="text" name="description" id="" value="{{$product->description}}">
        <label for="">image</label>
        <input type="file" name="image" value="{{$product->image}}">
        <label for="">images</label>
        <input type="file" name="product_images[]" multiple>
        <label for="">price</label>
        <input type="number" name="price" id="" value="{{$product->price}}">
        <label for="">old_price</label>
        <input type="number" name="old_price" id="" value="{{$product->old_price}}">
        <label for="">count</label>
        <input type="number" name="count" id="" value="{{$product->count}}">
        <label for="">product_status_id</label>
        <label for="">category_id</label>
        <input type="number" name="category_id" id="" value="{{$product->category_id}}">
        <label for="">product_status_id</label>
        <input type="number" name="product_status_id" id="" value="{{$product->product_status_id}}">

        @foreach ($product->images as $image)
            <div>
                <img src="{{asset($image->image)}}" alt="">
                <a href="{{route('product.images.delete',$image->id)}}">delete</a>
            </div>
        @endforeach
    <button type="submit">save</button>
    </form>
    <form action="{{route('products.destroy',$product->id)}}" method="DELETE">
    @csrf
    @method("DELETE")

    <button type="submit">delete</button>
  </form>
@endsection
