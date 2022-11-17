<?php
namespace App;

use Eclair\Database\Adaptor;

class User
{
	public function getUserName()
	{
		return current(explode('@', $this->email));
	}

}