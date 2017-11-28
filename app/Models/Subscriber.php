<?php

namespace App\Models;

use App\Http\Traits\Owned;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\SubscriberObserver;

class Subscriber extends Model
{
    use Owned;
    use SoftDeletes;

    protected $fillable = ['f_name', 'l_name', 'email', 'created_by', 'updated_by',];

    public function bunch()
    {
        return $this->belongsTo('App\Models\Bunch');
    }

	public static function boot()
	{
		parent::boot();
		parent::observe(new SubscriberObserver());
	}
}
