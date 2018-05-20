<?php

namespace App\Acme\Repositories;

use App\{Episode};

class EpisodeRepository
{
	public function get()
	{
		return Episode::get();
	}

	public function latest()
	{
		return Episode::latest()->get();
	}
}