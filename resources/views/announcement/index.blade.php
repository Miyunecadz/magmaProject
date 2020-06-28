@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex flex-row">
            <h2 class="mr-auto">Announcements</h2>

            @if(Auth::user()->role == "admin")
            <a href="/announcements/create" class="ml-auto">New Announcement</a>
            @endif
        </div>

        <hr>

        <div>
            @if(count($announcements) > 0)
                @foreach ($announcements as $announcement)
                    <div class="card mb-2">
                    <h4 class="card-header"><a href="/announcements/{{$announcement->id}}"> {{ $announcement->title }} </a></h4>

                    @if($announcement->update_at == "")
                        <small class="card-body">{{ $announcement->created_at }}</small>
                    @else
                        <small class="card-body">{{ $announcement->update_at }}</small>
                    @endif
                    </div>
                @endforeach
                {{$announcements->links()}}
            @else
                <p>No Announcement</p>
            @endif
        </div>
    </div>

@endsection
