@extends('layouts.app')
@section('title', 'User Profile')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link btn btn-raised btn-secondary active" href="{{ url('/profile/profile/'. $id) }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-raised" href="{{ url('/profile/information/'. $id) }}">Information</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Update Profile</div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif(\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                <form action="{{ url('/profile/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" name="id" value="{{ $id }}">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-4">
                                <img class="profile_image" width="225" height="225" class="d-block" src="{{ url(asset('storage/'. $user->profile_img)) }}" alt="" srcset="">
                                <div class="form-group">
                                <input type="file" class="form-control-file" name="profile_img" id="profile_img">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                                </div>
                            </div>
                            <div class="col-md-8">                        
                                <div class="form-group ">
                                    <label for="username" class="bmd-label-floating">USERNAME</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" readonly value="{{ $user->username }}">
                                </div>
                                <div class="form-group ">
                                    <label for="email" class="bmd-label-floating">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ $user->email }}">
                                </div>
                                <div class="form-group ">
                                    <label for="old_password" class="bmd-label-floating">Old-Password</label>
                                    <input type="password" class="form-control" id="old_password" name="old_password" value="{{ old('old_password') }}">
                                </div>
                                <div class="form-group ">
                                    <label for="password" class="bmd-label-floating">New-Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                                </div>
                                <div class="form-group ">
                                    <label for="password_confirmation" class="bmd-label-floating">Re-type Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-raised btn-success"><i class="fas fa-angle-double-right"></i> Update </button>
                    </div>
                </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
