<?php
/**
 * Created by PhpStorm.
 * User: Torpedko
 * Date: 07.11.2017
 * Time: 12:45
 */

namespace App\Http\Traits;


trait Selectable
{
	public static function getSelectList($value = 'name', $key = 'id')
	{
		return static::latest()->owned()->pluck($value, $key);
	}
}