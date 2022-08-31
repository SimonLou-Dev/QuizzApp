<?php

namespace App\Facade\Accessor;

use App\Models\User;
use App\Notifications\RequestValidationForTopicNotification;

class NotifyFacadeAccessor
{

    public static function newTopicCreated(string $code){
        $users = User::where('role', 'admin')->get();
        \Notification::send($users, new RequestValidationForTopicNotification($code));
    }

    public static function topicValidated(string $code){
        //
    }

    public static function topicRefused(string $code){
        //
    }


}
