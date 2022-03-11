@extends('master')
@section('title', 'Admin Profile')
@section('content')
    <div class="mt-5 text-center">
        <h3>Admin's Profile Information</h3>
    </div>
    <div class="row mt-5 text-center">
        <div class="col">
            <label for="first_name"><b>First Name</b></label>
            <p>{{ $admin->first_name }}</p>
        </div>
        <div class="col">
            <label for="last_name"><b>Last Name</b></label>
            <p>{{ $admin->last_name }}</p>
        </div>
    </div>
    <div class="row mt-5 text-center">
        <div class="col">
            <label for="address"><b>Address</b></label>
            <p>{{ $admin->address }}</p>
        </div>
        <div class="col">
            <label for="phone_number"><b>Phone Number</b></label>
            <p>{{ $admin->phone_number }}</p>
        </div>
    </div>
    @if (Session::get('admin')->id === $admin->id)
        <a href="{{ route('profile.edit.admin') }}" class="btn btn-success form-control mt-5">Edit Profile</a>
    @endif
@endsection