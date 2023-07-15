@extends('layout')
@section('title')
    Latest Categories
@endsection
@section('content')
    <h3>Latest Categories</h3>
    @foreach ($cats as $cat)
        <h5>{{ $cat->name }}</h5>
        <p>{{ $cat->desc }}</p>
    @endforeach
@endsection
