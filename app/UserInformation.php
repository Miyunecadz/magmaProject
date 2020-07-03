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
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * FIllable
     */
    protected $guarded = ['id'];
}
