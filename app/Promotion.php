<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'promotions';

    public function getSpecificPromotion($id){

    	return Promotion::findOrFail($id);
    }

    public function getAllPromotions(){

    	return Promotion::all();
    }
}
