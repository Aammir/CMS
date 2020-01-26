<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //for ajax validation

class CommentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $comments= Comment::all();
        return view('auth.comments')->with('comments',$comments);
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

        $messages = [];
        $validator = Validator::make(
                        $request->all(), [
                    'name' => 'required|min:3',
                    'email' => 'required|email',
                    'comment' => 'required'
                        ], $messages
        );
        if ($validator->fails()) {
            $response = $validator->messages();
        } else {
            
            $newComment = Comment::create([
                'name' => request('name'),
                'email' => request('email'),
                'comment' => request('comment'),
                'post_id' => request('post_id')
            ]);
            $data = $newComment->toArray();
            $response = ['success' => 'Thank You, Your comment has been submitted', $data];
             
        }
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, $id) {
              $comment = Comment::where('id', $id)->first();
        $comment->delete();
        return redirect()->back()->withSuccess('message', 'Comment removed');
    }

}
