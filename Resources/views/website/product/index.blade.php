@extends('layouts.simple.master')

@push('css_after')
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom/slick.css') }}">
@endpush
@push('scripts_after')
    <!-- Customer JS -->
    <!-- Meanmenu js -->
    <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
    <!-- Slick Carousel js -->
    <script src="{{ asset('js/custom/slick.min.js') }}"></script>
    <!-- Countdown -->
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <!-- ScrollUp js -->
    <script src="{{ asset('js/custom/scrollUp.min.js') }}"></script>
    <!-- Main/Activator js -->
    <script src="{{ asset('js/custom/script.js') }}"></script>
@endpush

@section('content')
<section>
    <div class="gap" style="padding: 62px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="page-contents" class="row merged20">
                        <div class="col-lg-9" id="details-product">
                            @livewire('product::product.product-details',
                            [
                                'product'       => $product,
                                'cart'          => $cart ,
                                'items'         => $items,
                                'favorites'     => $favorites,
                            ])

                            @livewire('product::positions.related-products')
                        </div>

                        <div class="col-lg-3">
                            <aside class="sidebar static right">
                                @livewire('product::positions.popular-products')
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
