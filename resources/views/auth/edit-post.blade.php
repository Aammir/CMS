@extends('auth.layouts.dashboard')
@section('title')Editing {{ucfirst($post->title)}} @endsection
@section('content')
<style>
    .redactor-box{min-height:950px !important;resize: none !important;}
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
    }
</style>
<div class="content">
  <form action="{{url('/admin/update-post/'.$post->slug)}}" method="post" id="edit_post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3 class="card-title">Edit Post</h3>
          @if(session()->has('message'))
          <div class="alert alert-success">
              {{ session()->get('message') }}
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
                    <input type="text" class="form-control" placeholder="Post Title" value="{{$post->title}}" name="title" id="edit_title">
                    @if($errors->has('title'))
                         <div class="resp text-danger">{{$errors->first('title')}}</div>
                    @endif

                    <div class="slug-show"><i class="fa fa-link lnk-addon"></i>
                        <input type="text" disabled="disabled" value="{{ url('/posts/').'/'}}" name="" id="preSlug"/>
                        <input type="text" value="{{$post->slug}}" name="slug" id="slug" placeholder="{{$post->slug}}"/>
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
                    <textarea class="form-control" id="editor" name="body">{{$post->body}}</textarea>
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
<input type="file" class="form-control" value="{{ $post->image}}" name="image" id="image" accept="image/*" onChange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Featured Image Preview</label>
                    <div><img src="{{url('/images/posts-images/'.$post->image)}}" class="img-thumbnail" id="output"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Categories</h4>
            </div>
            <div class="card-body">
              <ul class="texonomy" id="categories">
                @foreach($categories as $category)
                <li>
                  <label class="checkbox-inline">
                    <input type="checkbox" value="{{$category->id}}" name="categories[]"
                    @foreach($selectedC as $cate)
                    @if($cate == $category->id) checked @endif
                    @endforeach
                    >
                    &nbsp;{{$category->name}}</label>
                </li>
                @endforeach

              </ul>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Tags</h4>
            </div>
            <div class="card-body">
              <ul class="texonomy" id="tags">
                @foreach($tags as $tag)
                <li>
                  <label class="checkbox-inline">
                    <input type="checkbox" value="{{$tag->id}}" name="tags[]"
                    @foreach($selectedT as $sTag)
                    @if($sTag == $tag->id) checked @endif
                    @endforeach
                    >
                    &nbsp;{{$tag->name}}</label>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Additional</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Post Type</label>
                    <select class="form-control" name="type" id="type">
                      <option value="">-- Select One --</option>
                      <option value="home1" <?php if($post->type == "home1"){?>selected<?php }?>>Home 1</option>
                      <option value="home2" <?php if($post->type == "home2"){?>selected<?php }?>>Home 2</option>
                      <option value="home3" <?php if($post->type == "home3"){?>selected<?php }?>>Home 3</option>
                      <option value="pinned" <?php if($post->type == "pinned"){?>selected<?php }?>>Pinned By Admin</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="user_id" value="{{$user->id}}" class="{{$user->name}}">
          <div class="card" id="btn-holder">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-info btn-fill pull-right"><i class="fa fa fa-refresh"></i> Update</button>
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
