<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInformation;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
     * view User Profile Form
     */
    public function view_user_profile(Request $request)
    {
        $user_info = $request->session()->get('user_information');
        return view('register_user.step2',compact($user_info));
    }

    /**
     * User Information cached in session
     */
    public function create_user_information(Request $request)
    {
        $validate = $request->validate([
            'fullname' => 'required',
            'contact_no' => 'required',
            'home_address' => 'required',
            'birth_date' => 'required|date',
            'setup_hr' => 'required|numeric|min:0',
            'setup_vhf' => 'required|numeric|min:0',
            'setup_uhf' => 'required|numeric|min:0',
            'setup_areal_antenna' => 'required|numeric|min:0',
            'setup_spare_battery' => 'required|numeric|min:0',
            'setup_generator' => 'required|numeric|min:0',
            'setup_solar_panel' => 'required|numeric|min:0',
            'setup_battery' => 'required|numeric|min:0',
            'setup_mobile_setup' => 'required|numeric|min:0',
            'setup_drone' => 'required|numeric|min:0',
        ]);

       

        if(empty($request->session()->get('profile_info'))){
            $profile_info = new UserInformation();
            $profile_info->fill($request->except('_token'));
            $request->session()->put('profile_info', $profile_info);
        }else{
            $profile_info = $request->session()->get('profile_info');
            $profile_info->fill($request->except('_token'));
            $request->session()->put('profile_info', $profile_info);
        }

        return redirect('/register/profile');
    }

    public function create_user(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'profile_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->profile_img != null)
        {
            $filename = $request->username . '-profile.' . $request->profile_img->getClientOriginalExtension();
            $request->profile_img->storeAs('profile_img', $filename);
        }
        else
        {
            $filename =  "default-profile.png";
        }

        
        $profile_info = $request->session()->get('profile_info');

        $user = new User;
        $user->role = 'user';
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile_img = $filename;
        $user->save();

        $profile_info->user_id = $user->id;
        $profile_info->save();
        
        Auth::logout();

        $request->session()->flush();
        
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // If Auth fail
        return redirect('/login');
    }
}
