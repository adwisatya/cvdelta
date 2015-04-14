<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Tagihan extends Model {
    protected $table = 'tagihan';
    protected $primaryKey = 'no_tagihan';
    public $timestamps = false;

}