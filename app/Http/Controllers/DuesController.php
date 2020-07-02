<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Due;
use DataTables;
use Illuminate\Support\Facades\Auth;

class DuesController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Due::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()->make(true);
        }

        return view('dues.index');
    }

    public function get_data()
    {
        $dues = Due::select('slno','bill_month','bill_ammount','remarks','created_at')->where('user_id', Auth::user()->id);
        dd($dues);
        return Datatables::of($dues)->make(true);
    }
}
