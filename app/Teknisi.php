<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Teknisi extends Model {
    protected $table = 'teknisi';
    protected $primaryKey = 'username';
    public $timestamps = false;
}