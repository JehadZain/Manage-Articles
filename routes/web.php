<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


define('PAGINATION_COUNT', 3);


Route::get('/', function () {
    return view('welcome');
})-> name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('article/show', 'CRUD\AritController@getAllArticle')->name('article.show');

Route::group(['prefix' => 'article' , 'namespace' => 'CRUD' ,'middleware' => 'auth'], function (){
    Route::get('create','AritController@create');
    Route::post('store', 'AritController@store') -> name('article.store');
    Route::get('showAdmin', 'AritController@getAllArticleAdmin')->name('article.show');
    Route::get('edit/{article_id}','AritController@editArticle')->name('article.edit');
    Route::post('update/{article_id}', 'AritController@updateArticle')->name('article.update');
    Route::get('delete/{article_id}', 'AritController@deleteArticle')->name('article.delete');
});



Route::group(['prefix' => 'category' , 'namespace' => 'CRUD','middleware' => 'auth'], function (){
    Route::get('create', 'CateController@create');
    Route::post('store','CateController@store') -> name('category.store');
    Route::get('edit/{category_id}', 'CateController@editCategory')->name('category.edit');
    Route::get('showAdmin', 'CateController@getAllCategoryAdmin')->name('category.show');
    Route::post('update/{category_id}', 'CateController@updateCategory')->name('category.update');
    Route::get('delete/{category_id}', 'CateController@deleteCategory')->name('category.delete');
});

Route::group(['middleware' => 'CheckType'], function (){
Route::get('/jehad', 'jehadController@jehad') ->name('type');
});


