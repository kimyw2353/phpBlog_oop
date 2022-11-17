<?php

namespace App\Services;

class PostService
{
	public static function write($post){
		return $post->create();
	}
	
	public static function update($post)
	{
		return $post->update();
	}
	
	public static function delete($post)
	{
		return $post->delete();
	}
}