<?php

namespace App\Acme\Repositories;

use App\{Product};

class ProductRepository
{
	public $products;

	public function __construct()
	{
		$this->products = Product::where('active', 1)->where('type', 'product');
	}

	public function get()
	{
		return $this->products->get();
	}

	public function filtered(array $filters = [])
	{
		if (array_key_exists('c', $filters)) {
			$this->products = $this->products->where('category_id', $filters['c']);
		}

		if (array_key_exists('mxp', $filters)) {
			$this->products = $this->products->where('price', '<=', $filters['mxp']);
		}

		$this->products = $this->products->get();

		return $this;
	}

	public function sort(array $params = [])
	{
		if (array_key_exists('by', $params) && array_key_exists('type', $params)) {
			if ($params['type'] == 'asc') {
				$this->products = $this->products->sortBy($params['by'])->values();
			} elseif ($params['type'] == 'desc') {
				$this->products = $this->products->sortByDesc($params['by'])->values();
			}
		}

		return $this;
	}

}