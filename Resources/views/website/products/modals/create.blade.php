{{-- <!-- create product Modal -->
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

<!-- /create product Modal --> --}}
