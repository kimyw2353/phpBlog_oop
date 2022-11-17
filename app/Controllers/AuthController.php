<?php

namespace App\Controllers;

use Eclair\Support\Theme;
use App\Services\IndexService;

class AuthController
{
    public static function showLoginForm()
    {
		return Theme::view('auth', [
			'requestUrl' => '/auth'
		]);
    }
}
