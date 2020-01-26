<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Page;
use App\Post;
use App\Category;
use App\Comment;
use App\Contact;
use App\Tag;
use App\SocialMedia;
use App\Subscriber;
use Illuminate\Support\Facades\Validator; //for ajax validation
use Symfony\Component\Mime\Message;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $num_posts = Post::count();
        $num_cate = Category::count();
        $num_tag = Tag::count();
        $num_pages = Page::count();
        $num_msg = Contact::count();
        $num_cmnt = Comment::count();
        $num_subsc = Subscriber::count();
		$soc_medi = SocialMedia::count();
		

        return view('auth.home')
        ->with('num_posts',$num_posts)
        ->with('num_cate',$num_cate)
        ->with('num_tag',$num_tag)
        ->with('num_pages',$num_pages)
        ->with('num_msg',$num_msg)
        ->with('num_cmnt',$num_cmnt)
        ->with('num_subsc',$num_subsc);
    }

    public function users() {
        return view('auth.users');
    }

    public function user() {
        return view('auth.user');
    }

    // public function subscribers() {
    //     return view('auth.subscribers');
    // }

    // public function settings() {
    //     return view('auth.settings');
    // }

    // public function comments() {
    //     return view('auth.comments');
    // }

    // public function contmsg() {
    //     return view('auth.contmsg');
    // }


    // public function categories() {
    //     return view('auth.categories');
    // }

    // public function tags() {
    //     return view('auth.tags');
    // }

}
