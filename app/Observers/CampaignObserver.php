<?php

namespace App\Observers;

use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;

class CampaignObserver
{
    public function creating(Campaign $campaign)
    {
        $campaign->created_by = Auth::user()->id;
        $campaign->updated_by = Auth::user()->id;
    }
    public function updating(Campaign $campaign)
    {
        $campaign->updated_by = Auth::user()->id;
    }
}