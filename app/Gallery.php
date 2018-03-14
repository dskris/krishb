<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'galleries';

     public function getSpecificGallery($id){

        $gallery = Gallery::findOrFail($id);

        return $gallery;
    }

}
