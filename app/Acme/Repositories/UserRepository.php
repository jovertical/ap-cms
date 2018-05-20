<?php

namespace App\Acme\Repositories;

use App\{User};

class UserRepository
{
	public function users()
	{
		return User::where('type', 'user')->where('active', 1)->get();
	}

	public function superusers()
	{
		return User::where('type', 'superuser')->where('active', 1)->get();
	}
}