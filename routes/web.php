<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/test',function(){
// // select * from categories where id=3
// $category=Category::where('id','=',3)->get();
// // select * from categories where id>3 and name='history'
// $category=Category::where('id','>',1)->where('name','=','history')->get();
// // select * from categories where id>3 or name='history'
// $category=Category::where('id','>',3)->orwhere('name','=','history')->get(); //history science
// // select * from categories where id>2 orderby id desc
// $category=Category::where('id','>',2)->orderby('id','desc')->get(); 
// // select * from categories where id>2 orderby id desc limit 1
// $category=Category::where('id','>',2)->orderby('id','desc')->take(1)->get(); 
// $category=Category::count(); //4
// $category=Category::avg('id'); //2.5000
// $category=Category::sum('id'); //10
// $category=Category::where('id','>',2)->count(); //2
// $category=Category::where('id','=',1)->first(); 
// dd($category);

// });

//category
Route::get('/categories', [CategoryController::class, 'getAllCategories']);
Route::get('/category/{id}', [CategoryController::class, 'getById']);
Route::get('/create/category', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/store/category', [CategoryController::class, 'store']);
Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->middleware('auth');
Route::put('/update/category/{id}', [CategoryController::class, 'update']);
Route::delete('/delete/category/{id}', [CategoryController::class, 'delete'])->middleware('auth');
Route::get('/latest/{num}', [CategoryController::class, 'latest']);
Route::get('/search/category', [CategoryController::class, 'search']);
//book
Route::get('/books', [BookController::class, 'books']);
Route::get('/create/book', [BookController::class, 'create'])->middleware('auth');
Route::post('/store/book', [BookController::class, 'store']);
Route::get('/book/{id}', [BookController::class, 'getById']);
//auth
Route::get('/register', [AuthController::class, 'registerform'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginform'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
