<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/page1',function(){
    return "<h1>my first page </h1>";
});

Route::get('/page/{name}', function($name) {
    return "<h1>Welcome {$name}</h1>";
});


Route::get('/page2/{name?}', function($name = null) {

    if ($name === null) {
        $msg = "try again!";
    } else {
        $msg = "marhbee " . $name;
    }

    return view('page2', ["message" => $msg]);

})->where('name', '[a-zA-Z]+');

Route::get('/home',[HomeController::class,'index']);
Route::get('/contact1',[HomeController::class,'contact'])->name('mycontact');

Route::get('/contact',[HomeController::class,'showForm'])->name('contact.form');
Route::post('contact', [HomeController::class,'submitForm']);
Route::get('restricted', function(){

    return "you are authorized to access to this page!!";
})->middleware('verif.age');
