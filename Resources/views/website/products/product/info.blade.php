<div class="we-video-info">
    <ul>
        <li>
            <span class="comment" data-toggle="tooltip" title="Comments">
                <a class="edit-link" data-toggle="modal" href="#comments_product{{$product->id}}">
                    <i class="fa fa-comments-o" ></i>
                </a>
                <ins>52</ins>
            </span>
        </li>
        <li>
            <span class="like  fav" data-toggle="tooltip" title="like">
                <i class="fa fa-heart"  onclick="addAlert('اسم الصنف','تمت الاضافةالمفضلة','fav')"></i>
                <ins>2.2k</ins>
            </span>
        </li>
        <li>
            <i class="fa  fa-shopping-cart"></i>
        </li>
        @include('productmodule::website.products.product.social_media')

    </ul>
</div>
