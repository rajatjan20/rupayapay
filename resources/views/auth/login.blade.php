@php
    use App\Classes\ValidationMessage;
@endphp

@extends('layouts.rupayapayapp')

@section('content')
    <img class="wave" src="assets/img/login-wave.png">
    <div class="login-container">
        <div class="img">
            <img src="assets/img/login-img2.png">
        </div>
        <div class="login-content">
            <form class="mt-5" method="POST" id="merchant-login" autocomplete="off">
                {{ csrf_field() }}
                <img src="assets/img/avatar.svg">
                <h3 class="title">Merchant Portal</h3>
                <h3 class="title">Login Here</h3>
                <div id="merchant-success-message"></div>
                <div id="merchant-login-error"></div>
                <p class="text-sm-center"  style="color:green;">
                    {{ session('register-message') }}
                </p>
                <p class="text-sm-center"  style="color:green;">
                    {{ session('password-reset-message') }}
                </p>
                <p class="text-sm-center"  style="color:green;">
                    {{ session('password-change-message') }}
                </p>
                <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-at"></i>
                    </div>
                    <div class="div">
                        <input id="email" type="text" class="input" name="email" value="{{ old('email') }}" placeholder="Email/Username" required autofocus>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input id="password" type="password" class="input" name="password" placeholder="Password" required>
                    </div>
                    <div class="dp show-pointer" onclick="showPasssword('password',this)"> 
                        <i class="fas fa-eye fa-lg"></i>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fab fa-cuttlefish"></i>
                    </div>
                    <div class="div">
                        <input id="captcha" type="text" class="input" name="captcha" placeholder="Captcha">
                    </div>
                </div>
                <div class="row captcha-input">
                    <div class="col-sm-6">
                        <img  id="display-captcha" src="{{captcha_src('flat')}}" class="img-responsive float-left p-3" alt="Captcha-Image" width="250px" height="50px">
                    </div>
                    <div class="col-sm-6">
                        <span class="captcha-css" onclick="reloadCaptcha();">
                            <i class="pt-5 fas fa-sync fa-lg"></i>
                        </span>
                    </div>
                </div>
                <p class="loginError" style="color:red;">
                    @if ($errors->has('captcha'))
                        <span class="help-block">
                            <strong>{{ $errors->first('captcha') }}</strong>
                        </span>
                    @endif
                </p>
                <input type="submit" class="btn" value="Login">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6 float-left text-sm-left">
                            <a href="javascript:" id="forget-password">Forgot Password?</a>
                        </div>
                        <div class="col-sm-6 float-right text-sm-left">
                            <a href="{{route('register')}}" class="pull-right">New account?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="modal" tabindex="-1" role="dialog" id="modalForgetPassword">
            <div class="modal-dialog" role="document">
                <div id="divLoading"></div>
                <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light">Forget Password</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 text-center pb-3">
                            <img src="assets/img/forget-password.png" width="280" height="130" alt="forget-password" class="rounded-circle img-responsive">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2 pt-3 pb-3">
                            <span id="success-body" class="text-sm-center"></span>
                            <span id="error-body" class="text-sm-center"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="password-reset">
                              <div class="form-group row">
                                <label for="email" class="col-sm-1 offset-sm-2 col-form-label text-right">Email:</label>
                                <div class="col-sm-8 offset-sm-1">
                                  <input type="email" class="form-control" id="email" name="email">
                                  <span id='email_ajax_error'></span>
                                </div>
                              </div>
                              {{csrf_field()}}
                              <div class="form-group row">
                                <div class="col-sm-8 offset-sm-4">
                                  <input type="submit" class="btn btn-primary" value="Send">
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
