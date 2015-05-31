<?php

namespace App;
 
use Validator; 
use Illuminate\Database\Eloquent\Model;
 
class Currency extends Model {
    protected $table = 'currency';
    protected $primaryKey = 'id';
    public $timestamps = false;
}