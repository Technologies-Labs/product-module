<div class="more">
    <div class="more-post-optns">
        <i class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-more-horizontal">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg></i>
        <ul>
            <li>
                <i class="icofont-pen-alt-1"></i>Edit Post
                <span>Edit This Post within a Hour</span>
            </li>
            <li wire:click='delete'>
                <i class="icofont-ui-delete"></i>Delete Post
                <span>If inappropriate Post By
                    Mistake</span>
            </li>
        </ul>
    </div>
</div>
{{-- <div class="col-lg-2  col-sm-2 col-xs-2">
    <span style="float: right;padding-left: 10px;"><a class="edit-link" data-toggle="modal" href="#edit_product_{{$product->id}}"><i class="fa fa-edit mr-1"></i></a></span>
    <span style="float: right;"><a href="javascript:void(0);" onclick="delete_item({{$product->id}},'products')" ><i class="fa fa-trash"></i></a></span>
</div> --}}
