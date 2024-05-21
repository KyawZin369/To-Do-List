<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class,'post'])->name('postRoute');
Route::get('post',[PostController::class,'postcontent'])->name('postContent');

Route::post('postTask',[PostController::class,'postToDb'])->name('postInsert');

Route::get('deletedata,{id}',[PostController::class,'deleteData'])->name('deleteData');


Route::get('updatePost,{id}',[PostController::class,'updateData'])->name('updateDataPage');
Route::get('UpdatPost/Edit,{id}',[PostController::class,'updateEdit'])->name('UpdatePostEdit');
Route::post('updatePost/Data',[PostController::class,'updateDataEdit'])->name('updateDataRoute');
