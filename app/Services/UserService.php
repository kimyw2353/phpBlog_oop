<?php

namespace App\Services;

use App\User;

class UserService
{
	public static function register($user)
	{
		return $user->create();
	}
}