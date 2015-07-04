<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Komponen extends Model {
    protected $table = 'komponen';
    protected $primaryKey = 'id';
    public $timestamps = false;
}