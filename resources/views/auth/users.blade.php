@extends('auth.layouts.dashboard')
@section('title')Users @endsection
@section('content')
<div class="content">
  <style>
        .sperator{color:#CFCFCF;}
        .fa.fa-times {
    position: relative;
    top: 10px;
}
    </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 mar-bot-1">
        <h3 class="card-title records-title">All users</h3>
        <a href="{{url('/admin/add-user')}}" title="Add user" class="btn btn-info btn-fill pull-right"> <i class="fa fa-plus"></i> Add New </a> </div>
    </div>
    <div class="row">
      <div class="col-md-12"> @if(session()->has('message'))
        <div class="alert alert-success"> {{ session()->get('message') }}. </div>
        @endif </div>
      <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
          <div class="card-header "> </div>
          <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
              <thead>
              <th width="5%">ID</th>
                <th width="10%">Name</th>
                <!--<th width="">body</th>-->
                {{--
                <th width="">author</th>
                --}}
                <th width="">Image</th>
                <th width="">Email</th>
                <th width="">Info</th>
                <th colspan="2" width="5%">Action</th>
                  </thead>
              <tbody>

              @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td width="10%"><a href='{{ url("/").$user->slug}}' title="View {{ucfirst($user->title)}}" target="_blank"a>{{ucfirst($user->name)}}</td>
                <!--<td width=""><?php // substr($user->body,0,15).'....';   ?></td>-->
                {{--
                <td width="">{{ $user->user->name }}</td>
                --}}
                <td width=""><img src="{{ url('/assets/img/'.($user->image?$user->image:'user-def.jpg')) }}" class="img-thmbnail"></td>
                <td width="">{{ucfirst($user->email)}}</td>
                <td width="">{!! ucfirst($user->info) !!}</td>
                <td width="2%"><a href="{{url('/admin/edit-user/'.$user->id)}}" title="Edit"><i class="fa fa-edit"></i></a></td>
                <td width="1%"><a href="#" data-toggle="modal" data-target="#confirm-{{$user->id}}" id="remove_{{$user->id}}" title="Remove '{{$user->title}}'" class="text-danger text-left"> <i class="fa fa-times"></i> </a>
                  <!-- Delete Modal -->

                  <div class="modal fade modal-mini modal-primary" id="confirm-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
                    <div class="modal-dialog">
                      <?php if($user->id ==1) {?>
                      <div class="modal-content" style="min-width: 350px !important;">
                        <div class="modal-header justify-content-center">
                          <div class="modal-profile"> <i class="fa fa-exclamation-triangle text-danger"></i> </div>
                        </div>
                        <div class="modal-body text-center">
                          <h5 class="text-danger"><strong>Admin User can not be removed!</strong></h5>
                        </div>
                        <div class="modal-footer">
                          <div style="display:block;margin:0 auto;">
                            <button type="button" class="btn btn-info btn-simple btn-fill" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        </form>
                      </div>
                      <?php }else{?>
                      <div class="modal-content">
                        <form action="{{url('/admin/delete-user/'.$user->id)}}" method="post">
                          <div class="modal-header justify-content-center"> @csrf @method('delete')
                            <div class="modal-profile"> <i class="fa fa-trash-o"></i> </div>
                          </div>
                          <div class="modal-body text-center">
                            <p>Are you sure you want to remove "{{ucfirst($user->name)}}"? </p>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-simple btn-fill">Yes</button>
                            <button type="button" class="btn btn-info btn-simple btn-fill" data-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>
                      <?php }?>
                    </div>
                  </div>

                  <!--  End Modal --></td>
              </tr>
              @endforeach
                </tbody>

            </table>
          </div>
        </div>
        {{--
        <div class="pull-right">{!! $users->links() !!}</div>
        --}} </div>
      <!--endtable-->

    </div>
  </div>
</div>
@endsection
