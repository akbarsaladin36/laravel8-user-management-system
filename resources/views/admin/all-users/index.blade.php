@extends('master')
@section('title', 'All Users')
@section('content')
    <div class="mt-5 text-center">
        <h3>All Users</h3>
    </div>
    <div class="mt-5 text-center">
        <a href="{{ route('all-users.create.admin') }}" class="btn btn-primary mb-5">Create Users</a>

        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if ($all_users->count() === 0)
                  <tr>
                    <td colspan="5">No users are join in this website. You will see a user join in this table.</td>
                  </tr>
                @else
                    @foreach ($all_users as $users)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $users->username }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->role }}</td>
                        <td>
                          <form action="{{ route('all-users.delete.admin', ['id'=>$users->id]) }}" method="post">
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