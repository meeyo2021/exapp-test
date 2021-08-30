@extends('layouts.app')

@section('content')
    <h1>Users</h1><a class="btn btn-success" href="users/create">ADD USER</a>
    @if(count($users) > 0)
        @foreach($users as $user)
            <div class="container">
                <h3><a href="/users/{{$user->id}}">{{ $user->name }}</a></h3>
            </div>
        @endforeach
        {{$users->links()}}
    @else
        <p>No users found</p>
    @endif
    
@endsection