<?php

use Eclair\Routing\Route;

Route ::add('get', '/', '\App\Controllers\IndexController::index');

Route::add('get', '/auth/login', '\App\Controllers\AuthController::showLoginForm');