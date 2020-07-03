<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Get the User Informations associated with the user
     */
    public function userInfo()
    {
        return $this->hasOne(UserInformation::class);
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role', 'profile_img'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    /***
     * @param $role
     * @return mixed
     */
    public function hasRole()
    {
        return in_array($role, $this->getRoles());
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        $roles = $this->getAttribute('role');
        return $roles;
    }
}
