<?php

namespace App\Http\Controllers\Front;

/**
 * Third party
 */
use Carbon;

/**
 * Repositories
 */
use App\Acme\Repositories\{UserRepository, TutorialRepository, EpisodeRepository};

/**
 * Models
 */
use App\{User, Tutorial, Episode};

/**
 * Laravel
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpisodesController extends Controller
{
	/**
	 * Tutorial Repository
	 * @var object
	 */
	protected $tutorial_repo;

	/**
	 * Episode Repository
	 * @var object
	 */
	protected $episode_repo;

	/**
	 * User Repository
	 * @var object
	 */
	protected $user_repo;

    public function __construct(
    	TutorialRepository $tutorial_repo,
    	EpisodeRepository $episode_repo,
    	UserRepository $user_repo
    ) {
    	$this->tutorial_repo = $tutorial_repo;
    	$this->episode_repo = $episode_repo;
    	$this->user_repo = $user_repo;
    }

    public function show(Tutorial $tutorial, $number)
    {
    	$episode = $tutorial->episodes->where('number', $number)->first();

        return view(user_env('episodes.show'), compact(['tutorial', 'episode', 'number']));
    }
}