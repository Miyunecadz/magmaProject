@extends('layouts.app')

@section('content')

    <div class="container">

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <span>Error Found!!</span>
                @foreach ($errors->all() as $error)
                    <br>
                    <small> → {{$error}}</small>
                @endforeach
            </div>
        @endif

        <form action="{{ url('dues/pay')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="slno">SLNO</label>
                <input type="text" name="slno" id="slno" class="form-control">
            </div>

            <div class="form-group">
                <label for="magma_name">Magma Name</label>
                <select name="magma_name" id="magma_name" class="form-control">
                    @foreach ($magma_member as $users)
                        @if($users->role == 'user')
                            <option value="{{$users->id}}">{{$users->username}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group form-row">
                <div class="form-group col">
                    <label for="bill_month">Bill Month</label>
                    <select name="bill_month" id="bill_month" class="form-control">
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>

                <div class="form-group col">
                    <label for="bill_amount">Bill Amount</label>
                    <input type="number" name="bill_amount" id="bill_amount" class="form-control mt-2">
                </div>
            </div>


            <div class="form-group">
                <label for="remarks">Remarks</label>
                <input type="text" name="remarks" id="remarks" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Pay</button>
        </form>
    </div>
@endsection
