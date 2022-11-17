<?php

namespace App\Controllers;

use App\Post;
use App\Services\PostService;
use Eclair\Support\Theme;

class PostController
{
    public static function showWriteForm()
    {
		return Theme::view('post', [
			'requestUrl' => '/posts'
		]);
    }
	
	public static function store()
	{
		$post = new Post();
		
		$post->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$post->content = filter_input(INPUT_POST, 'content');
		$post->user_id = $_SESSION['user']->id;
		
		$loc = PostService::write($post)
			? 'Location: /'
			: "Location: ".$_SERVER['HTTP_REFERER'];
		
		return header($loc);
	}
}
