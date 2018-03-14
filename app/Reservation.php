<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'reservations';

    public function getSpecificReservation($id){

        $reservation = Reservation::findOrFail($id);

        return $reservation;
    }
}
