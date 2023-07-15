@extends('layout')
@section('title')
    Search
@endsection
@section('content')
    <h3>Search Result</h3>
    <form action="{{ url('search/category') }}" method="get">
        <input type="text" name="keyword" id="" value="{{ $keyword }}">
        <br>
        <button type="submit">Search</button>
    </form>
    @foreach ($cats as $category)
        <h5>{{ $category->name }}</h5>
        <img src='{{ asset("uploads/$category->img") }}' width="400px" alt="">
        <p>{{ $category->desc }}</p>
    @endforeach
    <a href="{{ url('/categories') }}"><button>back</button></a>
@endsection
