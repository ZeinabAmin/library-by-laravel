<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Show Categories</h1>
    <h3>{{ $cat->name }}</h3>
    <p>{{ $cat->desc }}</p>
    <img src='{{ asset("uploads/$cat->img") }}' width="400px" alt="">

    <ul>
        @foreach ($cat->books as $book)
            <a href="{{ url('book', $book->id) }}">
                <li>{{ $book->name }}</li>
            </a>
        @endforeach
    </ul>
    <br>
    <a href="{{ url('create/book') }}">Add book</a>
</body>

</html>
