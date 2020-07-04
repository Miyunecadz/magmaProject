@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="d-flex flex-row">
            <h2 class="mr-auto">{{$announcements->title}}</h2>

            <div class="ml-auto">
                @if($announcements->update_at == "")
                    <small>{{ $announcements->created_at }}</small>
                @else
                    <small>{{ $announcements->update_at }}</small>
                @endif

                @if(Auth::user()->role == "admin")
                <div class="d-flex">
                    <a href="/announcements/{{$announcements->id}}/edit" class="btn btn-success mr-1">Edit</a>

                    {!! Form::open(['route' => ['announcements.destroy', $announcements->id], 'method'=>'post','class'=>'ml-1']) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
                @endif
            </div>

        </div>

        <hr>
        <div class="card shadow-lg mb-5">
        <span class="card-body">{{$announcements->description}}</span>
        </div>

        <h5>Comments</h5>
        <hr>
        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif

        {!! Form::open(['route' => 'comments.store', 'method'=>'post','class'=>'d-flex']) !!}
        {!! Form::text('comment_value', '', ['class'=>'form-control mr-1','placeholder'=>'Enter your comment here...']) !!}
        {!! Form::hidden('announcements_id', $announcements->id) !!}
        {!! Form::hidden('user_id', Auth::user()->id) !!}
        {!! Form::submit('Submit', ['class'=> 'btn btn-primary ml-1']) !!}
        {!! Form::close() !!}

        @foreach ($comments as $user_comment)
        <div class="card m-2">
            <div class="card-body d-flex">
                <img src="{{$user_comment->user->profile_img}}" style="height:30px; width:30px; border-radius:50%;">
                <div class="container">
                <span class="mr-1"><strong>{{$user_comment->user->userInfo->chapter}} {{ $user_comment->user->userInfo->call_sign}}</strong></span>
                    <span>|</span>
                    <small class="mr1">{{$user_comment->created_at}}</small>

                    @if($user_comment->user->role == "admin")
                    <span>|</span>
                    <small class="mr-1 text-danger">Admin</small>
                    @endif

                    <br>
                    <span>{{ $user_comment->comment_value  }}</span>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection
