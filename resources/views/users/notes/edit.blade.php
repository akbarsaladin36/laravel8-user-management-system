@extends('master')
@section('title', 'Edit Notes')
@section('content')
    <div class="mt-5 text-center">
        <h3>Edit Notes</h3>
    </div>
    <div class="mt-5">
        <form action="{{ route('attendance.update.user', ['id'=>$attendance->id])}}" method="post" class="mt-3">
            @csrf
            @method('PATCH')
            <div class="form-group mt-3">
                <label for="attendance_notes">Attendance Notes</label>
                <input type="text" name="attendance_notes" id="attendance_notes" class="form-control" value="{{ $attendance->attendance_notes }}">
            </div>
            <button type="submit" class="btn btn-success form-control mt-3">Update</button>
        </form>
    </div>
@endsection