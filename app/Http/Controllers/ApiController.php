<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Http\Resources\BookResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function allBooks()
    {
        $books = Book::all();
        //  return $books; //return json
        return BookResource::collection($books);
    }

    public function allCategories()
    {
        // $categories=Category::all();
        $categories = Category::select('id', 'name', 'img')->with('books')->get();
        return $categories; //return json
        //return CategoryResource::collection($categories);
    }

    public function createCategory(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:50',
        //     'desc' =>'required|max:500',
        //     'img' =>'required|image|mimes:png,jpg,jpeg'
        // ]); //postman header accept application/json


        //     $validate = Validator::make([
        //         'name' =>$request->name, //key & value
        //         'desc' =>$request->desc,
        //         'img' =>$request->img,
        //     ],[ 
        //     'name' => 'required|string|max:50',
        //     'desc' => 'required|max:500',
        //     'img' => 'required|image|mimes:png,jpg,jpeg'
        // ]); 
        // // $request->all() //keys & values
        $validate = Validator::make($request->all(), [ //arr values // rules
            'name' => 'required|string|max:50',
            'desc' => 'required|max:500',
            'img' => 'required|image|mimes:png,jpg,jpeg'
        ]); //return true or false

        if ($validate->fails()) {
            return response()->json(["msg" => $validate->errors()]);
        }
        $imgPath = Storage::putFile('categories', $request->img);
        Category::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath
        ]);
        return response()->json(["msg" => "created successfully"]);
    }
    public function updateCategory($id, Request $request)
    {
        //    $request->validate([
        //     'name' => 'required|string|max:50',
        //     'desc' =>'required|max:500',
        //     'img' =>'image|mimes:png,jpg,jpeg'
        // ]);

        $validate = Validator::make($request->all(), [ //arr values // rules
            'name' => 'required|string|max:50',
            'desc' => 'required|max:500',
            'img' => 'nullable|image|max:1024|mimes:png,jpg,jpeg' //max:1024 mb
        ]); //return true or false
        if ($validate->fails()) {
            return response()->json(["msg" => $validate->errors()]);
        }
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
        return response()->json(["msg" => "updated successfully"]);
    }
    public function deleteCategory($id)
    {

        $category = Category::find($id);
        if ($category) {
            Storage::delete($category->img); //path
            $category->delete();
            return response()->json(["msg" => "deleted successfully"]);
        }
        return response()->json(["msg" => "Category Notfound"]);
    }
    public function showCategory($id) //getById
    {
        $category = Category::find($id);
        if ($category) {
            return $category;
        }
        return response()->json(["msg" => "Category Notfound"]);
    }
}
