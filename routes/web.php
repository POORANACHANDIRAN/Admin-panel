<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InsertData;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminLoginController;

// Set login page as the default route
Route::get('/', function () {
    return view('layouts.login'); // Redirects to login view
});

Route::post('/user/{id}', [InsertData::class, 'show']);

Route::get('/dashboard', function () {
    return view('layouts.adminlayout');
});

Route::get('/head', function () {
    return view('head');
});

Route::get('/sidebar', function () {
    return view('sidebar');
});

Route::get('gallery/{value}/{type}', function ($value, $type) {
    return $value . "." . $type;
});

Route::get('/Form', function () {
    return view('layouts.form');
})->name('form');

Route::POST('/add_form', function (Request $reque) {
    $input = $reque->all();
    $email = $input['email'];
    $password = $input['password'];
    // dd($input);
    return redirect('/roshan')->with('message', 'successfully added');
    return $email . '|' . $password;
});

Route::get('/checkvote', function () {
    return view('checkvote');
});

Route::get('/vote', function () {
})->name('vote')->middleware('vote');

Route::get('/voted', function () {
    return 'You are eligible to vote';
})->name('voted');

Route::get('/noteligible', function () {
    return 'You are not eligible to vote';
})->name('noteligible');

Route::get('/add', [InsertData::class, 'index']);

// Insert into db
Route::post('/adduser', [InsertData::class, 'add']);

// Displaying in Table
Route::get('/users', [InsertData::class, 'listUsers'])->name('layouts.list');

// Edit
Route::get('/edit/{id}', [InsertData::class, 'edit'])->name('edit');
Route::post('/update/{id}', [InsertData::class, 'update'])->name('updateuser');

// Delete
Route::get('/trash', [InsertData::class, 'showTrash'])->name('trash');
Route::delete('/users/delete/{id}', [InsertData::class, 'delete'])->name('users.delete');

// Restore a trashed user
Route::post('/user/restore/{id}', [InsertData::class, 'restore'])->name('user.restore');

// Permanently delete a trashed user
Route::delete('/user/delete-permanent/{id}', [InsertData::class, 'deletePermenant'])->name('user.deletePermenant');

// Register page
Route::get('/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('register');

// Insert into DB for registration process
Route::post('/register1', [AdminRegisterController::class, 'register'])->name('register1');

// Login page
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');

// Login process
Route::post('/login', [AdminLoginController::class, 'login']);

// Profile
Route::get('/profile', function () {
    return view('layouts.profile');
});

Route::get('/profile/{id}', [InsertData::class, 'profile'])->name('profile');
