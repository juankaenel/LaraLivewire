<?php

use App\Comment;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
//$comments = Comment::all();
//return view('welcome', compact('comments'));
    return view('welcome');
});*/

Route::livewire('/','home');
Route::livewire('/login','login')->name('login');
Route::livewire('/register','register');
