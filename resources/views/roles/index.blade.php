@extends('layouts.app')

@section('content')
    <h1>Roles</h1><a class="btn btn-success" href="roles/create">ADD ROLES</a>
    @if(count($roles) > 0)
        @foreach($roles as $role)
            <div class="container">
                <h3><a href="/roles/{{$role->id}}">{{ $role->roleName }}</a></h3>
                {{-- <small>Written on {{$role->created_at}}</small> --}}
            </div>
        @endforeach
        {{$roles->links()}}
    @else
        <p>No roles found</p>
    @endif
    
@endsection