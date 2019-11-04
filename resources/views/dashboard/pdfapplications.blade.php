<html>
<head>
  <title>DUITS | All Applications</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
  body {
    font-family: 'Calibri', sans-serif;
  }

  table {
      border-collapse: collapse;
      width: 100%;
  }
  th, td{
    padding: 5px;
    font-family: 'Calibri', sans-serif;
    font-size: 13px;
  }
  .bordertable td, th {
      border: 1px solid #A8A8A8;
  }
  @page {
    header: page-header;
    footer: page-footer;
    background: url({{ public_path('images/background_demo.png') }});
    background-size: cover;              
    background-repeat: no-repeat;
    background-position: center center;
  }
  </style>
</head>
<body>
  <table>
    <tbody>
      <tr>
        <td width="20%"></td>
        <td width="15%"><img src="{{ public_path('images/logo.png') }}" style="height: 100px; width: auto;"></td>
        <td>
          <center>
              <span>6<sup>th</sup> National</span><br/>
              <span style="font-size: 20px;"><b>DUITS Campus IT Fest 2019</b></span><br/>
              <span>Date: 28<sup>th</sup> October &amp; 29<sup>th</sup> October 2018</span><br/>
              <small>Jointly organized by</small><br/>
              <span><b>Dhaka University IT Society</b></span>
              <h3>All Participants</h3>
            </center>
        </td>
        <td width="15%"></td>
        <td width="20%"></td>
      </tr>
    </tbody>
  </table>

  <table class="bordertable">
    <thead>
      <tr>
        <th width="20%">Team</th>
        <th>Members</th>
        <th>Event & Amount</th>
        <th>TrxId</th>
        <th>Registration ID</th>
        <th>Institution</th>
        <th>Contact</th>
        <th>Payment Status</th>
    </thead>
    <tbody>
      @foreach($applications as $application)
      <tr>
        <td>{{ $application->team }}</td>
        <td>
          @if($application->member1 != '')
            {{ $application->member1 }}
          @endif
          @if($application->member2 != '')
            , {{ $application->member2 }}
          @endif
          @if($application->member3 != '')
            , {{ $application->member3 }}
          @endif
          @if($application->member4 != '')
            , {{ $application->member4 }}
          @endif
        </td>
        <td>{{ $application->event_name }}<br/><span style="font-family: Kalpurush;">৳</span> {{ $application->amount }}</td>
        <td>{{ $application->trxid }}</td>
        <td><big><b>{{ $application->registration_id }}</b></big></td>
        <td>{{ $application->institution }}</td>
        <td>{{ $application->mobile }}<br/><small>{{ $application->email }}</small></td>
        <td>{{ payment_status($application->payment_status) }}</small></td>
      </tr>
      @endforeach
    </tbody>
  </table><br/>


  <htmlpageheader name="page-header">
    <table>
      <tr>
        <td width="50%">
          
        </td>
        <td align="right" style="color: #525659;">
          Page: {PAGENO}/{nbpg}
        </td>
      </tr>
    </table>
  </htmlpageheader>


  <htmlpagefooter name="page-footer">
    <table>
      <tr>
        <td width="70%" align="left">
          <small style="font-size: 12px; color: #525659;">Downloaded at: <span style="font-size: 12px;">{{ date('F d, Y, h:i A') }}</span></small>
        </td>
        <td align="right">
          <small style="font-family: Calibri; font-size: 11px; color: #3f51b5;">Powered by: Loence Bangladesh</small>
        </td>
      </tr>
    </table>
  </htmlpagefooter>
</body>
</html>