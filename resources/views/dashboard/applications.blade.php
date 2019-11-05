@extends('adminlte::page')

@section('title', 'Applications')

@section('css')

@stop

@section('content_header')
    <h1>
      Applications (Total <b>{{ $applications->count() }}</b> Applications)
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('dashboard.applications.pdf') }}"><i class="fa fa-fw fa-download" aria-hidden="true"></i> Download List</a>
        <a class="btn btn-success" href="{{ route('index.application') }}" target="_blank"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Register New Participant</a>
      </div>
    </h1>
@stop

@section('content')
  <div class="table-responsive">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Team</th>
          <th>Members</th>
          <th>Event & Amount</th>
          <th>TrxId</th>
          <th>Registration ID</th>
          <th>Institution</th>
          <th>Contact</th>
          <th>Payment Status</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($applications as $application)
        <tr>
          <td>{{ $application->team }}</td>
          <td>{{ $application->member1 }}</td>
          <td>{{ $application->event_name }}<br/>৳ {{ $application->amount }}</td>
          <td>{{ $application->trxid }}</td>
          <td><big><b>{{ $application->registration_id }}</b></big></td>
          <td>{{ $application->institution }}</td>
          <td>{{ $application->mobile }}<br/><small>{{ $application->email }}</small></td>
          <td>{{ payment_status($application->payment_status) }}</td>
          <td>
            @if($application->image != null)
            <img src="{{ asset('images/registrations/'.$application->image)}}" style="height: 40px; width: auto;" />
            @else
            <img src="{{ asset('images/user.png')}}" style="height: 40px; width: auto;" />
            @endif
          </td>
          <td>
            @if($application->payment_status == 1)
            <a href="{{ route('application.printreceipt', $application->registration_id) }}" class="btn btn-sm btn-primary" title="Print Receipt" target="_blank"><i class="fa fa-print"></i></a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div>
      {{ $applications->links() }}
    </div>
  </div><br/>
  <div class="row">
    <div class="col-md-3">
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $totalcollection->totalamount }}<sup style="font-size: 20px">৳</sup></h3>

          <p>Total Collection</p>
        </div>
        <div class="icon">
          <i class="fa fa-line-chart"></i>
        </div>
        <a href="#!" class="small-box-footer"></a>
      </div>
    </div>
  </div>
@stop

@section('js')

@stop