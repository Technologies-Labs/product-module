<figure>
    @if ($user->is_verified)
    <em>
        <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
            viewBox="0 0 24 24">
            <path fill="#7fba00" stroke="#7fba00"
                d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z">
            </path>
        </svg>
    </em>
    @endif

    <img alt="" src="{{ asset('storage') }}/{{$user->image}}">
</figure>
<div class="friend-name">
    @if($isCurrantUser)
    @include('productmodule::website.products.product.actions')
    @endif

    <ins><a title="" href="{{ route('user.profile', ['name' => $user->name]) }}">{{$user->name}}</a></ins>
    <span><i class="icofont-globe"></i> published: {{$product->created_at->diffForHumans()}}</span>
</div>

{{-- <div class="col-lg-10 col-sm-10 col-xs-10">
    <figure>
        <img src="{{asset($user->image)}}" alt="">
    </figure>
    <div class="friend-name ">
        <ins>
            @if ($user->is_verified)
            <img src="{{ asset('assets/images/checkmark.svg') }}" />
            @endif
            <a href="" title="">{{$user->name}}</a></ins>
        <span>published: {{$product->created_at}}</span>
    </div>
</div> --}}
