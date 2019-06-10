<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function getCodeByName(string $name) : string
    {
        if ($org = self::whereName($name)->first())
            return $org->code;

        return "";
    }
}
