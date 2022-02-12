<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Classes\EmailSmsLogs; 
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request,$response)
    {
        //return back()->with('status', trans($response));
        $emailsmsObject = new EmailSmsLogs();
        $emailsmsObject->email_logs($app="Merchant",$module="Password Reset Email",$email_to=$request->email,$email_cc="",$email_bcc="",$email_status="Success");
        echo json_encode(['status'=>TRUE,'message' => trans($response)]);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        $emailsmsObject = new EmailSmsLogs();
        $emailsmsObject->email_logs($app="Merchant",$module="Password Reset Email",$email_to=$request->email,$email_cc="",$email_bcc="",$email_status="Failed");
        echo json_encode(['status'=>FALSE,'message' => trans($response)]);
    }

}
