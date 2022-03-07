@extends('master')
@section('title', 'Create New User')
@section('content')
    <div class="mt-5 text-center">
        <h3>Create New User</h3>
    </div>
    <form action="{{ route('all-users.store.admin') }}" method="post">
        @csrf
        <div class="form-group mt-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary form-control mt-5">Create a User</button>
    </form>
    
@endsection