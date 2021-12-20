<style>
    .post-new .chosen-container-single .chosen-single div {
        top: 0px !important;
    }
</style>

<div class="post-new-popup" wire:ignore.self>
    <div class="popup" style="width: 800px;">
        <span class="popup-closed"><i class="icofont-close"></i></span>
        <div class="popup-meta">
            <div class="popup-head">
                <h5><i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg></i>Create New product</h5>
            </div>
            <div class="post-new">
                <div class="post-newmeta" style="width: 100%">
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-1 uk-first-column">
                            <input class="uk-input" type="text" placeholder="Product Name">
                        </div>
                        <div class="select-box  uk-margin mt-0 mb-4">
                            <select name="" class="uk-select" id="">
                                <option value="a">a</option>
                                <option value="a">a</option>
                                <option value="a">a</option>
                            </select>
                        </div>
                        <div class="activity-post uk-margin mt-1 ml-3">
                            <select name="" class="uk-select" id="">
                                <option value="a">a</option>
                                <option value="a">a</option>
                                <option value="a">a</option>
                            </select>
                        </div>
                        <div class="uk-width-1-2@s">
                            <input class="uk-input mt-0" type="text" placeholder="Price">
                        </div>
                        <div class="uk-width-1-2@s">
                            <input class="uk-input mt-0" type="text" placeholder="Old">
                        </div>
                        <div class="uk-width-1-2@s">
                            <input class="uk-input mt-0" type="text" placeholder="ratio">
                        </div>
                        <div class="uk-width-1-2@s">
                            <input class="uk-input" type="text" placeholder="Quantity">
                        </div>

                        <div method="post" class="dropzone uk-width-1-1 uk-grid-margin"
                            action="http://wpkixx.com/upload-target">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <form method="post" class="c-form">

                </form> --}}

            </div>
            <div class="c-form mt-2">
                <textarea class="ckeditor-description" placeholder="Description.."></textarea>

                <textarea class="ckeditor-details" class="mt-2 mb-2" placeholder="Details.."></textarea>

                <div class="activity-post">
                    <div class="checkbox">
                        <input type="checkbox" id="checkbox">
                        <label for="checkbox"><span>Sent SMS To Follwers</span></label>
                    </div>
                </div>

                <button type="submit" class="main-btn mt-2">Publish</button>
            </div>
        </div>
    </div>
</div>
@push('scripts_after')
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/ckeditor/adapters/jquery.js')}}"></script>
<script>
    $('.ckeditor-description').ckeditor();
    $('.ckeditor-details').ckeditor();

</script>
@endpush


{{--
<!-- create product Modal -->
<div class="modal fade" id="create_product" aria-hidden="true" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered post-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="f-title"><i class="ti-pencil"></i> Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- show error massages-->
                <div id="error-msg"></div>

                {!! Form::open(array('id'=>'create-product-form')) !!}

                <div class="form-group">
                    <div class="change-avatar">
                        <div class="profile-img">
                            <img src="{{asset('assets/images/customers/customer1.jpg')}}" alt="Product Image"
                                id="product_image">
                        </div>
                        <div class="upload-img">
                            <div class="change-photo-btn">
                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                <input type="file" name="image" class="upload"
                                    onchange="document.getElementById('product_image').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <small class="form-text text-muted">Allowed JPG or PNG. Max size of 2MB</small>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <input type="text" id="input" name="name" required="required" />
                    <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
                </div>

                <div class="form-group half">
                    <select name="category_id">
                        <option>Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group half">
                    <select name="product_status_id">
                        <option>Status</option>
                        @foreach ($statuses as $status)
                        <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group half">
                    <input type="number" name="old_price" required="required" />
                    <label class="control-label" for="input">Old Price</label><i class="mtrl-select"></i>
                </div>

                <div class="form-group half">
                    <input type="number" name="price" required="required" />
                    <label class="control-label" for="input">Price</label><i class="mtrl-select"></i>
                </div>
                <div class="form-group ">
                    <label for="" class="control-lable">is offer
                        <input type="checkbox" name="is_offer" value="1" />
                    </label>
                </div>
                <div class="form-group half">
                    <input type="number" name="offer_ratio" required="required" />
                    <label class="control-label" for="input">Offer ratio</label><i class="mtrl-select"></i>
                </div>
                <div class="form-group half">
                    <input type="number" name="count" required="required" />
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
                            <input type="file" name="product_images[]" class="upload product-imgages-upload" multiple
                                id="pr">
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
