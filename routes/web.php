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

Route::group(['namespace'=>'Site'], function(){

    Route::get('/{lang?}', ['uses'=>'HomeController@index', 'as'=>'home'])->where(['lang'=>'az|ru|en']);

});

Route::group(['prefix'=>'/karate', 'namespace'=>'Admin'], function(){

    Route::group(['middleware'=>['IsNotAuthAsAdmin']], function(){
        Route::match(["get", "post"], '/login', ['uses'=>'AuthController@login', 'as'=>'adminLogin']);
    });

    Route::group(['middleware'=>['web', 'IsAuthAsAdmin']], function(){
        Route::get('/', ['uses'=>'DashboardController@index', 'as'=>'adminDashboard']);

        Route::match(['get', 'post'], '/meta-tags-edit', ['uses'=>'MetaTagsController@edit', 'as'=>'adminMetaTagsEdit']);

        Route::match(['get', 'post'], '/header-edit', ['uses'=>'HeaderController@edit', 'as'=>'adminHeaderEdit']);

        Route::match(['get', 'post'], '/our-story-header-edit', ['uses'=>'OurStoryController@headerEdit', 'as'=>'adminOurStoryHeaderEdit']);

        Route::match(['get', 'post'], '/book-a-table-edit', ['uses'=>'BookATableController@edit', 'as'=>'adminBookATableEdit']);

        Route::match(['get', 'post'], '/menu-header-edit', ['uses'=>'MenuController@headerEdit', 'as'=>'adminMenuHeaderEdit']);

        Route::match(['get', 'post'], '/instagram-header-edit', ['uses'=>'InstagramController@headerEdit', 'as'=>'adminInstagramHeaderEdit']);

        Route::match(['get', 'post'], '/moments-header-edit', ['uses'=>'MomentsController@headerEdit', 'as'=>'adminMomentsHeaderEdit']);

        Route::match(['get', 'post'], '/contacts-edit', ['uses'=>'ContactsController@edit', 'as'=>'adminContactsEdit']);

        Route::match(['get', 'post'], '/settings-edit', ['uses'=>'SettingsController@edit', 'as'=>'adminSettingsEdit']);

        Route::get('/menu-categories/{page?}', ['uses'=>'MenuCategoryController@scroll', 'as'=>'adminMenuCategoriesScroll'])->where(['page'=>'[0-9]+']);
        Route::match(['get', 'post'], '/menu-category/add', ['uses'=>'MenuCategoryController@add', 'as'=>'adminMenuCategoryAdd']);
        Route::match(['get', 'post'], '/menu-category/edit/{id}', ['uses'=>'MenuCategoryController@edit', 'as'=>'adminMenuCategoryEdit'])->where(['page'=>'[0-9]+']);
        Route::get('/menu-category/delete/{id}', ['uses'=>'MenuCategoryController@delete', 'as'=>'adminMenuCategoryDelete'])->where(['page'=>'[0-9]+']);

        Route::get('/menu-dishes-list/{page?}', ['uses'=>'MenuController@scroll', 'as'=>'adminMenuDishesScroll'])->where(['page'=>'[0-9]+']);
        Route::match(['get', 'post'], '/menu-dishes/add', ['uses'=>'MenuController@add', 'as'=>'adminMenuDishAdd']);
        Route::match(['get', 'post'], '/menu-dishes/edit/{id}', ['uses'=>'MenuController@edit', 'as'=>'adminMenuDishEdit'])->where(['page'=>'[0-9]+']);
        Route::get('/menu-dishes/delete/{id}', ['uses'=>'MenuController@delete', 'as'=>'adminMenuDishDelete'])->where(['page'=>'[0-9]+']);

        Route::get('/our-story-images/{page?}', ['uses'=>'OurStoryController@scroll', 'as'=>'adminOurStoryImagesScroll'])->where(['page'=>'[0-9]+']);
        Route::match(['get', 'post'], '/our-story-image/add', ['uses'=>'OurStoryController@add', 'as'=>'adminOurStoryImageAdd']);
        Route::match(['get', 'post'], '/our-story-image/edit/{id}', ['uses'=>'OurStoryController@edit', 'as'=>'adminOurStoryImageEdit'])->where(['page'=>'[0-9]+']);
        Route::get('/our-story-image/delete/{id}', ['uses'=>'OurStoryController@delete', 'as'=>'adminOurStoryImageDelete'])->where(['page'=>'[0-9]+']);

        Route::get('/moments-images/{page?}', ['uses'=>'MomentsController@scroll', 'as'=>'adminMomentsImagesScroll'])->where(['page'=>'[0-9]+']);
        Route::match(['get', 'post'], '/moments-image/add', ['uses'=>'MomentsController@add', 'as'=>'adminMomentsImageAdd']);
        Route::match(['get', 'post'], '/moments-image/edit/{id}', ['uses'=>'MomentsController@edit', 'as'=>'adminMomentsImageEdit'])->where(['page'=>'[0-9]+']);
        Route::get('/moments-image/delete/{id}', ['uses'=>'MomentsController@delete', 'as'=>'adminMomentsImageDelete'])->where(['page'=>'[0-9]+']);

        Route::get('/logout', ['uses'=>'AuthController@logout', 'as'=>'adminLogout']);

    });
});
