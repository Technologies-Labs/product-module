@extends('layouts.simple.master')
@section('css')
@endsection

@section('style')
@endsection

@section('user-profile')
    @widget('user-profile',['user_id'=>$user->id])
@endsection

@section('left-sidebar')
@include('layouts.simple.left-sidebar')
@endsection

@section('content')
<div class="col-lg-6">
    <div >
        <button class="mtr-btn" style="margin-bottom: 10px;"><a  data-toggle="modal"  href="#create_product"><span>Add New Post</span> </a></button>
    </div>
<div class="loadMore">
   {{-- @php
       $products =  Modules\ProductModule\Entities\Product::get();
   @endphp --}}
   @foreach ($user->products as $product)
   @widget('post',['product'=>$product])
   @endforeach

   </div>
</div>
@endsection

@section('right-sidebar')
@include('layouts.simple.right-sidebar')
@endsection

<!-- create product Modal -->
@php
    $categories =  Modules\CategoryModule\Entities\Category::get();
    $statuses   =  Modules\ProductModule\Entities\ProductStatus::get();
@endphp
<div class="modal fade" id="create_product" aria-hidden="true" role="dialog" data-backdrop="false" >
    <div class="modal-dialog modal-dialog-centered post-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5  class="f-title"><i class="ti-pencil"></i> Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- show error massages-->
                <div  id="error-msg"></div>

                {!! Form::open(array('id'=>'create-product-form')) !!}

                <div class="form-group">
                    <div class="change-avatar">
                        <div class="profile-img">
                            <img src="{{asset('assets/images/customers/customer1.jpg')}}" alt="Product Image" id="product_image">
                        </div>
                        <div class="upload-img">
                            <div class="change-photo-btn">
                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                <input type="file" name="image" class="upload" onchange="document.getElementById('product_image').src = window.URL.createObjectURL(this.files[0])"  >
                            </div>
                            <small class="form-text text-muted">Allowed JPG or PNG. Max size of 2MB</small>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                     <input type="text" id="input" name="name" required="required"/>
                     <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
                  </div>

                    <div class="form-group half">
                        <select name="category_id">
                            <option >Category</option>
                            @foreach ($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                     </div>

                    <div class="form-group half">
                        <select name="product_status_id">
                            <option >Status</option>
                            @foreach ($statuses as $status)
                                <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group half">
                        <input type="number" name="old_price" required="required"/>
                        <label class="control-label" for="input">Old Price</label><i class="mtrl-select"></i>
                  </div>

                  <div class="form-group half">
                        <input type="number" name="price" required="required"/>
                        <label class="control-label" for="input">Price</label><i class="mtrl-select"></i>
                  </div>
                  <div class="form-group ">
                    <label for="" class="control-lable">is offer
                      <input type="checkbox" name="is_offer" value="1" />
                   </label>
                 </div>
                 <div class="form-group half">
                    <input type="number" name="offer_ratio" required="required"/>
                    <label class="control-label" for="input">Offer ratio</label><i class="mtrl-select"></i>
                </div>
                  <div class="form-group half">
                        <input type="number" name="count" required="required"/>
                        <label class="control-label" for="input">count</label><i class="mtrl-select"></i>
                   </div>

                     <div class="form-group">
                        <textarea rows="3" type="textarea" name="description" required="required"></textarea>
                        <label class="control-label" for="textarea">Description</label><i class="mtrl-select"></i>
                     </div>
                      <div class="form-group ">
                        <div class="upload-img ">
                            <div class="change-photo-btn">
                                <span><i class="fa fa-upload"></i> Upload Photos</span>
                                <input type="file" name="product_images[]"class="upload product-imgages-upload"  multiple id="pr">
                        </div>
                     </div>
                    </div>
                    <div class="form-group ">
                        <div class="upload-wrap">

                        </div>
                    </div>
                      <button id="save-product" class="mtr-btn btn-block"><span>Save</span> </button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- /create product Modal -->



        



@section('scripts')
<script>
     $(document).on('click','#save-product',function(w){
        w.preventDefault();
       var formData= new FormData($('#create-product-form')[0]);
     $.ajax({
        type:'post',
        enctype:"multipart/form-data",
        url:"{{route('products.store')}}",
        data:formData,
        processData:false,
        contentType:false,
        cache:false,
        success: function(data){
            if(data.status==true){
                $("#create_product").modal('hide');
                $("#create-product-form")[0].reset();
            }
        },
        error: function(response){
            $('#error-msg').text(response.responseJSON.errors.name);
        },
    });
  });


  $(document).on('click','#update-product',function(w){
        w.preventDefault();
       var formData= new FormData($('#update-product-form')[0]);

     $.ajax({
        type:'put',
        enctype:"multipart/form-data",
        url:"{{route('products.update',3)}}",
        data:formData,
        processData:false,
        contentType:false,
        cache:false,
        success: function(data){
            if(data.status==true){
                $("#update_product").modal('hide');
            }
        },
        error: function(response){
            $('#error-msg').text(response.responseJSON.errors.name);
        },
    });
  });

  $(document).on('click','#-product',function(w){
        w.preventDefault();
       var formData= new FormData($('#update-product-form')[0]);

     $.ajax({
        type:'put',
        enctype:"multipart/form-data",
        url:"{{route('products.update',3)}}",
        data:formData,
        processData:false,
        contentType:false,
        cache:false,
        success: function(data){
            if(data.status==true){
                $("#update_product").modal('hide');
            }
        },
        error: function(response){
            $('#error-msg').text(response.responseJSON.errors.name);
        },
    });
  });


</script>
@endsection
