<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait Owned
{
    public function scopeOwned($query)
    {
        return $query->where('created_by', '=', Auth::id());
    }
}