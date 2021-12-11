
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
            @can('product-edit')
            <li>
                <a target="_blank" href="{{ route('edit.product.page', ['product' => $product]) }}">
                    <i class="icofont-pen-alt-1"></i>Edit Post <span>Edit This Post within a Hour</span>
                </a>
            </li>
            @endcan

            @can('product-delete')
            <li wire:click='delete'>
                <i class="icofont-ui-delete"></i>Delete Post
                <span>If inappropriate Post By
                    Mistake</span>
            </li>
            @endcan


        </ul>
    </div>
</div>

