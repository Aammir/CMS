@extends('auth.layouts.dashboard')
@section('title')
Social Media
@endsection
@section('content')
<style>
textarea.form-control {
    height: 150px;
}
</style>
<div class="content">
  <div class="container-fluid">
        <div class="col-md-12">@if(session()->has('message'))
                <div class="alert alert-success"><i class="fa fa-save"></i> {{ session()->get('message') }} </div>
                @endif </div>
  <form action="{{ url('/admin/sm/1') }}" method="post" id="settings-site-info">
    @csrf
    @method('patch')
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Social</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Facebook</label>
              <input type="text" class="form-control" placeholder="Facebook" name="facebook"  id="facebook" value="{{ (isset($sm->facebook)?$sm->facebook:'') }}">
            </div>
          </div>
          <div class="col-md-6 px-1">
            <div class="form-group">
              <label>Twitter</label>
              <input type="text" class="form-control" placeholder="Twitter" name="twitter" id="twitter"  value="{{ (isset($sm->twitter)?$sm->twitter:'') }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Google Plus</label>
              <input type="text" class="form-control" placeholder="Google Plus" name="gplus" id="gplus" value="{{ (isset($sm->gplus)?$sm->gplus:'') }}">
            </div>
          </div>
          <div class="col-md-6 px-1">
            <div class="form-group">
              <label>LinkedIn</label>
              <input type="text" class="form-control" placeholder="LinkedIn" name="linkedin" id="linkedin" value="{{ (isset($sm->linkedin)?$sm->linkedin:'') }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Instagram</label>
              <input type="text" class="form-control" placeholder="Instagram" name="instagram" id="instagram" value="{{ (isset($sm->instagram)?$sm->instagram:'') }}">
            </div>
          </div>
          <div class="col-md-6 px-1">
            <div class="form-group">
              <label>Pinterest</label>
              <input type="text" class="form-control" placeholder="Pinterest" name="pinterest" id="pinterest" value="{{ (isset($sm->pinterest)?$sm->pinterest:'') }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Youtube</label>
              <input type="text" class="form-control" placeholder="Youtube" name="youtube" id="youtube" value="{{ (isset($sm->youtube)?$sm->youtube:'') }}">
            </div>
          </div>
          <div class="col-md-6 px-1">
            <div class="form-group">
              <label>Whatsapp</label>
              <input type="text" class="form-control" placeholder="Whatsapp" name="whatsapp" id="whatsapp" value="{{ (isset($sm->whatsapp)?$sm->whatsapp:'') }}">
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <button type="submit" class="btn btn-info btn-fill pull-right"><i class="fa fa-globe"></i> Update Social Media</button>
      </div>
    </div>

  </form>
  <div class="clearfix">&nbsp;<br></div>
</div>
</div>
@endsection
