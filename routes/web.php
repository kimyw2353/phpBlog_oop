<?php

use App\Middlewares\AuthMiddleware;
use App\Middlewares\CsrfTokenMiddleware;
use App\Middlewares\RequireMiddleware;
use Eclair\Routing\Route;

//main page
Route ::add('get', '/', '\App\Controllers\IndexController::index');

//login & logout
Route::add('get', '/auth/login', '\App\Controllers\AuthController::showLoginForm');
Route::add('post', '/auth/logout', '\App\Controllers\AuthController::logout');
Route::add('post', '/auth', '\App\Controllers\AuthController::login', [
	RequireMiddleware::class, CsrfTokenMiddleware::class
]);

//register
Route::add('get', '/users/register', '\App\Controllers\UserController::showRegisterForm');
Route::add('post', '/users', '\App\Controllers\UserController::store', [
	RequireMiddleware::class
]);

//write post
Route::add('get', '/posts/write', '\App\Controllers\PostController::showWriteForm', [
	AuthMiddleware::class
]);
Route::add('post', '/posts', '\App\Controllers\PostController::store', [
	AuthMiddleware::class,
	CsrfTokenMiddleware::class,
	RequireMiddleware::class
]);

//read post
Route::add('get', '/posts/{id}', '\App\Controllers\PostController::show');

//edit post
Route::add('get', '/posts/{id}/edit', '\App\Controllers\PostController::edit', [
	AuthMiddleware::class
]);
Route::add('patch', '/posts/{id}', '\App\Controllers\PostController::update', [
	AuthMiddleware::class,
	CsrfTokenMiddleware::class,
	RequireMiddleware::class
]);

//delete post
Route::add('delete', '/posts/{id}', '\App\Controllers\PostController::destroy', [
	AuthMiddleware::class,
	RequireMiddleware::class,
	CsrfTokenMiddleware::class
]);