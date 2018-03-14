<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'menus';

    public function getSpecificMenu($id){

        return Menu::findOrFail($id);
    }
}
