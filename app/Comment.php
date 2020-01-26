<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','email','comment','post_id'];
    protected $dates = ['deleted_at'];
// public $timestamps = false;
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
