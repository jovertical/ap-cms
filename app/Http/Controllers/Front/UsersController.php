<?php

namespace App\Http\Controllers\Front;

/**
 * Third party
 */
use Carbon;

/**
 * Models
 */
use App\{User};

/**
 * Laravel
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $distributors = User::where('type', 'user')->where('active', 1)->where('verified', 1);

        if ($address = $request->get('a')) {
            $distributors = $distributors->where('address', 'LIKE', '%'.$address.'%');
        }

        $distributors = $distributors->paginate();

        return view(user_env().'.distributors.index', compact('distributors'));
    }
}