@extends('layouts.simple.master')

@section('user-profile')
    @widget('user-profile', ['user_id'   =>  $data['user']->id])
@endsection

@section('left-sidebar')
    @include('layouts.simple.left-sidebar')
@endsection

@section('content')
    <div class="col-lg-6">
        @include('productmodule::website.products.btns.create')
        <div class="loadMore">
           @foreach ($data['products'] as $product)
                <livewire:productmodule::show-product :user="$data['user']" :product="$product" />
           @endforeach
        </div>
    </div>
    @include('productmodule::website.products.modals.create')
@endsection

@section('right-sidebar')
    @include('layouts.simple.right-sidebar')
@endsection

@section('scripts')
    @include('productmodule::website.products.js.js')
@endsection
