@extends('layout')
@section('title')
    show book
@endsection
{{-- @section('cssstyle')
<link rel="stylesheet" href="{{asset('css/styleadd.css')}}">
@endsection --}}
@section('content')
    <h1>Show Book</h1>
    <h3>{{ $book->name }}</h3>
    <h5>category:{{ $book->category->name }}</h5>
    <p>{{ $book->desc }}</p>
    <p>{{ $book->price }}</p>
    <img src='{{ asset("uploads/$book->img") }}' width="400px" alt="">
@endsection
