<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Due;
use App\User;

class DuesController extends Controller
{
    public function index()
    {
        $dues = Due::orderBy('updated_at','desc')->paginate(10);

        return view('dues.index',compact('dues'));
    }

    public function save_data(Request $request)
    {
        $this->validate($request,[
            'slno' => 'required',
            'magma_name' => 'required',
            'bill_month' => 'required',
            'bill_amount' => 'required',
        ]);

        $newdues = new Due;
        $newdues->user_id = $request->input('magma_name');
        $newdues->slno = $request->input('slno');
        $newdues->bill_month = $request->input('bill_month');
        $newdues->bill_amount = $request->input('bill_amount');
        $newdues->remarks = $request->input('remarks');
        $newdues->save();

        $dues = Due::orderBy('updated_at','desc')->paginate(10);

        return view('dues.index',compact('dues'));
    }

    public function pay_due()
    {
        $magma_member = User::all();
        return view('dues.create',compact('magma_member'));
    }
}
