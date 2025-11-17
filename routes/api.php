<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the API']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function (Request $request) {
    return response()->json(['message' => 'saya siti mutma']);
})->middleware('auth:sanctum');

Route::apiResource('projects', ProjectController::class);
