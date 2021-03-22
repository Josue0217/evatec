@extends('master')

@section('content')


    <form action="" method="get">
        <div class="form-group">
            <label for="email">Email</label>
            <input readonly class="form-control" type="text" name="email" value="{{ $user['email'] }}">
        </div>
        <div class="form-group">
            <label for="password">Nueva contraseña</label>
            <input  class="form-control" type="password" name="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar contrasela</label>
            <input  class="form-control" type="password" nname="password_confirmation" >
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection