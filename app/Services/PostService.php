<?php

namespace App\Services;

class PostService
{
	
	public static function write($post) {
		return $post->create();
	}
}