@extends('auth.layouts.dashboard')
@section('title')messages @endsection
@section('content')
<div class="content">
  <style>
        .sperator{color:#CFCFCF;}

    </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 mar-bot-1">
        <h3 class="card-title records-title">All messages</h3>
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
              <th width="8%">ID</th>
                <th width="10%">name</th>
                <th width="12%">email</th>
                <th width="45%">message</th>
                <th width="18%">messaged at</th>
                <th width="5%">Remove</th>
               </thead>
              <tbody>

              @foreach($messages as $message)
              <tr>
                <td>{{ $message->id }}</td>
                <td width="">{{ $message->name }}</td>
                <td width="">{{ $message->email }}</td>
                <td width="">{{ $message->message }}</td>
                <td width=""><small>{{ $message->created_at->format('j M, Y @ h:i:sA') }}</small></td>
                <td width=""><a href="#" data-toggle="modal" data-target="#confirm-{{$message->id}}" id="remove_{{$message->id}}" title="Remove {{ $message->name }}" class="text-danger text-left"> <i class="fa fa-times"></i> </a>
                  <!-- Delete Modal -->

                  <div class="modal fade modal-mini modal-primary" id="confirm-{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="{{url('/admin/delete-cmessage/'.$message->id)}}" method="post">
                          <div class="modal-header justify-content-center"> @csrf @method('delete')
                            <div class="modal-profile"> <i class="fa fa-trash-o"></i> </div>
                          </div>
                          <div class="modal-body text-center">
                            <p>Are you sure you want to remove {{ $message->name }}'s message? </p>
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
        <div class="pull-right">{!! $messages->links() !!}</div>
        --}} </div>
      <!--endtable-->

    </div>
  </div>
</div>
@endsection
