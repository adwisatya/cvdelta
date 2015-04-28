<?php

namespace App;
 
use Validator; 
use Illuminate\Database\Eloquent\Model;
 
class Barang extends Model {
    protected $table = 'barang_rusak';
    protected $primaryKey = 'no_seri_barang_rusak';
    public $timestamps = false;
}