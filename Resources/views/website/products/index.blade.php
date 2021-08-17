@extends('layouts.simple.master')

@include('usermodule::components.user_profile.index')

@section('left-sidebar')
    @include('layouts.simple.left-sidebar')
@endsection

@section('content')
    <div class="col-lg-6">
        @if($isCurrantUser)
            @include('productmodule::website.products.btns.create')
        @endif

        <div class="loadMore">
            <livewire:productmodule::product-list :data="$data"/>
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
