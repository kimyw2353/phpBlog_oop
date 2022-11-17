<?php

namespace App\Middlewares;

use Eclair\Routing\Middleware;

/**
 * HTTP_REFERER : 어떠한 작업의 이전 페이지 정보.
 * ex) 사용자가 어떤 작업중 로그인을 했을 떄, 새로운 페이지로 이동하지 않고 이전에 작업하던 페이지로 돌아가게 하기 위함
 */
class RequireMiddleware extends Middleware{
	
	public static function process()
	{
		if (count($_REQUEST)===count(array_filter($_REQUEST))){
			return true;
		}
		return header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}