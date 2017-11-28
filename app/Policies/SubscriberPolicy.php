<?php

namespace App\Policies;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class SubscriberPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Subscriber $subscriber)
    {
        if (Auth::user()->id === $subscriber->created_by){
            return true;
        }else{
            return false;
        }
    }

    public function delete(User $user, Subscriber $subscriber)
    {
        if (Auth::user()->id === $subscriber->created_by){
            return true;
        }else{
            return false;
        }
    }
}
