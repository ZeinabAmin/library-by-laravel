@extends('layout')
@section('title')
    All Categories
@endsection
@section('content')
    @if ($request->session()->has('logged message'))
        <div class="alert alert-sucess">
            <p>{{ $request->session()->get('logged message') }}</p>
        </div>
    @endif
    <h1>All Categories</h1>
    <form action="{{ url('search/category') }}" method="get">
        <input type="text" name="keyword" id="">
        <br>
        <button type="submit">Search</button>
    </form>
    <a href="{{ url('create/category') }}">Add Category</a>
    @foreach ($cats as $category)
        {{-- url() 127.0.0.1:8000/ --}}
        <a href="{{ url('category', $category->id) }}">
            <h3>{{ $category->id }}-{{ $category->name }}</h3>
        </a>
        <img src='{{ asset("uploads/$category->img") }}' width="400px" alt="">
        <p>{{ $category->desc }}</p>
        <a href="{{ url('edit/category', $category->id) }}">
            Edit</a>
        <form action="{{ url('delete/category', $category->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Delete</button>
        </form>
    @endforeach
    {{ $cats->links() }}
@endsection
