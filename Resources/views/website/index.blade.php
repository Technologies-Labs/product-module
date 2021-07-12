@extends('layouts.simple.master')
@section('css')
@endsection

@section('style')
@endsection
@section('user-profile')
@widget('user-profile',['user_id'=>1])
@endsection
@section('content')
<div class="col-lg-6">
    <div >
        <button class="mtr-btn" style="margin-bottom: 10px;"><a  data-toggle="modal"  href="#create_product"><span>Add New Post</span> </a></button>
    </div>
<div class="loadMore">
   @php
       $products =  Modules\ProductModule\Entities\Product::get();
   @endphp
   @foreach ($products as $product)
   @widget('post',['product'=>$product])
   @endforeach

   </div>
</div>
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

<!-- Edit product Modal -->
<div class="modal fade" id="edit_product" aria-hidden="true" role="dialog" data-backdrop="false" >
<div class="modal-dialog modal-dialog-centered post-modal" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5  class="f-title"><i class="ti-pencil-alt"></i> Edit Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form>
              <div class="form-group ">
                 <input type="text" id="input" required="required"/>
                 <label class="control-label" for="input">Title</label><i class="mtrl-select"></i>
              </div>
              <div class="form-group half">
                    <input type="text" required="required"/>
                    <label class="control-label" for="input">Price</label><i class="mtrl-select"></i>
              </div>
              <div class="form-group half">
                    <input type="text" required="required"/>
                    <label class="control-label" for="input">Capacity</label><i class="mtrl-select"></i>
               </div>
                <div class="form-group half">
                        <select>
                          <option value="country">Category</option>
                            <option value="AFG">Phones</option>
                            <option value="ALA">Phones </option>
                            <option value="ALB">Phones</option>
                            <option value="DZA">Phones</option>
                            <option value="ASM">Phones </option>
                            <option value="AND">Phones</option>
                        </select>
                  </div>
                 <div class="form-group half">
                    <select>
                      <option value="Active">Active</option>
                        <option value="AFG">Not Active</option>

                    </select>
                 </div>
                 <div class="form-group">
                    <textarea rows="3" type="textarea" required="required"></textarea>
                    <label class="control-label" for="textarea">Description</label><i class="mtrl-select"></i>
                 </div>
                  <div class="form-group ">
                    <div class="upload-img ">
                        <div class="change-photo-btn">
                            <span><i class="fa fa-upload"></i> Upload Photos</span>
                            <input type="file" class="upload product-imgages-upload"  multiple id="pr">
                    </div>
                 </div>
                </div>
                <div class="form-group ">
                    <div class="upload-wrap">
                        <div class="upload-images">
                            <img src="images/cart/cart-1.png" alt="Upload Image">
                            <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </div>
                        <div class="upload-images">
                            <img src="images/cart/cart-2.png" alt="Upload Image">
                            <a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
                  <button type="submit" class="mtr-btn btn-block"><span>Save</span> </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /Edit Details Modal -->

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog" data-backdrop="false">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <button type="button" class="btn btn-primary">Save </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Modal -->


<!-- comments Modal -->
<div class="modal fade" id="comments_modal" aria-hidden="true" role="dialog" data-backdrop="false" >
<div class="modal-dialog modal-dialog-centered post-modal" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5  class="f-title"><i class="ti-pencil-alt"></i> Product Comments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="coment-area">
                <ul class="we-comet">
                    <li>
                        <div class="comet-avatar">
                            <img src="images/resources/comet-1.jpg" alt="">
                        </div>
                        <div class="we-comment">
                            <div class="coment-head">
                                <h5><a href="time-line.html" title="">Jason borne</a></h5>
                                <span>1 year ago</span>

                            </div>
                            <p>we are working for the dance and sing songs. this car is very awesome for the youngster. please vote this car and like our post</p>
                        </div>

                    </li>
                    <li>
                        <div class="comet-avatar">
                            <img src="images/resources/comet-1.jpg" alt="">
                        </div>
                        <div class="we-comment">
                            <div class="coment-head">
                                <h5><a href="time-line.html" title="">Donald Trump</a></h5>
                                <span>1 week ago</span>
                            </div>
                            <p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel
                                <i class="em em-smiley"></i>
                            </p>
                        </div>
                    </li>
                    <li>
                        <a href="#" title="" class="showmore underline">more comments</a>
                    </li>
                    <li class="post-comment">
                        <div class="comet-avatar">
                            <img src="images/resources/comet-1.jpg" alt="">
                        </div>
                        <div class="post-comt-box">
                            <form method="post">
                                <textarea placeholder="Post your comment"></textarea>
                                <div class="add-smiles">
                                    <span class="em em-expressionless" title="add icon"></span>
                                </div>
                                <div class="smiles-bunch">
                                    <i class="em em---1"></i>
                                    <i class="em em-smiley"></i>
                                    <i class="em em-anguished"></i>
                                    <i class="em em-laughing"></i>
                                    <i class="em em-angry"></i>
                                    <i class="em em-astonished"></i>
                                    <i class="em em-blush"></i>
                                    <i class="em em-disappointed"></i>
                                    <i class="em em-worried"></i>
                                    <i class="em em-kissing_heart"></i>
                                    <i class="em em-rage"></i>
                                    <i class="em em-stuck_out_tongue"></i>
                                </div>
                                <button type="submit"></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /comments Modal -->
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

</script>
@endsection
