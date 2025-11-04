<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;

Route::get('/', function () {
    // eager-load comments count and user for faster rendering
    $projects = Project::latest()->take(3)->withCount('comments')->with('user')->get();
    return view('home', compact('projects'));
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/skills', function () {
    return view('skills');
});

// Projects page - pass projects from database to the view
Route::get('/projects', function () {
    // include comments_count and eager-load user to avoid N+1
    $projects = Project::latest()->withCount('comments')->with('user')->get();
    return view('projects', compact('projects'));
});

// Image upload route removed - projects do not use images anymore
