@extends('layouts.index')
@section('title')
    Membership Application
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
                    <h1 class="black-text">Registration Information</h1>
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
                    <h2>Applicant: <strong>{{ $application->name }}</strong></h2>
                    </header>
                </div>
                <div class="col-md-12">
                    @if(!empty($application))
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Application ID</th>
                                        <th>DU Data</th>
                                        <th>Contact</th>
                                        <th>Payment</th>
                                        <th>Membership Status</th>
                                        <th>Photo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><big><b>{{ $application->member_id }}</b></big></td>
                                        <td>{{ $application->dept }},<br/>{{ $application->hall }}</td>
                                        <td>
                                            {{ $application->contact1 }}, {{ $application->contact2 }},<br/>
                                            {{ $application->email }}
                                        </td>
                                        <td>
                                            Method: {{ $application->payment_method }}<br/>
                                            TrxID: {{ $application->trxid }}
                                        </td>
                                        <td>
                                            @if($application->status == 0)
                                                Pending
                                            @else
                                                Active
                                            @endif
                                        </td>
                                        <td width="13%">
                                            @if($application->image != null && file_exists(public_path('images/members/' . $application->image)))
                                                <img src="{{ asset('images/members/' . $application->image)}}" style="height: 80px; width: 80px;"/>
                                            @else
                                                <img src="{{ asset('images/user.png')}}" style="height: 80px; width: 80px;"/>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">* Please remember the <b>Applocation ID (After confirmation, it will be your <b>Member ID</b>)</b></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $('#btn_check').click(function() {
          var registration_id = $('#id_to_check').val();
          if(isEmptyOrSpaces(registration_id)) {
            if($(window).width() > 768) {
              toastr.warning('Write something on search box!', 'WARNING').css('width', '400px');
            } else {
              toastr.warning('Write something on search box!', 'WARNING').css('width', ($(window).width()-25)+'px');
            }
          } else {
            window.location.href = '/application/payorcheck/' + registration_id;
          }
        });

        // on enter search
        function isEmptyOrSpaces(str){
            return str === null || str.match(/^ *$/) !== null;
        }
    </script>
@endsection