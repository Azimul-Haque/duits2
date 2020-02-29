@extends('adminlte::page')

@section('title', 'Recrtuiment Applications')

@section('css')
  <style type="text/css">
    .badge-success {
      background: #5CB85C;
      color: #FFFFFF;
    }
    .badge-warning {
      background: #F0AD4E;
      color: #FFFFFF;
    }
  </style>
@stop

@section('content_header')
    <h1>
      Recrtuiment Applications (Total <b>{{ $applications->count() }}</b> Applications)
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('dashboard.recruitment.applications.pdf') }}"><i class="fa fa-fw fa-download" aria-hidden="true"></i> Download List</a>
        <a class="btn btn-success" href="{{ route('ongoingactivities.recruitment') }}" target="_blank"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Register New Member</a>
      </div>
    </h1>
@stop

@section('content')
  <div class="table-responsive">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Name</th>
          <th>Application ID</th>
          <th>DU Data</th>
          <th>Contact</th>
          <th>Co-curricular</th>
          <th>Hobby</th>
          <th>Other DU Societies</th>
          <th>Reason to Join DUITS</th>
          <th>Payment</th>
          <th>Status</th>
          <th>Photo</th>
          <th width="10%">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($applications as $application)
        <tr>
          <td>{{ $application->name }}</td>
          <td><big><b>{{ $application->member_id }}</b></big></td>
          <td><small>{{ $application->dept }},<br/>{{ $application->hall }}</small></td>
          <td><small>{{ $application->contact1 }}, {{ $application->contact1 }},<br/>{{ $application->email }}</small></td>
          <td><small>{{ $application->cocurricular }}</small></td>
          <td><small>{{ $application->hobby }}</small></td>
          <td><small>{{ $application->othersocieties }}</small></td>
          <td><small>{{ $application->reason }}</small></td>
          <td>{{ $application->payment_method }}<br/>{{ $application->trxid }}</td>
          <td>
            @if($application->status == 1)
              <span class="badge badge-success"><i class="fa fa-check-circle"></i> Active</span>
            @else
              <span class="badge badge-warning"><i class="fa fa-hourglass-start"></i> Pending</span>
            @endif
          </td>
          <td>
            @if($application->image != null && file_exists(public_path('images/members/' . $application->image)))
            <img src="{{ asset('images/members/'.$application->image)}}" style="height: 40px; width: auto;" />
            @else
            <img src="{{ asset('images/user.png')}}" style="height: 40px; width: auto;" />
            @endif
          </td>
          <td>
            @if($application->status == 0)
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#approveModal{{ $application->id }}" data-backdrop="static" title="Approve Application"><i class="fa fa-check"></i></button>
            <!-- Approve Modal -->
            <!-- Approve Modal -->
            <div class="modal fade" id="approveModal{{ $application->id }}" role="dialog">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-check"></i> Approve Application</h4>
                  </div>
                  <div class="modal-body">
                   Confirm approve this application of <big><b>{{ $application->name }}</b></big>?
                  </div>
                  <div class="modal-footer">
                    {!! Form::model($application, ['route' => ['dashboard.recruitment.approveapplication', $application->id], 'method' => 'PATCH', 'class' => 'form-default']) !!}
                        {!! Form::submit('Approve', array('class' => 'btn btn-success')) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
            <!-- Approve Modal -->
            <!-- Approve Modal -->
            @endif

            <a href="{{ route('dashboard.recruitment.application.pdf', $application->id) }}" class="btn btn-sm btn-primary" title="Print Information" target="_blank"><i class="fa fa-print"></i></a>
            
            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $application->id }}" data-backdrop="static" title="Delete Application"><i class="fa fa-trash"></i></button>
            <!-- Approve Modal -->
            <!-- Approve Modal -->
            <div class="modal fade" id="deleteModal{{ $application->id }}" role="dialog">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header modal-header-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-trash"></i> Delete Application</h4>
                  </div>
                  <div class="modal-body">
                   Confirm delete this application of <big><b>{{ $application->name }}</b></big>?
                  </div>
                  <div class="modal-footer">
                    {!! Form::model($application, ['route' => ['dashboard.recruitment.deleteapplication', $application->id], 'method' => 'DELETE', 'class' => 'form-default']) !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
            <!-- Approve Modal -->
            <!-- Approve Modal -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div>
    {{ $applications->links() }}
  </div>
@stop

@section('js')

@stop