<?php

namespace App\Middlewares;

use Eclair\Routing\Middleware;

class AuthMiddleware extends Middleware{
	
	public static function process()
	{
//		if (Auth::check()){
//
//		}
		if (array_key_exists('user', $_SESSION)) {
			return true;
		}
		return header('Location: /auth/login');
	}
}