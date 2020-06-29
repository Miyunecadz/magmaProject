@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row">
        <h2 class="mr-auto">Dues</h2>
    </div>
    <hr>
    <div class="table-responsive">
       <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="sorting" data-sorting_type="asc" style="cursor: pointer">SLNO </th>
                <th class="sorting" data-sorting_type="asc"style="cursor: pointer">Bill Month </th>
                <th class="sorting" data-sorting_type="asc"style="cursor: pointer">Bill Ammount</th>
                <th class="sorting" data-sorting_type="asc"style="cursor: pointer">Remarks</th>
                <th class="sorting" data-sorting_type="asc"style="cursor: pointer">Date Paid</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
       </table>
    </div>
</div>
@endsection