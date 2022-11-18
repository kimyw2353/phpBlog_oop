<?php

namespace App;

use Eclair\Database\Adaptor;

class User
{
	public function create()
	{
		$sql = 'INSERT INTO users(`email`, `password`) VALUES (?,?)';
		return Adaptor ::exec($sql, [$this -> email, $this -> password]);
	}
	
	public function getUserName()
	{
		return current(explode('@', $this -> email));
	}
	
}