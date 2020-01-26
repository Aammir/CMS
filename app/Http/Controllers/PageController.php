<?php

namespace App\Http\Controllers;

use App\Site;
use App\Page;
use App\Post;
use App\Category;
use App\Tag;
use App\SocialMedia;
use Illuminate\Http\Request;

//use App\Http\Controllers\MainController;

class PageController extends MainController {

    public function __construct() {
        parent::__construct();
    }

//
    public function index() {
    //    dd($this->sm);
        $home1 = Post::where('type', '=', 'home1')->first();
        $home2 = Post::where('type', '=', 'home2')->first();
        $home3 = Post::where('type', '=', 'home3')->first();

        return view('pages.homepage')
                        ->with('home1', $home1)
                        ->with('home2', $home2)
                        ->with('home3', $home3)
                        ->with('posts', $this->posts)
                        ->with('categories', $this->categories)
                        ->with('tags', $this->tags)
                        ->with('sm', $this->sm)
                        ->with('pinned', $this->pinned)
                        ->with('nav', $this->nav)
                        ->with('siteInfo', $this->siteInfo);
    }


//
    public function category() {
        return view('pages.category');
    }

//
//    public function post() {
//        return view('pages.post');
//    }
    //
    public function blog() {
        // dd($this->posts);
         $page = Page::where('slug', '=', 'blog')->first();
        return view('pages.blog')->with('page', $page)
                        ->with('posts', $this->posts)
                        ->with('categories', $this->categories)
                        ->with('tags', $this->tags)
                        ->with('sm', $this->sm)
                        ->with('pinned', $this->pinned)
                        ->with('nav', $this->nav)
                        ->with('siteInfo', $this->siteInfo);
    }

//
    public function about() {
        $page = Page::where('slug', '=', 'about')->first();
        return view('pages.pg')
                        ->with('page', $page)
                        ->with('posts', $this->posts)
                        ->with('categories', $this->categories)
                        ->with('tags', $this->tags)
                        ->with('sm', $this->sm)
                        ->with('pinned', $this->pinned)
                        ->with('nav', $this->nav)
                        ->with('siteInfo', $this->siteInfo);
    }

//
    public function contact() {
        $page = Page::where('title', '=', 'contact')->first();
        return view('pages.contact')
                        ->with('page', $page)
                        ->with('posts', $this->posts)
                        ->with('categories', $this->categories)
                        ->with('tags', $this->tags)
                        ->with('sm', $this->sm)
                        ->with('pinned', $this->pinned)
                        ->with('nav', $this->nav)
                        ->with('siteInfo', $this->siteInfo);
    }


    public function all()
    {
        $pages = Page::orderBy('id', 'asc')->paginate(20);
        // dd($pages);
        return view('auth.pages')->with('pages', $pages);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('auth.add-page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        //        dd($request);
        $request->validate([
            'title' => 'required|min:3|',
            'slug' => 'required|unique:pages',
            'body' => 'required|min:30',
            'image' => 'image|mimes:jpg,jpeg,bmp,png,|max:1000'
        ]);

        $title = trim(preg_replace('/\s+/', ' ', request('title')));

        $image = $request->file('image');
        if ($image) {
            $new_image = str_replace(" ", "-", strtolower($title)) . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images'), $new_image);
            //            $fullImgPath = url('images/posts-images/' . $new_image);
        } else {
            $new_image = '';
        }

        $page = new Page;
        $page->title = $title;
        $page->slug = request('slug');
        $page->image = $new_image;
        $page->body = request('body');
        $page->save();
        $view = " <a href='".url('/page/'.$page->slug)."' style='color:#FFF;' target='_blank'>View Page &raquo;</a>";
        return redirect('/admin/pages')->with('message', 'Page Added Successfully. &nbsp;'.$view);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($slug) {
        $page = Page::where(strtolower('slug'), '=', strtolower($slug))->firstOrFail();
        return view('auth.edit-page')
            ->with('page', $page)
            ->with('slug', $slug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page,$slug) {
        $page  = Page::where('slug', $slug)->first();
        $request->validate([
            'title' => 'required|min:3',
            // 'slug' => 'required|unique:posts',
            'body' => 'required|min:30',
            'image' => 'image|mimes:jpg,jpeg,bmp,png,|max:1000'
        ]);
        // dd($post->image);
        $title = trim(preg_replace('/\s+/', ' ', request('title')));

        $image = $request->file('image');
        if ($image != "") {
            $new_image = str_replace(" ", "-", strtolower($title)) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_image);
        } else {
            $new_image = $page->image;
        }

        $page->title = $title;
        $page->slug = request('slug');
        $page->body = request('body');
        $page->image = $new_image;

        $page->update();
        $view = " <a href='".url('/page/'.$page->slug)."' style='color:#FFF;' target='_blank'>View Page &raquo;</a>";
        return redirect('/admin/pages')->with('message', 'Page updated Successfully. &nbsp;'. $view);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->back()->withSuccess('message', 'Page Removed');
    }



        public function dispage($slug) {
        // dd($slug);
        $page = Page::where('slug', '=', $slug)->first();
        // dd($page);
        return view('pages.pg')
                        ->with('page', $page)
                        ->with('posts', $this->posts)
                        ->with('categories', $this->categories)
                        ->with('tags', $this->tags)
                        ->with('sm', $this->sm)
                        ->with('pinned', $this->pinned)
                        ->with('nav', $this->nav)
                        ->with('siteInfo', $this->siteInfo);
    }

}
