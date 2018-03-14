<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     protected $primaryKey = 'id';
    protected $table = 'events';

    public function getSpecificEvent($id){

        $event = Event::findOrFail($id);

        return $event;
    }

}
