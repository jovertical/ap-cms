<?php

namespace App\Acme\Repositories;

use App\{Category};

class CategoryRepository
{
	public $categories;
	
	public function __construct()
	{
		$this->categories = Category::where('active', 1);
	}

	public function get()
	{
		return $this->categories->get();
	}
}