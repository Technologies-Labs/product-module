<div class="col-lg-10 col-sm-10 col-xs-10">
    <figure>
        <img src="{{asset($user->image)}}" alt="">
    </figure>
    <div class="friend-name ">
        <ins >
            @if ($user->is_verified)
                <img src="{{ asset('assets/images/checkmark.svg') }}"/>
            @endif
            <a href="" title="">{{$user->name}}</a></ins>
        <span>published: {{$product->created_at}}</span>
    </div>
</div>
