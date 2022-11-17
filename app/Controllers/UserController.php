<?php

namespace App\Controllers;

use App\Services\UserService;
use App\User;
use Eclair\Support\Theme;

class UserController
{
    public static function showRegisterForm()
    {
		return Theme::view('auth', [
			'requestUrl' => '/users'
		]);
    }
	
	public static function store()
	{
		$user = new User();
		
		$user->email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
		$user->password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);
		
		
		$loc = UserService::register($user)
			? 'Location: /auth/login'
			: "Location: ".$_SERVER['HTTP_REFERER'];
		
		return header($loc);
	}
}
