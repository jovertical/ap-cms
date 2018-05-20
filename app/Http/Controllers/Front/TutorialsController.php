<?php

namespace App\Http\Controllers\Front;

/**
 * Third party
 */
use Carbon;

/**
 * Repositories
 */
use App\Acme\Repositories\{UserRepository, TutorialRepository};

/**
 * Models
 */
use App\{User, Tutorial, Episode};

/**
 * Laravel
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorialsController extends Controller
{
	/**
	 * Tutorial Repository
	 * @var object
	 */
	protected $tutorial_repo;

	/**
	 * User Repository
	 * @var object
	 */
	protected $user_repo;

    public function __construct(
    	TutorialRepository $tutorial_repo,
    	UserRepository $user_repo
    ) {
    	$this->tutorial_repo = $tutorial_repo;
    	$this->user_repo = $user_repo;
    }

	public function index(Request $request)
	{
		$month = $request->get('month');
		$year = $request->get('year');
		$archives = $this->tutorial_repo->archives();

		if ($month != null && $year != null) {
			$tutorials = $this->tutorial_repo->archived($month, $year);
		} else {
			$tutorials = $this->tutorial_repo->paginate();
		}

		return view(user_env().'.tutorials.index', compact(['tutorials', 'archives']));
	}

    public function show(Tutorial $tutorial)
    {
        return view(user_env('tutorials.show'), compact('tutorial'));
    }
}