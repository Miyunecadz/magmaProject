<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class UserInformation extends Model
{
    use Notifiable;

    /**
     * User infomation belongs to
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * FIllable
     */
    protected $guarded = ['id'];
}
