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

        $dues = new Due;
        $dues->user_id = $request->input('magma_name');
        $dues->slno = $request->input('slno');
        $dues->bill_month = $request->input('bill_month');
        $dues->bill_amount = $request->input('bill_amount');
        $dues->remarks = $request->input('remarks');
        $dues->save();

        return view('dues.create');
    }

    public function pay_due()
    {
        $magma_member = User::all();
        return view('dues.create',compact('magma_member'));
    }
}
