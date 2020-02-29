<html>
<head>
  <title>DUITS | Single Member</title>
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
        <td width="15%">
          <center><img src="{{ public_path('images/logo.png') }}" style="height: 70px; width: auto;"></center>
        </td>
        <td>
          <center>
            <h3><b>Dhaka University IT Society</b></h3>
            <h2>Membership Information</h2>
          </center>
        </td>
        <td width="15%">
          <center><img src="{{ public_path('images/du_logo.png') }}" style="height: 70px; width: auto;"></center>
        </td>
        <td width="20%"></td>
      </tr>
    </tbody>
  </table>

  <table class="bordertable">
    <thead>
      <tr>
        <th width="15%">Name</th>
        <th>Application ID</th>
        <th>DU Data</th>
        <th>Contact</th>
        <th>Co-curricular</th>
        <th>Hobby</th>
        <th>Other DU Societies</th>
        <th>Payment</th>
        <th>Status</th>
        <th>Photo</th>
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
        <td>{{ $application->payment_method }}<br/>{{ $application->trxid }}</td>
        <td>
          @if($application->status == 1)
            Active
          @else
            Pending
          @endif
        </td>
        <td>
          @if($application->image != null && file_exists(public_path('images/members/' . $application->image)))
          <img src="{{ public_path('images/members/'.$application->image)}}" style="height: 50px; width: auto;" />
          @else
          <img src="{{ public_path('images/user.png')}}" style="height: 50px; width: auto;" />
          @endif
        </td>
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