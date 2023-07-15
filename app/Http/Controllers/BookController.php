<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function books()
    {
        $books = Book::paginate(2);
        return view('books/books', [
            'books' => $books
        ]);
    }
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('books/create', [
            'cats' => $categories
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'desc' => 'required|max:500',
            'img' => 'required|image|mimes:png,jpg,jpeg',
            'price' => 'required|numeric|max:9999,99',
            'category_id' => 'required|exists:categories,id'
        ]);
        $imgPath = Storage::putFile('books', $request->img);
        Book::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath,
            'price' => $request->price,
            'category_id' => $request->category_id,

        ]);
        return redirect(url('/books'));
    }
    public function getById($id)
    {
        $book = Book::findOrFail($id);
        return view('books/show', [
            'book' => $book
        ]);
    }
}
