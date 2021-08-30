@extends('layouts.app')

@section('content')
    <h1>Create User</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\UsersController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('uname', 'User Name')}}
            {{Form::text('uname', '', ['class' => 'form-control', 'placeholder' => 'User Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'E-mail')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'E-mail'])}}
        </div>
        <div class="form-group">
            {{Form::label('npw', 'Nominated Password')}}
            {{Form::text('npw', '', ['class' => 'form-control', 'placeholder' => 'Nominated Password', 'type' => 'password'])}}
        </div>
        <div class="form-group">
            {{Form::label('cpw', 'Confirm Password')}}
            {{Form::text('cpw', '', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'type' => 'password'])}}
        </div>
        <div class="form-group">
            {{Form::label('role', 'Role')}}
            <select class="form-control" name="roleId">
                <option>Select Item</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}"> 
                        {{ $role->roleName }} 
                    </option>
                @endforeach    
            </select>
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}   
    
@endsection