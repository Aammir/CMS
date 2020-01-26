@extends('auth.layouts.dashboard')
@section('title')Subscribers @endsection
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 mar-bot-1">
        <h3 class="card-title records-title">All subscribers</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12"> @if(session()->has('message'))
        <div class="alert alert-success"> {{ session()->get('message') }}. </div>
        @endif
        <div class="card strpied-tabled-with-hover">
          <div class="card-header "> </div>
          <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
              <thead>
              <th width="10%">ID</th>
                <th width="55%">email</th>
                <th width="27%">subscriberd at</th>
                <th width="8%">Remove</th>
                  </thead>
              <tbody>

              @foreach($subscribers as $subscriber)
              <tr>
                <td>{{ $subscriber->id }}</td>
                <td width="">{{ $subscriber->subscriber_email }}</td>
                <td width=""><small>{{ $subscriber->subscribed_at->format('j M, Y @ h:i:sA') }}</small></td>
                <td width=""><a href="#" data-toggle="modal" data-target="#confirm-{{$subscriber->id}}" id="remove_{{$subscriber->id}}" title="Remove {{ $subscriber->name }}" class="text-danger text-left"> <i class="fa fa-times"></i> </a>
                  <!-- Delete Modal -->

                  <div class="modal fade modal-mini modal-primary" id="confirm-{{$subscriber->id}}" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="{{url('/admin/del-subscriber/'.$subscriber->id)}}" method="post">
                          <div class="modal-header justify-content-center"> @csrf @method('delete')
                            <div class="modal-profile"> <i class="fa fa-trash-o"></i> </div>
                          </div>
                          <div class="modal-body text-center">
                            <p>Are you sure you want to remove this subscriber {{ $subscriber->subscriber_email }}?</p>
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
        <div class="pull-right">{!! $subscribers->links() !!}</div>
        --}} </div>
      <!--endtable-->

    </div>
  </div>
</div>
@endsection
