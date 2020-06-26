<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    /**
     * view User information Form
     */
    public function view_user_information(Request $request)
    {
        $user_info = $request->session()->get('user_information');
        return view('register_user.step1',compact($user_info));
    }

    /**
     * User Information cached in session
     */
    public function create_user_information(Request $request)
    {
        $validate = $request->validate([
            
        ]);
    }
}
