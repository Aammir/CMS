@extends('auth.layouts.dashboard')
@section('title')
Settings
@endsection
@section('content')
<style>
textarea.form-control {
    height: 150px;
}
</style>
<div class="content">
<div class="container-fluid">
<form action="{{ url('/admin/settings/1') }}" method="post" id="settings-site-info" enctype="multipart/form-data">
@csrf
@method('patch')
<div class="row">
  <div class="col-md-12">@if(session()->has('message'))
    <div class="alert alert-success"><i class="fa fa-save"></i> {{ session()->get('message') }} </div>
    @endif </div>
  <!--col-->
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Home Settings</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Website Name</label>
              <input type="text" class="form-control" value="{{ (($site->site_name != "") ? $site->site_name : '') }}" name="site_name" id="site_name"> </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Website Logo</label>
              <input type="file" class="form-control" value="{{ (($site->logo != "") ? url('/assets/img/'.$site->
              logo) : '') }}" name="logo" id="logo" accept="image/*" onChange="document.getElementById('logo_preview').src = window.URL.createObjectURL(this.files[0])">  </div>
              <a href="{{url('/admin/delogo')}}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove Logo</a>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Logo Preview</label>
              <div> <img src="@if($site->logo != "") {{ url('/assets/img/'.$site->logo)}} @endif" class="img-thumbnail" id="logo_preview"> </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Website Favicon</label>
              <input type="file" class="form-control" value="{{ (isset($site->favicon)? url('/assets/img/'.$site->favicon):'') }}" name="favicon" id="favicon" accept="image/*" onChange="document.getElementById('favicon_preview').src = window.URL.createObjectURL(this.files[0])">
               </div>
               <a href="{{url('/admin/delfavico')}}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove Favicon</a>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Favicon Preview</label>
              <div><img src="@if($site->favicon != "") {{ url('/assets/img/'.$site->favicon)}} @endif" class="img-thumbnail" id="favicon_preview"> </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 pr-1">
            <div class="form-group">
              <label>Blog Meta Info</label>
              <textarea class="form-control" placeholder="Meta" style="font-size:14px;" name="site_meta_info">{{ (isset($site->site_meta_info)?$site->site_meta_info:'') }}</textarea>
            </div>
          </div>
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>Posts per page?</label>
              <input type="number" min="6" max="18" class="form-control"  value="{{ (isset($site->posts_per_page)?$site->posts_per_page:'') }}" name="posts_per_page">
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>

  </div>
  <!--col-->
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Contact Info.</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Website Email</label>
              <input type="text" class="form-control" placeholder="Website Email" name="email" id="email" value="{{ (isset($site->email)?$site->email:'') }}">
            </div>
          </div>
          <div class="col-md-6 px-1">
            <div class="form-group">
              <label>Phone Number</label>
              <input type="text" class="form-control" placeholder="Phone Number" name="phone" id="phone" value="{{ (isset($site->phone)?$site->phone:'') }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control" placeholder="Address" name="address" id="address">{{ (isset($site->address)?$site->address:'') }}</textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>Map</label>
              <textarea class="form-control" placeholder="Map" name="map" id="map" style="height:204px;">{{ (isset($site->map)?$site->map:'') }}</textarea>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
  <div class="card">
      <div class="card-header">
        <h4 class="card-title">Misc. Sections.</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label class="checkbox-inline">
                <input {{ ($site->
                show_pinned_post_section == 1 ?'checked':'') }} type="checkbox" name="show_pinned_post_section" id="show_pinned_post_section" value="1"/>
                &nbsp;Show Pinned+About Sect.</label>
            </div>
          </div>
          <div class="col-md-6 px-1">
            <div class="form-group">
              <label class="checkbox-inline">
                <input {{ ($site->
                show_tags == 1 ?'checked':'') }} type="checkbox" name="show_tags" id="show_tags" value="1"/>
                &nbsp;Show Tags</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label class="checkbox-inline">
                <input type="checkbox" {{ (($site->
                show_main_footer==1)?'checked':'') }} name="show_main_footer" id="show_main_footer" value="1">
                &nbsp;Show Main Footer</label>
            </div>
          </div>
          <div class="col-md-6 px-1">
            <div class="form-group">
              <label class="checkbox-inline">
                <input type="checkbox" {{ (($site->
                show_footer_bottom==1)?'checked':'') }} name="show_footer_bottom" id="show_footer_bottom" value="1">
                &nbsp;Show Footer Bottom</label>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>about section text</label>
              <textarea class="form-control" placeholder="about section text" name="about_section_text" id="about_section_text">{{ (isset($site->about_section_text)?$site->about_section_text:'') }}</textarea>
            </div>
          </div>

          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>newsletter text</label>
              <textarea class="form-control" placeholder="newsletter section text" name="newsletter_section_text" id="newsletter_section_text">{{ (isset($site->newsletter_section_text)?$site->newsletter_section_text:'') }}</textarea>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div class="form-group">
              <label>footer bottom section</label>
              <textarea class="form-control" placeholder="footer bottom section" name="footer_bottom" id="footer_bottom" style="height: 75px;">{{ (isset($site->footer_bottom)?$site->footer_bottom:'') }}</textarea>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <button type="submit" class="btn btn-info btn-fill pull-right"><i class="fa fa-save"></i> Update Settings</button>
  </div>
</div>
</div>
</from>
</div>
@endsection
