<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function getAllCategories(Request $request)
    {
        $categories = Category::paginate(2);
        // $categories=Category::All();
        //dd($categories);
        return view('categories/categories', [
            'cats' => $categories,
            'request' => $request
        ]);
        // return view('categories.categories');
    }
    public function getById($id)
    {
        // $category=Category::find($id);
        $category = Category::findOrFail($id);
        return view('categories/show', [
            'cat' => $category
        ]);
    }
    public function create()
    {
        return view('categories/create');
    }
    public function store(Request $request)
    {
        // echo $request->name , $request->desc;
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:50',
            'desc' => 'required|max:500',
            'img' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $imgPath = Storage::putFile('categories', $request->img);
        Category::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath
        ]);
        return redirect(url('/categories'));
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        //dd($category);
        return view('categories/edit', [
            'cat' => $category,
        ]);
    }
    public function update($id, Request $request)
    {
        // echo $id , $request->name , $request->desc;
        $request->validate([
            'name' => 'required|string|max:50',
            'desc' => 'required|max:500',
            'img' => 'image|mimes:png,jpg,jpeg'
        ]);
        // Category::findOrFail($id)->update([])
        $category = Category::findOrFail($id);
        $imgPath = $category->img; //img name
        if ($request->hasFile('img')) { //input name img
            $imgPath = Storage::putFile('categories', $request->img);
        }
        $category->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath
        ]);
        return redirect(url('/categories'));
    }
    public function delete($id)
    {
        // Category::findOrFail($id)->delete();
        $category = Category::findOrFail($id);
        Storage::delete($category->img); //path
        $category->delete();
        return redirect(url('/categories'));
    }
    public function latest($num)
    {
        $categories = Category::orderby('id', 'desc')->take($num)->get(); //get() return arr //foreach
        //$category=Category::orderby('id','desc')->take($num)->first(); //first() return obj
        return view('categories/latest', [
            'cats' => $categories
        ]);
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $searchCategory = Category::where('name', 'like', "%$keyword%")->get();
        // dd($searchCategory);
        return view('categories/search', [
            'cats' => $searchCategory,
            'keyword' => $keyword
        ]);
    }
}
