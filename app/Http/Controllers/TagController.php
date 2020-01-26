<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends MainController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tags= Tag::all();
        return view('auth.tags')->with('tags',$tags);
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
        //        dd($request);
        $request->validate([
            'name' => 'required|min:3'
        ]);
        $name = trim(preg_replace('/\s+/', ' ', request('name')));
        $tag = new Tag();
        $tag->name = $name;
        $tag->slug = str_slug($name,'-');
        $tag->save();

        return redirect('/admin/tags')->with('message', 'tag Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $tag = Tag::where(strtolower('slug'), '=', strtolower($slug))->firstOrFail();
        $tag_post = $tag->post;

        return view('pages.tag')
                        ->with('tag_post', $tag_post)
                        ->with('slug',     $slug)
                        ->with('categories',     $this->categories)
                        ->with('tags',     $this->tags)
                        ->with('sm',       $this->sm)
                        ->with('pinned',   $this->pinned)
                        ->with('nav',      $this->nav)
                        ->with('siteInfo', $this->siteInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag, $id) {
        $tag  = Tag::where('id', $id)->first();
        $request->validate([
            'name' => 'required|min:3',
        ]);
        // dd($post->image);
        $name = trim(preg_replace('/\s+/', ' ', request('name')));

        $tag->name = $name;
        $tag->slug = str_slug($name,'-');

        $tag->update();
        return redirect('/admin/tags')->with('message', 'tag updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag, $id) {
        $tag  = Tag::where('id', $id)->first();
        $tag->delete();
        return redirect()->back()->withSuccess('message', 'tag Removed');
    }

}
