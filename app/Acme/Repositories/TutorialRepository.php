<?php

namespace App\Acme\Repositories;

use Carbon\Carbon;
use App\{Tutorial};

class TutorialRepository
{
	public function get()
	{
		return Tutorial::latest()->get();
	}

	public function paginate($per_page = 10)
	{
		return Tutorial::latest()->paginate($per_page);
	}

	public function active()
	{
		return Tutorial::where('published', 1)->get();
	}

	public function archived($month, $year)
	{
		return 	Tutorial::whereMonth('created_at', Carbon::parse($month)->month)
			->whereYear('created_at', Carbon::parse($year)->year)
			->latest()
			->paginate();
	}

	public function archives()
	{
		return Tutorial::selectRaw('YEAR(created_at) year, MONTHNAME(created_at) month, count(*) published')
			->groupBy('year', 'month')
			->orderByRaw('MIN(created_at) desc')
			->get();
	}
}