@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row">
        <h2 class="mr-auto">Dues</h2>
    </div>
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
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#dues_table').DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ route('dues.index') }}",
            columns:[
                {data:"slno",name:"slno"},
                {data:"bill_month",name:"bill_month"},
                {data:"bill_ammount",name:"bill_ammount"},
                {data:"remarks",name:"remarks"},
                {data:"created_at",name:"created_at"},
            ]
        });
    });
</script>

@endsection
