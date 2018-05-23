<?php 

namespace App\Acme\Services;

use Illuminate\Support\Facades\DB;
use App\Acme\Services\SettingInterface;

class Setting implements SettingInterface
{
	/**
	 * The table name.
	 * @var string
	 */
	protected $table = 'settings';

	public function app($key = null)
	{
		$keys = [
			'name', 'about','deals','distributors', 'address', 'email', 'phone_number_1', 'phone_number_2',
			'facebook_url', 'twitter_url', 'instagram_url', 'youtube_url',
		];

		$settings = $this->getSettings($keys);

        if ($key != null) {
            return $settings[$key];
        }

        return $settings;
	}

	private function getSettings(array $keys)
	{
		foreach ($keys as $index => $key) {
			$settings[$key] = $this->table()->where('key', $key)->first()->value;
		}

		return $settings;
	}

	public function table()
	{
		return DB::table($this->table);
	}

}