<?php

namespace App\Services;

use Eclair\Database\Adaptor;

class AuthService
{
	public static function login($email, $password)
	{
		$sql = "
			SELECT *
			FROM users
			WHERE email = ?
			";
		
		if ($user = current(Adaptor ::getAll($sql, [$email], \App\User::class))) {
			if (password_verify($password, $user -> password)) {
				return $_SESSION['user'] = $user;
			}
		}
	}
	
	public static function logout()
	{
		session_unset();
		
		return session_destroy();
	}
}