<?php

namespace App\Acme\Repositories;

use Carbon\Carbon;
use App\{News};

class NewsRepository
{
	public function get()
	{
		return News::latest()->get();
	}

	public function paginate($per_page = 10)
	{
		return News::latest()->paginate($per_page);
	}

	public function active()
	{
		return News::where('published', 1)->get();
	}

	public function archived($month, $year)
	{
		return 	News::whereMonth('created_at', Carbon::parse($month)->month)
			->whereYear('created_at', Carbon::parse($year)->year)
			->latest()
			->paginate();
	}

	public function archives()
	{
		return News::selectRaw('YEAR(created_at) year, MONTHNAME(created_at) month, count(*) published')
			->groupBy('year', 'month')
			->orderByRaw('MIN(created_at) desc')
			->get();
	}
}