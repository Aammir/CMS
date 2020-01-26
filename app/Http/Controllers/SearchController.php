<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use App\Tag;
use App\SocialMedia;

class SearchController extends MainController {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $results = Post::where('body', 'like', '%' . $request->q . '%')->orWhere('title', 'like', '%' . $request->q . '%')->get();
//        $results .= Category::where('name', 'like', '%' . $request->q . '%')->get();
//        $results .= Tag::where('name', 'like', '%' . $request->q . '%')->get();
        return view('pages.results')
                        ->with('results', $results)
                        ->with('request', $request->q)
                        ->with('posts', $this->posts)
                        ->with('categories', $this->categories)
                        ->with('tags', $this->tags)
                        ->with('sm', $this->sm)
                        ->with('pinned', $this->pinned)
                        ->with('nav', $this->nav)
                        ->with('siteInfo', $this->siteInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
