@extends('layout')
@section('title')
    Register
@endsection
@section('content')
    @include('errors')
    <form action="{{ url('register') }}" method="post">
        @csrf
        <input type="text" name="name" id="" placeholder="name">
        <br>
        <input type="text" name="email" id="" placeholder="email">
        <br>
        <input type="password" name="password" id="" placeholder="password">
        <br>
        <input type="password" name="password_confirmation" id="" placeholder="password confirmation">
        <br>
        <button type="submit">Register</button>
    </form>
@endsection
