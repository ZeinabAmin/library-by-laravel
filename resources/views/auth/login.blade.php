@extends('layout')
@section('title')
    Login
@endsection
@section('content')
    @include('errors')
    @if ($request->session()->has('register message'))
        <div class="alert alert-sucess">
            <p>{{ $request->session()->get('register message') }}</p>
        </div>
    @endif
    <form action="{{ url('login') }}" method="post">
        @csrf
        <input type="text" name="email" id="" placeholder="email">
        <br>
        <input type="password" name="password" id="" placeholder="password">
        <br>
        <button type="submit">Login</button>
    </form>
@endsection
