<?php

namespace App;

class Episode extends Model
{
    public function tutorial()
    {
    	return $this->belongsTo(Tutorial::class);
    }
    
    public function getFormattedTitleAttribute()
    {
        return str_replace(' ', '-', $this->attributes['title']);
    }
    
    public function getVideoUrlAttribute($value)
    {
        return str_replace('watch', 'embed', $value);
    }
}
