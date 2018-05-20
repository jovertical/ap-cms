<?php

namespace App;

class Category extends Model
{
	public static function boot()
    {
        parent::boot();

        static::deleting(function($category) {
            $category->products()->each(function($product) {
                $product->delete();
            });
        });
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
