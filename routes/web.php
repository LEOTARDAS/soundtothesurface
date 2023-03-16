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

//Route::get('/', function () {
//    return view('home.index');
//})->name('hone.index');

//    Route::get('/contact', function(){
//        return view('home.contact');
//    })->name('home.contact');

Route::view('/contact','home.contact');
Route::view('/','home.index');


Route::get('/articles/{id}', function($articleId){
    $articles = [
        1 =>[
            'title' => 'Article 1',
            'content' => 'Article 1 content'
        ],
        2 =>[
            'title' => 'Article 2',
            'content' => 'Article 2 content'
        ]
        ];
    
    abort_if(!isset($articles[$articleId]), 404);

    return view('articles.show', $articles[$articleId]);
});

