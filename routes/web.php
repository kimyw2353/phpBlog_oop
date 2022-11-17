<?php

use App\Middlewares\CsrfTokenMiddleware;
use App\Middlewares\RequireMiddleware;
use Eclair\Routing\Route;

Route ::add('get', '/', '\App\Controllers\IndexController::index');

Route::add('get', '/auth/login', '\App\Controllers\AuthController::showLoginForm');
Route::add('post', '/auth/logout', '\App\Controllers\AuthController::logout');
Route::add('post', '/auth', '\App\Controllers\AuthController::login', [
	RequireMiddleware::class, CsrfTokenMiddleware::class
]);