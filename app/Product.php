<?php

namespace App;

class Product extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function tutorials()
    {
        return $this->hasMany(Tutorial::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function setPriceAttribute($value)
    {
    	$this->attributes['price'] = str_replace(
    		[' ', '_', ','], null, $value
    	);
    }
}
