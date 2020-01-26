@extends('auth.layouts.dashboard')
@section('title')Tags @endsection
@section('content')
<div class="content">
  <style>
        .sperator{color:#CFCFCF;}

    </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 mar-bot-1">
        <h3 class="card-title records-title">All tags</h3>
        <a href="#" data-toggle="modal" data-target="#add" id="new" title="Add New tag" class="btn btn-info btn-fill pull-right"><i class="fa fa-plus"></i> Add New </a> </div>
    </div>
    <div class="row">
      <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success"> {{ session()->get('message') }}. </div>
            @endif
        <div class="card strpied-tabled-with-hover">
          <div class="card-header "> </div>
          <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
              <thead>
              <th width="10%">ID</th>
                <th width="70%">name</th>
                <th colspan="2" width="10%">Action</th>
                  </thead>
              <tbody>

              @foreach($tags as $tag)
              <tr>
                <td>{{$tag->id}}</td>
                <td width="">{{ $tag->name }}</td>
                <td width="2%"><a <a href="#" data-toggle="modal" data-target="#edit-{{  $tag->id}}" id="edit_{{  $tag->id}}" title="Edit {{ $tag->name }}" ><i class="fa fa-edit"></i></a>
                  <!-- Edit Modal -->

                  <div class="modal fade modal-mini modal-primary" id="edit-{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="{{url('/admin/update-tag/'.$tag->id)}}" method="post">
                          <div class="modal-header justify-content-center"> @csrf @method('patch')
                            <div class="modal-profile"> <i class="fa fa-edit"></i> </div>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{  $tag->name }}"/>
                              @if($errors->has('name'))
                              <div class="resp text-danger">{{$errors->first('name')}}</div>
                              @endif </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info btn-simple btn-fill">Update</button>
                            <button type="button" class="btn btn-info btn-simple btn-fill" data-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!--  End Modal --></td>
                <td width="1%"><a href="#" data-toggle="modal" data-target="#confirm-{{$tag->id}}" id="remove_{{$tag->id}}" title="Remove {{ $tag->name }}" class="text-danger text-left"> <i class="fa fa-times"></i> </a>
                  <!-- Delete Modal -->

                  <div class="modal fade modal-mini modal-primary" id="confirm-{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="{{url('/admin/delete-tag/'.$tag->id)}}" method="post">
                          <div class="modal-header justify-content-center"> @csrf @method('delete')
                            <div class="modal-profile"> <i class="fa fa-trash-o"></i> </div>
                          </div>
                          <div class="modal-body text-center">
                            <p>Are you sure you want to remove "{{ $tag->name }}" </p>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-simple btn-fill">Yes</button>
                            <button type="button" class="btn btn-info btn-simple btn-fill" data-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>
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
        <div class="pull-right">{!! $tags->links() !!}</div>
        --}} </div>
      <!--endtable-->

    </div>
  </div>
</div>

<!-- Edit Modal -->

<div class="modal fade modal-mini modal-primary" id="add" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{  url('/admin/store-tag/')  }}" method="post">
              <div class="modal-header justify-content-center"> @csrf
                <div class="modal-profile"> <i class="fa fa-save"></i> </div>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{  old('name') }}"/>
                  @if($errors->has('name'))
                  <div class="resp text-danger">{{$errors->first('name')}}</div>
                  @endif </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-simple btn-fill">Save</button>
                <button type="button" class="btn btn-info btn-simple btn-fill" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!--  End Modal -->
@endsection
