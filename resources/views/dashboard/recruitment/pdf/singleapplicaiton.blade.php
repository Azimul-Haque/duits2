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
    font-size: 15px;
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
        <td width="10%"></td>
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
        <td width="10%"></td>
      </tr>
    </tbody>
  </table>

  <br/>
  <table class="bordertable">
    <tbody>
      <tr>
        <td colspan="2">Personal Information</td>
      </tr>
      <tr>
        <td><b>Name:</b> {{ $application->name }}</td>
        <td rowspan="3">
          @if($application->image != null && file_exists(public_path('images/members/' . $application->image)))
            <center><img src="{{ public_path('images/members/' . $application->image) }}" style="height: 80px; width: auto;"></center>
          @else
            <center><img src="{{ public_path('images/logo.png') }}" style="height: 80px; width: auto;"></center>
          @endif
        </td>
      </tr>
      <tr>
        <td><b>Member/ Application ID:</b> <big>{{ $application->member_id }}</big></td>
      </tr>
      <tr>
        <td>
          <b>Application Status:</b>
          @if($application->status == 1)
            Active
          @else
            Pending
          @endif
        </td>
      </tr>
      <tr>
        <td><b>Department:</b> {{ $application->dept }}</td>
        <td><b>Hall:</b> {{ $application->hall }}</td>
      </tr>
      <tr>
        <td>
          <b>Residency:</b> 
          @if($application->residency == 1)
            Resident
          @else
            Non-resident
          @endif
        </td>
        <td><b>Session:</b> {{ $application->session }}</td>
      </tr>
      <tr>
        <td><b>Email:</b> {{ $application->session }}</td>
        <td><b>Contact No:</b> {{ $application->contact1 }}</td>
      </tr>
      <tr>
        <td><b>Alternative Contact No:</b> {{ $application->contact2 }}</td>
        <td><b>Date of Birth:</b> {{ date('F d, Y', strtotime($application->dob)) }}</td>
      </tr>
      <tr>
        <td><b>Blood Group:</b> {{ $application->bloodgroup }}</td>
        <td></td>
      </tr>

      <tr style="background: #A8A8A8;">
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2">Contact Information</td>
      </tr>
      <tr>
        <td><b>Father:</b> {{ $application->father }}</td>
        <td><b>Contact of Father:</b> {{ $application->fcontact }}</td>
      </tr>
      <tr>
        <td><b>Mother:</b> {{ $application->mother }}</td>
        <td><b>Contact of Mother:</b> {{ $application->mcontact }}</td>
      </tr>

      <tr style="background: #A8A8A8;">
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2">Educational Information</td>
      </tr>
      <tr>
        <td><b>SSC (School):</b> {{ $application->ssc }}</td>
        <td><b>SSC Passing Year:</b> {{ $application->ssc_passing_year }}</td>
      </tr>
      <tr>
        <td><b>HSC (School):</b> {{ $application->hsc }}</td>
        <td><b>HSC Passing Year:</b> {{ $application->hsc_passing_year }}</td>
      </tr>

      <tr style="background: #A8A8A8;">
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2">Extra-Curricular</td>
      </tr>
      <tr>
        <td><b>Co-curricular:</b> {{ $application->cocurricular }}</td>
        <td><b>Hobby/ Interest:</b> {{ $application->hobby }}</td>
      </tr>
      <tr>
        <td><b>Social Networks:</b> {{ $application->socialnets }}</td>
        <td><b>Frequently Visited Blogs:</b> {{ $application->blogs }}</td>
      </tr>
      <tr>
        <td><b>Other DU Societies:</b> {{ $application->othersocieties }}</td>
        <td><b>Reason to Join DUITS:</b> {{ $application->reason }}</td>
      </tr>
    </tbody>
  </table>

  <htmlpageheader name="page-header">
    <table>
      <tr>
        <td width="50%">
          
        </td>
        <td align="right" style="color: #525659;">
          {{-- Page: {PAGENO}/{nbpg} --}}
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