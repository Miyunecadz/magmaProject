@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-row">
            <h2 class="mr-auto">Magma Members</h2>
        </div>
        <hr>
        <br>
        <div class="table-responsive">
            <table id="dues_table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Call Sign</th>
                        <th>Chapter</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($members) > 0)
                        @foreach ($members as $member)
                            <tr>
                                <th>{{$member->fullname}}</th>
                                <th>{{$member->call_sign}}</th>
                                <th>{{$member->chapter}}</th>
                                <th>{{$member->home_address}}</th>
                                <th>{{$member->contact_no}}</th>
                            </tr>
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
