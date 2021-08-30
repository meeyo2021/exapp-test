@extends('layouts.app')

@section('content')
    <a href="/roles" class="btn btn-secondary">Go Back</a>
    <h1>{{$role->roleName}}</h1>
    <h3>{{$role->description}}</h3>
    <hr>
    <a href="/roles/{{$role->id}}/edit" class="btn btn-primary">EDIT</a>

    {!!Form::open(['action'=>['App\Http\Controllers\RolesController@destroy', $role->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection