<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Admin extends Model {
    protected $table = 'administrasi';
    protected $primaryKey = 'username';
    public $timestamps = false;

}