<?php

namespace App\Providers;

use App\Models\Bunch;
use App\Models\Campaign;
use App\Models\Subscriber;
use App\Models\Template;
use App\Observers\BunchObserver;
use App\Observers\CampaignObserver;
use App\Observers\SubscriberObserver;
use App\Observers\TemplateObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Template::observe(TemplateObserver::class);
        Bunch::observe(BunchObserver::class);
        Subscriber::observe(SubscriberObserver::class);
        Campaign::observe(CampaignObserver::class);
    }

    public function register()
    {
        //
    }
}
