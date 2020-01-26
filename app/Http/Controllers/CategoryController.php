<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends MainController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      $categories= Category::all();
      return view('auth.categories')->with('categories',$categories);
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
        $category = new Category();
        $category->name = $name;
        $category->slug = str_slug($name,'-');
        $category->save();

        return redirect('/admin/categories')->with('message', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $category = Category::where(strtolower('slug'), '=', strtolower($slug))->firstOrFail();
        $category_post = $category->post;

        return view('pages.category')
                        ->with('category_post', $category_post)
                        ->with('slug', $slug)
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id) {
        $category  = Category::where('id', $id)->first();
        $request->validate([
            'name' => 'required|min:3',
        ]);
        // dd($post->image);
        $name = trim(preg_replace('/\s+/', ' ', request('name')));

        $category->name = $name;
        $category->slug = str_slug($name,'-');

        $category->update();
        return redirect('/admin/categories')->with('message', 'Category updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) {
        $category  = Category::where('id', $category->id)->first();
        $category->delete();
        return redirect()->back()->withSuccess('message', 'Category Removed');
    }

}
