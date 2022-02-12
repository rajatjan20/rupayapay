<?php

namespace App\Http\Controllers\Aikonsms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\Aikonsms\ClientRequest;
use App\Classes\Aikonsms\RupayapaySecureData;

class AikonsmsController extends Controller
{

    private $clientkey;
    private $secretekey;
    private $requestHashKey;
    private $requestSaltKey;
    private $responseHashKey;
    private $responseSaltKey;
    private $requestAESKey;
    private $productkey;
    private $responseUrl;

    public function __construct(){
        $this->productkey = "prod_ZxAteIbGL8Hnx8DL";
        $this->_load_live_keys();
    }


    public function request(Request $request){

        $clientrequest = new ClientRequest();

        $clientrequest->setClientKey($this->clientkey);
        $clientrequest->setClientSecret($this->secretekey);
        $clientrequest->setEmail_id($request->EmailID);
        $clientrequest->setMobile_number($request->MobileNumber);
        $clientrequest->setAmount($request->amount);
        $clientrequest->setUsername($request->name);
        $clientrequest->setTxncurr("INR");
        $clientrequest->setProd_id($this->productkey);
        $clientrequest->setRequestHashKey($this->requestHashKey);

        $myObj = (object)array(); // object(stdClass) -> recommended
        $myObj->clientId= $clientrequest->getClientKey();
        $myObj->clientSecret= $clientrequest->getClientSecret();
        $myObj->username=$clientrequest->getUsername();
        $myObj->txnCurr=$clientrequest->getTxncurr();
        $myObj->amount=$clientrequest->getAmount();
        $myObj->emailId= $clientrequest->getEmail_id();
        $myObj->prodId= $clientrequest->getProd_id();
        $myObj->mobileNumber=$clientrequest->getMobile_number();
        $myObj->signature=$clientrequest->getSignature();
        $myObj->transaction_response=$clientrequest->getResponseUrl();

        $myJSON = json_encode($myObj);

        $secureData = new RupayapaySecureData();
        $requestSaltKey = $this->requestSaltKey;
        $requestAESKey = $this->requestAESKey;
        $encryptJsonObj = $secureData->encrypt($myJSON,$requestSaltKey,$requestAESKey);

        return view('aikonsms.aikonrequest')->with(["encryptJsonObj"=>$encryptJsonObj,"clientId"=>$clientrequest->getClientKey(),"baseurl"=>$clientrequest->getBaseUrl()]);

    }

    private function _load_live_keys(){

        $this->clientkey = "ryapay_live_0vs653dnCFdD6OBE";
        $this->secretekey = "T0fH9u6CHxyYWuPd";
        $this->requestHashKey = "7n5KjHwcVOi3MaN8";
        $this->requestSaltKey = "zTDXmgyuvvXgl8nD";
        $this->requestAESKey = "NY0yA6vfvdejwxGQ";
        $this->responseHashKey = "vRac9WWP2ECqjhIn";
        $this->responseSaltKey = "uOtB5dLuVMB1Gks0";
        $this->responseAESKey = "a8D0XjtQArycKNdT";
        
    }

    private function _load_test_keys(){

        $this->clientkey = "ryapay_test_UBSi9jJsw6oftC1I";
        $this->secretekey = "LnTuS6bZKFE22H28";
        $this->requestHashKey = "yCVFuLNhScEvNfEz";
        $this->requestSaltKey = "oFsjAYwRtSv96I7x";
        $this->requestAESKey = "xaTMTuiMk91jXanO";
        $this->responseSaltKey = "rWYQuiloMYq9AsRp";
        $this->responseAESKey = "vjVvJNF8rbkqt8Kd";
        
    }

    public function response(Request $request){

        $clientrequest = new ClientRequest();
        $securedata = new RupayapaySecureData();

        $decryption = $securedata->decrypt($request->secureData,$this->responseSaltKey,$this->responseAESKey);

        
        $response = json_decode($decryption,true);
        
        return view('aikonsms.aikonresonse')->with(["response"=>$response,"responseUrl"=>$clientrequest->postResponseUrl()]);
    }

    public function samplerequest(Request $request){
        print_r($request->all());
    }
}
