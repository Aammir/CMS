<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;

class SiteController extends MainController
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
        $runit = 'Your Blog Name';
        $siteDefault = new Site();
        $siteDefault->site_name = $runit;
        $siteDefault->save();

        $site =Site::where('id', 1)->first();

        Site::where('id', '!=', '1')->delete();
        return view('auth.settings')->with('site', $site);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $site =Site::where('id', 1)->first();
// dd($request);
        $logo = $request->file('logo');
        if ($logo != "") {
            $new_logo = 'logo' . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('assets/img'), $new_logo);
        } else {
            $new_logo =  $site->logo ;
        }

        $favicon = $request->file('favicon');
        if ($favicon != "") {
            $new_favicon = 'favicon' . '.' . $favicon->getClientOriginalExtension();
            $favicon->move(public_path('assets/img'), $new_favicon);
        } else {
            $new_favicon = $site->favicon;
        }

            $site->site_name = request('site_name');
            $site->logo = $new_logo;
            $site->favicon = $new_favicon;

            $site->posts_per_page = request('posts_per_page');
            $site->site_meta_info = request('site_meta_info');

            $site->email = request('email');
            $site->phone = request('phone');

            $site->address = request('address');
            $site->map = request('map');

            $site->show_pinned_post_section = request('show_pinned_post_section');
            $site->show_tags = request('show_tags');
            $site->show_main_footer = request('show_main_footer');
            $site->show_footer_bottom = request('show_footer_bottom');

            $site->about_section_text = request('about_section_text');
            $site->newsletter_section_text = request('newsletter_section_text');
            $site->footer_bottom = request('footer_bottom');

            $site->update();
            // $others = Site::all()->except->where('id','1');
            // $others->delete();

        return back()->with('message', 'Settings updated');
    }

    public function delogo(){
        $site =Site::where('id', 1)->first();
        $site->logo = "";
        $site->update();
        return back();
    }

    public function delfavico(){
        $site =Site::where('id', 1)->first();
        $site->favicon = "";
        $site->update();
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }

}
