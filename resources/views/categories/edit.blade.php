<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Category</h1>
    @include('errors')
    <form action="{{ url('update/category', $cat->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="text" name="name" id="" value="{{ $cat->name }}">
        <br>
        <input type="file" name="img" id="" value="">
        <br>
        <textarea name="desc" id="" cols="30" rows="10">{{ $cat->desc }}</textarea>
        <br>
        <button type="submit">Update</button>
    </form>
</body>

</html>
