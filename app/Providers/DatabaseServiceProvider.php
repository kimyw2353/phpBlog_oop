<?php

namespace App\Providers;

use Eclair\Database\Adaptor;
use Eclair\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
	public static function register()
	{
		Adaptor ::setup('mysql:dbname=phpblog;charset=utf8', 'root', 'root');
	}
}