<?php

namespace App;

class Tutorial extends Model
{
	public static function boot()
    {
        parent::boot();

        static::deleting(function($tutorial) {
            $tutorial->episodes()->each(function($episode) {
                $episode->delete();
            });
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }    

    public function episodes()
    {
    	return $this->hasMany(Episode::class);
    }
}
