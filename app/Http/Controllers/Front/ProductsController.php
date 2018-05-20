<?php

namespace App\Http\Controllers\Front;

/**
 * Third party
 */
use Carbon;

/**
 * Repositories
 */
use App\Acme\Repositories\{UserRepository, CategoryRepository, ProductRepository};

/**
 * Models
 */
use App\{User, Category, Product, ProductImage};

/**
 * Laravel
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
	/**
	 * Category Repository
	 * @var object
	 */
	protected $category_repo;

	/**
	 * Product Repository
	 * @var object
	 */
	protected $product_repo;

	/**
	 * User Repository
	 * @var object
	 */
	protected $user_repo;

    public function __construct(
    	CategoryRepository $category_repo,
    	ProductRepository $product_repo,
    	UserRepository $user_repo
    ) {
    	$this->category_repo = $category_repo;
    	$this->product_repo = $product_repo;
    	$this->user_repo = $user_repo;
    }

    public function index(Request $request)
    {
		$filters = [];
		
		// Category filter.
		if ($c = $request->get('c')) {
			$filters['c'] = $c;
		}

		// Max price filter.
		if ($mxp = $request->get('mxp')) {
			$filters['mxp'] = (int) $mxp;
		}

		$sort_params = [];
		
		// Sort by.
		if ($sort_by = $request->get('sby')) {
			$sort_params['by'] = $sort_by;	
		}

		// Sort type
		if ($sort_type = $request->get('stype')) {
			$sort_params['type'] = $sort_type;	
		}

    	$categories = $this->category_repo->get();
		$products = paginate(
			$this->product_repo->filtered($filters)->sort($sort_params)->products
		);

		return view(user_env().'.products.index', compact(['categories', 'products']));
	}
	
	public function show(Product $product)
	{
		
	}
}