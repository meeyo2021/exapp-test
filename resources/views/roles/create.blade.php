@extends('layouts.app')

@section('content')
    <h1>Create Role</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\RolesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Role Name')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Role Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('desc', 'Description')}}
            {{Form::text('desc', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}   
    
@endsection