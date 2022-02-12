@extends("layouts.link")
@section("content")
@if(!$link_expired)
<div class="container">
    <div class="row">
      <div class="course col-md-6 col-sm-12 col-xs-12">
        <div class="course-preview">
          <h4>Payment request from {{$pay_details->business_name}}</h4>
          <div>
           <h6>Payment for</h6>
           <p>{{$pay_details->paylink_for}}</p>
          </div>
          <div>
           <div>
             <h6>Amount Payable</h6>
             <p style="font-size: 23px;">&#8377;{{ number_format($pay_details->paylink_amount,2) }}</p>
            </div>
            <div class="powered">
                <p>Powered by <span class="power"><a href="/">rupayapay.com</a></span></p>
            </div>
          </div>
         
        </div> 
          
        </div>
  
        <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="course-info">
            <div id="show-success-message"></div>
            <div id="show-fail-message"></div>
            @if(session('no_api'))
            <span class="help-block text-center alert-danger alert-dismissible">{{session('no_api')}}</span>
            @endif
            @if($module == "paylink" && isset($pay_details))
            <form class="login100-form validate-form" id="paylink-request" method="POST" action="{{route('live-request-payment')}}">
            
              <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <span class="label-input100">Email<span style="color:red;font-size:large;">*</span></span>
                <input id="customer_email" type="text" class="input100" name="customer_email" placeholder="Email" value="{{ $pay_details->paylink_customer_email }}"   {{ ($pay_details->paylink_customer_email == "")?'':'readonly' }}>
                <span class="help-block">
                    <small id="customer_email_ajax_error" class="text-sm-left text-danger">{{ $errors->first('customer_email') }}</small>
                 </span>
              </div>
    
              <div class="wrap-input100 validate-input" data-validate="Mobile Number is required">
                <span class="label-input100">Mobile<span style="color:red;font-size:large;">*</span></span>
                <input id="customer_mobile" type="text" class="input100" name="customer_mobile" placeholder="Mobile" value="{{ $pay_details->paylink_customer_mobile }}" {{ ($pay_details->paylink_customer_mobile == "")?'':'readonly' }}>
                <span class="help-block">
                    <small id="customer_mobile_ajax_error" class="text-sm-left text-danger">{{ $errors->first('customer_mobile') }}</small>
                </span>
            </div>
    
              <div class="wrap-input100 validate-input" data-validate = "Password is required">
                <span class="label-input100">Amount<span style="color:red;font-size:large;">*</span></span>
                <input id="customer_amount" type="text" class="input100" name="customer_amount"  placeholder="Amount" value="{{ $pay_details->paylink_amount }}" {{ ($pay_details->paylink_amount == "")?'':'readonly' }}>
                <span class="help-block">
                    <small id="customer_amount_ajax_error" class="text-sm-left text-danger">{{ $errors->first('customer_amount') }}</small>
                </span>  
              </div>

              <div class="wrap-input100 validate-input" data-validate = "Username is required">
                <span class="label-input100">Username<span style="color:red;font-size:large;">*</span></span>
                <input id="customer_username" type="text" class="input100" name="customer_username" placeholder="Username" value="">
                <span class="help-block">
                    <small id="customer_username_ajax_error" class="text-sm-left text-danger">{{ $errors->first('customer_username') }}</small>
                 </span>
              </div>
    
              <input type="hidden" name="app_mode" value="live">
              <input type="hidden" name="transaction_response" value="{{route('live-paylink-response')}}">
              <input type="hidden" name="transaction_method_id" value="{{$pay_details->id}}">
              <input type="hidden" name="created_employee" value="{{$pay_details->created_employee}}">
              {{csrf_field()}}
              <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn">
                    Proceed To Pay
                  </button>
                </div>
              </div>
            </form>
            @endif
          </div>
          </div>
    </div>
</div>
@else
<div class="container courses-container">
    <div class="col-sm-12">
        <div class="message-div">
            <div class="container courses-container">
                <div class="row">
                    <div class="course-expiry">
                        <div class="container course-payink-expiry">
                            <div class="row">
                                <div class="card-header">
                                    <img src="{{asset('/images/final-logo.png')}}" class="img-responsive card-logo" alt="final-logo.png" width="120px" height="100px" >
                                    <h4 class="card-header-message">Thank you for using our Rupayapay Service</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card-body">
                                    <p class="card-message">The link may be expired,broken or payment has completed</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card-footer">
                                    <p>Powered by <span class="power"><a href="/">rupayapay.com</a></span></p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection