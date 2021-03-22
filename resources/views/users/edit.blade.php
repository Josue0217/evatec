@extends('master')

@section('content')

@include('users.partials.validation-error')

    <form action="{{ route("users.update", $user->id) }}" method="POST">
        @method('PUT')
        @include('users._form', ['passw' => false])   
    </form>


@endsection