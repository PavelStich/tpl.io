<?php

namespace App\Observers;

use App\Models\Bunch;
use Illuminate\Support\Facades\Auth;

class BunchObserver
{
    public function creating(Bunch $bunch)
    {
        $bunch->created_by = Auth::user()->id;
        $bunch->updated_by = Auth::user()->id;
    }
    public function updating(Bunch $bunch)
    {
        $bunch->updated_by = Auth::user()->id;
    }
}