<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator; //for ajax validation

class ContactController extends MainController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $messages= Contact::all();
        return view('auth.contact-messages')->with('messages',$messages);
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
                    'message' => 'required|min:12'
                        ], $messages
        );
        if ($validator->fails()) {
            $response = $validator->messages();
        } else {
            $response = ['success' => 'Thank You, Your message has been sent'];
            Contact::create([
                'name' => request('name'),
                'email' => request('email'),
                'message' => request('message')
            ]);
        }
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, $id) {
        $cmsg = Contact::where('id', $id)->first();
        $cmsg->delete();
        return redirect()->back()->withSuccess('message', 'Message removed');
    }

}
