<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //for ajax validation

class SubscriberController extends MainController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
            $subscribers= Subscriber::all();
        return view('auth.subscribers')->with('subscribers',$subscribers);
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
                $request->all(), ['subscriber_email' => 'required|email|unique:Subscribers'],
                $messages
        );
        if ($validator->fails()) {
            $response = $validator->messages();
        } else {
            $response = ['success' => 'You have successfully subscribed'];
            Subscriber::create([
                'subscriber_email' => request('subscriber_email')
            ]);
        }
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $Subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $Subscriber) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscriber  $Subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $Subscriber) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $Subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $Subscriber) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $Subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $Subscriber, $id) {
                      $subscriber = Subscriber::where('id', $id)->first();
        $subscriber->delete();
        return redirect()->back()->withSuccess('message', 'Subscriber removed');
    }

}
