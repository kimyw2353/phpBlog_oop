<?php

namespace App\Services;

use Eclair\Database\Adaptor;

class IndexService
{
	public static function getPosts($page, $count)
	{
		$sql = "
			SELECT *
			FROM posts
			ORDER BY id DESC
			LIMIT ".$count." OFFSET ".$page * $count;
		
		return Adaptor ::getAll($sql, [], \App\Post::class);
	}
}