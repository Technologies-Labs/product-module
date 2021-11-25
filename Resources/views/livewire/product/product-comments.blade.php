<div class="new-comment" style="display: none;" wire:ignore.self>
    <form wire:submit.prevent="addComment">
        <input wire:model.defer='content' type="text" required placeholder="write comment">
        <button type="submit"><i class="icofont-paper-plane"></i></button>
    </form>
    <div class="comments-area">
        <ul>
            @foreach ($comments as $comment)
            <li>
                <figure><img alt="" src="{{ asset('storage') }}/{{$comment->user->image}}">
                </figure>
                <div class="commenter">
                    <h5><a title="" href="{{ route('user.profile', ['name' => $comment->user]) }}">{{$comment->user->name}}</a></h5>
                    <span>{{$comment->created_at->diffForHumans()}}</span>
                    <p>{{$comment->content}}</p>
                </div>
            </li>
            @endforeach

        </ul>
    </div>
</div>

{{-- <div class="coment-area">
    <ul class="we-comet" id="product_{{$product->id}}">
        @foreach ($product->comments as $comment)
        <li id="delete_comments_{{$comment->id}}">
            <div class="comet-avatar">
                <img src="{{asset($comment->user->image)}}" alt="">
            </div>
            <div class="we-comment">
                <div class="coment-head">
                    <h5><a href="time-line.html" title="">{{$comment->user->name}}</a></h5>
                    <span>{{$comment->created_at}}</span>
                    <span style="float: right;"><a href="javascript:void(0);"
                            onclick="delete_item({{$comment->id}},'comments')"><i class="fa fa-trash"></i></a></span>
                </div>
                <p>{{$comment->content}}</p>
            </div>
        </li>
        @endforeach
    </ul>
    <ul class="we-comet">
        <li>
            <a href="#" title="" class="showmore underline">more comments</a>
        </li>
        <li class="post-comment">
            <div class="comet-avatar">
                <img src="{{asset(Auth::user()->image)}}" alt="">
            </div>
            <div class="post-comt-box ">
                <form id="save-comment-form-{{$product->id}}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <textarea placeholder="Post your comment" id="comment_content_{{$product->id}}"
                        name="content"></textarea>

                    <button type="button" onclick="save_comment({{$product->id}})" style="color: red">post</button>
                </form>
            </div>
        </li>
    </ul>
</div> --}}
