<?php

/**
 * Created by PhpStorm.
 * User: Torpedko
 * Date: 17.10.2017
 * Time: 16:52
 */
namespace App\Models;

trait Selectable
{
    public static function getSelectList($value = 'name', $key = 'id'){
        return static::latest()->owned()->pluck($value, $key);
    }
}