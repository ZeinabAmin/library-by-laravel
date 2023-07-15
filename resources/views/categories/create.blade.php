@extends('layout')
@section('title')
    Add Category
@endsection
{{-- @section('cssstyle')
<link rel="stylesheet" href="{{asset('css/styleadd.css')}}">
@endsection --}}
@section('content')
    <h1>Add Category</h1>
    @include('errors')
    <form action="{{ url('store/category') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="">
        <br>
        <textarea name="desc" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="file" name="img" id="">
        <br>
        <button type="submit">Add</button>
    </form>
@endsection
