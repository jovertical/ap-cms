<?php

namespace App\Http\Controllers\Root;

/**
 * Third party
 */
use Notify;

/**
 * App
 */
use App\Http\Controllers\Controller;

/**
 *  Laravel
 */
use Illuminate\Http\Request;

class SettingsController extends Controller 
{
    /**
     * Setting Service.
     * @var array
     */
    protected $setting;

    public function __construct()
    {
        $this->setting = app('Setting');
    }

	public function index()
	{
		$settings = array_merge(
			['app' => $this->setting->app()]
		);

		return view(user_env('settings.index'), compact('settings'));
	}

    public function update(Request $request)
    {
        $values = $request->all();

        try {
            foreach ($values as $index => $value) {
                app('Setting')->table()->where('key', $index)->update([
                    'value' => $value
                ]);   
            }

            Notify::success('Settings updated.', 'Success!');
        } catch (Exception $e) {
            Notify::error($e->getMessage(), 'Whooopss!');
        }

        return back();
    }
}