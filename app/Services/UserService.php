<?php

namespace App\Services;

class UserService
{
	public static function register($user)
	{
		return $user->create();
	}
}