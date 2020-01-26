<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name','email','message'];
    //public $timestamps = false;
	protected $dates = ['created_at'];
}
