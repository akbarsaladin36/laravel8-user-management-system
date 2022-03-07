@extends('master')
@section('title', 'All Notes')
@section('content')
    <div class="mt-5 text-center">
        <h3>All Notes</h3>
    </div>

    <div class="mt-5 text-center">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Notes</th>
                <th scope="col">Notes Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if ($all_notes->count() === 0)
                  <tr>
                    <td colspan="5">No users are join in this website. You will see a user join in this table.</td>
                  </tr>
                @else
                    @foreach ($all_notes as $notes)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $notes->username }}</td>
                        <td><a href="{{ route('all-notes.show.admin', ['id'=>$notes->id]) }}">{{ $notes->attendance_notes }}</a></td>
                        <td>{{ $notes->attendance_status }}</td>
                        <td>
                          <form action="{{ route('all-notes.delete.admin', ['id'=>$notes->id]) }}" method="post">
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