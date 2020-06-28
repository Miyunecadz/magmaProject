@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Announcement</h2>
        <hr>

        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif


        {!! Form::open(['route' => 'announcements.store', 'method'=>'post']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', '', ['class'=>'form-control','placeholder'=>'Enter your title here....']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', '', ['class'=>'form-control','placeholder'=>'Announcement Description here....']) !!}
            </div>
            {!! Form::submit('Submit', ['class'=> 'btn btn-primary']) !!}
        {!! Form::close() !!}
@endsection
