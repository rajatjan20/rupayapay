@extends("layouts.link")
@section("content")
<div class="container">
    <div class="col-sm-12">
        <div class="message-div">
            <div class="container courses-container">
                <div class="row">
                    <div class="course-expiry">
                        <div class="container course-payink-expiry">
                            <div class="row">
                                <div class="card-header">
                                    <img src="{{asset('/images/final-logo.png')}}" class="img-responsive card-logo" alt="final-logo.png" width="120px" height="100px" >
                                    <h4 class="card-header-message">Thank you for using our Rupayapay</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card-body">
                                    <p class="card-message">
                                    Hi {{$response["emailId"]}},<br>
                                    Your {{$response["description"]}} on {{$response["date"]}} having transaction Id {{$response["transactionId"]}} 
                                    </p>
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
@endsection