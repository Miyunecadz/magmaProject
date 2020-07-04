@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row">
        <h2 class="mr-auto">Dues</h2>

        @if (Auth::user()->role == 'admin')
            <a href="{{url('dues/pay')}}" class="ml-auto">Pay Due</a>
        @endif
    </div>
    <hr>
    <br>
    <div class="table-responsive">
        <table id="dues_table" class="table table-bordered">
            <thead>
                <tr>
                    @if (Auth::user()->role == 'admin')
                        <th>Magma Name </th>
                    @endif
                    <th>SLNO </th>
                    <th>Bill Month </th>
                    <th>Bill Ammount</th>
                    <th>Remarks</th>
                    <th>Date Paid</th>
                </tr>
            </thead>
            <tbody>
                @if (Auth::user()->role == 'admin')
                    @foreach ($dues as $due)
                    <tr>
                        <td>{{$due->user->username}}</td>
                        <td>{{$due->slno}}</td>
                        <td>{{$due->bill_month}}</td>
                        <td>{{$due->bill_amount}}</td>
                        <td>{{$due->remarks}}</td>
                        <td>{{$due->created_at}}</td>
                        </tr>
                    @endforeach
                @elseif(Auth::user()->role == 'user')
                    @foreach ($dues as $due)
                        @if($due->user_id == Auth::user()->id)
                            <tr>
                            <td>{{$due->slno}}</td>
                            <td>{{$due->bill_month}}</td>
                            <td>{{$due->bill_amount}}</td>
                            <td>{{$due->remarks}}</td>
                            <td>{{$due->created_at}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#dues_table').DataTable();
    });
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>


@endsection
