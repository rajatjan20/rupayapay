@php
    $vendor_banks = App\RyapayVendorBank::get_vendorbank();
@endphp
@extends('layouts.employeecontent')
@section('employeecontent')
<div class="row">
    <div class="col-sm-12 padding-20">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    @if(count($sublinks) > 0)
                    @foreach($sublinks as $index => $value)
                        @if($index == 0)
                            <li class="active"><a data-toggle="tab" class="show-pointer" data-target="#{{str_replace(' ','-',strtolower($value->link_name))}}">{{$value->link_name}}</a></li> 
                        @else
                        <li><a data-toggle="tab" class="show-pointer" data-target="#{{str_replace(' ','-',strtolower($value->link_name))}}">{{$value->link_name}}</a></li>
                        @endif
                    @endforeach
                    @else
                        <li class="active"><a data-toggle="tab" class="show-pointer" data-target="#{{str_replace(' ','-',strtolower($sublink_name))}}">{{$sublink_name}}</a></li> 
                    @endif
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    @if(count($sublinks) > 0)
                    @foreach($sublinks as $index => $value)
                        @switch($index)
                            @case("0")
                            <div id="{{str_replace(' ','-',strtolower($value->link_name))}}" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0)" class="btn btn-primary pull-right btn-sm margin-bottom-lg" id="call-merchant-charges-modal">Add Merchant Charges</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="paginate_merchantcharge">
    
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="modal" id="merchant-charges-modal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Merchant Charges Form</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="ajax-success-response" class="text-center text-success"></div>
                                                <div id="ajax-failed-response" class="text-center text-danger"></div>
                                               <form id="merchant-charges-form" method="POST" class="form-horizontal" role="form" autocomplete="off">

                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">Merchant Id:</label>
                                                        <div class="col-sm-3">
                                                            <select name="merchant_id" id="merchant_id" class="form-control" required="required" onchange="getMerchantBusinessType(this,'merchant-charges-form')">
                                                                <option value="">--Select--</option>
                                                                @foreach(App\User::get_merchant_gids() as $index => $merchant)
                                                                    <option value="{{$merchant->id}}">{{$merchant->merchant_gid}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="merchant_id_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">Business Type:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <select name="business_type_id" id="business_type_id" class="form-control" required="required" readonly>
                                                                <option value="">--Select--</option>
                                                                @foreach(App\BusinessType::business_type() as $index => $businesstype)
                                                                    <option value="{{$businesstype->id}}">{{$businesstype->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">DC Visa:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dc_visa" id="dc_visa" class="form-control" value="" required="required">
                                                            <div id="dc_visa_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">DC Master:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dc_master" id="dc_master" class="form-control" value="" required="required">
                                                            <div id="dc_master_error" class="text-danger"></div>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">DC Rupay:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dc_rupay" id="dc_rupay" class="form-control" value="" required="required">
                                                            <div id="dc_rupay_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">CC Visa:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="cc_visa" id="cc_visa" class="form-control" value="" required="required">
                                                            <div id="cc_visa_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">CC Master:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="cc_master" id="cc_master" class="form-control" value="" required="required">
                                                            <div id="cc_master_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">CC Rupay:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="cc_rupay" id="cc_rupay" class="form-control" value="" required="required">
                                                            <div id="cc_rupay_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">AMEX:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="amex" id="amex" class="form-control" value="" required="required">
                                                            <div id="amex_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">UPI:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="upi" id="upi" class="form-control" value="" required="required">
                                                            <div id="upi_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <fieldset class="scheduler-border">
                                                    <legend class="scheduler-border">Net Banking</legend>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">SBI:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_sbi" id="net_sbi" class="form-control" value="" required="required">
                                                            <div id="net_sbi_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">HDFC:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_hdfc" id="net_hdfc" class="form-control" value="" required="required">
                                                            <div id="net_hdfc_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">AXIS:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_axis" id="net_axis" class="form-control" value="" required="required">
                                                            <div id="net_axis_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">ICICI:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_icici" id="net_icici" class="form-control" value="" required="required">
                                                            <div id="net_icici_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">YES/KOTAK:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_yes_kotak" id="net_yes_kotak" class="form-control" value="" required="required">
                                                            <div id="net_yes_kotak_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">OTHERS:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_others" id="net_others" class="form-control" value="" required="required">
                                                            <div id="net_others_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    </fieldset>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">Wallet:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="wallet" id="wallet" class="form-control" value="" required="required">
                                                            <div id="wallet_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">Debit ATM Pin:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dap" id="dap" class="form-control" value="" required="required">
                                                            <div id="dap_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">QR Code:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="qrcode" id="qrcode" class="form-control" value="" required="required">
                                                            <div id="qrcode_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">Merchant Charges:</label>
                                                        <div class="radio col-sm-2">
                                                            <label>
                                                                <input type="radio" name="charge_enabled" value="Y">
                                                                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                                Enable
                                                            </label>
                                                        </div>
                                                        <div class="radio col-sm-2">
                                                            <label>
                                                                <input type="radio" name="charge_enabled" value="N" checked>
                                                                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                                Disable
                                                            </label>
                                                        </div>
                                                        <i class="fa fa-info-circle show-pointer" data-toggle="merchant-charges-info" title="Merchant Charges" data-content="If you enable merchant charges at the time of payment gateway. payment fee will be collected by the end user not from the merchant."></i>
                                                    </div>
                                                    <input type="hidden" name="id" id="id" class="form-control" value="">
                                                    
                                                    {{csrf_field()}}
                                                    <div class="form-group form-fit">
                                                        <div class="col-sm-6 col-sm-offset-4">
                                                            <input type="submit" class="btn btn-primary btn-sm" value="Add Charges">
                                                        </div>
                                                    </div>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            @break
                            @case("1")
                            <div id="{{str_replace(' ','-',strtolower($value->link_name))}}" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0)" class="btn btn-primary pull-right btn-sm margin-bottom-lg" id="call-adjustment-charges-modal">Add Adjustment Charges</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="paginate_adjustmentcharge">
    
                                        </div>
                                    </div>
                                </div>

                                <div class="modal" id="adjustment-charges-modal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Adjustment Charges Form</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="ajax-success-response" class="text-center text-success"></div>
                                                <div id="ajax-failed-response" class="text-center text-danger"></div>
                                               <form id="adjustment-charges-form" method="POST" class="form-horizontal" role="form">
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">Merchant Id:</label>
                                                        <div class="col-sm-3">
                                                            <select name="merchant_id" id="merchant_id" class="form-control" required="required" onchange="getMerchantBusinessType(this,'adjustment-charges-form')">
                                                                <option value="">--Select--</option>
                                                                @foreach(App\User::get_merchant_gids() as $index => $merchant)
                                                                    <option value="{{$merchant->id}}">{{$merchant->merchant_gid}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="merchant_id_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">Business Type:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <select name="business_type_id" id="business_type_id" class="form-control" required="required" readonly>
                                                                <option value="">--Select--</option>
                                                                @foreach(App\BusinessType::business_type() as $index => $businesstype)
                                                                    <option value="{{$businesstype->id}}">{{$businesstype->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                         </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">DC Visa:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dc_visa" id="dc_visa" class="form-control" value="" required="required">
                                                            <div id="dc_visa_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">DC Master:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dc_master" id="dc_master" class="form-control" value="" required="required">
                                                            <div id="dc_master_error" class="text-danger"></div>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">DC Rupay:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dc_rupay" id="dc_rupay" class="form-control" value="" required="required">
                                                            <div id="dc_rupay_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">CC Visa:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="cc_visa" id="cc_visa" class="form-control" value="" required="required">
                                                            <div id="cc_visa_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">CC Master:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="cc_master" id="cc_master" class="form-control" value="" required="required">
                                                            <div id="cc_master_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">CC Rupay:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="cc_rupay" id="cc_rupay" class="form-control" value="" required="required">
                                                            <div id="cc_rupay_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">AMEX:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="amex" id="amex" class="form-control" value="" required="required">
                                                            <div id="amex_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">UPI:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="upi" id="upi" class="form-control" value="" required="required">
                                                            <div id="upi_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <fieldset class="scheduler-border">
                                                    <legend class="scheduler-border">Net Banking</legend>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">SBI:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_sbi" id="net_sbi" class="form-control" value="" required="required">
                                                            <div id="net_sbi_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">HDFC:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_hdfc" id="net_hdfc" class="form-control" value="" required="required">
                                                            <div id="net_hdfc_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">AXIS:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_axis" id="net_axis" class="form-control" value="" required="required">
                                                            <div id="net_axis_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">ICICI:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_icici" id="net_icici" class="form-control" value="" required="required">
                                                            <div id="net_icici_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">YES/KOTAK:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_yes_kotak" id="net_yes_kotak" class="form-control" value="" required="required">
                                                            <div id="net_yes_kotak_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">OTHERS:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="net_others" id="net_others" class="form-control" value="" required="required">
                                                            <div id="net_others_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    </fieldset>
                                                    <input type="hidden" name="id" id="id" class="form-control" value="">
                                                    {{csrf_field()}}
                                                    <div class="form-group form-fit">
                                                        <div class="col-sm-6 col-sm-offset-4">
                                                            <input type="submit" class="btn btn-primary btn-sm" value="Add Adjustment Charges">
                                                        </div>
                                                    </div>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @break
                            @case("2")
                            <div id="{{str_replace(' ','-',strtolower($value->link_name))}}" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0)" class="btn btn-primary pull-right btn-sm margin-bottom-lg" id="call-merchant-route-modal">Add Merchant Route</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="paginate_merchantroute">
    
                                        </div>
                                    </div>
                                </div>

                                <div class="modal" id="merchant-route-modal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Merchant Routing</h4>
                                            </div>
                                            <div id="merchant-route-add-succsess-response" class="text-center text-success"></div>
                                            <div id="merchant-route-add-fail-response" class="text-center text-danger"></div>
                                            <form class="form-horizontal" id="merchant-routing-form">
                                                <div class="modal-body">
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">Merchant Id:</label>
                                                        <div class="col-sm-3">
                                                            <select name="merchant_id" id="merchant_id" class="form-control" required="required" onchange="getMerchantBusinessType(this,'merchant-routing-form')">
                                                                <option value="">--Select--</option>
                                                                @foreach(App\User::get_merchant_gids() as $index => $merchant)
                                                                    <option value="{{$merchant->id}}">{{$merchant->merchant_gid}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="merchant_id_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">Business Type:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <select name="business_type_id" id="business_type_id" class="form-control" required="required" readonly>
                                                                <option value="">--Select--</option>
                                                                @foreach(App\BusinessType::business_type() as $index => $businesstype)
                                                                    <option value="{{$businesstype->id}}">{{$businesstype->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                         </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">CC Card:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <select name="cc_card" id="cc_card" class="form-control" required="required">
                                                                <option value="">--Select--</option>
                                                                @foreach($vendor_banks as $index => $vendor)
                                                                    <option value="{{$vendor->id}}">{{$vendor->bank_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="cc_card_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">DC Card:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <select name="dc_card" id="dc_card" class="form-control" required="required">
                                                                <option value="">--Select--</option>
                                                                @foreach($vendor_banks as $index => $vendor)
                                                                    <option value="{{$vendor->id}}">{{$vendor->bank_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="dc_card_error" class="text-danger"></div>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">Net Banking:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <select name="net" id="net" class="form-control" required="required">
                                                                <option value="">--Select--</option>
                                                                @foreach($vendor_banks as $index => $vendor)
                                                                    <option value="{{$vendor->id}}">{{$vendor->bank_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="net_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">Upi:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <select name="upi" id="upi" class="form-control" required="required">
                                                                <option value="">--Select--</option>
                                                                @foreach($vendor_banks as $index => $vendor)
                                                                    <option value="{{$vendor->id}}">{{$vendor->bank_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="upi_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-fit">
                                                        <label for="input" class="col-sm-3 control-label">QRCode:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <select name="qrcode" id="qrcode" class="form-control" required="required">
                                                                <option value="">--Select--</option>
                                                                @foreach($vendor_banks as $index => $vendor)
                                                                    <option value="{{$vendor->id}}">{{$vendor->bank_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="qrcode_error" class="text-danger"></div>
                                                        </div>
                                                        <label for="input" class="col-sm-3 control-label">Wallet:<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <select name="wallet" id="wallet" class="form-control" required="required">
                                                                <option value="">--Select--</option>
                                                                @foreach($vendor_banks as $index => $vendor)
                                                                    <option value="{{$vendor->id}}">{{$vendor->bank_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="wallet_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="">
                                                <div class="modal-footer">
                                                    <div class="col-md-2 col-md-offset-9">
                                                        <input type="submit" class="btn btn-primary" value="Save Route">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            @break
                            @case("3")
                            <div id="{{str_replace(' ','-',strtolower($value->link_name))}}" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0)" class="btn btn-primary pull-right btn-sm margin-bottom-lg" id="call-cashfree-route-modal">Add Cash Free Routing</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="paginate_cashfreeroute">
    
                                        </div>
                                    </div>
                                </div>

                                <div class="modal" id="cashfree-route-modal">
                                    <div class="modal-dialog modal-fit">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Merchant Cash Free Routing</h4>
                                            </div>
                                            <div id="cashfree-route-add-succsess-response" class="text-center text-success"></div>
                                            <div id="cashfree-route-add-fail-response" class="text-center text-danger"></div>
                                            <form class="form-horizontal" id="cashfree-routing-form">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="input" class="col-sm-3 control-label">Merchant Id:</label>
                                                        <div class="col-sm-8">
                                                            <select name="merchant_id" id="merchant_id" class="form-control" required="required" onchange="getMerchantBusinessType(this,'merchant-routing-form')">
                                                                <option value="">--Select--</option>
                                                                @foreach(App\User::get_merchant_gids() as $index => $merchant)
                                                                    <option value="{{$merchant->id}}">{{$merchant->merchant_gid}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="merchant_id_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input" class="col-sm-3 control-label">App Id:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="app_id" id="app_id" class="form-control" value="" required>
                                                            <div id="app_id_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input" class="col-sm-3 control-label">Secrete Key:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="secret_key" id="secret_key" class="form-control" value="" required>
                                                            <div id="app_id_error" class="text-danger"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="">
                                                <div class="modal-footer">
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <input type="submit" class="btn btn-primary" value="Save CashFree Route">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            @break
                            @default
                            @break
                        @endswitch
                    @endforeach
                    @else
                        <div id="{{str_replace(' ','-',strtolower($sublink_name))}}" class="tab-pane fade in active">
                                                    
                        </div>
                    @endif
                </div>
            </div>
        </div>    
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded",function(){
        merchantCharges();
        $('[data-toggle="merchant-charges-info"]').popover(); 
    });
</script>
@endsection
