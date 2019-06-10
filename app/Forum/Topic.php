<?php

namespace App\Forum;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded = [];

    public function owner()
    {
        $owner = ($this->belongsTo(User::class, 'owner_id', 'id'));
        return $owner->name;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
