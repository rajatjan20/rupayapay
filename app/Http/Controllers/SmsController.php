<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{   
    //Your User Name
    private $username = "rupayapay";
    
	//Your Password
    private $password = "rupay@5524";
    
    //Sender ID,While using Promo or Trans sender id should be 6 characters long.
    private $senderId = "RUPAYA";
	
	//Your Service Name(PROMO or TRANS)
    private $service = "TRANS";
    
	//Method Name
    private $method = "send_sms";

    //Your message to send, Add URL encoding here.
    public $message = "";

    //Multiple mobiles numbers separated by comma
    public $mobileNumber = "";


    public function __construct($message ,$mobileNumber){
        $this->message = $message;
        $this->mobileNumber = $mobileNumber;
    }
    
    
    public function sendMessage()
    {

        //Prepare you post parameters
        // $postData = array(
        //     'user_name' => $this->username,
        //     'password' => $this->password,
        //     'sender_id' => $this->senderId,
        //     'service' => $this->service,
        //     'mobile_no' => $this->mobileNumber,
        //     'message' => urlencode($this->message),
        //     'method' => $this->method
        // );

        $postData = array(
            'authkey'=>'323815A0kOgdWhCb9I5e71aecdP1',
            'mobiles'=>$this->mobileNumber,
            'message' => urlencode($this->message),
            'sender' => $this->senderId,
            'country'=>"91",
            'route' =>"4"
        );

        //API URL
        //$url="https://aikonsms.co.in/control/smsapi.php";
        $url="https://control.msg91.com/api/sendhttp.php?";
        
        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));
        

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        
        //get response
        $output = curl_exec($ch);
        
        //Print error if any
        if(curl_errno($ch))
        {
            echo curl_error($ch);
        }
        
        curl_close($ch);
        
        return $output;

    }


    
    
    
}
