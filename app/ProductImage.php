<?php

namespace App;

class ProductImage extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
