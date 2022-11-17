<?php

namespace App\Providers;

use Eclair\Session\DatabaseSessionHandler;
use Eclair\Support\ServiceProvider;

class SessionServiceProvider extends ServiceProvider
{
	public static function register()
	{
		session_set_save_handler(new DatabaseSessionHandler());
	}
	
	public static function boot()
	{
		session_start();
	}
}