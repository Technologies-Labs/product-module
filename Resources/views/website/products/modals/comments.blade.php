{{-- <!-- comments Modal -->
<div class="modal fade" id="comments_product{{$product->id}}" aria-hidden="true" role="dialog" data-backdrop="false" >
    <div class="modal-dialog modal-dialog-centered post-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5  class="f-title"><i class="ti-pencil-alt"></i> Product Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @widget('comment',['product'=>$product])
            </div>
        </div>
    </div>
</div>
<!-- /comments Modal --> --}}
