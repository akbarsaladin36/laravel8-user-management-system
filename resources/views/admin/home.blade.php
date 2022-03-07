@extends('master')
@section('title', 'Dashboard')
@section('content')
    <div class="mt-5 text-center">
        <h3>Selamat Datang, {{ $admin->username }}</h3>
    </div>
    <div class="row mt-5 ms-5">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body text-center">
                  <h5 class="card-title">User Created</h5>
                  <h1 class="card-text">{{ $users->count() }}</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body text-center">
                  <h5 class="card-title">User Notes</h5>
                  <h1 class="card-text">{{ $all_notes->count() }}</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body text-center">
                  <h5 class="card-title">User Attends</h5>
                  <h1 class="card-text">{{ $all_attends->count() }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection