<html>
    <head>
        <title>Zakah</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <meta name="robots" content="noindex,nofollow" />
        <link rel="stylesheet" href="./css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="./css/style.css" type="text/css">
        <link rel="stylesheet" href="./css/responsive.css" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
.display-button
{
    display:none;
}

.mar-align{
    margin: -30px 62px;
}

#field_305_upload{
width: 33.33%;
height: 50px;
padding: 10px 30px;
}
#kn-input-field_305{
  margin-top: 30px;
}
.kn-instructions{
  padding-top: 20px;
  font-style: italic;
}
#kn-input-field_305 label{
  font-size: 18px;
  line-height: 23px;
  color: #262624;
    margin-bottom: 20px;
}
.reason-zakah{
   font-size: 18px;
  line-height: 23px;
  color: #262624;
    margin-bottom: 20px;
}
.btn-check:focus + .btn, .btn:focus {
    outline: 0 !important;
    box-shadow: none !important;
}

</style>
    </head>
    <body>

        <section class="login-sec req-form d-block">
            <div class="header-sec">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 header-lft">
                            <div class="head-inner">
                                <img src="./images/z-LOGO.png" class="z-logo"/>
                                <h2 class="logo-txt-g">Zakah Applicant Dashboard</h2>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 header-rgt">
                            <div class="hear-rt-inner">
                                <div class="profi-p">
                                        <h2 class="hav-txt-g"><a href="#" onClick="logout()" >Logout</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(session()->get('success'))
            <div class="alert alert-success">
                <span>{{session()->get('success')}}</span>
            </div>
            @endif
            @if(session()->get('failed'))
              <div class="alert alert-danger">
                  <span>{{session()->get('failed')}}</span>
              </div>
            @endif
        
            <form  id="applicantForm" action="{{ url('/add') }}" method="POST" enctype="multipart/form-data">
               @csrf
              <div class="reqfor-inner">
                  <div class="container">
                      <h2 class="reqfor-hd">Applicant must recertify every 12 Months</h2>
                      <p class="reqfor-sb-hd">Add Application</p>
                     
                      <div class="form-wrapper">
                          <div class="req-form-box">
                              <h2 class="rq-fm-hd">Applicant Details</h2>
                              <div class="req-form-box-cnt">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">First Name<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                            <input type="text" class="l-txt-bx" name="first" value="@if (isset($getRegistration['records'][0]['field_290_raw']['first']) && !empty($getRegistration['records'][0]['field_290_raw']['first'])){{$getRegistration['records'][0]['field_290_raw']['first']}}@endif" placeholder="First Name" readonly>
                                          @error('first')
                                               <div class="alert alert-danger error-msg error-msg">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Last Name<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                            <input type="text" class="l-txt-bx" name="last" value="@if (isset($getRegistration['records'][0]['field_290_raw']['last']) && !empty($getRegistration['records'][0]['field_290_raw']['last'])){{$getRegistration['records'][0]['field_290_raw']['last']}}@endif" placeholder="Last Name*" readonly>
                                             @error('last')
                                               <div class="alert alert-danger error-msg">{{ $message }}</div>
                                             @enderror
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Lead/Sponsoring Masjid<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_141">
                                                  <option value="">Select Masjid</option>
                                                  @foreach ($datas["records"] as $data)
                                                    @if (isset($data['field_128']) && $data['field_128'] != '')
                                                        <option {{ old('field_141') == $data['id'].'/'.$data['field_128'].'/'.$data['field_220'] ? 'selected' : '' }} value="{{$data['id'].'/'.$data['field_128'].'/'.$data['field_220']}}">{{$data['field_128']}}</option>               
                                                    @else
                                                        <option value="{{$data['id']}}">undefined</option>
                                                    @endif
                                                  @endforeach
                                              </select>
                                           @error('field_141')
                                              <div class="alert alert-danger error-msg">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            
                          </div>
                          <div class="req-form-box">
                              <h2 class="rq-fm-hd">Applicant Address</h2>
                              <div class="req-form-box-cnt">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Street Address<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                            <input type="text" class="l-txt-bx" name="street" value="{{ old('street') }}" placeholder="Street Address">
                                           @error('street')
                                              <div class="alert alert-danger error-msg">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div>
                                     <!--  <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Street Address2</h2>
                                          <div class="login-bx">
                                            <input type="text" class="l-txt-bx" name="street2" value="{{ old('street2') }}" placeholder="Street Address2">
                                            @error('street2')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div> -->
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">City<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                            <input type="text" name="city" class="l-txt-bx" value="{{ old('city') }}" placeholder="City">
                                            @error('city')
                                              <div class="alert alert-danger error-msg">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">State<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                            <input type="text" name="state" class="l-txt-bx" value="{{ old('state') }}" placeholder="State">
                                           @error('state')
                                              <div class="alert alert-danger error-msg">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Zipcode<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                            <input type="text" class="l-txt-bx" name="zip" value="{{ old('zip') }}" placeholder="Zipcode">
                                           @error('zip')
                                              <div class="alert alert-danger error-msg">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            
                          </div>
                          <div class="req-form-box">
                              <h2 class="rq-fm-hd">Contact Details</h2>
                              <div class="req-form-box-cnt">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Applicant Email<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                            <input type="text" class="l-txt-bx" name = "email" value="@if(isset($getRegistration['records'][0]['field_291_raw']['email']) && !empty($getRegistration['records'][0]['field_291_raw']['email'])){{$getRegistration['records'][0]['field_291_raw']['email']}}@endif" placeholder="Applicant Email" autocomplete="nope" >
                                            @error('email')
                                            <div class="alert alert-danger error-msg">{{ $message }}</div>
                                        @enderror
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Applicant’s Phone Number<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                            <input type="text" class="l-txt-bx phone_number" name="field_11"  value="@if(isset($getRegistration['records'][0]['field_310_raw']['full']) && !empty($getRegistration['records'][0]['field_310_raw']['full'])){{$getRegistration['records'][0]['field_310_raw']['full']}}@endif" placeholder="(___) ___-____">
                                            @error('field_11')
                                              <div class="alert alert-danger error-msg">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Primary Reason for Zakah<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                            <select class="l-sel-bx l-txt-bx" name="field_106">
                                                <option value="">Select...</option>
                                                @foreach($primaryResaons as $primaryResaon)
                                                    <option {{ old('field_106') == $primaryResaon ? "selected" :'' }} value="{{ $primaryResaon }}">{{ $primaryResaon }}</option>   
                                                @endforeach
                                            </select>
                                          @error('field_106')
                                              <div class="alert alert-danger error-msg">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="req-form-box">
                              <h2 class="rq-fm-hd">Notes</h2>
                              <div class="req-form-box-cnt">
                                  <div class="row">
                                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 rq-form-sec">
                                          <textarea name="field_108" rows="6" cols="113" >{{ old('field_108') }}</textarea>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="form-wrapper">
                          <div class="req-form-box">
                              <h2 class="rq-fm-hd">Other Details</h2>
                              <div class="req-form-box-cnt">
                                  <div class="row"> 
                                  <!-- //this is mantory field -->
                                  <input type="hidden" name="field_120" value="First"> 
                                      <!-- <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Number of Zakah Requests<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                                <select class="l-sel-bx l-txt-bx" name="field_120">
                                                    <option  value="" selected="">Select...</option>
                                                        <option {{ old('field_120') == "First" ? "selected" :'' }} value="First">First</option>  
                                                        <option {{old('field_120') == "Second"? "selected" : ''}} value="Second">
                                                        Second
                                                      </option><option {{old('field_120') == "Third"? "selected" : ''}} value="Third">
                                                        Third
                                                      </option><option {{old('field_120') == "Fourth"? "selected" : ''}}  value="Fourth">
                                                        Fourth
                                                      </option><option {{old('field_120') == "Fifth"? "selected" : ''}} value="Fifth">
                                                        Fifth
                                                      </option><option {{old('field_120') == "Sixth"? "selected" : ''}} value="Sixth">
                                                        Sixth
                                                      </option><option {{old('field_120') == "Seventh"? "selected" : ''}} value="Seventh">
                                                        Seventh
                                                      </option><option {{old('field_120') == "Eighth"? "selected" : ''}} value="Eighth">
                                                        Eighth
                                                      </option><option {{old('field_120') == "Ninth"? "selected" : ''}} value="Ninth">
                                                        Ninth
                                                      </option><option {{old('field_120') == "Tenth"? "selected" : ''}} value="Tenth">
                                                        Tenth
                                                      </option><option {{old('field_120') == "Eleventh"? "selected" : ''}} value="Eleventh">
                                                        Eleventh
                                                      </option><option {{old('field_120') == "Twelfth"? "selected" : ''}} value="Twelfth">
                                                        Twelfth 
                                                      </option><option {{old('field_120') == "Thirteenth"? "selected" : ''}} value="Thirteenth">
                                                        Thirteenth
                                                      </option><option {{old('field_120') == "Fourteenth"? "selected" : ''}} value="Fourteenth">
                                                        Fourteenth
                                                      </option><option {{old('field_120') == "Fifteenth"? "selected" : ''}} value="Fifteenth">
                                                        Fifteenth 
                                                      </option><option {{old('field_120') == "Monthly"? "selected" : ''}} value="Monthly">
                                                        Monthly 
                                                </select>
                                             @error('field_112')
                                              <div class="alert alert-danger error-msg">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div> -->

                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Zakah Category<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                                <select class="l-sel-bx l-txt-bx" name="field_112">
                                                    <option  value="" selected="">Select...</option>
                                                    @foreach($zakahCategorys as $zakahCategory)
                                                        <option {{ old('field_112') == $zakahCategory ? "selected" :'' }} value="{{ $zakahCategory }}">{{ $zakahCategory }}</option>   
                                                   @endforeach
                                                </select>
                                             @error('field_112')
                                              <div class="alert alert-danger error-msg">{{ $message }}</div>
                                          @enderror
                                          </div>
                                      </div>

                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Applicant Talents/Skills</h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_114">
                                                  <option value="">Select...</option>
                                                  @foreach($skills as $skill)
                                                        <option {{ old('field_114') == $skill ? "selected" :'' }} value="{{ $skill }}">{{ htmlspecialchars_decode($skill) }}</option>   
                                                   @endforeach
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Ethnic Background</h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_216">
                                                  <option  value="" selected="">Select...</option>
                                                  <option {{ old('field_216') == "Afghani" ? "selected" :'' }}  value="Afghani">Afghani</option>
                                                  <option {{ old('field_216') == "Bangladeshi" ? "selected" :'' }} value="Bangladeshi">Bangladeshi</option>
                                                  <option {{ old('field_216') == "African American" ? "selected" :'' }} value="African American">African American</option>
                                                  <option {{ old('field_216') == "Caucasian" ? "selected" :'' }} value="Caucasian">Caucasian</option>
                                                  <option {{ old('field_216') == "Egyptian" ? "selected" :'' }} value="Egyptian">Egyptian</option>
                                                  <option {{ old('field_216') == "Hispanic" ? "selected" :'' }} value="Hispanic">Hispanic</option>
                                                  <option {{ old('field_216') == "Indian" ? "selected" :'' }} value="Indian">Indian</option>
                                                  <option {{ old('field_216') == "Iraqi" ? "selected" :'' }} value="Iraqi">Iraqi</option>
                                                  <option {{ old('field_216') == "Pakistani" ? "selected" :'' }} value="Pakistani">Pakistani</option>
                                                  <option {{ old('field_216') == "Palestinian" ? "selected" :'' }} value="Palestinian">Palestinian</option>
                                                  <option {{ old('field_216') == "Somali" ? "selected" :'' }} value="Somali">Somali</option>
                                                  <option {{ old('field_216') == "Sudanese" ? "selected" :'' }} value="Sudanese">Sudanese</option>
                                                  <option {{ old('field_216') == "Syrian" ? "selected" :'' }} value="Syrian">Syrian</option>
                                                  <option {{ old('field_216') == "Other" ? "selected" :'' }} value="Other">Other</option>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Residency</h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_217">
                                                <option  value="" selected="">Select...</option>
                                                <option {{ old('field_217') == "Green Card" ? "selected" :'' }} value="Green Card">Green Card</option>
                                                <option {{ old('field_217') == "Asylum Seeker" ? "selected" :'' }} value="Asylum Seeker">Asylum Seeker</option>
                                                <option {{ old('field_217') == "Citizen" ? "selected" :'' }} value="Citizen">Citizen</option>
                                                <option {{ old('field_217') == "Visa Holder" ? "selected" :'' }} value="Visa Holder">Visa Holder</option>
                                                <option {{ old('field_217') == "Refugee" ? "selected" :'' }} value="Refugee">Refugee</option>
                                                <option {{ old('field_217') == "Other" ? "selected" :'' }} value="Other">Other</option>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Income Range</h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_218">
                                                <option value="" selected="">Select...</option>
                                                <option {{ old('field_218') == "0 to $10k" ? "selected" :'' }} value="$0 to $10k">$0 to $10k</option>
                                                <option {{ old('field_218') == "$10 to $20k" ? "selected" :'' }} value="$10 to $20k">$10 to $20k</option>
                                                <option {{ old('field_218') == "$20k to $30k" ? "selected" :'' }} value="$20k to $30k">$20k to $30k</option>
                                                <option {{ old('field_218') == "$30k to 40k" ? "selected" :'' }} value="$30k to 40k">$30k to 40k</option>
                                                <option {{ old('field_218') == "$40 to $50k" ? "selected" :'' }} value="$40 to $50k">$40 to $50k</option>
                                                <option {{ old('field_218') == "$50k+" ? "selected" :'' }} value="$50k+">$50k+</option>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Zakat-ul-Fitr Applicant</h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_221">
                                                <option {{ old('field_221') == "No" ? "selected" : '' }} value="No" >No</option>
                                                <option {{ old('field_221') == "Yes" ? "selected" : '' }} value="Yes">Yes</option>
                                              </select>
                                          </div>
                                      </div>
                                            {{--  application status  --}}
                                            <input type="hidden" class="l-txt-bx" name="field_245" value="Collaboration Request (Multi-Masjid Support)">
                                            {{--  application status  --}}

                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Marital Status</h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_246"> 
                                                <option  value="" selected="">Select...</option>
                                                <option {{ old('field_246') == "Married" ? "selected" :'' }} value="Married">Married</option>
                                                <option {{ old('field_246') == "Divorced" ? "selected" :'' }} value="Divorced">Divorced</option>
                                                <option {{ old('field_246') == "Single" ? "selected" :'' }} value="Single">Single</option>
                                                <option {{ old('field_246') == "Single with Kids" ? "selected" :'' }} value="Single with Kids">Single with Kids</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            
                          </div>
                          <div class="req-form-box">
                              <h2 class="rq-fm-hd">Spouse Details</h2>
                              <div class="req-form-box-cnt">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Spouse First Name</h2>
                                          <div class="login-bx">
                                            <input type="text" class="l-txt-bx" name="first_field_248" value="{{ old("first_field_248") }}" placeholder=" First Name">
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Last Name</h2>
                                          <div class="login-bx">
                                            <input type="text" class="l-txt-bx" value="{{ old("last_field_248") }}"name="last_field_248" placeholder="Last Name">
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Spouse Phone Number</h2>
                                          <div class="login-bx">
                                            <input type="text" class="l-txt-bx phone_number" name="field_249" value="{{ old("field_249") }}" placeholder="(___) ___-____">
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt" style="font-size: 15px;">What type of program would help you most<span class="red-star">*</span></h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_289">
                                                <option value="" selected="">Select...</option>
                                                <option {{ old('field_289') == "Job Training - Cooking" ? "selected" :'' }} value="Job Training - Cooking">Job Training - Cooking</option>
                                                <option {{ old('field_289') == "Job Training - CPR" ? "selected" :'' }} value="Job Training - CPR">Job Training - CPR</option>
                                                <option {{ old('field_289') == "Job Training - Sewing" ? "selected" :'' }} value="Job Training - Sewing">Job Training - Sewing</option>
                                                <option {{ old('field_289') == "Job Training - Computer Language/Coding" ? "selected" :'' }} value="Job Training - Computer Language/Coding">Job Training - Computer Language/Coding</option>
                                                <option {{ old('field_289') == "Adult English as a Second Language (ESL) classes" ? "selected" :'' }} value="Adult English as a Second Language (ESL) classes">Adult English as a Second Language (ESL) classes</option>
                                                <option {{ old('field_289') == "Child Tutoring - Math" ? "selected" :'' }} value="Child Tutoring - Math">Child Tutoring - Math</option>
                                                <option {{ old('field_289') == "Child Tutoring - English" ? "selected" :'' }} value="Child Tutoring - English">Child Tutoring - English</option>
                                              </select>
                                              @error('field_289')
                                               <div class="alert alert-danger error-msg">{{ $message }}</div>
                                              @enderror
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Number of People in Home</h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_257">
                                                <option value="" selected="">Select...</option>
                                                <option {{ old('field_257') == "0h" ? "selected" :'' }} value="0">0</option>
                                                <option {{ old('field_257') == "1-3" ? "selected" :'' }} value="1-3">1-3</option>
                                                <option {{ old('field_257') == "4-5" ? "selected" :'' }} value="4-5">4-5</option>
                                                <option {{ old('field_257') == "6-7" ? "selected" :'' }} value="6-7">6-7</option>
                                                <option {{ old('field_257') == "8+" ? "selected" :'' }} value="8+">8+</option>
                                              </select>
                                          </div>
                                      </div>
                                      
                                  </div>
                              </div>
                          </div>
                          <div class="req-form-box">
                              
                              <div class="req-form-box-cnt" style="margin-top: 30px;">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Full-Time Job (40 hours/week)</h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_276">
                                                <option {{ old('field_276') == "No" ? "selected" : '' }} value="No" >No</option>
                                                <option {{ old('field_276') == "Yes" ? "selected" : '' }} value="Yes">Yes</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Health Insurance</h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_277">
                                                <option {{ old('field_277') == "No" ? "selected" : '' }} value="No" >No</option>
                                                <option {{ old('field_277') == "Yes" ? "selected" : '' }} value="Yes">Yes</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <h2 class="label-txt">Age Range</h2>
                                          <div class="login-bx">
                                              <select class="l-sel-bx l-txt-bx" name="field_278">
                                                <option value="" selected="">Select...</option>
                                                <option {{ old('field_278') == "0-18" ? "selected" : '' }} value="0-18">0-18</option>
                                                <option {{ old('field_278') == "19-25" ? "selected" : '' }} value="19-25">19-25</option>
                                                <option {{ old('field_278') == "26-35" ? "selected" : '' }} value="26-35">26-35</option>
                                                <option {{ old('field_278') == "36-46" ? "selected" : '' }} value="36-46">36-46</option>
                                                <option {{ old('field_278') == "47-50" ? "selected" : '' }} value="47-50">47-50</option>
                                                <option {{ old('field_278') == "51-60" ? "selected" : '' }} value="51-60">51-60</option>
                                                <option {{ old('field_278') == "61-70" ? "selected" : '' }} value="61-70">61-70</option>
                                                <option {{ old('field_278') == "71-80" ? "selected" : '' }} value="71-80">71-80</option>
                                                <option {{ old('field_278') == "81-90" ? "selected" : '' }} value="81-90">81-90</option>
                                                <option {{ old('field_278') == "90+" ? "selected" : '' }} value="90+">90+</option>
                                              </select>
                                          </div>
                                      </div>
                                      
                              <div class="kn-input kn-input-image" id="kn-input-field_305" data-input-id="field_305"> 
                                <label for="field_305" class="knack-input-label"><span class="kn-input-label">Upload Documentation</span></label>
                                  <input class="image" name="field_305" type="hidden" value="">
                                  <div class="kn-asset-current" data-asset-id="">
                                  <div style="margin-bottom: 6px;">
                                  </div>  
                                </div>
                                  <div class="kn-file-upload" style="">
                                     <input id="field_305_files" name="field_305_files" value="" type="hidden">
                                     <input type="file" class="l-txt-bx"  id="field_305_upload" value="" accept="image/*" type="file" name="files" accept="image/*" onchange="imageUpload()">
                                     @error('files')
                                      <div class="alert alert-danger error-msg" style="width: 33.2%;">{{ $message }}</div>
                                     @enderror
                                    <div class="kn-spinner" style="display:none;"></div>
                                  </div>
                                  <p class="kn-instructions"><i>Upload photos of your bills. DO NOT INCLUDE any pictures of your Social Security Number, Drivers License Number or other Sensitive Personal Information. Limit of 3 photo files (3MB total). Failure to follow these instructions may result in the delay or denial of your application.</i>
                                  </p>
                              </div>
                              <label  class="knack-input-label reason-zakah"><span class="kn-input-label">Reason you are applying for Zakah</span></label>
                              <div class="req-form-box-cnt">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                          <div class="login-bx">
                                            <input id="field_306" type="text" class="l-txt-bx" name="field_306" value="{{ old('field_306') }}">
                                             <i>Briefly explain why you need Zakah.</i>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                               <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 rq-form-sec">
                                  <h2 class="label-txt">Sharing of Zakah Information Waiver</h2>
                                  <div class="login-bx">
                                      <select class="l-sel-bx l-txt-bx" name="field_266">
                                          <option {{ old('field_266') == "Yes" ? "selected" : '' }} value="Yes">Yes</option>
                                          <option {{ old('field_266') == "No" ? "selected" : '' }} value="No">No</option>
                                      </select>
                                        @error('field_266')
                                       <div class="alert alert-danger error-msg">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>

                             
                              <i class="kn-instructions">By submitting your Zakah application to this Masjid, you agree to having your name, phone number, mailing address, email address, and/or your skill/talent identification shared with other Masjids within the Washington, D.C., Maryland, and Northern Virginia metropolitan area.  This information is shared to prevent fraud and to improve Zakah services.  This Masjid will never sell your personal information.
                              You agree to hold this Masjid harmless for any liability arising from this Masjid’s secure disclosure of the abovementioned information to other Masjids.  You also agree to waive any rights or expectations of privacy in the abovementioned information with regards to this Masjid and your Zakah application.
                              Except as required by local, state, or federal laws, your social security number, driver’s license number, and other supporting documentation that you submitted with your Zakah application will not be shared. ANY PHOTO ID INFORMATION THAT YOU PREVIOUSLY SUBMITTED IS NOT STORED AND IS NOT SHARED.
                              I understand and willingly agree to the abovementioned terms.
                              </i>
                             
                              <h2 class="rq-fm-hd">Signature</h2>
                              <div id="signature-pad-test" class="signature-pad"></div>
                              <div id="signature-pad" class="signature-pad">
                                <div class="signature-pad--body">
                                  <canvas width="664" height="234" style="touch-action: none;"></canvas>
                                </div>
                                <div class="signature-pad--footer">
                                  <div class="description">Sign above</div>
                                  <div class="signature-pad--actions">
                                    <div>
                                      <button type="button" class="button clear btn-danger btn" data-action="clear">Clear</button>
                                      <button type="button" class="button display-button" data-action="change-color">Change color</button>
                                      <button type="button" class="button display-button" data-action="undo">Undo</button>
                                    </div>
                                    <div>
                                      <button type="button" class="button save display-button" data-action="save-png">Save as PNG</button>
                                      <button type="button" class="button save display-button" data-action="save-jpg">Save as JPG</button>
                                      <button type="button" class="button save mar-align btn-success btn" id="confirm-data" data-action="save-svg">Confirm</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="bott-btn-sec">
                      <input type="hidden" name="svg" id="svg" ></input>
                          <button class="btn sum-det-btn sub-del">Submit Details</button>
                          <button class="btn red-det-btn" type="button" onclick="applicantForm();">Reset Details</button>
                      </div>
                  </div>
              </div>
            </form>
        </section>

        <script src="js/jquery.js" type="text/javascript"></script>        
        <script src="js/custom.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>

        {{-- signature plugin --}}
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
        <script src="js/signature_pad.umd.js"></script>
        {{-- signature plugin --}}
        <script type="text/javascript">app_id="59c99d5c6b83d222c7507c61";distribution_key="dist_2";</script><script type="text/javascript" src="https://loader.knack.com/59c99d5c6b83d222c7507c61/dist_2/knack.js"></script>
        <script type="text/javascript">


            $(".sub-del").click(function(e) {
                e.preventDefault();
                $(this).css({'background-color':'red','border':'none','outline':'none','color':'white','cursor':'not-allowed'});
                $(this).text("Processing..."); 
                $("#applicantForm").submit();
            });

            $(window).load(function()
            {
                var phones = [{ "mask": "(###) ###-####"}, { "mask": "(###) ###-####"}];
                $('.phone_number').inputmask({ 
                    mask: phones, 
                    greedy: false, 
                    definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
            });

            function applicantForm() {
              document.getElementById("applicantForm").reset();
            }
            
            var wrapper = document.getElementById("signature-pad");
            var clearButton = wrapper.querySelector("[data-action=clear]");
            var changeColorButton = wrapper.querySelector("[data-action=change-color]");
            var undoButton = wrapper.querySelector("[data-action=undo]");
            var savePNGButton = wrapper.querySelector("[data-action=save-png]");
            var saveJPGButton = wrapper.querySelector("[data-action=save-jpg]");
            var saveSVGButton = wrapper.querySelector("[data-action=save-svg]");
            var canvas = wrapper.querySelector("canvas");
            var signaturePad = new SignaturePad(canvas, {
            // It's Necessary to use an opaque color when saving image as JPEG;
            // this option can be omitted if only saving as PNG or SVG
            backgroundColor: 'rgb(255, 255, 255)'
            });

            // Adjust canvas coordinate space taking into account pixel ratio,
            // to make it look crisp on mobile devices.
            // This also causes canvas to be cleared.
            function resizeCanvas() {
            // When zoomed out to less than 100%, for some very strange reason,
            // some browsers report devicePixelRatio as less than 1
            // and only part of the canvas is cleared then.
            var ratio =  Math.max(window.devicePixelRatio || 1, 1);

            // This part causes the canvas to be cleared
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);

            // This library does not listen for canvas changes, so after the canvas is automatically
            // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
            // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
            // that the state of this library is consistent with visual state of the canvas, you
            // have to clear it manually.
            signaturePad.clear();
            }

            // On mobile devices it might make more sense to listen to orientation change,
            // rather than window resize events.
            window.onresize = resizeCanvas;
            resizeCanvas();

            function download(dataURL, filename) {
            var blob = dataURLToBlob(dataURL);
            var url = window.URL.createObjectURL(blob);

            var a = document.createElement("a");
            a.style = "display: none";
            a.href = url;
            a.download = filename;

            document.body.appendChild(a);
            a.click();

            window.URL.revokeObjectURL(url);
            }

            // One could simply use Canvas#toBlob method instead, but it's just to show
            // that it can be done using result of SignaturePad#toDataURL.
            function dataURLToBlob(dataURL) {
               
            // Code taken from https://github.com/ebidel/filer.js
            var parts = dataURL.split(';base64,');
           
            var contentType = parts[0].split(":")[1];
            var raw = window.atob(parts[1]);
            var rawLength = raw.length;
            var uInt8Array = new Uint8Array(rawLength);

            for (var i = 0; i < rawLength; ++i) {
                uInt8Array[i] = raw.charCodeAt(i);
            }

            return new Blob([uInt8Array], { type: contentType });
            }

            clearButton.addEventListener("click", function (event) {
            alert("signature is Clear");
            signaturePad.clear();
            $("#confirm-data").html("Confirm");
            document.getElementById("svg").value = "";
            });

            undoButton.addEventListener("click", function (event) {
            var data = signaturePad.toData();
            
            if (data) {
                data.pop(); // remove the last dot or line
                signaturePad.fromData(  );
            }
            });

            changeColorButton.addEventListener("click", function (event) {
            var r = Math.round(Math.random() * 255);
            var g = Math.round(Math.random() * 255);
            var b = Math.round(Math.random() * 255);
            var color = "rgb(" + r + "," + g + "," + b +")";

            signaturePad.penColor = color;
            });

            savePNGButton.addEventListener("click", function (event) {
            if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
            } else {
                var dataURL = signaturePad.toDataURL();
                download(dataURL, "signature.png");
            }
            });

            saveJPGButton.addEventListener("click", function (event) {
            if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
            } else {
                var dataURL = signaturePad.toDataURL("image/jpeg");
                download(dataURL, "signature.jpg");
            }
            });
            
            saveSVGButton.addEventListener("click", function (event) {
            if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
            } else {
                var dataURL = signaturePad.toDataURL('image/svg+xml');
                $("#svg").val(dataURL);

                alert("Signature is saved successfully...");
                
                $("#confirm-data").html("Confirmed");

                // $('.signature-pad--body').addClass("myclass");
                // console.log('done');
                // var svgimg = document.createElementNS("http://www.w3.org/2000/svg", "image");
                // // new
                // svgimg.setAttribute( 'width', '100' );
                // svgimg.setAttribute( 'height', '100' );

                // svgimg.setAttributeNS("http://www.w3.org/1999/xlink", 'xlink:href', dataURL);


                // document.getElementById("signature-pad-test").appendChild(svgimg);
                
                //  download(dataURL, "signature.svg");
            }
            });
             

            function imageUpload(){

              var form = new FormData();
              // change #myfileinput to select your <input type="file" /> element
              var file = $(`#field_305_upload`)[0].files[0];
              form.append(`files`, file);

              var url = `https://api.knack.com/v1/applications/59c99d5c6b83d222c7507c61/assets/image/upload`;
              var headers = {
                'X-Knack-Application-ID': `59c99d5c6b83d222c7507c61`,
                'X-Knack-REST-API-Key': `5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e`,
              };

              Knack.showSpinner();

              // Make the AJAX call
              $.ajax({
                url: url,
                type: `POST`,
                headers: headers,
                processData: false,
                contentType: false,
                mimeType: `multipart/form-data`,
                data: form,
              }).done(function(responseData) {
                
                  Knack.hideSpinner();
                  console.log(responseData);
                  response = JSON.parse(responseData);
                  document.getElementById("field_305_files").value  = response.id;
              });
            }

            function logout(){

               if(confirm("Are you sure you want to logout")){

                   window.location.href = "{{URL::to('logout')}}";
               }
            }
        </script>
    </body>
</html>