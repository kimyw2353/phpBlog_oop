<?php

namespace App\Controllers;

use App\Post;
use App\Services\PostService;
use Eclair\Database\Adaptor;
use Eclair\Support\Theme;

class PostController
{
	public static function showWriteForm()
	{
		return Theme ::view('post', [
			'requestUrl' => '/posts'
		]);
	}
	
	public static function store()
	{
		$post = new Post();
		
		$post -> title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$post -> content = filter_input(INPUT_POST, 'content');
		$post -> user_id = $_SESSION['user'] -> id;
		
		$loc = PostService ::write($post)
			? 'Location: /'
			: 'Location: '.$_SERVER['HTTP_REFERER'];
		
		return header($loc);
	}
	
	public static function show($id)
	{
		if ($post = Post ::get($id)) {
			return Theme ::view('read', compact('post'));
		}
		return http_response_code(404);
	}
	
	public static function edit($id)
	{
		if ($post = Post ::get($id)) {
			$post -> isOwner() && Theme ::view('post', [
				'post' => $post,
				'requestUrl' => '/posts/'.$post -> id,
				'method' => 'patch'
			]);
		}
		return http_response_code(404);
	}
	
	public static function update($id)
	{
		if ($post = Post ::get($id)) {
			$post->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$post->content = filter_input(INPUT_POST, 'content');
			
			$loc = ($post->isOwner() && PostService ::update($post))
				? 'Location: /posts/' . $post->id
				: 'Location: ' .$_SERVER['HTTP_REFERER'];
			
			return header($loc);
		}
		return http_response_code(404);
	}
	
	public static function destroy($id)
	{
		if ($post = Post::get($id)) {
			if ($post->isOwner() && PostService::delete($post)) {
				return http_response_code(204);
			}
		}
		
		return http_response_code(404);
	}
}
