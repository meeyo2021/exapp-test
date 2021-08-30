@extends('layouts.app')

@section('content')
    <h1>Edit Role</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\RolesController@update', $role->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Role Name')}}
            {{Form::text('title', $role->roleName, ['class' => 'form-control', 'placeholder' => 'Role Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('desc', 'Description')}}
            {{Form::textarea('desc', $role->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}   
    
@endsection