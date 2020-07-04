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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'fullname', 
        'call_sign', 
        'chapter', 
        'contact_no',
        'present_employment', 
        'home_address', 
        'birth_date', 
        'birth_place', 
        'citizenship',
        'gender', 
        'height', 
        'weight', 
        'blood_type', 
        'emergency_name',
        'emergency_relation', 
        'emergency_contact_no', 
        'father_name', 
        'father_occupation', 
        'mother_name',
        'mother_occupation', 
        'setup_hr', 
        'setup_vhf', 
        'setup_uhf', 
        'setup_areal_antenna',
        'setup_spare_battery', 
        'setup_generator', 
        'setup_solar_panel', 
        'setup_battery', 
        'setup_mobile_setup',
        'setup_drone', 
        'siblings1', 
        'siblings2', 
        'siblings3', 
        'siblings4',
        'siblings5', 
        'siblings6', 
        'school_secondary', 
        'secondary_date_graduate', 
        'school_college',
        'college_date_graduate', 
        'school_post', 
        'post_date_graduate',
    ];
}
