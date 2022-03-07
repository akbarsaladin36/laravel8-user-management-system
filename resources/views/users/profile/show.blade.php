@extends('master')
@section('title', 'Profile Information')
@section('content')
    <div class="mt-5 text-center">
        <h3>Profile Information</h3>
    </div>
    <div class="row mt-5 text-center">
        <div class="col">
            <label for="first_name"><b>First Name</b></label>
            <p>{{ $user->first_name }}</p>
        </div>
        <div class="col">
            <label for="last_name"><b>Last Name</b></label>
            <p>{{ $user->last_name }}</p>
        </div>
    </div>
    <div class="row mt-5 text-center">
        <div class="col">
            <label for="address"><b>Address</b></label>
            <p>{{ $user->address }}</p>
        </div>
        <div class="col">
            <label for="phone_number"><b>Phone Number</b></label>
            <p>{{ $user->phone_number }}</p>
        </div>
    </div>
    @if (Session::get('user')->id === $user->id)
        <a href="{{ route('profile.edit.user') }}" class="btn btn-success form-control mt-5">Edit Profile</a>
    @endif
    
@endsection