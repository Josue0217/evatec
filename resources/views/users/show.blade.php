@extends('master')

@section('content')

        <div class="form-group">
            <label for="name">Nombre</label>
        <input readonly class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="lastname">Apellido</label>
            <input readonly class="form-control" type="text" name="lastname" id="lastname" value="{{ $user->lastname }}">
        </div>
        <div class="form-group">
            <label for="lastname">Usuario</label>
            <input readonly class="form-control" type="text" name="user_name" id="user_name" value="{{ $user->user_name }}">
        </div>
        <div class="form-group">
            <label for="lastname">E-mail</label>
            <input readonly class="form-control" type="text" name="email" id="lastname" value="{{ $user->email }}">
        </div>
        <a type="buttom" href="{{ url ('/users/') }}" class="btn btn-primary">Atrás</a>
    
@endsection
