@extends('master')
@section('title', 'Register')
@section('content')
    <div class="text-center mt-5">
        <h1>Register</h1>
        <form action="{{ route('auth.register.store') }}" method="post">
            @csrf
            <div class="form-group mt-3 mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary form-control">Register</button>
        </form>
    </div>
@endsection