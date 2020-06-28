<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
