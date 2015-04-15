<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Komponen extends Model {
    protected $table = 'komponen';
    protected $primaryKey = 'no_seri_komponen';
    public $timestamps = false;
}