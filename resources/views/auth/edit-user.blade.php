@extends('auth.layouts.dashboard')
@section('title') Editing {{ $user->name }}'s Profile @endsection
@section('content')
<style>

    #btn-holder {
        position: absolute;
        top: 0 !important;
        width: 89%;
        clear: both;
        display: block;
    }
	.redactor-toolbar-wrapper {
        position: relative;
        background: #EEE;
        padding-bottom: 15px;
    }
    .card-image{height:auto !important;}
	.card-user .card-body {
    min-height: 0px;
}
</style>
<div class="content">
  <form action="{{url('/admin/update-user/'.$user->id)}}" method="post" id="add_User" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Editing {{ $user->name }}'s Profile</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8 pr-1">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{  $user->name }}"/>
                      @if($errors->has('name'))
                      <div class="resp text-danger">{{$errors->first('name')}}</div>
                      @endif </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 pr-1">
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{  $user->email }}"/>
                      @if($errors->has('email'))
                      <div class="resp text-danger">{{$errors->first('email')}}</div>
                      @endif </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 pr-1">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="password" name="password" value="">
                      @if($errors->has('password'))
                      <div class="resp text-danger">{{$errors->first('password')}}</div>
                      @endif </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About & User Information</label>
                      <textarea id="editor" rows="4" cols="80" class="form-control" placeholder="User Information here" name="info">{{  $user->info }}</textarea>
                      @if($errors->has('info'))
                      <div class="resp text-danger">{{$errors->first('info')}}</div>
                      @endif </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-image">
                <?php $usr_img = (!empty($user->image)) ? url('/assets/img/'.$user->image):url('/assets/img/user-def.jpg');?>
                <img src="{{ $usr_img }}" id="output">
            </div>
              <div class="card-body">
                <div class="author"> </div>
                <p class="description text-center"></p>
              </div>
              <hr>
              @if($errors->has('image'))
              <div class="resp text-danger">{{$errors->first('image')}}</div>
              @endif
              <p class="btn btn-default btn-link" style="border:none;font-weight:bold;">Add User Profile Image</p>
              <br>
              <input type="file" class="form-control btn btn-primary" value="{{ $user->image }}" name="image" id="image" accept="image/*" onChange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-info btn-fill pull-right"><i class="fa fa-save"></i> Save Profile</button>
    <div class="clearfix"></div>
  </form>
</div>
<script>
    $R('#editor');
</script>
@endsection
