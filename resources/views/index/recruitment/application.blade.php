@extends('layouts.index')
@section('title')
    Recruitment Application
@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
  {!!Html::style('css/parsley.css')!!}
  <link rel="stylesheet" type="text/css" href="{{ asset('css/DateTimePicker.css') }}">
  <style type="text/css">
      .separator {
          display: flex;
          align-items: center;
          text-align: center;
          margin-top: 15px;
          font-weight: bold;
          font-size: 15px;
      }
      .separator::before, .separator::after {
          content: '';
          flex: 1;
          border-bottom: 1px solid #ddd;
      }
      .separator::before {
          margin-right: .60em;
      }
      .separator::after {
          margin-left: .60em;
      }
      textarea {
        height: 100px !important;
      }
  </style>
@stop

@section('content')
    <section class="content-top-margin page-title page-title-small border-bottom-light border-top-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                    <h1 class="black-text">Recruitment Application</h1>
                </div>
                
            </div>
        </div>
    </section>
    <section class="wow fadeIn">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="login-box">
                  <form action="{{ route('ongoingactivities.recruitment.store') }}" method="post" enctype='multipart/form-data' data-parsley-validate="">
                      {!! csrf_field() !!}
                      <center>
                        <h2>Registration Form</h2><br/>
                      </center>

                      <div class="separator">Personal Information</div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label">Name</label>
                              <input type="text" class="form-control" placeholder="Write Your Name" name="name" value="{{ old('name') }}" required="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label">Department</label>
                              <input type="text" class="form-control" placeholder="Department (i.e. Economics, Software Engineering)" name="dept" value="{{ old('dept') }}" required="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label">Hall</label>
                            <select class="form-control" id="hall" name="hall" required="">
                                <option value="" selected="" disabled="">Select Hall</option>
                                <option value="Amar Ekushey Hall">Amar Ekushey Hall</option>
                                <option value="Bangamata Sheikh Fazilatunnesa Mujib Hall">Bangamata Sheikh Fazilatunnesa Mujib Hall</option>
                                <option value="Bangladesh-Kuwait Friendship Hall">Bangladesh-Kuwait Friendship Hall</option>
                                <option value="Bijoy Ekattor Hall">Bijoy Ekattor Hall</option>
                                <option value="Dr. Muhammad Shahidullah Hall">Dr. Muhammad Shahidullah Hall</option>
                                <option value="Fazlul Huq Muslim Hall">Fazlul Huq Muslim Hall</option>
                                <option value="Haji Muhammad Mohsin Hall">Haji Muhammad Mohsin Hall</option>
                                <option value="Jagannath Hall">Jagannath Hall</option>
                                <option value="Bangabandhu Sheikh Mujibur Rahman Hall">Bangabandhu Sheikh Mujibur Rahman Hall</option>
                                <option value="Kobi Jasimuddin Hall">Kobi Jasimuddin Hall</option>
                                <option value="Kabi Sufia Kamal Hall">Kabi Sufia Kamal Hall</option>
                                <option value="Muktijoddha Ziaur Rahman Hall">Muktijoddha Ziaur Rahman Hall</option>
                                <option value="Ruqayyah Hall">Ruqayyah Hall</option>
                                <option value="Salimullah Muslim Hall">Salimullah Muslim Hall</option>
                                <option value="Shaheed Sergeant Zahurul Haque Hall">Shaheed Sergeant Zahurul Haque Hall</option>
                                <option value="Shamsun Nahar Hall">Shamsun Nahar Hall</option>
                                <option value="Sir A F Rahman Hall">Sir A F Rahman Hall</option>
                                <option value="Masterda Surja Sen Hall">Masterda Surja Sen Hall</option>
                                <option value="Sir P.J. Hartog International Hall">Sir P.J. Hartog International Hall</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label">Residency</label>
                            <select class="form-control" id="residency" name="residency" required="">
                                <option value="" selected="" disabled="">Select Residency</option>
                                <option value="1">Resident</option>
                                <option value="0">Non-resident</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label">Session</label>
                              <select class="form-control" id="session" name="session" required="">
                                  <option value="" selected="" disabled="">Select Session</option>
                                  @php
                                    $current_year = date('Y');
                                  @endphp
                                  @for($current_year; $current_year > 2000; $current_year--)
                                    <option value="{{ $current_year }}-{{ $current_year + 1 }}">{{ $current_year }}-{{ $current_year + 1 }}</option>
                                  @endfor
                              </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label">Email Address</label>
                              <input type="email" class="form-control" placeholder="Write Email Address" name="email" value="{{ old('email') }}" required="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label">Contact No (11 digit number)</label>
                              <input type="text" class="form-control" placeholder="Write Your Contact No" name="contact1" value="{{ old('contact1') }}" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label">Alternative Contact No (11 digit number)</label>
                              <input type="text" class="form-control" placeholder="Write an Alternative Contact No" name="contact2" value="{{ old('contact2') }}" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label">Date of Birth</label>
                              <input type="text" class="form-control" placeholder="Date of Birth" id="dob" name="dob" data-field="date" value="{{ old('dob') }}" autocomplete="off" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <label class="control-label">Blood Group</label>
                          <select class="form-control" id="bloodgroup" name="bloodgroup" required="">
                              <option value="" selected="" disabled="">Select Blood Group</option>
                              <option value="A+">A+</option>
                              <option value="A-">A-</option>
                              <option value="B+">B+</option>
                              <option value="B-">B-</option>
                              <option value="AB+">AB+</option>
                              <option value="AB-">AB-</option>
                              <option value="O+">O+</option>
                              <option value="O-">O-</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group no-margin-bottom">
                              <label>Photo (300 X 300 &amp; 200Kb Max)</label>
                              <input type="file" id="image" name="image" required="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <center>
                              <img src="{{ asset('images/user.png')}}" id='img-upload' style="height: 80px; width: 80px;"/>
                          </center>
                        </div>
                      </div>

                      <div class="separator">Contact Information</div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label">Father</label>
                              <input type="text" class="form-control" placeholder="Write Your Father's Name" name="father" value="{{ old('father') }}" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label">Contact No of Father</label>
                              <input type="text" class="form-control" placeholder="Father's Contact No" name="fcontact" value="{{ old('fcontact') }}" pattern="\d*" maxlength="11" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label">Mother</label>
                              <input type="text" class="form-control" placeholder="Write Your Mother's Name" name="mother" value="{{ old('mother') }}" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label">Contact No of Mother</label>
                              <input type="text" class="form-control" placeholder="Mother's Contact No" name="mcontact" value="{{ old('mcontact') }}" pattern="\d*" maxlength="11" required>
                          </div>
                        </div>
                      </div>

                      <div class="separator">Educational Information</div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label">SSC (School Name)</label>
                              <input type="text" class="form-control" placeholder="Write Your School Name" name="ssc" value="{{ old('ssc') }}" required="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label">SSC Passing Year</label>
                              <input type="text" class="form-control" placeholder="SSC Passing Year" name="ssc_passing_year" value="{{ old('ssc_passing_year') }}" required="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label">HSC (College Name)</label>
                              <input type="text" class="form-control" placeholder="Write Your College Name" name="hsc" value="{{ old('hsc') }}" required="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label class="control-label">HSC Passing Year</label>
                              <input type="text" class="form-control" placeholder="HSC Passing Year" name="hsc_passing_year" value="{{ old('hsc_passing_year') }}" required="">
                          </div>
                        </div>
                      </div>

                      <div class="separator">Extra-Curricular</div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Co-curricular Activities</label>
                              <input type="text" class="form-control" placeholder="Write Your Co-curricular Activities" name="cocurricular" value="{{ old('cocurricular') }}" required="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Hobbies</label>
                              <input type="text" class="form-control" placeholder="Write Your Hobbies" name="hobby" value="{{ old('hobby') }}" required="">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                              <label class="control-label">Why do you want to be a member of DUITS (Within 50 words)</label>
                              <textarea class="form-control" placeholder="Write Your College Name" name="reason" value="{{ old('reason') }}" required=""></textarea>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label">Social Network Use</label>
                              <input type="text" class="form-control" placeholder="Social Networks (i.e. Facebook, Instagram)" name="socialnets" value="{{ old('socialnets') }}" required="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label">Blogs You Visits Usually</label>
                              <input type="text" class="form-control" placeholder="Blogs You Visits Usually" name="blogs" value="{{ old('blogs') }}" required="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label">Member of Other Societies of DU</label>
                              <input type="text" class="form-control" placeholder="i.e. DUPS, DUFS, DUCS" name="othersocieties" value="{{ old('othersocieties') }}" required="">
                          </div>
                        </div>
                      </div>

                      <div class="separator">Payment</div>
                      <div class="row">
                        <div class="col-md-4">
                          <label class="control-label">Payment Method</label>
                          <select class="form-control" id="payment_method" name="payment_method" required="">
                              <option value="" selected="" disabled="">Select Payment Method</option>
                              <option value="bKash">bKash</option>
                              <option value="DBBL Rocket">DBBL Rocket</option>
                          </select>
                          <span id="payment_text"></span>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="control-label">TrxID <span id="payment_label_text"></span></label>
                              <input type="text" class="form-control" placeholder="TrxID" name="trxid" value="{{ old('trxid') }}" required="">
                          </div>
                        </div>
                      </div>

                      <button class="btn highlight-button-dark btn-bg btn-round margin-five no-margin-right" type="submit"><i class="fa fa-arrow-right"></i> Next</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <div id="dtBox"></div>
    </section>
@endsection

@section('js')
  {!!Html::script('js/parsley.min.js')!!}
  <script type="text/javascript" src="{{ asset('js/DateTimePicker.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#dtBox").DateTimePicker({
          mode:"date",
          dateFormat: "dd-MM-yyyy",
          titleContentDate: 'Select Your Date of Birth'
      });
    });

    $('#payment_method').change(function() {
        if($('#payment_method').val() == 'bKash') {
            $('#payment_text').html('<big><b>Send BDT 100 to 017**** bKash personal no and write the TrxID in the next field</b></big>');
            $('#payment_label_text').text('of bKash');
        } else if($('#payment_method').val() == 'DBBL Rocket') {
            $('#payment_text').html('<big><b>Send BDT 100 to 017**** rocket no and write the TrxID in the next field</b></big>');
            $('#payment_label_text').text('of DBBL Rocket');
        }
    });
  </script>
  <script type="text/javascript">
  var _URL = window.URL || window.webkitURL;
  $(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function(){
      readURL(this);
      var file, img;

      if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
          var imagewidth = this.width;
          var imageheight = this.height;
          filesize = parseInt((file.size / 1024));
          if(filesize > 200) {
            $("#image").val('');
            toastr.warning('Filesize: '+filesize+' KB. Please upload within 200KB', 'WARNING').css('width', '400px;');
            setTimeout(function() {
              $("#img-upload").attr('src', '{{ asset('images/user.png') }}');
            }, 1000);
          }
          console.log(imagewidth/imageheight);
          if(((imagewidth/imageheight) < 0.9375) || ((imagewidth/imageheight) > 1.07142)) {
            $("#image").val('');
            toastr.warning('Raio of the photograph should be 1:1', 'WARNING').css('width', '400px;');
            setTimeout(function() {
              $("#img-upload").attr('src', '{{ asset('images/user.png') }}');
            }, 1000);
          }
        };
        img.onerror = function() {
          $("#image").val('');
          toastr.warning('Select a photograph please', 'WARNING').css('width', '400px;');
          setTimeout(function() {
            $("#img-upload").attr('src', '{{ asset('images/user.png') }}');
          }, 1000);
        };
        img.src = _URL.createObjectURL(file);
      }
    });
  });
  </script>
@endsection