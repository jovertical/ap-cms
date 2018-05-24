<?php

namespace App\Http\Controllers\Front;

/**
 * Repositories
 */
use App\Acme\Repositories\{UserRepository, CategoryRepository, ProductRepository};

/**
 * Models
 */
use App\{User, Category, Product, ProductImage};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
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

    public function home()
    {
        $categories = $this->category_repo->categories->limit(3)->get();
        $new_products = $this->product_repo->products->limit(5)->latest()->get();
        $featured_products = $this->product_repo->products->where('featured', 1)->limit(5)->get();
        
        return view(user_env().'.pages.home', compact([
            'categories', 'new_products', 'featured_products'
        ]));
    }

    public function about()
    {
    	$classes = [
    		'article', 'ltr'  
    	];

    	return view(user_env('pages.about'), compact('classes'));
    }

    public function contact()
    {
        $classes = [];

        return view(user_env('pages.contactus'), compact('classes'));
    }
     public function products()
    {
        $classes = [];

        return view(user_env('pages.products'), compact('classes'));
    }
       public function faqs()
    {
        $classes = [];

        return view(user_env('pages.faqs'), compact('classes'));
    }
    public function newsletter()
    {
        $classes = [];

        return view(user_env('pages.newsletter'), compact('classes'));
    }
     public function getstarted()
    {
        $classes = [];

        return view(user_env('pages.getstarted'), compact('classes'));
    }
     public function system()
    {
        $classes = [];

        return view(user_env('pages.system'), compact('classes'));
    }
      public function deals()
    {
        $classes = [];

        return view(user_env('pages.deals'), compact('classes'));
    }
        public function news()
    {
        $classes = [];

        return view(user_env('pages.news'), compact('classes'));
    }
       public function distributors()
    {
        $classes = [];

        return view(user_env('pages.distributors'), compact('classes'));
    }

    public function reviews()
    {
        $classes = [];

        return view(user_env('pages.reviews'), compact('classes'));
    }
     public function howitworks()
    {
        $classes = [];

        return view(user_env('pages.howitworks'), compact('classes'));
    }
     public function distributorpromotion()
    {
        $classes = [];

        return view(user_env('pages.distributorpromotion'), compact('classes'));
    }
}
