<?php

namespace App\Providers;

use Eclair\Database\Adaptor;
use Eclair\Support\ServiceProvider;

class ErrorServiceProvider extends ServiceProvider
{
	public static function register()
	{
		set_error_handler(function ($errno, $errstr, $errfile, $errline) {
			throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
		});
		
		set_exception_handler(function ($e) {
			error_log($e, 3, dirname(__DIR__, 2).'/storage/logs/logs.log');
		});
	}
}