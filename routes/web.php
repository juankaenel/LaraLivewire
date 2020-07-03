<?php

use App\Comment;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
//$comments = Comment::all();
//return view('welcome', compact('comments'));
    return view('welcome');
});*/

//ruta , componente, nombre
Route::livewire('/','home')->name('home');
Route::livewire('/login','login')->name('login');
Route::livewire('/logout','logout')->name('logout');
Route::livewire('/register','register');
