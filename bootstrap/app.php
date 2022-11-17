<?php

use Eclair\Application;

$app = new Application([
	\App\Providers\ErrorServiceProvider::class,
	\App\Providers\SessionServiceProvider::class,
	\App\Providers\DatabaseServiceProvider::class,
	\App\Providers\ThemeServiceProvider::class,
	\App\Providers\RouteServiceProvider::class
]);

return $app;