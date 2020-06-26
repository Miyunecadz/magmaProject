<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInformation;

class UserRegister extends Controller
{
    /**
     * Store User Information
     */
    public function store(Request $request)
    {
        User::create()
    }
}
