<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function()
{
    Route::post('/login',[AuthController::class,'loginAdmin']);
    Route::group(['prefix' => 'permission', 'middleware' => ['auth:sanctum']], function () {
        Route::get('/logout',[AuthController::class,'logout']);
        Route::post('/update', [AdminController::class,'update']);
        Route::prefix('/editor')->group(function(){
            Route::get('/all_editor',[EditorController::class,'get_all']);
            Route::post('/create_editor',[EditorController::class,'create_editor']);
            Route::post('/update_editor',[EditorController::class,'update_editor']);
            Route::delete('/delete_editor',[EditorController::class,'delete_editor']);
        });
        Route::prefix('/article')->group(function(){
            Route::get('/all_article',[ArticleController::class,'get_all']);
            Route::get('/one_article',[ArticleController::class,'get_one']);
            Route::post('/create_article',[ArticleController::class,'create_article']);
            Route::post('/update_article',[ArticleController::class,'update_article']);
            Route::delete('/delete_article',[ArticleController::class,'delete_article']);
        });

    });

});
