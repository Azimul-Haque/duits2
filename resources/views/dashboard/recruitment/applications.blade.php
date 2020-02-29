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
          <th>Date of Birth</th>
          <th>Co-curricular</th>
          <th>Hobby</th>
          <th>Other DU Societies</th>
          <th>Reason to Join DUITS</th>
          <th>Payment</th>
          <th>Status</th>
          <th>Photo</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($applications as $application)
        <tr>
          <td>{{ $application->name }}</td>
          <td><big><b>{{ $application->member_id }}</b></big></td>
          <td>{{ $application->dept }}<br/>{{ $application->hall }}</td>
          <td>{{ $application->contact1 }}, {{ $application->contact1 }}<br/>{{ $application->email }}</td>
          <td>{{ date('F d, Y', strtotime($application->dob)) }}</td>
          <td>{{ $application->cocurricular }}</td>
          <td>{{ $application->hobby }}</td>
          <td>{{ $application->othersocieties }}</td>
          <td>{{ $application->reason }}</td>
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
            <img src="{{ asset('images/registrations/'.$application->image)}}" style="height: 40px; width: auto;" />
            @else
            <img src="{{ asset('images/user.png')}}" style="height: 40px; width: auto;" />
            @endif
          </td>
          <td><small>{{ date('F d, Y', strtotime($application->created_at)) }}<br/>{{ date('h:i A', strtotime($application->created_at)) }} </small></td>
          <td>
            @if($application->payment_status == 1)
            <a href="{{ route('application.printreceipt', $application->registration_id) }}" class="btn btn-sm btn-primary" title="Print Receipt" target="_blank"><i class="fa fa-print"></i></a>
            @endif
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