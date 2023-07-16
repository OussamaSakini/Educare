<?php

use Illuminate\Support\Facades\Route;

use  App\Models\User;
use  App\Models\Employee;
use  App\Models\book;
use Illuminate\Http\Request;


use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('books',BookController::class);

Route::get('books', function () {
    return Book::all();
});


Route::group(['namespace'=>'Api\Auth'], function () {
    Route::post('/login','AuthenticationController@login');
});

Route::get('users', function () {
    return User::all();
});

Route::get('/employee',[EmployeeController::class,'getEmployee']);
Route::post('/addemployee',[EmployeeController::class,'addEmployee']);


/*Route::get('employee', function () {
    return Employee::all();
});
*/
Route::get('books', function () {
    return Book::all();
});

Route::any('add','UserController@add');
Route::any('update','UserController@update');
Route::any('delete','UserController@delete');
Route::any('show','UserController@show');

