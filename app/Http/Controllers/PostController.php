<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Category;
use App\Comment;
use App\Tag;
use App\SocialMedia;
use Illuminate\Support\Facades\Validator; //for ajax validation
// use Illuminate\Validation\Validator;

class PostController extends MainController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'asc')->paginate(10);
        return view('auth.posts')->with('posts', $posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $categories = Category::all();
        $tags = Tag::all();
        return view('auth.add-post')
            ->with('user', $user)
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    public function store(Request $request)
    {
        //        dd($request);
        $request->validate([
            'title' => 'required|min:3|',
            'slug' => 'required|unique:posts',
            'body' => 'required|min:30',
            'image' => 'image|mimes:jpg,jpeg,bmp,png,|max:1000'
        ]);

        $title = trim(preg_replace('/\s+/', ' ', request('title')));

        $image = $request->file('image');
        if ($image) {
            $new_image = str_replace(" ", "-", strtolower($title)) . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images/posts-images'), $new_image);
            //            $fullImgPath = url('images/posts-images/' . $new_image);
        } else {
            $new_image = '';
        }

        $post = new Post;
        $post->title = $title;
        $post->slug = request('slug');
        $post->image = $new_image;
        $post->body = request('body');
        $post->type = request('type');
        $post->user_id = request('user_id');
        $post->save();
        //many to many rel save
        $post->category()->sync($request->categories, false);
        $post->tag()->sync($request->tags, false);
        $view = " <a href='".url('/posts/'.$post->slug)."' style='color:#FFF;' target='_blank'>View Post &raquo;</a>";
        return redirect('/admin/posts')->with('message', 'Post Added Successfully. &nbsp; '.$view);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //        $title = str_replace('-', ' ', $slug);
        $post = Post::where(strtolower('slug'), '=', strtolower($slug))->firstOrFail();
        //        dd($post->id);
        $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();

        $categories = Category::all();
        $tags = Tag::all();
        $sm = SocialMedia::all();

        //        return view('pages.post', compact('post', 'previous', 'next', 'categories', 'tags', 'SocialMedia'));

        return view('pages.post')
            ->with('post', $post)
            ->with('previous', $previous)
            ->with('next', $next)
            ->with('posts', $this->posts)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('sm', $this->sm)
            ->with('pinned', $this->pinned)
            ->with('nav', $this->nav)
            ->with('siteInfo', $this->siteInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where(strtolower('slug'), '=', strtolower($slug))->firstOrFail();
        $user = auth()->user();
        $categories = Category::all();
        $tags = Tag::all();
        $selectedC = $post->Category()->allRelatedIds();
        $selectedT = $post->Tag()->allRelatedIds();

        return view('auth.edit-post')
            ->with('post', $post)
            ->with('slug', $slug)
            ->with('user', $user)
            ->with('categories', $this->categories)
            ->with('tags', $this->tags)
            ->with('selectedC', $selectedC)
            ->with('selectedT', $selectedT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, $slug)
    {
        $post  = Post::where('slug', $slug)->first();
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
            $image->move(public_path('images/posts-images'), $new_image);
        } else {
            $new_image = $post->image;
        }

        $post->title = $title;
        $post->slug = request('slug');
        $post->body = request('body');
        $post->image = $new_image;
        $post->type = request('type');
        $post->user_id = request('user_id');

        // dd(request('type'));

        $post->update();

        // $post->update(request(['title','body','image','type']));

        $post->category()->sync($request->categories);
        $post->tag()->sync($request->tags);

        $view = " <a href='".url('/posts/'.$post->slug)."' style='color:#FFF;' target='_blank'>View Post &raquo;</a>";
        return redirect('/admin/posts')->with('message', 'Post updated Successfully. &nbsp;'.$view);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->withSuccess('message', 'Post Removed Successfuly');
    }
}
