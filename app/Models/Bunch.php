<?php

namespace App\Models;

use App\Http\Traits\Owned;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\BunchObserver;

class Bunch extends Model
{
    use Owned;
    use SoftDeletes;
	use Selectable;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'description', 'created_by', 'updated_by',
    ];

    public function subscribers()
    {
        return $this->hasMany('App\Models\Subscriber');
    }

    public function campaigns()
    {
        return $this->belongsTo('App\Models\Campaign', 'bunch_id', 'id');
    }

	public static function boot()
	{
		parent::boot();
		parent::observe(new BunchObserver());
	}
}
