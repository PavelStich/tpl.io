<?php

namespace App\Models;

use App\Http\Traits\Owned;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Observers\TemplateObserver;

class Template extends Model
{
    use Notifiable;
    use Owned;
    use SoftDeletes;
	use Selectable;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'content', 'created_by', 'updated_by',
    ];

    public function campaigns()
    {
        return $this->belongsTo('App\Campaign', 'template_id', 'id');
    }

	public static function boot()
	{
		parent::boot();
		parent::observe(new TemplateObserver());
	}
}
