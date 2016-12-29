<?php
//index route
Route::get('/','IndexController@index');

//article route
Route::get('/article/item-{id}.html','ArticleController@item')->where("id","\d+");
Route::get('/article-{id}.html','ArticleController@load')->where("id","\d+");

//product route
Route::get('/all','CategoryController@index');
Route::get('/all-{content}','CategoryController@item')->where("content","[0-9cv-]+");
Route::get('/product-{id}.html','ProductController@load')->where("id","\d+");

//comment route
Route::get('/comment-{id}.html','ProductController@load')->where("id","\d+");

Route::get('/comment/item-ajax','CommentController@itemAjax');

//search route
Route::post('/search','SearchController@search');
Route::get('/search','SearchController@search');

//ArticleCategory
Route::get('/category','ArticleCategoryController@index');
Route::get('/category-{id}.html','ArticleCategoryController@load');

//404
Route::get('/404.html','IndexController@index');

//addBatch
Route::get('/addBatch-{id}','ProductController@addBatch')->where("id","\d+");
