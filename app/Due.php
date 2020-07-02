<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Due extends Model
{

    protected $fillable = ['slno','bill_month','bill_ammount','remarks','created_at'];

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
