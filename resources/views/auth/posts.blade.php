@extends('auth.layouts.dashboard')
@section('title')Posts @endsection
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
        <h3 class="card-title records-title">All Posts</h3>
        <a href="{{url('/admin/add-post')}}" title="Add Post" class="btn btn-info btn-fill pull-right"> <i class="fa fa-plus"></i> Add New </a> </div>
    </div>
    <div class="row">
      <div class="col-md-12"> @if(session()->has('message'))
        <div class="alert alert-success"> {!! session()->get('message') !!}. </div>
        @endif
        <div class="card strpied-tabled-with-hover">
          <div class="card-header "> </div>
          <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th width="5%" valign="top">ID</th>
                  <th width="20%" valign="top">title</th>
                  <th width="10%" valign="top">Categories</th>
                  <th width="10%" valign="top">Tags</th>
                  <th width="6%" valign="top">type</th>
                  <th width="12%" valign="top">Created at</th>
                  <th width="10%" valign="top">modified at</th>
                  <th width="15%" valign="top">featured image</th>
                  <th width="7%" valign="top">author</th>
                  <th colspan="2" width="5%" valign="top">Action</th>
                </tr>
              @foreach($posts as $post)
              <tr>
                <td valign="top">{{$post->id}}</td>
                <td width="10%" valign="top"><a href="{{url('/posts/'.$post->slug)}}" title="View {{ucfirst($post->title)}}" target="_blank">{{ucfirst($post->title)}}</a></td>
                <td width="" valign="top"><ul style="list-style-type: square;color:#40BEDE;padding:0 0 0 10px;">
                    @foreach ($post->category as $category)
                    <li> <a href="{{ url('/admin/categories') }}" target="_blank">{{ $category->name }}</a> </li>
                    @endforeach
                  </ul></td>
                <td width="" valign="top"><ul style="list-style-type: square;color:#40BEDE;padding:0 0 0 10px;">
                    @foreach ($post->tag as $tag)
                    <li> <a href="{{ url('/admin/tags') }}" target="_blank">{{ $tag->name }}</a> </li>
                    @endforeach
                  </ul></td>
                <td width="" valign="top">{{ ucfirst($post->type) }}</td>
                <td width="" valign="top">{{ucfirst($post->created_at->format('j M, Y'))}}</td>
                <td width="" valign="top">{{ucfirst($post->updated_at->format('j M, Y'))}}</td>
                <td width="" valign="top">@if($post->image)<img src="{{ url('/images/posts-images/'.$post->image) }}" class="img-thmbnail">@else <small class="text-danger">No Featured Image</small> @endif</td>
                <td width="" valign="top">{{ $post->user->name }}</td>
                <td width="2%" valign="top"><a href="{{url('/admin/edit-post/'.$post->slug)}}" title="Edit"><i class="fa fa-edit"></i></a></td>
                <td width="1%" valign="top"><a href="#" data-toggle="modal" data-target="#confirm-{{$post->id}}" id="remove_{{$post->id}}" title="Remove '{{$post->title}}'" class="text-danger text-left"> <i class="fa fa-times"></i> </a>
                  <!-- Delete Modal -->

                  <div class="modal fade modal-mini modal-primary" id="confirm-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="{{url('/admin/delete-post/'.$post->id)}}" method="post">
                          <div class="modal-header justify-content-center"> @csrf @method('delete')
                            <div class="modal-profile"> <i class="fa fa-trash-o"></i> </div>
                          </div>
                          <div class="modal-body text-center">
                            <p>Are you sure you want to remove "{{ucfirst($post->title)}}" </p>
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
        <div class="pull-right">{!! $posts->links() !!}</div>
      </div>
      <!--endtable-->

    </div>
  </div>
</div>
@endsection
