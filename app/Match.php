<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $primaryKey = 'id';
    protected $connection = 'mysql1';
    protected $table = 'matches';
}
