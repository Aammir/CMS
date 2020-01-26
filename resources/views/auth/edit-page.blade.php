@extends('auth.layouts.dashboard')
@section('title')Edit Page @endsection
@section('content')
<style>
    .redactor-box{height:500px !important;resize: none !important;}
    #btn-holder {
        position: absolute;
        top: 0 !important;
        width: 89%;
        clear: both;
        display: block;
    }.col-md-3.right-col > .card:first-child {
        margin-top: 100px;
    }.redactor-toolbar-wrapper {
        position: relative;
        background: #EEE;
        padding-bottom: 15px;
    }#preSlug {
    border: 0;
    width: 20.3%;
    background: transparent !important;
    color: #AAA;
    pointer-events: none;
    padding: 0;
}
</style>
<div class="content">
  <form action="{{url('/admin/update-page/'.$slug)}}" method="post" id="add_page" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3 class="card-title">Edit Page</h3>
          @if(session()->has('message'))
          <div class="alert alert-success">
              {{ session()->get('message') }} |
              <a href="{{ url('/admin/pages/')}}" style="color: #FFF;">View All Pages</a>
          </div>
          @endif </div>
      </div>
      <div class="row">
        <!--col-->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header"> </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 pr-1">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Page Title" value="{{ $page->title }}" name="title" id="title">
                    @if($errors->has('title'))
                    <div class="resp text-danger">{{$errors->first('title')}}</div>
                    @endif
                    <div class="slug-show"><i class="fa fa-link lnk-addon"></i>
                        <input type="text" disabled="disabled" value="{{ url('/').'/'}}" name="" id="preSlug"/>
                      <input type="text" value="{{ $page->slug }}" name="slug" id="slug"/>
                    </div>
                    @if($errors->has('slug'))
                     <div class="resp text-danger">{{$errors->first('slug')}}</div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 pr-1">
                  <div class="form-group">
                    <label for="editor">Content</label>
                    <div id="before-content">@if($errors->has('body'))
                      <div class="resp text-danger">{{$errors->first('body')}}</div>
                      @endif</div>
                    <textarea class="form-control" id="editor" name="body">{{ $page->body }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 right-col">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"></h4>
            </div>
            <div class="card-body relative">
              <div class="row">
                <div class="col-md-12">
                  <div id="feat_img_val">@if($errors->has('image'))
                    <div class="resp text-danger">{{$errors->first('image')}}</div>
                    @endif</div>
                  <div class="form-group">
                    <label>Featured Image</label>
                    <input type="file" class="form-control" value="{{ url('/images/'.$page->image) }}" name="image" id="image" accept="image/*" onChange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Featured Image Preview</label>
                    <div><img src="{{ url('/images/'.$page->image) }}" class="img-thumbnail" id="output"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card" id="btn-holder">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-info btn-fill pull-right"><i class="fa fa-refresh"></i> Update</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </form>
</div>
<script>
    $R('#editor');
</script>
@endsection
