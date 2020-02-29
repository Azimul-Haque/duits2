@extends('layouts.index')
@section('title')
    Recruitment Application
@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
  {!!Html::style('css/parsley.css')!!}
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
              <div class="col-md-8">
                <div class="login-box">
                  <form action="{{ route('application.store') }}" method="post" enctype='multipart/form-data' data-parsley-validate="">
                      {!! csrf_field() !!}
                      <center>
                        <h2>Registration Form</h2><br/>
                      </center>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">হলের নাম</label>
                              <select class="form-control single-select-custom" id="hall_id1" name="hall_id">
                                <option value="অমর একুশে হল">অমর একুশে হল</option>
                                <option value="বঙ্গমাতা শেখ ফজিলাতুন্নেছা মুজিব হল">বঙ্গমাতা শেখ ফজিলাতুন্নেছা মুজিব হল</option>
                                <option value="16">বাংলাদেশ কুয়েত মৈত্রী হল</option>
                                <option value="22">বিজয় একাত্তর হল</option>
                                <option value="3">ড. মুহম্মদ শহীদুল্লাহ হল</option>
                                <option value="4">ফজলুল হক মুসলিম হল</option>
                                <option value="9">হাজী মুহম্মদ মুহসীন হল</option>
                                <option value="1">জগন্নাথ হল</option>
                                <option value="14">জাতির জনক বঙ্গবন্ধু শেখ মুজিবুর রহমান হল</option>
                                <option value="11">কবি জসীম উদদীন হল</option>
                                <option value="21">কবি সুফিয়া কামাল হল</option>
                                <option value="15"> মুক্তিযোদ্ধা জিয়াউর রহমান হল</option>
                                <option value="6">রোকেয়া হল</option>
                                <option value="2">সলিমুল্লাহ মুসলিম হল</option>
                                <option value="5">শহীদ সার্জেন্ট জহুরুল হক হল</option>
                                <option value="10">শামসুন নাহার হল</option>
                                <option value="12">স্যার এ এফ রহমান হল</option>
                                <option value="8">সূর্যসেন হল</option>
                                <option value="8">আন্তর্জাতিক হল</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Participant's Name/ Team</label>
                              <input type="text" class="form-control" placeholder="" required name="team" value="{{ old('team') }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Member 1 Name (if any):</label>
                              
                              <input type="text" class="form-control" placeholder="" name="member1" value="{{ old('member1') }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Member 2 Name (if any):</label>
                              <input type="text" class="form-control" placeholder="" name="member2" value="{{ old('member2') }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Member 3 Name (if any):</label>
                              <input type="text" class="form-control" placeholder="" name="member3" value="{{ old('member3') }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Member 4 Name (if any):</label>
                              <input type="text" class="form-control" placeholder="" name="member4" value="{{ old('member4') }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Institution:</label>
                              <input type="text" class="form-control" placeholder="" required name="institution" value="{{ old('institution') }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Address:</label>
                              <input type="text" class="form-control" placeholder="" required name="address" value="{{ old('address') }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Email Address</label>
                              <input type="email" class="form-control" placeholder="" required name="email" value="{{ old('email') }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Mobile No: (11 digit number)</label>
                              <input type="text" class="form-control" placeholder="" required name="mobile" value="{{ old('mobile') }}" pattern="\d*" maxlength="11">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Emergency Contact No: (11 digit number)</label>
                              <input type="text" class="form-control" placeholder="" required name="emergencycontact" value="{{ old('emergencycontact') }}" pattern="\d*" maxlength="11">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-8">
                                <div class="form-group no-margin-bottom">
                                    <label><strong>Photo (300 X 300 &amp; 200Kb Max):</strong></label>
                                    <input type="file" id="image" name="image" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                              <img src="{{ asset('images/user.png')}}" id='img-upload' style="height: 80px; width: auto; padding: 5px;" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <button class="btn highlight-button-dark btn-bg btn-round margin-five no-margin-right" type="submit"><i class="fa fa-arrow-right"></i> Next</button>
                  </form>
                </div>
              </div>
              <div class="col-md-4">
                <div class="login-box">
                  <center>
                    <h2>Call For Participation 2019</h2><br/>
                    <a href="{{ asset('files/Call_For_Participation_2019.pdf') }}" class="btn highlight-button btn-bg btn-round margin-five no-margin-right" download=""><i class="fa fa-download"></i> Download File</a>
                  </center>
                </div><br/>
                <div class="login-box">
                  <center>
                    <h2>Check Your Registration Status</h2><br/>
                  </center>
                  <input type="text" class="form-control" placeholder="Your Registration ID" id="id_to_check">
                  <center>
                    <button class="btn highlight-button-dark btn-bg btn-round margin-five" id="btn_check" type="button"><i class="fa fa-search"></i> Check Status</button>
                  </center>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
  {!!Html::script('js/parsley.min.js')!!}
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
          if(filesize > 300) {
            $("#image").val('');
            toastr.warning('Filesize: '+filesize+' KB. Please upload within 300KB', 'WARNING').css('width', '400px;');
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