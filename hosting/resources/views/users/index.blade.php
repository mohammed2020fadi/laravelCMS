@extends('layouts.app')
@section('title', 'Users')

@section('content')
  <div class="card card-default">
    <div class="card-header">[ {{ count($users) }} ] Users</div>
    <div class="card-body p-0">
      @if (count($users) > 0)
        <table class="table table-striped table-dark">
          <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Control</th>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>
                  <img src="{{Gravatar::src($user->email)}}" alt="{{$user->name}}" width="80px" height="80px" class="img-thumbnail">
                </td>
                <td>
                  {{$user->name}}
                </td>
                <td>
                  {{$user->email}}
                </td>
                <td>
                  @if (!$user->isAdmin())
                    <form action="{{ route('users.make-admin', $user->id) }}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-primary btn-sm">Make Admin</button>
                    </form>
                  @else
                    @if (auth()->user()->id == $user->id)
                      <button class="btn btn-success btn-sm disabled" style="cursor: no-drop;">Make Writer</button>
                    @else
                      <form action="{{ route('users.make-writer', $user->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Make Writer</button>
                      </form>
                    @endif
                  @endif
                </td>
              </tr>
            @endforeach              
          </tbody>
        </table>
      @else
        <h3 class="text-center my-2">No Users</h3>
      @endif
    </div>
  </div>
@endsection
