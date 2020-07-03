<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Due;
use DataTables;
use Illuminate\Support\Facades\Auth;

class DuesController extends Controller
{
    public function index()
    {
        $dues = Due::orderBy('updated_at','desc')->paginate(10);

        return view('dues.index',compact('dues'));
    }

    public function get_data()
    {
        $dues = Due::select('slno','bill_month','bill_ammount','remarks','created_at')->where('user_id', Auth::user()->id);
        dd($dues);
        return Datatables::of($dues)->make(true);
    }

    public function save_data(Request $request)
    {

    }

    public function pay_due()
    {
        return view('dues.create');
    }
}
