@extends('layouts.simple.master')
@push('css_after')
<style>
    .image-area {
        display: inline-block;
        position: relative;
        margin-right: 5px;
        margin-bottom: 5px;
        /* width: 50%;
        background: #333; */
    }

    .image-area img {
        max-width: 100%;
        height: auto;
    }

    .remove-image {
        display: none;
        position: absolute;
        top: -10px;
        right: -10px;
        border-radius: 10em;
        padding: 2px 6px 3px;
        text-decoration: none;
        background: #555;
        border: 3px solid #fff;
        color: #FFF;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        -webkit-transition: background 0.5s;
        transition: background 0.5s;
    }

    .remove-image:hover {
        background: #E54E4E;
        padding: 3px 7px 5px;
        top: -11px;
        right: -11px;
    }

    .remove-image:active {
        background: #E54E4E;
        top: -10px;
        right: -11px;
    }
</style>
@endpush


@push('scripts_after')
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/ckeditor/adapters/jquery.js')}}"></script>
<script>
    $('.ckeditor-description').ckeditor();
    $('.ckeditor-details').ckeditor();

</script>
@endpush
@php
use Modules\Product\Enum\ProductEnum;
@endphp


@section('content')
<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-wraper">
                        <h4 class="main-title">
                             @if ($edit) Update @else Add New @endif
                            Product or Post
                        </h4>

                        <div class="add-credits">

                            <form method="POST"
                                action="{{$edit ? route('update.product.page', ['product'=>$product])  : route('store.product') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <fieldset class="row merged-10">
                                    <div class="mb-4 col-lg-12 col-md-12 col-sm-12">
                                        <input class="uk-input" value="{{$edit ? $product->name : old('name')}}"
                                            name="name" type="text" placeholder="اسم المنتج">
                                    </div>
                                    <div class="uk-margin col-lg-6 mb-4">
                                        <select name="category_id" class="uk-select">
                                            <option>الصنف</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}" @if ($edit && $category->id ==
                                                $product->category_id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="uk-margin col-lg-6 mb-4">
                                        <select name="product_status_id" class="uk-select">
                                            <option>حالة المنتج</option>
                                            @foreach ($statuses as $statuse)
                                            <option value="{{$statuse->id}}" @if ($edit && $statuse->id ==
                                                $product->product_status_id) selected @endif>{{$statuse->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-4 col-lg-6 col-md-6 col-sm-6">
                                        <input class="uk-input" value="{{$edit ? $product->price : old('price')}}"
                                            name="price" type="number" placeholder="السعر">
                                    </div>

                                    <div class="mb-4 col-lg-6 col-md-6 col-sm-6">
                                        <input class="uk-input"
                                            value="{{$edit ? $product->old_price : old('old_price')}}" name="old_price"
                                            type="number" placeholder="السعر القديم">
                                    </div>

                                    <div class="mb-4 col-lg-6 col-md-6 col-sm-6">
                                        <input class="uk-input"
                                            value="{{$edit ? $product->offer_ratio : old('offer_ratio')}}"
                                            name="offer_ratio" type="number" placeholder="offer">
                                    </div>

                                    <div class="mb-4 col-lg-6 col-md-6 col-sm-6">
                                        <input class="uk-input" value="{{$edit ? $product->count : old('count')}}"
                                            name="count" type="number" placeholder="الكمية">
                                    </div>

                                    <div class="mt-2 col-lg-12">
                                        <h6 class="mb-2">الصورة الرئيسيه للمنتج</h6>
                                        <div class="dropzone mb-1">
                                            <div class="fallback">
                                                <input name="image" value="{{$edit ? $product->image : old('image')}}"
                                                    type="file" />
                                            </div>
                                        </div>
                                        @if ($edit)
                                        <img width="150px" height="150px"
                                            src="{{ asset('storage') }}/{{ProductEnum::IMAGE}}{{$product->image}}"
                                            alt="">
                                        @endif
                                    </div>

                                    <div class="mt-2 col-lg-12">
                                        <h6 class="mb-2">الصور الفرعيه للمنتج</h6>
                                        <div class="dropzone mb-1">
                                            <div class="fallback">
                                                <input name="product_images[]" type="file" multiple />
                                            </div>
                                        </div>
                                        @if ($edit)
                                        @livewire('product::product.product-images', ['product' => $product])
                                        @endif

                                    </div>



                                    <div class="mt-4 mb-4 col-lg-12">
                                        <h6 class="mb-1">الوصف</h6>
                                        <textarea name="description"
                                            value="{{$edit ? $product->description : old('description')}}"
                                            placeholder="Description" rows="4" class="uk-textarea ckeditor-description">
                                            {{$edit ? $product->description :null }}
                                        </textarea>
                                    </div>

                                    <div class="mt-4 mb-4 col-lg-12">
                                        <h6 class="mb-2">تفاصيل المنتج</h6>
                                        <textarea name="details" value="{{$edit ? $product->details : old('details')}}"
                                            placeholder="Details" rows="4" class="uk-textarea ckeditor-details">
                                            {{$edit ? $product->details :null }}
                                        </textarea>
                                    </div>



                                </fieldset>


                                <div class="activity-post">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox">
                                        <label for="checkbox"><span>Sent SMS To Follwers</span></label>
                                    </div>
                                </div>
                                <div class="mt-3 col-lg-12">
                                    <button type="submit" class="button primary circle">حفظ</button>
                                </div>
                            </form>
                            {{-- <p>
                                <b>Special Note:</b>
                                "But I must explain to you how all this mistaken idea of denouncing pleasure and
                                praising pain was born and I will give you a complete account of the system,
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar">
                        @livewire('advertisement::position-advertisements', ['position' => Modules\Advertisement\Enum\AdvertisementPositionEnum::SIDEBAR])

                    </aside>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
