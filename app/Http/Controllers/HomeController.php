<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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
