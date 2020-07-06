<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\User;
use Request as Requestor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the Home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the Home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userInfo($id)
    {
        
        $user = User::find($id);
        if($id != auth()->user()->id && auth()->user()->role !== 'admin')
        {
            abort('403', 'You are not allowed to access this page. Illegal Modification of Information');
        }
        else
        {
            return view('user.information', compact('user', 'id'));
        }
    }

    
    /**
     * Update User Profile
     */
    public function updateInfo(Request $request)
    {
        $id = $request->id;
        if($id != auth()->user()->id && auth()->user()->role !== 'admin')
        {
            abort('403', 'You are not allowed to access this page. Illegal Modification of Information');
        }

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

        User::find(Requestor::get('id'))->userinfo->fill($request->except('_token'));
        User::find(Requestor::get('id'))->userinfo->save();

        return redirect()->back()->with('success', 'Information successfully updated!');   
    }

    /**
     * Show the Home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userProfile($id)
    {
        $user = User::find($id);
        if($id != auth()->user()->id && auth()->user()->role !== 'admin')
        {
            abort('403', 'You are not allowed to access this page. Illegal Modification of Information');
        }
        else
        {
        return view('user.profile' , compact('user', 'id'));
        }
    }

    /**
     * Update User Profile
     */
    public function updateProfile(Request $request)
    {
        $id = $request->id;
        if($id != auth()->user()->id && auth()->user()->role !== 'admin')
        {
            abort('403', 'You are not allowed to access this page. Illegal Modification of Information');
        }

        
        $validate = $request->validate([
            'username' =>  [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value !== User::find(Requestor::get('id'))->username) {
                        (User::where('username', $value)->exists()) ? $fail(ucfirst(str_replace('_',' ',$attribute)). ' is already taken.') : '';                        
                    }
                },
            ],
            'email' =>  [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if ($value !== User::find(Requestor::get('id'))->email) {
                        (User::where('email', $value)->exists()) ? $fail(ucfirst(str_replace('_',' ',$attribute)). ' is already taken.') : '';                        
                    }
                },
            ],
            'old_password' => [
                function ($attribute, $value, $fail){
                    if ($value != null)
                    {
                        if (!Hash::check($value, User::find(Requestor::get('id'))->password)) {
                            
                           $fail(ucfirst('Wrong '. str_replace('_',' ',$attribute)). '!');                        
                        }
                    }
                    elseif(strlen($value) >= 6)
                    {
                        $fail(ucfirst('The '. str_replace('_',' ',$attribute)). 'must be at least 6 characters.');
                    }
                }
            ],
            'password' => [
                'confirmed',
                function ($attribute, $value, $fail){
                    if(strlen($value) >= 6)
                    {
                        $fail(ucfirst('The '. str_replace('_',' ',$attribute)). 'must be at least 6 characters.');
                    }
                },
            ],
            'profile_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->profile_img != null)
        {
            if ( User::find(Requestor::get('id'))->profile_img != 'default-profile.png' )
            {
                Storage::delete('profile_img/'. User::find(Requestor::get('id'))->profile_img);
            }
            
            $filename = $request->username . '-profile.' . $request->profile_img->getClientOriginalExtension();
            $request->profile_img->storeAs('profile_img', $filename);
        }
        else
        {
            $filename = User::find(Requestor::get('id'))->profile_img;
        }

        if($request->old_password != null && $request->password != null){
            User::find(Requestor::get('id'))->password = Hash::make($request->password);
        }
        User::find(Requestor::get('id'))->email = $request->email;
        User::find(Requestor::get('id'))->profile_img = $filename;
        User::find(Requestor::get('id'))->save();

        return redirect()->back()->with('success', 'Profile successfully updated!');   
    }

   /**
    * Redirect page to proper page
    */
    public function pageDefault()
    {
        $role =  isset(auth()->user()->role)? auth()->user()->role : '';

        if($role == "guest")
        {
            return redirect('/register/info');
        }
        elseif($role == "user")
        {
            return redirect('/home');
        }
        elseif($role == "admin")
        {
            return redirect('/announcements');
        }
        else
        {
            return view('welcome');
        }
    }
}
