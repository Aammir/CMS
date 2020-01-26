@extends('auth.layouts.dashboard')
@section('title','Dashboard')
@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
  <!--|-->
  <div class="col-md-4">
    <div class="card ">
      <div class="card-header ">
        <h4 class="card-title"><i class="nc-icon nc-paper-2"></i> Posts</h4>
        <p class="card-category">{{ $num_posts }} Total</p>
        <hr>
      </div>
      <div class="card-body ">
        <div class="clearfix col-md-12"> <a href="{{  url('/admin/add-post') }}" title="Add Post" class="btn btn-info btn-fill btn-block"> <i class="fa fa-paste"></i> Add Post </a><br>
        </div>
        <div class="clearfix col-md-12"> <a href="{{  url('/admin/posts') }}" title="All Posts" class="btn btn-info btn-fill btn-block"> <span data-notify="icon" class="nc-icon nc-single-copy-04"></span>&nbsp; {{ $num_posts }} Posts </a><br>
        </div>
        <div class="clearfix col-md-12"> <a href="{{  url('/admin/categories') }}" title="Categories" class="btn btn-info btn-fill btn-block"> <span data-notify="icon" class="fa fa-list-alt"></span> &nbsp; {{ $num_cate }}  Categories </a><br>
        </div>
        <div class="clearfix col-md-12"> <a href="{{  url('/admin/tags') }}" title="Tags" class="btn btn-info btn-fill btn-block"> <span data-notify="icon" class="fa fa-tag"></span> &nbsp; {{ $num_tag }}  Tags </a><br>
        </div>
        <hr>
        {{--
        <div class="stats"> <i class="fa fa-clock-o"></i> Last Comment added 2 days ago </div>
        --}} </div>
    </div>
  </div>
  <!--|-->
  <div class="col-md-4">
    <div class="card ">
      <div class="card-header ">
        <h4 class="card-title"><i class="nc-icon nc-paper-2"></i> Misc. Stats</h4>
        <p class="card-category">.</p>
        <hr>
      </div>
      <div class="clearfix col-md-12"> <a href="{{  url('/admin/contact-messages') }}" title="All Messages" class="btn btn-info btn-fill btn-block"> <span data-notify="icon" class="nc-icon nc-email-83"></span>&nbsp; All {{ $num_msg }} Messages</a><br>
      </div>
      <div class="clearfix col-md-12"> <a href="{{  url('/admin/comments') }}" title="All Comments" class="btn btn-info btn-fill btn-block"> <span data-notify="icon" class="nc-icon nc-chat-round"></span>&nbsp; All {{ $num_cmnt }} Comments</a><br>
      </div>
      <div class="clearfix col-md-12"> <a href="{{  url('/admin/subscribers') }}" title="All Subscribers" class="btn btn-info btn-fill btn-block"> <span data-notify="icon" class="nc-icon nc-notes"></span>&nbsp; All {{ $num_subsc }} Subscribers</a><br>
      </div>
    </div>
  </div>
  <!--|-->
  <div class="col-md-4">
    <div class="card ">
      <div class="card-header ">
        <h4 class="card-title"><i class="nc-icon nc-paper-2"></i> Pages</h4>
        <p class="card-category">{{ $num_pages }} Total</p>
        <hr>
      </div>
      <div class="clearfix col-md-12"> <a href="{{  url('/admin/add-page') }}" title="Add Page" class="btn btn-info btn-fill btn-block"> <i class="fa fa-paste"></i> Add Page </a><br>
      </div>
      <div class="clearfix col-md-12"> <a href="{{  url('/admin/pages') }}" title="All Pages" class="btn btn-info btn-fill btn-block"> <span data-notify="icon" class="nc-icon nc-single-copy-04"></span>&nbsp; All {{ $num_pages }} Pages </a><br>
      </div>
    </div>
  </div>
</div>
@endsection
