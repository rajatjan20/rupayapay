<?php  

namespace App\Classes\Aikonsms;

use Illuminate\Http\Request;

class ClientRequest
{
    private $email_id;
    private $mobile_number;
    private $amount;
    private $txncurr;
    private $prod_id;
    private $clientKey;
    private $clientSecret;
    private $requestHashKey;
    private $username;    
    
    /**
     * @return mixed
     */
    public function getRequestHashKey()
    {
        return $this->requestHashKey;
    }

    
    /**
     * @param mixed $requestHashKey
     */
    public function setRequestHashKey($requestHashKey)
    {
        $this->requestHashKey = $requestHashKey;
    }

    /**
     * @param mixed $requestHashKey
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    
    /**
     * @return mixed
     */
    public function getEmail_id()
    {
        return $this->email_id;
    }

    /**
     * @return mixed
     */
    public function getMobile_number()
    {
        return $this->mobile_number;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getTxncurr()
    {
        return $this->txncurr;
    }

    /**
     * @return mixed
     */
    public function getProd_id()
    {
        return $this->prod_id;
    }

    /**
     * @return mixed
     */
    public function getClientKey()
    {
        return $this->clientKey;
    }

    /**
     * @return mixed
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }


    /**
     * @param mixed $email_id
     */
    public function setEmail_id($email_id)
    {
        $this->email_id = $email_id;
    }

    /**
     * @param mixed $mobile_number
     */
    public function setMobile_number($mobile_number)
    {
        $this->mobile_number = $mobile_number;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param mixed $txncurr
     */
    public function setTxncurr($txncurr)
    {
        $this->txncurr = $txncurr;
    }

    /**
     * @param mixed $prod_id
     */
    public function setProd_id($prod_id)
    {
        $this->prod_id = $prod_id;
    }

    /**
     * @param mixed $clientKey
     */
    public function setClientKey($clientKey)
    {
        $this->clientKey = $clientKey;
    }

    /**
     * @param mixed $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

 	
	/**
     * @return mixed
     */
	// Post method url
    public function getBaseUrl()
    {
	$baseUrl ="https://rupayapay.com/PG/Rupayapay/r1/request";
        return $baseUrl;
    }

	/**
     * @return mixed
     */
    public function getSignature()
    {
	$message = $this->clientKey.$this->clientSecret.$this->txncurr.$this->amount.$this->email_id.$this->mobile_number;
	
	// to lowercase hexits
	$signature =hash_hmac('sha256', $message, $this->requestHashKey);
	
        return $signature;
    }	
    
    public function getResponseUrl(){
        $responseUrl ="https://dev.rupayapay.com/aikonsms/response";
        return $responseUrl;
    }
    
    public function postResponseUrl(){
        $postUrl = "https://aikonsms.co.in/thank-you.php";
        return $postUrl;
    }
}



?>
