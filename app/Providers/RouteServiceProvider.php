<?php

namespace App\Providers;

use Eclair\Routing\Route;
use Eclair\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
	public static function register()
	{
		require_once dirname(__DIR__, 2).'/routes/web.php';
	}
	
	public static function boot()
	{
		Route ::run();
	}
}