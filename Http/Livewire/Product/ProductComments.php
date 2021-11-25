<?php

namespace Modules\ProductModule\Http\Livewire\Product;

use Auth;
use Livewire\Component;
use Modules\CommentModule\Entities\Comment;

class ProductComments extends Component
{
    public $product;
    public $comments;
    public $content;

    protected $rules = [
        'content' => 'required',
    ];

    public function mount()
    {
        $this->comments = $this->product->comments;
    }

    public function render()
    {
        return view('productmodule::livewire.product.product-comments');
    }

    public function addComment()
    {
        $this->validate($this->rules);
        $comment = Comment::create([
            'content'       => $this->content,
            'product_id'    => $this->product->id,
            'user_id'       => Auth::id(),
        ]);
        $this->comments     = $this->comments->push($comment);
        $this->content      = '';
    }
}
