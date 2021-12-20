<?php

namespace Modules\Product\Notifications;

use App\Models\User;
use Modules\Notification\Notifications\NotificationAbstract;
use Modules\Product\Entities\Product;
use Modules\Product\Jobs\FollowersBellNotificationJob;

class ProductNotification extends NotificationAbstract
{
    private $message;

    public Product $product;
    public User $user;

    public function setProduct(Product $product)
    {
        $this->product = $product;
        return $this;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function setCreateProductMessage()
    {
        $search             = array('user_full_name' , 'product_name');
        $replace            = array($this->user->full_name ,  $this->product->name);
        $this->message      = str_replace($search, $replace, $this->template->content);
        return $this;
    }

    public function handle()
    {
        $action     = new FollowersBellNotificationJob();
        $action->onQueue('bell-notification')->execute($this->user , $this->message);
    }
}
