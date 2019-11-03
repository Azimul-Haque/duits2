@extends('layouts.index')
@section('title')
    6th IT FEST | Registration
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
    <style type="text/css">

    </style>
@endsection

@section('content')
   <!-- head section -->
    <section class="content-top-margin page-title page-title-small border-bottom-light border-top-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                    <!-- page title -->
                    <h1 class="black-text">Registration Payment Check</h1>
                    <!-- end page title -->
                </div>
                
            </div>
        </div>
    </section>
    <!-- end head section -->
    <!-- content section -->
    <section id="reasons">
        <div class="container inner">
            <div class="row">
                <div class="col-md-12 center-block text-center">
                    <header>
                    <h2>6th IT FEST | Registration</h2>
                    </header>
                </div>
                <div class="col-sm-12">
                    @if($application)
                    <div class="table-responsive" style="padding:15px;">
                        <table class="table table-bordered table-schedule">
                            <thead>
                                <tr>
                                    <th>Team</th>
                                    <th>Registration Id</th>
                                    <th>Event</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $application->team }}</td>
                                    <td><big><b>{{ $application->registration_id }}</b></big></td>
                                    <td>{{ $application->event_name }}</td>
                                    <td>{{ $application->amount }}/-</td>
                                    <td>
                                        @if($application->payment_status == 0)
                                            <span style="color: red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Not Paid</span>
                                        @elseif($application->payment_status == 1)
                                            <span style="color: green;"><i class="fa fa-check" aria-hidden="true"></i> Paid</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">* Please remember the <b>Registration Id</b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @if($application->payment_status == 0)
                        <center>
                            <h3>Please pay Tk. {{ $application->amount }}/- following the process in the Next page, Click the button below.</h3>
                            <div style="border: 2px solid #ddd; margin: 25px; max-width: 400px;">
                                <img src="{{ asset('images/aamarpay.png') }}" class="img-responsive">
                                {!! 
                                aamarpay_post_button([
                                    'cus_name'  => $application->team,
                                    'cus_email' => $application->email,
                                    'cus_phone' => $application->mobile,
                                    'desc' => 'Registration Fee',
                                    'opt_a' => $application->registration_id,
                                    'opt_b' => $application->amount
                                ], $application->amount, '<i class="fa fa-money"></i> Pay Through AamarPay', 'btn btn-sm btn-success') !!}
                            </div>
                        </center>
                    @elseif($application->payment_status == 1)
                        <center>
                            <h3>Download the Registration Receipt</h3>
                            <div style="border: 2px solid #ddd; margin: 25px; max-width: 400px;">
                                <span style="word-wrap: break-word;">Transaction ID: {{ $application->trxid }}</span><br/>
                                <a href="{{ route('application.printreceipt', $application->registration_id) }}" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Print Registration Receipt</a>
                            </div>
                        </center>
                    @endif
                    @else
                    <h3 class="text-center">No Team Found! Search Again.</h3>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

@endsection