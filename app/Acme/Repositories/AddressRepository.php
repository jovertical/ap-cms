<?php

namespace App\Acme\Repositories;

class AddressRepository
{
    /**
     * The full collection of regions.
     * @array
     */
    public $regions;

    /**
     * The full collection of provinces.
     * @array
     */
    public $provinces;

    /**
     * The full collection of cities.
     * @array
     */
    public $cities;

    /**
     * The full collection of districts.
     * @array
     */
    public $districts;

    /**
     * The addresses data.
     */
    protected $data;

    public function __construct()
    {
        $this->regions = $this->getAddresses('regions');
        $this->provinces = $this->getAddresses('provinces');
        $this->cities = $this->getAddresses('cities');
        $this->districts = $this->getAddresses('districts');
    }

    protected function getAddresses(string $level)
    {
        $data = json_decode(
            file_get_contents(public_path('addresses/'.$level.'.json'))
        );

        return collect($data)->sortBy('name')->values()->all();
    }

    public function provinces($region_code = null)
    {
        if ($region_code != null) {
            $this->data = array_values(
                array_filter($this->provinces, function($province) use ($region_code) {
                    return $province->region_id == $region_code;
                })
            );

            return $this;
        }

        $this->data = $this->provinces;

        return $this;
    }

    public function cities($province_code = null)
    {
        if ($province_code != null) {
            $this->data = array_values(
                array_filter($this->cities, function($city) use ($province_code) {
                    return $city->province_id == $province_code;
                })
            );

            return $this;
        }

        $this->data = $this->cities;

        return $this;
    }

    public function districts($city_code = null)
    {
        if ($city_code != null) {
            $this->data = array_values(
                array_filter($this->districts, function($district) use ($city_code) {
                    return $district->city_id == $city_code;
                })
            );

            return $this;
        }

        $this->data = $this->districts;

        return $this;
    }

    public function get()
    {
        return $this->data;
    }
}