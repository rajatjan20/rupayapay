@extends('layouts.rupayapayapp')

@section('content')
    <img class="wave" src="assets/img/login-wave.png">
	<div class="register-container">
		<div class="img">
			<img src="assets/img/login-img2.png">
		</div>
		<div class="login-content">
			<form class="" method="POST" autocomplete="off" id="merchant-register">
                {{ csrf_field() }}
                <h3 class="title">Merchant Portal</h3>
                <h3 class="title">Register Here</h3>

           		<div class="input-div one ">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
                        <input type="text" class="input" name="name" id="name" placeholder="Name" value="{{ old('name') }}" onkeyup="validateName('name');">
           		   </div>
                </div>
                <p class="text-sm-left font-weight-light" style="color:red;">
                    <span class="help-block">
                        <strong id="name_ajax_error"></strong>
                    </span>
                </p>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-at"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="text" class="input" name="email" placeholder="Email" autocapitalize="off" autocomplete="off" value="{{ old('email') }}" >
            	   </div>
                </div>
                <p class="text-sm-left font-weight-light" style="color:red;">
                    <span class="help-block">
                        <strong id="email_ajax_error"></strong>
                    </span>
                </p>
                <div class="input-div pass">
                    <div class="i"> 
                         <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="div">
                         <input type="text" class="input" name="mobile_no" placeholder="Mobile" value="{{ old('mobile_no') }}" onkeypress="return isNumber(event)">
                    </div>
                </div>
                <p class="text-sm-left font-weight-light" style="color:red;">
                    <span class="help-block">
                        <strong id="mobile_no_ajax_error"></strong>
                    </span>
                </p>
                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" class="input" name="password" placeholder="Password">
                    </div>
                    <div class="dp show-pointer" onclick="showPasssword('password',this)"> 
                        <i class="fas fa-eye fa-lg"></i>
                    </div>
                </div>
                <p class="text-sm-left font-weight-light" style="color:red;">
                    <span class="help-block">
                        <strong id="password_ajax_error"></strong>
                    </span>
                </p>
                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" class="input" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <div class="dp show-pointer" onclick="showPasssword('password_confirmation',this)"> 
                        <i class="fas fa-eye fa-lg"></i>
                    </div>
                </div>
                <p class="text-sm-left font-weight-light" style="color:red;">
                    <span class="help-block">
                        <strong id="cpassword_ajax_error"></strong>
                    </span>
                </p>
                <div class="col-sm-12">
                    <div class="referenceid">
                        <p>Have any Reference code? please enter</p>
                        <input type="text" name="reference_code" placeholder="Reference Code" value="" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="i_agree" id="i_agree" class="form-control">
                            <span class="cr show-pointer"><i class="cr-icon fa fa-check"></i></span>
                            By clicking the checkbox, you agree to the <a href="/term&condition">Terms & Conditions</a> and <a href="/agreement">MSA</a>
                            <div id="ajax-fail-response"></div>
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-registration" value="Register">
                Have an Account?<a href="{{route('login')}}">&nbsp;<strong>Login</strong></a>
            </form>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modalMobileVerify">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light">Mobile Verification</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 text-center pb-5">
                        <img src="assets/img/registration.jpg" width="280" height="130" alt="avatar" class="rounded-circle img-responsive">
                    </div>
                </div>
                <p id="ajax-success-response" class="text-center"></p>
                <div class="row">
                    <div class="col-sm-12">
                        <form id="mobile-verification">
                          <div class="form-group row">
                            <label for="otp_number" class="col-sm-4 col-form-label text-right">OTP No:</label>
                            <div class="col-sm-8">
                                <input id="otp_number" type="text" class="form-control" name="otp_number" value="{{ old('otp_number') }}">
                              <span id='otp_number_ajax_error'></span>
                            </div>
                          </div>
                          <div class="form-group row"> 
                            <div class="col-sm-12">
                                <a href="javascript:"  class="btn-link float-right" id="resend-mobile-sms">Send OTP Again</a>
                            </div>
                          </div>
                          {{csrf_field()}}
                          <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4">
                              <input type="submit" class="btn btn-primary" value="Next">
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
