@extends('master')
@section('title', 'Edit Admin Profile')
@section('content')
    <div class="mt-5 text-center">
        <h3>Edit Admin Profile</h3>
    </div>
    <form action="{{ route('profile.update.admin') }}" method="post">
        @csrf
        @method('PATCH')
        <div class="row mt-5 text-center">
            <div class="col">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $admin->first_name }}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $admin->last_name }}">
                </div>
            </div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $admin->address }}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $admin->phone_number }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success form-control mt-5">Update Profile</button>
    </form>
    
@endsection