@extends('layouts.app')

@section('content')
    <a href="/users" class="btn btn-secondary">Go Back</a>
    <hr>
    User Name : <h1>{{$user[0]->name}}</h1>
    Email Address : <h3>{{$user[0]->email}}</h3>
    @if(!empty($user[0]->roleName))
    Role : <h3>{{$user[0]->roleName}}</h3>
    @endif
    <hr>
    <a href="/users/{{$user[0]->id}}/edit" class="btn btn-primary">EDIT</a>

    {!!Form::open(['action'=>['App\Http\Controllers\UsersController@destroy', $user[0]->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection