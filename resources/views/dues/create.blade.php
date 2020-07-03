@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="slno">SLNO</label>
                <input type="text" name="slno" id="slno" class="form-control">
            </div>

            <div class="form-group">
                <label for="bill_month">Bill Month</label>
                <input type="date" name="bill_month" id="bill_month">
            </div>
        </form>
    </div>
@endsection
