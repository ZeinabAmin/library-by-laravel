@extends('layout')
@section('title')
    All Categories
@endsection
@section('content')
    <h1>All Books</h1>

    <a href="{{ url('create/book') }}">Add book</a>
    @foreach ($books as $book)
        {{-- url() 127.0.0.1:8000/ --}}
        <a href="{{ url('book', $book->id) }}">
            <h3>{{ $book->id }}-{{ $book->name }}</h3>
        </a>
        <img src='{{ asset("uploads/$book->img") }}' width="400px" alt="">
        <p>{{ $book->desc }}</p>
    @endforeach
    {{ $books->links() }}
@endsection
