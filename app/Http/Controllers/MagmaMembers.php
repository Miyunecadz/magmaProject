<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInformation;

class MagmaMembers extends Controller
{
    public function index()
    {
        $members = UserInformation::all();
        return view('member.index',compact('members'));
    }
}
