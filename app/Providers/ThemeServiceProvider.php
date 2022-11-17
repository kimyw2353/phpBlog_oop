<?php

namespace App\Providers;

use Eclair\Support\ServiceProvider;
use Eclair\Support\Theme;

class ThemeServiceProvider extends ServiceProvider
{
	public static function register()
	{
		Theme::setLayout(dirname(__DIR__, 2) . '/resources/views/layouts/app.php');
		syslog(LOG_ERR, __DIR__);
	}
}