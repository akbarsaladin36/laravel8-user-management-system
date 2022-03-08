@extends('master')
@section('title', 'All Attendances')
@section('content')
    <div class="mt-5 text-center">
        <h3>All Attendances</h3>
    </div>

    <div class="mt-5 text-center">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Present Time</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if ($attendances->count() === 0)
                  <tr>
                    <td colspan="5">No users are attend on company. Please check everyday to get a better result.</td>
                  </tr>
                @else
                    @foreach ($attendances as $attendance)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $attendance->username }}</td>
                        <td>{{ $attendance->attendance_start_dttm }}</td>
                        <td>
                          <form action="{{ route('all-attendances.delete.admin', ['id'=>$attendance->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
    </div>

@endsection