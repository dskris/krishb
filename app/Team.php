<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $primaryKey = 'id';
    protected $connection = 'mysql1';
    protected $table = 'teams';
}
