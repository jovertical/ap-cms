<?php

namespace App;

class ReservationProduct extends Model
{
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
