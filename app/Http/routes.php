<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('auth/logout', 'Auth\AuthController@logout');

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'foodtype'],function(){
        //Route::get('admin/foodtype/list', 'Admin\FoodTypeController@index');
        Route::get('list',['as'=>'admin.foodtype.list','uses'=>'Admin\FoodTypeController@index']);
        Route::get('create',['as'=>'admin.foodtype.create','uses'=>'Admin\FoodTypeController@create']);
        Route::post('store',['as'=>'admin.foodtype.store','uses'=>'Admin\FoodTypeController@store']);
        Route::get('delete/{id}',['as'=>'admin.foodtype.delete','uses'=>'Admin\FoodTypeController@delete']);
        Route::get('edit/{id}',['as'=>'admin.foodtype.edit','uses'=>'Admin\FoodTypeController@edit']);
        Route::post('update/{id}',['as'=>'admin.foodtype.update','uses'=>'Admin\FoodTypeController@update']);
    });

    Route::group(['prefix'=>'config'],function(){
        //Route::get('admin/foodtype/list', 'Admin\FoodTypeController@index');
        Route::get('list',['as'=>'admin.config.list','uses'=>'Admin\ConfigController@index']);
        Route::get('create',['as'=>'admin.config.create','uses'=>'Admin\ConfigController@create']);
        Route::post('store',['as'=>'admin.config.store','uses'=>'Admin\ConfigController@store']);
        Route::get('delete/{id}',['as'=>'admin.config.delete','uses'=>'Admin\ConfigController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.config.edit','uses'=>'Admin\ConfigController@edit']);
        Route::post('update/{id}',['as'=>'admin.config.update','uses'=>'Admin\ConfigController@update']);
    });

    Route::group(['prefix'=>'contact'],function(){
        //Route::get('admin/foodtype/list', 'Admin\FoodTypeController@index');
        Route::get('list',['as'=>'admin.contact.list','uses'=>'Admin\ContactController@index']);
        Route::get('create',['as'=>'admin.contact.create','uses'=>'Admin\ContactController@create']);
        Route::post('store',['as'=>'admin.contact.store','uses'=>'Admin\ContactController@store']);
        Route::get('delete/{id}',['as'=>'admin.contact.delete','uses'=>'Admin\ContactController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.contact.edit','uses'=>'Admin\ContactController@edit']);
        Route::post('update/{id}',['as'=>'admin.contact.update','uses'=>'Admin\ContactController@update']);
    });

    Route::group(['prefix'=>'event'],function(){
        //Route::get('admin/foodtype/list', 'Admin\FoodTypeController@index');
        Route::get('list',['as'=>'admin.event.list','uses'=>'Admin\EventController@index']);
        Route::get('create',['as'=>'admin.event.create','uses'=>'Admin\EventController@create']);
        Route::post('store',['as'=>'admin.event.store','uses'=>'Admin\EventController@store']);
        Route::get('delete/{id}',['as'=>'admin.event.delete','uses'=>'Admin\EventController@delete']);
        Route::get('edit/{id}',['as'=>'admin.event.edit','uses'=>'Admin\EventController@edit']);
        Route::post('update/{id}',['as'=>'admin.event.update','uses'=>'Admin\EventController@update']);
        Route::get('delImg/{id}',['as'=>'admin.event.delImg','uses'=>'Admin\EventController@getDelImg']);
    });

    Route::group(['prefix'=>'posttype'],function(){

        Route::get('list',['as'=>'admin.posttype.list','uses'=>'Admin\PostTypeController@index']);
        Route::get('create',['as'=>'admin.posttype.create','uses'=>'Admin\PostTypeController@create']);
        Route::post('store',['as'=>'admin.posttype.store','uses'=>'Admin\PostTypeController@store']);
        Route::get('delete/{id}',['as'=>'admin.posttype.delete','uses'=>'Admin\PostTypeController@delete']);
        Route::get('edit/{id}',['as'=>'admin.posttype.edit','uses'=>'Admin\PostTypeController@edit']);
        Route::post('update/{id}',['as'=>'admin.posttype.update','uses'=>'Admin\PostTypeController@update']);

    });

    Route::group(['prefix'=>'food'],function(){
        Route::get('list',['as'=>'admin.food.list','uses'=>'Admin\FoodController@index']);
        Route::get('create',['as'=>'admin.food.create','uses'=>'Admin\FoodController@create']);
        Route::post('store',['as'=>'admin.food.store','uses'=>'Admin\FoodController@store']);
        Route::get('delete/{id}',['as'=>'admin.food.delete','uses'=>'Admin\FoodController@delete']);
        Route::get('edit/{id}',['as'=>'admin.food.edit','uses'=>'Admin\FoodController@edit']);
        Route::post('update/{id}',['as'=>'admin.food.update','uses'=>'Admin\FoodController@update']);
        Route::get('delImg/{id}',['as'=>'admin.food.delImg','uses'=>'Admin\FoodController@getDelImg']);
    });
    Route::group(['prefix'=>'post'],function(){
        Route::get('list',['as'=>'admin.post.list','uses'=>'Admin\PostController@index']);
        Route::get('create',['as'=>'admin.post.create','uses'=>'Admin\PostController@create']);
        Route::post('store',['as'=>'admin.post.store','uses'=>'Admin\PostController@store']);
        Route::get('delete/{id}',['as'=>'admin.post.delete','uses'=>'Admin\PostController@delete']);
        Route::get('edit/{id}',['as'=>'admin.post.edit','uses'=>'Admin\PostController@edit']);
        Route::post('update/{id}',['as'=>'admin.post.update','uses'=>'Admin\PostController@update']);
        Route::get('delImg/{id}',['as'=>'admin.post.delImg','uses'=>'Admin\PostController@getDelImg']);
    });

    Route::group(['prefix'=>'slide'],function(){
        Route::get('list',['as'=>'admin.slide.list','uses'=>'Admin\SlideController@index']);
        Route::get('create',['as'=>'admin.slide.create','uses'=>'Admin\SlideController@create']);
        Route::post('store',['as'=>'admin.slide.store','uses'=>'Admin\SlideController@store']);
        Route::get('delete/{id}',['as'=>'admin.slide.delete','uses'=>'Admin\SlideController@delete']);
        Route::get('edit/{id}',['as'=>'admin.slide.edit','uses'=>'Admin\SlideController@edit']);
        Route::post('update/{id}',['as'=>'admin.slide.update','uses'=>'Admin\SlideController@update']);
        Route::get('delImg/{id}',['as'=>'admin.slide.delImg','uses'=>'Admin\SlideController@getDelImg']);
    });


    Route::group(['prefix'=>'service'],function(){
        Route::get('list',['as'=>'admin.service.list','uses'=>'Admin\ServiceController@index']);
        Route::get('create',['as'=>'admin.service.create','uses'=>'Admin\ServiceController@create']);
        Route::post('store',['as'=>'admin.service.store','uses'=>'Admin\ServiceController@store']);
        Route::get('delete/{id}',['as'=>'admin.service.delete','uses'=>'Admin\ServiceController@delete']);
        Route::get('edit/{id}',['as'=>'admin.service.edit','uses'=>'Admin\ServiceController@edit']);
        Route::post('update/{id}',['as'=>'admin.service.update','uses'=>'Admin\ServiceController@update']);
        Route::get('delImg/{id}',['as'=>'admin.service.delImg','uses'=>'Admin\ServiceController@getDelImg']);
    });

    Route::group(['prefix'=>'profile'],function(){
        Route::get('edit/{id}',['as'=>'admin.profile.edit','uses'=>'Admin\ProfileController@edit']);
        Route::post('update/{id}',['as'=>'admin.profile.update','uses'=>'Admin\ProfileController@update']);
    });

    Route::group(['prefix'=>'user'],function(){
        Route::get('list',['as'=>'admin.user.list','uses'=>'Admin\UserController@index']);
        Route::get('create',['as'=>'admin.user.create','uses'=>'Admin\UserController@create']);
        Route::post('store',['as'=>'admin.user.store','uses'=>'Admin\UserController@store']);
        Route::get('delete/{id}',['as'=>'admin.user.delete','uses'=>'Admin\UserController@delete']);
        Route::get('edit/{id}',['as'=>'admin.user.edit','uses'=>'Admin\UserController@edit']);
        Route::get('show/{id}',['as'=>'admin.user.edit','uses'=>'Admin\UserController@show']);
        Route::post('update/{id}',['as'=>'admin.user.update','uses'=>'Admin\UserController@update']);
        Route::get('delImg/{id}',['as'=>'admin.user.delImg','uses'=>'Admin\UserController@getDelImg']);
    });
    Route::group(['prefix'=>'milestone'],function(){
        Route::get('list',['as'=>'admin.milestone.list','uses'=>'Admin\MileStoneController@index']);
        Route::get('create',['as'=>'admin.milestone.create','uses'=>'Admin\MileStoneController@create']);
        Route::post('store',['as'=>'admin.milestone.store','uses'=>'Admin\MileStoneController@store']);
        Route::get('delete/{id}',['as'=>'admin.milestone.delete','uses'=>'Admin\MileStoneController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.milestone.edit','uses'=>'Admin\MileStoneController@edit']);
        //Route::get('show/{id}',['as'=>'admin.milestone.edit','uses'=>'Admin\MileStoneController@show']);
        Route::post('update/{id}',['as'=>'admin.milestone.update','uses'=>'Admin\MileStoneController@update']);
    });

    Route::group(['prefix'=>'employee'],function(){
        Route::get('list',['as'=>'admin.employee.list','uses'=>'Admin\EmployeeController@index']);
        Route::get('create',['as'=>'admin.employee.create','uses'=>'Admin\EmployeeController@create']);
        Route::post('store',['as'=>'admin.employee.store','uses'=>'Admin\EmployeeController@store']);
        Route::get('delete/{id}',['as'=>'admin.employee.delete','uses'=>'Admin\EmployeeController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.employee.edit','uses'=>'Admin\EmployeeController@edit']);
        //Route::get('show/{id}',['as'=>'admin.milestone.edit','uses'=>'Admin\MileStoneController@show']);
        Route::post('update/{id}',['as'=>'admin.employee.update','uses'=>'Admin\EmployeeController@update']);
        Route::get('delImg/{id}',['as'=>'admin.employee.delImg','uses'=>'Admin\EmployeeController@getDelImg']);
    });

    Route::group(['prefix'=>'history'],function(){
        Route::get('list',['as'=>'admin.history.list','uses'=>'Admin\HistoryController@index']);
        Route::get('create',['as'=>'admin.history.create','uses'=>'Admin\HistoryController@create']);
        Route::post('store',['as'=>'admin.history.store','uses'=>'Admin\HistoryController@store']);
        Route::get('delete/{id}',['as'=>'admin.history.delete','uses'=>'Admin\HistoryController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.history.edit','uses'=>'Admin\HistoryController@edit']);
        //Route::get('show/{id}',['as'=>'admin.milestone.edit','uses'=>'Admin\MileStoneController@show']);
        Route::post('update/{id}',['as'=>'admin.history.update','uses'=>'Admin\HistoryController@update']);
        Route::get('delImg/{id}',['as'=>'admin.history.delImg','uses'=>'Admin\HistoryController@getDelImg']);
    });

    Route::group(['prefix'=>'position'],function(){
        Route::get('list',['as'=>'admin.position.list','uses'=>'Admin\PositionController@index']);
        Route::get('create',['as'=>'admin.position.create','uses'=>'Admin\PositionController@create']);
        Route::post('store',['as'=>'admin.position.store','uses'=>'Admin\PositionController@store']);
        Route::get('delete/{id}',['as'=>'admin.position.delete','uses'=>'Admin\PositionController@destroy']);
        Route::get('edit/{id}',['as'=>'admin.position.edit','uses'=>'Admin\PositionController@edit']);
        //Route::get('show/{id}',['as'=>'admin.milestone.edit','uses'=>'Admin\MileStoneController@show']);
        Route::post('update/{id}',['as'=>'admin.position.update','uses'=>'Admin\PositionController@update']);
    });
});


Route::auth();

Route::get('/','HomeController@index');
Route::get('post/{alias}.html','PostController@show');
Route::get('event/{alias}.html','EventController@show');
Route::get('blog.html','BlogController@index');
Route::get('event.html','EventController@index');
Route::post('comment/store','CommentController@store');
Route::post('comment/storeevent','CommentController@storeCommentEvent');
Route::get('tag/{alias}.html','TagController@showPostByTagId');
Route::get('menu.html','FoodController@index');
Route::get('menu/{id}','FoodController@getFoodByFoodTypeId');
Route::get('about.html','AboutController@index');
Route::get('contact.html','ContactController@index');
