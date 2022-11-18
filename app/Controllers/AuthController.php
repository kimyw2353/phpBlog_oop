<?php

namespace App\Controllers;

use App\Services\AuthService;
use Eclair\Support\Theme;

class AuthController
{
	public static function login()
	{
		[ $email, $password ] = array_values(filter_input_array(INPUT_POST, [
			'email' => FILTER_VALIDATE_EMAIL | FILTER_SANITIZE_EMAIL, //이메일 형식 확인
			'password' => FILTER_DEFAULT
		]));
		
		$loc = (AuthService::login($email, $password))
			? 'Location: /'
			: "Location: ".$_SERVER['HTTP_REFERER'];
		
		return header($loc);
	}
	
	public static function logout()
	{
		return AuthService::logout();
	}
	
	public static function showLoginForm()
	{
		return Theme ::view('auth', [
			'requestUrl' => '/auth'
		]);
	}
}
