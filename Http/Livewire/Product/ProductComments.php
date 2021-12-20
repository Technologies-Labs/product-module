<?php

namespace Modules\Product\Http\Livewire\Product;

use Auth;
use Livewire\Component;
use Modules\Comment\Entities\Comment;
use Modules\Product\Entities\Product;

class ProductComments extends Component
{
    public $product;
    public $comments;
    public $content;
    public $template = 'timeline';

    protected $rules = [
        'content' => 'required',
    ];

    public function mount()
    {
        $this->comments = $this->product->comments;
    }

    public function render()
    {
        return view('product::livewire.product.product-comments');
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
