@extends('layout')
@section('title')
    Add book
@endsection
{{-- @section('cssstyle')
<link rel="stylesheet" href="{{asset('css/styleadd.css')}}">
@endsection --}}
@section('content')
    <h1>Add book</h1>
    @include('errors')
    <form action="{{ url('store/book') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="">
        <br>
        <textarea name="desc" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="file" name="img" id="">
        <br>
        <input type="number" name="price" id="">
        <br>
        <select name="category_id" id="">
            @foreach ($cats as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Add</button>
    </form>
@endsection
