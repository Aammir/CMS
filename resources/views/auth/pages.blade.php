@extends('auth.layouts.dashboard')
@section('title')Pages @endsection
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
        <h3 class="card-title records-title">All pages</h3>
        <a href="{{url('/admin/add-page')}}" title="Add page" class="btn btn-info btn-fill pull-right"> <i class="fa fa-plus"></i> Add New </a> </div>
    </div>
    <div class="row">
      <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success"> {!! session()->get('message') !!}. </div>
            @endif
        <div class="card strpied-tabled-with-hover">
          <div class="card-header "></div>
          <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
              <thead>
              <th width="5%">ID</th>
                <th width="10%">title</th>
                <!--<th width="">body</th>-->
                {{-- <th width="">author</th> --}}
                <th width="">featured image</th>
                <th width="">Created at</th>
                <th width="">modified at</th>
                <th colspan="2" width="5%">Action</th>
                  </thead>
              <tbody>

              @foreach($pages as $page)
              <tr>
                <td>{{$page->id}}</td>
                <td width="10%"><a href='{{ url("/page/".$page->slug)}}' title="View {{ucfirst($page->title)}}" target="_blank"a>{{ucfirst($page->title)}}</td>
                <!--<td width=""><?php // substr($page->body,0,15).'....';   ?></td>-->
                {{-- <td width="">{{ $page->user->name }}</td> --}}
                <td width="">@if(!empty($page->image))<img src="{{ url('/images/'.$page->image) }}" class="img-thmbnail">@else <small class="text-danger">No Featured Image</small> @endif</td>
                <td width="">{{ucfirst($page->created_at->format('j M, Y'))}}</td>
                <td width="">{{ucfirst($page->updated_at->format('j M, Y'))}}</td>
                <td width="2%"><a href="{{url('/admin/edit-page/'.$page->slug)}}" title="Edit"><i class="fa fa-edit"></i></a></td>
                <td width="1%"><a href="#" data-toggle="modal" data-target="#confirm-{{$page->id}}" id="remove_{{$page->id}}" title="Remove '{{$page->title}}'" class="text-danger text-left"> <i class="fa fa-times"></i> </a>
                  <!-- Delete Modal -->

                  <div class="modal fade modal-mini modal-primary" id="confirm-{{$page->id}}" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="{{url('/admin/delete-page/'.$page->id)}}" method="post">
                          <div class="modal-header justify-content-center"> @csrf @method('delete')
                            <div class="modal-profile"> <i class="fa fa-trash-o"></i> </div>
                          </div>
                          <div class="modal-body text-center">
                            <p>Are you sure you want to remove "{{ucfirst($page->title)}}" </p>
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
        <div class="pull-right">{!! $pages->links() !!}</div>
      </div>
      <!--endtable-->

    </div>
  </div>
</div>
@endsection
