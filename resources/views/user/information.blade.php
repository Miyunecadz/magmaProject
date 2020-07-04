@extends('layouts.app')
@section('title', 'User Information')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link btn btn-raised " href="{{ url('/profile/profile/'. $id) }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-raised btn-secondary active" href="{{ url('/profile/information/'. $id) }}">Information</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @php
            $profile_info = $user->userinfo;
        @endphp
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Update Information</div>
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
                    <form action="{{ url('/profile/information/update')}}" method="post">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{ $id }}">
                        <div class="card-body">
                            <div class="form-group ">
                            <label for="fullname" class="bmd-label-floating">FULL NAME (Last name, First name MI.)</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Ex. Cruz, Juan D." value="{{ isset($profile_info)? $profile_info->fullname : old('fullname') }}">
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="call_sign" class="bmd-label-floating">CALL SIGN</label>
                                <input type="text" class="form-control" id="call_sign" name="call_sign" placeholder="Call Sign" value="{{ isset($profile_info)? $profile_info->call_sign : old('call_sign') }}">
                            </div>
                            <div class="col">
                                <label for="chapter" class="bmd-label-floating">CHAPTER</label>
                                <input type="text" class="form-control" id="chapter" name="chapter" placeholder="Chapter"  value="{{ isset($profile_info)? $profile_info->chapter : old('chapter') }}">
                            </div>
                            <div class="col">
                                <label for="contact_no" class="bmd-label-floating">CONTACT NO.</label>
                                <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact number" value="{{ isset($profile_info)? $profile_info->contact_no : old('contact_no') }}">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="present_employment" class="bmd-label-floating">PRESENT EMPLOYMENT</label>
                            <input type="text" class="form-control" id="present_employment" name="present_employment" placeholder="Present Employment" value="{{ isset($profile_info)? $profile_info->present_employment : old('present_employment') }}">
                            </div>
                            <div class="form-group">
                            <label for="home_address" class="bmd-label-floating">HOME ADDRESS</label>
                            <input type="text" class="form-control" id="home_address" name="home_address" placeholder="Home Address" value="{{ isset($profile_info)? $profile_info->home_address : old('home_address') }}">
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="birth_date" class="bmd-label-floating">DATE OF BIRTH</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"  value="{{ isset($profile_info)? $profile_info->birth_date : old('birth_date') }}">
                            </div>
                            <div class="col">
                                <label for="birth_place" class="bmd-label-floating">BIRTH PLACE</label>
                                <input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="Birth Place" value="{{ isset($profile_info)? $profile_info->birth_place : old('birth_place') }}">
                            </div>
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="citizenship" class="bmd-label-floating">CITIZENSHIP</label>
                                <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Citizenship" value="{{ isset($profile_info)? $profile_info->citizenship : old('citizenship') }}">
                            </div>
                            <div class="col">
                                <label for="gender" class="bmd-label-floating">GENDER</label>
                                <select id="gender" name="gender" class="form-control">
                                <option selected>Choose...</option>
                                <option {{  (isset($profile_info) && $profile_info->gender == 'Male')? 'selected' : (old('gender') == 'Male' ? 'selected' : '') }} value="Male">MALE</option>
                                <option {{  (isset($profile_info) && $profile_info->gender == 'Female')? 'selected' : (old('gender') == 'Female' ? 'selected' : '') }} value="Female">FEMALE</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="height" class="bmd-label-floating">HEIGHT</label>
                                <input type="text" class="form-control" id="height" name="height" placeholder="Height" value="{{ isset($profile_info)? $profile_info->height : old('height') }}">
                            </div>
                            <div class="col">
                                <label for="weight" class="bmd-label-floating">WEIGHT</label>
                                <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight" value="{{ isset($profile_info)? $profile_info->weight : old('weight') }}">
                            </div>
                            <div class="col">
                                <label for="blood_type" class="bmd-label-floating">BLOOD TYPE</label>
                                <input type="text" class="form-control" id="blood_type" name="blood_type" placeholder="Blood type" value="{{ isset($profile_info)? $profile_info->blood_type : old('blood_type') }}">
                            </div>
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="emergency_name" class="bmd-label-floating">IN CASE OF EMERGENCY, Pls notify</label>
                                <input type="text" class="form-control" id="emergency_name" name="emergency_name" placeholder="Emergency Contact Name" value="{{ isset($profile_info)? $profile_info->emergency_name : old('emergency_name') }}">
                            </div>
                            <div class="col">
                                <label for="emergency_relation" class="bmd-label-floating">Relation</label>
                                <input type="text" class="form-control" id="emergency_relation" name="emergency_relation" placeholder="Relation" value="{{ isset($profile_info)? $profile_info->emergency_relation : old('emergency_relation') }}">
                            </div>
                            <div class="col">
                                <label for="emergency_contact_no" class="bmd-label-floating">CONTACT NO.</label>
                                <input type="text" class="form-control" id="emergency_contact_no" name="emergency_contact_no" placeholder="Contact Number" value="{{ isset($profile_info)? $profile_info->emergency_contact_no : old('emergency_contact_no') }}">
                            </div>
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="father_name" class="bmd-label-floating">NAME OF THE FATHER</label>
                                <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Name of the father" value="{{ isset($profile_info)? $profile_info->father_name : old('father_name') }}">
                            </div>
                            <div class="col">
                                <label for="father_occupation" class="bmd-label-floating">OCCUPATION</label>
                                <input type="text" class="form-control" id="father_occupation" name="father_occupation" placeholder="Occupation" value="{{ isset($profile_info)? $profile_info->father_occupation : old('father_occupation') }}">
                            </div>
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="mother_name" class="bmd-label-floating">NAME OF THE MOTHER</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Name of the mother" value="{{ isset($profile_info)? $profile_info->mother_name : old('mother_name') }}">
                            </div>
                            <div class="col">
                                <label for="mother_occupation" class="bmd-label-floating">OCCUPATION</label>
                                <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" placeholder="Occupation" value="{{ isset($profile_info)? $profile_info->mother_occupation : old('mother_occupation') }}">
                            </div>
                            </div>
                            <H6>EXISTING SET-UP/EQUIPMENT(Indicate quantity, if none, put 0):</H6>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="setup_hr" class="bmd-label-floating">HR RADIO</label>
                                <input type="number" class="form-control" id="setup_hr" name="setup_hr" value="{{ isset($profile_info)? $profile_info->setup_hr : (old('setup_hr') or '0' )}}" />
                            </div>
                            <div class="col">
                                <label for="setup_vhf" class="bmd-label-floating">VHF RADIO</label>
                                <input type="number" class="form-control" id="setup_vhf" name="setup_vhf" value="{{ isset($profile_info)? $profile_info->setup_vhf : (old('setup_vhf') or '0') }}" />
                            </div>
                            <div class="col">
                                <label for="setup_uhf" class="bmd-label-floating">UHF RADIO</label>
                                <input type="number" class="form-control" id="setup_uhf" name="setup_uhf" value="{{ isset($profile_info)? $profile_info->setup_uhf : (old('setup_uhf') or '0') }}" />
                            </div>
                            <div class="col">
                                <label for="setup_areal_antenna" class="bmd-label-floating">AERIAL ANTENNA</label>
                                <input type="number" class="form-control" id="setup_areal_antenna" name="setup_areal_antenna" value="{{ isset($profile_info)? $profile_info->setup_areal_antenna : (old('setup_areal_antenna') or '0') }}" />
                            </div>
                            <div class="col">
                                <label for="setup_spare_battery" class="bmd-label-floating">SPARE BATTERY</label>
                                <input type="number" class="form-control" id="setup_spare_battery" name="setup_spare_battery" value="{{ isset($profile_info)? $profile_info->setup_spare_battery : (old('setup_spare_battery') or '0') }}" />
                            </div>
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="setup_generator" class="bmd-label-floating">GENERATOR</label>
                                <input type="number" class="form-control" id="setup_generator" name="setup_generator" value="{{ isset($profile_info)? $profile_info->setup_generator : (old('setup_generator') or '0') }}" />
                            </div>
                            <div class="col">
                                <label for="setup_solar_panel" class="bmd-label-floating">SOLAR PANEL</label>
                                <input type="number" class="form-control" id="setup_solar_panel" name="setup_solar_panel" value="{{ isset($profile_info)? $profile_info->setup_solar_panel : (old('setup_solar_panel') or '0') }}" />
                            </div>
                            <div class="col">
                                <label for="setup_battery" class="bmd-label-floating">BATTERY</label>
                                <input type="number" class="form-control" id="setup_battery" name="setup_battery" value="{{ isset($profile_info)? $profile_info->setup_battery : (old('setup_battery') or '0') }}" />
                            </div>
                            <div class="col">
                                <label for="setup_mobile_setup" class="bmd-label-floating">MOBILE SET-UP</label>
                                <input type="number" class="form-control" id="setup_mobile_setup" name="setup_mobile_setup" value="{{ isset($profile_info)? $profile_info->setup_mobile_setup : (old('setup_mobile_setup') or '0') }}" />
                            </div>
                            <div class="col">
                                <label for="setup_drone" class="bmd-label-floating">DRONE</label>
                                <input type="number" class="form-control" id="setup_drone" name="setup_drone" value="{{ isset($profile_info)? $profile_info->setup_drone : (old('setup_drone') or '0') }}" />
                            </div>
                            </div>
                            <H6>NAME OF SIBLING/s (leave blank if none):</H6>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="siblings1" class="bmd-label-floating">NAME</label>
                                <input type="text" class="form-control" id="siblings1" name="siblings1" placeholder="Name" value="{{ isset($profile_info)? $profile_info->siblings1 : old('siblings1') }}">
                            </div>
                            <div class="col">
                                <label for="siblings2" class="bmd-label-floating">NAME</label>
                                <input type="text" class="form-control" id="siblings2" name="siblings2" placeholder="Name" value="{{ isset($profile_info)? $profile_info->siblings2 : old('siblings2') }}">
                            </div>
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="siblings3" class="bmd-label-floating">NAME</label>
                                <input type="text" class="form-control" id="siblings3" name="siblings3" placeholder="Name" value="{{ isset($profile_info)? $profile_info->siblings3 : old('siblings3') }}">
                            </div>
                            <div class="col">
                                <label for="siblings4" class="bmd-label-floating">NAME</label>
                                <input type="text" class="form-control" id="siblings4" name="siblings4" placeholder="Name" value="{{ isset($profile_info)? $profile_info->siblings4 : old('siblings4') }}">
                            </div>
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="siblings5" class="bmd-label-floating">NAME</label>
                                <input type="text" class="form-control" id="siblings5" name="siblings5" placeholder="Name" value="{{ isset($profile_info)? $profile_info->siblings5 : old('siblings5') }}">
                            </div>
                            <div class="col">
                                <label for="siblings6" class="bmd-label-floating">NAME</label>
                                <input type="text" class="form-control" id="siblings6" name="siblings6" placeholder="Name" value="{{ isset($profile_info)? $profile_info->siblings6 : old('siblings6') }}">
                            </div>
                            </div>
                            <H6>SCHOOLS ATTENDED:</H6>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="school_secondary" class="bmd-label-floating">SECONDARY</label>
                                <input type="text" class="form-control" id="school_secondary" name="school_secondary" placeholder="Secondary" value="{{isset($profile_info)?  $profile_info->school_secondary : old('school_secondary') }}">
                            </div>
                            <div class="col">
                                <label for="secondary_date_graduate" class="bmd-label-floating">YEAR</label>
                                <input type="text" class="form-control" id="secondary_date_graduate" name="secondary_date_graduate" placeholder="Year" value="{{isset($profile_info)?  $profile_info->secondary_date_graduate : old('secondary_date_graduate') }}">
                            </div>
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="school_college" class="bmd-label-floating">COLLEGE</label>
                                <input type="text" class="form-control" id="school_college" name="school_college" placeholder="College" value="{{isset($profile_info)?  $profile_info->school_college : old('school_college') }}">
                            </div>
                            <div class="col">
                                <label for="college_date_graduate" class="bmd-label-floating">YEAR</label>
                                <input type="text" class="form-control" id="college_date_graduate" name="college_date_graduate" placeholder="Year" value="{{isset($profile_info)?  $profile_info->college_date_graduate : old('college_date_graduate') }}">
                            </div>
                            </div>
                            <div class="form-group form-row">
                            <div class="col">
                                <label for="school_post" class="bmd-label-floating">POST GRADUATE</label>
                                <input type="text" class="form-control" id="school_post" name="school_post" placeholder="Post Graduate" value="{{ isset($profile_info)? $profile_info->school_post : old('school_post') }}">
                            </div>
                            <div class="col">
                                <label for="post_date_graduate" class="bmd-label-floating">YEAR</label>
                                <input type="text" class="form-control" id="post_date_graduate" name="post_date_graduate" placeholder="Year" value="{{ isset($profile_info)? $profile_info->post_date_graduate : old('post_date_graduate') }}">
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
