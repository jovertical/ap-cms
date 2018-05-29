<?php

namespace App\Http\Controllers\Front;

/**
 * Third party
 */
use Carbon;

/**
 * Models
 */
use App\{Product};

/**
 * Laravel
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealsController extends Controller
{
    public function index(Request $request)
    {
        $deals = Product::where('active', 1)
                    ->where('type', 'deal')
                    ->paginate();

		return view(user_env().'.deals.index', compact('deals'));
	}
}