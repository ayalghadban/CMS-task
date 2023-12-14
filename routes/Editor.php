<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Editor\ArticleController;
use App\Http\Controllers\Editor\EditorController;
use Illuminate\Support\Facades\Route;

Route::prefix('/editor')->group(function()
{
    Route::post('/login',[AuthController::class,'loginEditor']);
    Route::group(['prefix' => 'permission', 'middleware' => ['auth:sanctum']], function () {
        Route::get('/logout',[AuthController::class,'logout']);
        Route::post('/update', [EditorController::class,'update_editor']);
        Route::prefix('/article')->group(function(){
            Route::get('/all_article',[ArticleController::class,'get_all']);
            Route::post('/create_article',[ArticleController::class,'create_article']);
            Route::post('/update_article',[ArticleController::class,'update_article']);
            Route::delete('/delete_article',[ArticleController::class,'delete_article']);
        });
    });

});
