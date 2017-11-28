<?php

namespace App\Observers;

use App\Models\Template;
use Illuminate\Support\Facades\Auth;

class TemplateObserver
{
    public function creating(Template $template)
    {
        $template->created_by = Auth::user()->id;
        $template->updated_by = Auth::user()->id;
    }
    public function updating(Template $template)
    {
        $template->updated_by = Auth::user()->id;
    }
}