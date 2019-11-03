<!DOCTYPE html>
<html>
<head>
  <title>Receipt_{{ $application->registration_id }}</title>
  <link rel="stylesheet" href="{{ asset('vendor/hcode/css/bootstrap.css') }}" />
  <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/hcode/js/bootstrap.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('vendor/hcode/css/font-awesome.min.css') }}" />
  <style type="text/css">
    @page {
        size: 21cm 29.7cm;
        margin: 20mm 20mm 20mm 20mm; /* change the margins as you want them to be. */
    }
    .img-background {
      position: absolute;
      height:500px;
      width:500px;
      left:50%;
      top:50%;
      margin-top:-250px;
      margin-left:-250px;
      /*z-index: -1;*/
      opacity: 0.1;
    }
    
    @media print {
      *, :after, :before {
          color: inherit !important;
          text-shadow: inherit !important;
          background: inherit !important;
          -webkit-box-shadow: inherit !important;
          box-shadow: inherit !important;
      }
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function () {
          window.print();
          window.close();
      }, 1000);
    });
  </script>
</head>
<body>
  <div class="row">
    <div class="col-md-12">
      <img src="{{ asset('images/print_background.png?unique_id=465a5sd') }}" class="img-responsive img-background">
      <center>
        <span>6<sup>th</sup> National</span><br/>
        <span style="font-size: 20px;"><b>DUITS Campus IT Fest 2018</b></span><br/>
        <span>Date: 28<sup>th</sup> October &amp; 29<sup>th</sup> October 2018</span><br/>
        <small>Jointly organized by</small><br/>
        <span><b>Dhaka University IT Society</b></span>
        <h3>PARTICIPANT'S COPY</h3>
      </center>
      <hr>

      <table class="table table-bordered table-condensed" style="width: 100%;">
        <thead>
          <tr>
            <th width="50%">Team Name:</th>
            <td>{{ $application->team }}</td>
          </tr>
          <tr>
            <th width="50%">Event:</th>
            <td>{{ $application->event_name }}</td>
          </tr>
          <tr>
            <th width="50%">Registration Id:</th>
            <td><big><b>{{ $application->registration_id }}</b></big></td>
          </tr>
          <tr>
            <th width="50%">Institution:</th>
            <td>{{ $application->institution }}</td>
          </tr>
          <tr>
            <th width="50%">Email:</th>
            <td>{{ $application->email }}</td>
          </tr>
          <tr>
            <th width="50%">Contact:</th>
            <td>{{ $application->mobile }}</td>
          </tr>
          <tr>
            <th width="50%">Address:</th>
            <td>{{ $application->address }}</td>
          </tr>
          <tr>
            <th width="50%">Amount Paid:</th>
            <td>{{ $application->amount }}/-</td>
          </tr>
          <tr>
            <th width="50%">Transaction Id:</th>
            <td>{{ $application->trxid }}</td>
          </tr>
          <tr>
            <th width="50%">Registration Date:</th>
            <td>{{ date('F d, Y h:i A', strtotime($application->created_at)) }}</td>
          </tr>
        </thead>
      </table>
  
      <h4><b>Award &amp; Prizes:</b></h4>
      <ul>
        <li>Champion &amp; Runners-up Team will be awarded with Prize money.</li>
        <li>Winning Team will be awarded with trophy or crest, where each individual will get medals.</li>
        <li>For gaming, special prize money &amp; gadget will be awarded.</li>
      </ul>
      <h4><b>For Emergency Contact:</b></h4>
      <div>
        Asma Akter<br/>
        General Secretary, Dhaka University IT Society (DUITS)<br/>
        Mobile: 01923 734 867
      </div><br/>
      <center>
        <img src="{{ asset('images/print_background.png?unique_id=465a5sd') }}" style="width: 100px; height: auto;">
      </center>
    </div>
  </div>
</body>
</html>