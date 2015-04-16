<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Customer extends Model {
    protected $table = 'customer';
    protected $primaryKey = 'nama_perusahaan';
    public $timestamps = false;

}