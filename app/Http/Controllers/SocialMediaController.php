<?php

namespace App\Http\Controllers;

use App\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // $SocialMedia = SocialMedia::all();
        $SocialMedia=SocialMedia::where('id', 1)->first();


        return view('parts.header-common')->with('SocialMedia',$SocialMedia);
        return view('parts.footer')->with('SocialMedia',$SocialMedia);
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
     * @param  \App\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMedia $socialMedia) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $socialMedia) {
        // dd('test');

        $smDef = new SocialMedia();
        $smDef->facebook = '#';
        $smDef->save();

        $sm = SocialMedia::where('id', '=', '1')->firstOrFail();
        return view('auth.social')
            ->with('sm', $sm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialMedia $socialMedia) {

        $sm =SocialMedia::where('id', 1)->first();

        $sm->facebook = request('facebook');
        $sm->twitter = request('twitter');
        $sm->gplus = request('gplus');
        $sm->linkedin = request('linkedin');
        $sm->instagram = request('instagram');

        $sm->pinterest = request('pinterest');
        $sm->youtube = request('youtube');
        $sm->whatsapp = request('whatsapp');

        SocialMedia::where('id', '!=', '1')->delete();

        $sm->update();

        return back()->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $socialMedia) {
        //
    }

}
