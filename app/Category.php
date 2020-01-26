<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $fillable = ['name','slug'];
    public $timestamps = false;

    public function post() {
        return $this->belongsToMany('App\Post','categories_posts','category_id','post_id');
//        return $this->belongsToMany('App\Post')->withPivot('category_id', 'post_id');
//        return $this->belongsToMany(Post::class)->withPivot('category_id', 'post_id');
    }

}
