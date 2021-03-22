@extends('master')

@section('content')

@include('users.partials.validation-error')

    <form action="{{ route("users.store") }}" method="POST">
        @include('users._form', ['passw' => true])
    </form>  

@endsection
