<?php

namespace App;

class Reservation extends Model
{
    public static function boot()
    {
        parent::boot();

        $user = auth()->check() ? auth()->user() : null;

        self::creating(function ($model) use ($user) {
            $model->source = $user->environment;
        });
    }

    public function products()
    {
        return $this->hasMany(ReservaationProduct::class);
    }

    public function setSourceAttribute($value)
    {
        $this->attributes['source'] = strtolower($value);
    }

    public function getSourceAttribute($value)
    {
        return ucfirst($value);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtolower($value);
    }

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }

    public function getStatusCodeAttribute()
    {
        switch (strtolower($this->status)) {
            case 'pending':
                    $status_code = 1;
                break;
            case 'reserved':
                    $status_code = 2;
                break;
            case 'paid':
                    $status_code = 3;
                break;
            case 'cancelled':
                    $status_code = 4;
                break;
            case 'waiting':
                    $status_code = 5;
                break;
            case 'void':
                    $status_code = 6;
                break;
        }

        return $status_code;
    }

    public function getStatusClassAttribute()
    {
        $status_class = '';

        switch (strtolower($this->status)) {
            case 'pending':
                    $status_class = 'warning';
                break;
            case 'reserved':
                    $status_class = 'info';
                break;
            case 'paid':
                    $status_class = 'success';
                break;
            case 'cancelled':
                    $status_class = 'danger';
                break;
            case 'waiting':
                    $status_class = 'brand';
                break;
            case 'void':
                    $status_class = 'metal';
                break;
        }

        return $status_class;
    }
}
