<?php

namespace App\Observers;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;

class SubscriberObserver
{
    public function creating(Subscriber $subscriber)
    {
        $subscriber->created_by = Auth::user()->id;
        $subscriber->updated_by = Auth::user()->id;
    }
    public function updating(Subscriber $subscriber)
    {
        $subscriber->updated_by = Auth::user()->id;
    }
}