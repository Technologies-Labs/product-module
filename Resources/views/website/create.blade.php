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
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <label for="">name</label>
        <input type="text" name="name" id="" value="{{old('name')}}"><br>
        <label for="">description</label>
        <input type="text" name="description" id="" value="{{old('description')}}"><br>
        <label for="">image</label>
        <input type="file" name="image" ><br>
        <label for="">images</label>
        <input type="file" name="product_images[]" multiple><br>
        <label for="">price</label>
        <input type="number" name="price" id="" value="{{old('price')}}"><br>
        <label for="">old_price</label>
        <input type="number" name="old_price" id="" value="{{old('old_price')}}"><br>
        <label for="">count</label>
        <input type="number" name="count" id="" value="{{old('count')}}"><br>
        <label for="">category_id</label>
        <input type="number" name="category_id" id="" value="{{old('category_id')}}"><br>
        <label for="">product_status_id</label>
        <input type="number" name="product_status_id" id="" value="{{old('product_status_id')}}"><br>
        <label for="">is_offer</label>
        <input type="number" name="is_offer" id="" value="{{old('is_offer')}}"><br>
        <label for="">offer_ratio</label>
        <input type="number" name="offer_ratio" id="" value="{{old('offer_ratio')}}"><br>
    <button type="submit">save</button>
    </form>
@endsection
