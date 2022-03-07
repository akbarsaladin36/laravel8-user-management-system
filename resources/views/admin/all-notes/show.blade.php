@extends('master')
@section('title', 'Notes Information')
@section('content')
    <div class="mt-5 text-center">
        <h3>Note Information</h3>
    </div>

    <div class="mt-5">
        <b>Username      :</b>&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $note->username }}</span><br/><br/>
        <b>Notes         :</b>&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $note->attendance_notes }}</span><br/><br/>
        <b>Start Working :</b>&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $note->attendance_start_dttm }}</span><br/><br/>
        <b>Stop Working  :</b>&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $note->attendance_stop_dttm }}</span><br/><br/>
        <b>Status        :</b>&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $note->attendance_status }}</span><br/><br/>
    </div>

    <div class="mt-3 text-center">
        <a href="{{ route('all-notes.admin') }}" class="btn btn-primary form-control">Back</a>
    </div>

@endsection
    
