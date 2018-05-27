<?php

namespace App\Acme\Repositories;

use App\{Deal};

class DealRepository
{
	public $deals;
	
	public function __construct()
	{
		$this->deals = Deal::where('active', 1);
	}

	public function get()
	{
		return $this->deals->get();
	}

	public function filtered(array $filters = []) 
	{
		if (array_key_exists('c', $filters)) {
			$this->deals = $this->deals->where('category_id', $filters['c']);
		}

		if (array_key_exists('mxp', $filters)) {
			$this->deals = $this->deals->where('price', '<=', $filters['mxp']);
		}

		$this->deals = $this->deals->get();

		return $this;
	}

	public function sort(array $params = [])
	{
		if (array_key_exists('by', $params) && array_key_exists('type', $params)) {
			if ($params['type'] == 'asc') {
				$this->deals = $this->deals->sortBy($params['by'])->values();
			} elseif ($params['type'] == 'desc') {
				$this->deals = $this->deals->sortByDesc($params['by'])->values();
			}
		}

		return $this;
	}

}