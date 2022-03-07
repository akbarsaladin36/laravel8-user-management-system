@extends('master')
@section('title', 'Home')
@section('content')
    <div class="mt-5 text-center">
        <h3>Selamat Datang, {{ $user->username }}</h3>
    </div>
    <div class="mt-5 text-center">
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Attends Now
        </button>

        {{-- Modal for create a new attends data --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create A Notes</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('attendance.store.user') }}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="notes" class="mb-3">Notes</label>
                        <input type="text" name="attendance_notes" id="attendance_notes" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
                </form>
              </div>
            </div>
          </div>

        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Notes</th>
                <th scope="col">Start Time</th>
                <th scope="col">Stop Time</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if ($attendances->count() === 0)
                  <tr>
                    <td colspan="5">No Notes in this table. Please create to make company know about your appeareance.</td>
                  </tr>
                @else
                    @foreach ($attendances as $attendance)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $attendance->attendance_notes }}</td>
                        <td>{{ $attendance->attendance_start_dttm }}</td>
                        <td>{{ $attendance->attendance_stop_dttm }}</td>
                        @if ($attendance->attendance_status === "completed")
                        <td>
                            Completed!
                        </td>
                        @else
                        <td>
                            <a href="{{ route('attendance.edit.user', ['id' => $attendance->id]) }}" class="btn btn-success">Update</a>
                        </td>
                        @endif
                        
                    </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
    </div>
@endsection