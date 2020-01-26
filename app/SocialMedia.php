<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [
        'facebook',
        'twitter',
        'gplus',
        'linkedin',
        'instagram',
        'pinterest',
        'youtube',
        'whatsapp'
    ];
    public $timestamps = false;
}
