<?php

namespace Modules\Product\Jobs;

use App\Models\User;
use Modules\Notification\Enums\NotificationTypeEnum;
use Modules\Notification\Traits\NotificationTrait;
use Spatie\QueueableAction\QueueableAction;

class FollowersBellNotificationJob
{
    use QueueableAction , NotificationTrait;



    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(User $user , $message)
    {
        $followers = $user->followers;
        foreach ($followers as $user) {
            $this->createNotification($user , NotificationTypeEnum::USER , $message);
        }
    }
}
