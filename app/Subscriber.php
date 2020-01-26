<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model {

    protected $fillable = ['subscriber_email'];
	public $timestamps = false;
	protected $dates = ['subscribed_at'];

}
