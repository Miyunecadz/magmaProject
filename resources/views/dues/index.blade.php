@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row">
        <h2 class="mr-auto">Dues</h2>
    </div>
    <hr>
    <br>
    <div class="table-responsive">
        <table id="dues_table" class="table table-bordered">
            <thead>
                <tr>
                    <th>SLNO </th>
                    <th>Bill Month </th>
                    <th>Bill Ammount</th>
                    <th>Remarks</th>
                    <th>Date Paid</th>
                </tr>
            </thead>
            <tbody>
                @if(count($dues) > 0)
                    @foreach ($dues as $due)
                        @if($due->user_id == Auth::user()->id)
                            <tr>
                            <td>{{$due->slno}}</td>
                            <td>{{$due->bill_month}}</td>
                            <td>{{$due->bill_ammount}}</td>
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
