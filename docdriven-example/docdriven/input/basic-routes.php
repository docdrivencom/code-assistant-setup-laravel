<?php

use App\Http\Controllers\TodoItemController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// todo-items routes
Route::get('/todo-items', [TodoItemController::class, 'index']);
Route::get('/todo-items/{id}', [TodoItemController::class, 'show']);
Route::post('/todo-items', [TodoItemController::class, 'store']);
Route::put('/todo-items/{id}', [TodoItemController::class, 'update']);
Route::delete('/todo-items/{id}', [TodoItemController::class, 'destroy']);

// todo-item comments routes
Route::post('/todo-items/{id}/comments', [CommentController::class, 'store']);
Route::delete('/todo-items/{id}/comments/{commentId}', [CommentController::class, 'destroy']);
