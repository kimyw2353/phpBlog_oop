<?php

namespace App;

use Eclair\Database\Adaptor;

class Post
{
	public function create()
	{
		$sql = 'INSERT INTO posts(`user_id`, `title`, `content`) VALUES(?, ?, ?)';
		return Adaptor ::exec(
			$sql, [$this -> user_id, $this -> title, $this -> content]
		);
	}
	
	public function update()
	{
		return Adaptor ::exec(
			'UPDATE posts SET `title` = ?, `content` = ? WHERE `id` = ?',
			[$this -> title, $this -> content, $this -> id]
		);
	}
	
	public function delete()
	{
		return Adaptor ::exec('DELETE FROM posts WHERE `id` = ?', [$this -> id]);
	}
	
	public function user()
	{
		return current(Adaptor ::getAll('SELECT * FROM users WHERE `id` = ?', [$this -> user_id], \App\User::class));
	}
	
	public function isOwner()
	{
		if (array_key_exists('user', $_SESSION)) {
			return $this -> user_id == $_SESSION['user'] -> id;
		}
		return false;
	}
	
	public function getCreatedAt()
	{
		return date('h:i A, M j', strtotime($this -> created_at));
	}
	
	public function getUserName()
	{
		return $this -> user() -> getUserName();
	}
	
	public function getSummary()
	{
		return filter_var(mb_substr(strip_tags($this -> content), 0, 200), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}
	
	public static function get($id)
	{
		return current(Adaptor ::getAll('SELECT * FROM posts WHERE `id` = ?', [$id], \App\Post::class));
	}
}
