
@csrf
<div class="form-group">
    <label for="name">Nombre</label>
<input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
</div>
<div class="form-group">
    <label for="lastname">Apellido</label>
    <input class="form-control" type="text" name="lastname" id="lastname" value="{{ old('lastname', $user->lastname) }}">
</div>
<div class="form-group">
    <label for="username">Usuario</label>
    <input class="form-control" type="text" name="user_name" id="user_name" value="{{ old('user_name', $user->user_name) }}" >
</div>
<div class="form-group">
    <label for="email">E-mail</label>
    <input class="form-control" type="email" name="email"  value="{{ old('email', $user->email) }}" >
</div>
@if ($passw)
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input class="form-control" type="password" name="password" id="password" value="{{ old('password', $user->password) }}">
    </div>
@endif

<button type="submit" class="btn btn-primary">Enviar</button>