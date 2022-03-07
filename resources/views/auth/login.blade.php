@extends('master')
@section('title', 'Login')
@section('content')
<div class="text-center mt-5">
    <h1>Login</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('danger'))
        <div class="alert alert-danger">{{ session('danger') }}</div>
    @endif
    <form action="{{ route('auth.login.store') }}" method="post">
        @csrf
        <div class="form-group mt-3 mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group mt-3 mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary form-control">Login</button>
    </form>
</div>
@endsection