<?php

namespace App\Http\Controllers;

use App\Site;
use App\Page;
use App\Post;
use App\Category;
use App\Tag;
use App\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;//for ajax validation

class MainController extends Controller {

    public function __construct() {
        if(Site::count() != 0){
            $row            = Site::where('id','1')->first();
            $numpost        = ($row->posts_per_page == null?'6':$row->posts_per_page);
            $num_posts      = $numpost;
        }else{
            $num_posts = 6;
        }


        $this->posts    = Post::latest()->paginate($num_posts);
        $this->categories = Category::all();
        $this->tags     = Tag::all();
        $this->sm       = SocialMedia::where('id','1')->first();
    //  $this->popular  = Post::latest()->limit(6)->get();
        $this->pinned   = Post::where('type','pinned')->limit(6)->get();
        $this->nav      = Page::select('title', 'slug')->get();
        $this->siteInfo = Site::all()->first();
    }

//    public function search(Request $request) {
//        dd($request->q);
//    }

}
