<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');})->name('dashboard');
Route::get('auth/google','App\Http\Controllers\Auth\LoginController@socialLogin');
Route::get('auth/google/callback','App\Http\Controllers\Auth\LoginController@handleProviderCallback');


Route::get('/courses', [App\Http\Controllers\Teachers\CourseController::class, 'index']);
Route::get('/c/create', [App\Http\Controllers\Teachers\CourseController::class, 'create']);
Route::post('/courses', [App\Http\Controllers\Teachers\CourseController::class, 'store']);//From the create classroom page

Route::get('/courses/add/{course}', [App\Http\Controllers\Teachers\CourseController::class, 'add']);
Route::post('/courses/adding/{course}', [App\Http\Controllers\Teachers\CourseController::class, 'adding']);
Route::get('/courses/join', [App\Http\Controllers\Teachers\CourseController::class, 'join']);
Route::post('/courses/joining', [App\Http\Controllers\Teachers\CourseController::class, 'joining']);
Route::get('/courses/{course}', [App\Http\Controllers\Teachers\CourseController::class, 'show'])->name('teacher.courses.show');//so that navigation can refer to this function



Route::get('/posts', [App\Http\Controllers\Teachers\PostsController::class, 'index'])->name('student.posts.index');
Route::get('/c/{course}/view', [App\Http\Controllers\Teachers\PostsController::class, 'view'])->name('student.posts.view');
Route::get('/c/{course}/p/create', [App\Http\Controllers\Teachers\PostsController::class, 'create']);
Route::post('/c/{course}/posts', [App\Http\Controllers\Teachers\PostsController::class, 'store']);//From the create posts page
Route::get('/posts/{post}', [App\Http\Controllers\Teachers\PostsController::class, 'show'])->name('teacher.posts.show');

Route::get('/posts/{post}/edit', [App\Http\Controllers\Teachers\PostsController::class, 'edit']);
Route::post('/posts/{post}', [App\Http\Controllers\Teachers\PostsController::class, 'update']);//From the edit posts page
Route::delete('/posts/{post}/delete', [App\Http\Controllers\Teachers\PostsController::class, 'destroy']);


Route::get('/lessons', [App\Http\Controllers\Students\LessonController::class, 'index']);
Route::get('/c/join', [App\Http\Controllers\Students\LessonController::class, 'create']);
Route::post('/lessons', [App\Http\Controllers\Students\LessonController::class, 'store']);//From the create classroom page

Route::get('/profile', [App\Http\Controllers\Students\ProfileController::class, 'index'])->name('student.profile.index');
Route::get('/profile/edit', [App\Http\Controllers\Students\ProfileController::class, 'edit']);
Route::post('/profile', [App\Http\Controllers\Students\ProfileController::class, 'update']);//From the create page

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:student', 'prefix' => 'student', 'as' => 'student.'], function() {
        Route::resource('lessons', \App\Http\Controllers\Students\LessonController::class);
    });
   Route::group(['middleware' => 'role:teacher', 'prefix' => 'teacher', 'as' => 'teacher.'], function() {
       Route::resource('courses', \App\Http\Controllers\Teachers\CourseController::class);
   });
});
