<?php

namespace App;

class ReservationProduct extends Model
{
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
