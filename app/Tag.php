<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name','slug'];
    public $timestamps = false;

    public function post() {
        return $this->belongsToMany('App\Post','posts_tags','post_id','tag_id');
//        return $this->belongsToMany(Post::class)->withPivot('post_id', 'tag_id');
    }
}
