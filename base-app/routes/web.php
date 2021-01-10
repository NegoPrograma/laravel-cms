<?php

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


/**
 * Database simple examples routes
 */
use Illuminate\Support\Facades\DB;
 Route::get('/insert',function(){
    DB::insert("INSERT INTO posts(title, content) VALUES(?,?)",['esse é um dado inserido com laravel',"esse é o conteúdo."]);
 });

 Route::get('/readAll',function(){
     $array =[];
     $array= DB::select("SELECT * FROM posts");
    print_r($array);
 });

 
 Route::get('/readOne',function(){
    $array =[];
    $array= DB::select("SELECT * FROM posts WHERE id = ?",[1]);
   print_r($array[0]->title);
});

Route::get('/update',function(){
    $updated = DB::update('UPDATE posts SET title = "titulo atualizado" WHERE id = ?',[1]);
    print_r($updated);
});

Route::get('/delete',function(){
    $deleted = DB::delete('DELETE FROM posts WHERE id = ?',[1]);
    print_r($deleted);
});