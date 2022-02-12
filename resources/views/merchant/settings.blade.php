@extends('layouts.merchantcontent')
@section('merchantcontent')

<!--Module Banner-->
<div id="buton-1">
    <button class="btn btn-primary" id="Show">Show</button>
<button  class="btn btn-primary" id="Hide">Remove</button>
    </div>
        
<section id="about-1" class="about-1">
    <div class="container-1">

    <div class="row">
       
        <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
        <div class="content-1 pt-4 pt-lg-0">
            <h3>Welcome to Setting Dashboard</h3>
            <p class="font-italic">
            Get started with accepting payments right away</p>

        <p>You are just one step away from activating your account to accept domestic and international payments from your customers. We just need a few more details</p>
        </div>
        </div>
        <div class="col-lg-6" data-aos="zoom-in">
        <img src="/assets/img/hero-banner.png" width="350" class="img-fluid" id="img-dash" alt="merchant-settings.png">
        </div>
    </div>

    </div>
</section>
<!--Module Banner-->
    <div class="row">
        <div class="col-sm-12 padding-left-30">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs" id="transaction-tabs">
                        <li class="active"><a data-toggle="tab" class="show-cursor" data-target="#business-info">Business Details</a></li>
                        <li><a data-toggle="tab" class="show-cursor" data-target="#web-hooks">Webhooks</a></li>
                        <li><a data-toggle="tab" class="show-cursor" data-target="#api-keys">Api Keys</a></li>
                        <li><a data-toggle="tab" class="show-cursor" data-target="#reminders">Reminders</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="business-info" class="tab-pane fade in active">
                            @if(!empty($formdata["merchant_business"]))
                                @foreach($formdata["merchant_business"] as $merchantbusiness) 
                                    <div class="row margin-bottom-lg">
                                        <div class="col-sm-12">
                                            <form method="POST" class="form-horizontal" role="form" id="company-logo-form" enctype="multipart/form-data">                                    
                                                <strong class="padding-left-30">Business Logo</strong>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="business_logo">Image:</label>
                                                    <div class="col-sm-4">
                                                        <input type="file" name="business_logo" id="file-1" class="logo-inputfile form-control inputfile-2 col-sm-4" data-multiple-caption="{count} files selected" multiple />
                                                        <label for="file-1" class="custom-file-upload">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                                            </svg> 
                                                            <span id="business_logo-file">
                                                                @if(!empty($merchantbusiness->business_logo))
                                                                    {{basename($merchantbusiness->business_logo)}}
                                                                @else
                                                                    Choose a file&hellip;
                                                                @endif
                                                            </span>
                                                        </label>
                                                        @if(!empty($merchantbusiness->business_logo))
                                                        <button class="button124" data-name="business_logo" onclick="removeMerchantLogo('{{$merchantbusiness->id}}','{{basename($merchantbusiness->business_logo)}}')"> 
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        @endif
                                                        <div id="business_logo_error"></div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        @if(!empty($merchantbusiness->business_logo))
                                                            <a href="/download/merchant-logo/{{basename($merchantbusiness->business_logo)}}" >Download</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                {{ csrf_field() }}                                        
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form class="form-horizontal" id="personal-info-form">
                                                <strong class="padding-left-30">Business Info</strong>
                                                
                                                        <div class="form-group"> 
                                                            <label class="control-label col-sm-3" for="name">Business Type:</label>
                                                            <div class="col-sm-3">
                                                            <label for="input-id" class="col-sm-12">
                                                                @foreach($formdata["btype"] as $type)
                                                                    @if($type->id == $merchantbusiness->business_type_id)
                                                                    {{$type->type_name}}
                                                                    @endif
                                                                @endforeach
                                                            </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-3" for="email">Business Category:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">
                                                                    @foreach($formdata["bcategory"] as $bcategory)
                                                                        @if($bcategory->id == $merchantbusiness->business_category_id)
                                                                            {{$bcategory->category_name}}
                                                                        @endif
                                                                    @endforeach
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div id="sub-category-div" class="form-group {{ ($merchantbusiness->business_sub_category_id!='')?'':display-none}}">
                                                            <label class="control-label col-sm-3" for="email">Business Sub Category:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">
                                                                    @foreach($formdata["bsubcategory"] as $bsubcategory)
                                                                        @if($bsubcategory->id == $merchantbusiness->business_sub_category_id)
                                                                        {{$bsubcategory->sub_category_name}}
                                                                        @endif
                                                                    @endforeach 
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="web-app-url" class="control-label col-sm-3">WebApp/Url:</label>
                                                            <label for="input-id" class="col-sm-2">{{($merchantbusiness->webapp_exist == 'Y')?$merchantbusiness->webapp_url:'We dont have website'}}</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-3 col-sm-offset-12">
                                                                <label for="input-id" class="col-sm-2 {{($merchantbusiness->webapp_exist == 'N')?'display-none':''}}">{{$merchantbusiness->webapp_url==''?' ':$merchantbusiness->webapp_url}}</label>
                                                            </div>
                                                        </div>
                                                    <strong class="padding-left-30">Business Detail Info</strong>
                                                        <div id="form-business-name" class="form-group {{$merchantbusiness->business_name ==''?'display-none':''}}"> 
                                                            <label class="control-label col-sm-3" for="pan-number">Business Name:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">{{$merchantbusiness->business_name != ''?$merchantbusiness->business_name:' '}}</label>
                                                            </div>
                                                        </div>
                                                        <div id="form-llpin-number" class="form-group {{$merchantbusiness->llpin_number ==''?'display-none':''}}"> 
                                                            <label class="control-label col-sm-3" for="pan-number">LLPIN:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">{{$merchantbusiness->llpin_number != ''?$merchantbusiness->llpin_number:' '}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label class="control-label col-sm-3" for="pan-number">Company PAN Number:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">{{$merchantbusiness->comp_pan_number != ''?$merchantbusiness->comp_pan_number:' '}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label class="control-label col-sm-3" for="pan-number">Company GST No:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">{{$merchantbusiness->comp_gst != ''?$merchantbusiness->comp_gst:' '}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label class="control-label col-sm-3" for="pan-number">Authorized Signatory PAN No:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">{{$merchantbusiness->mer_pan_number != ''?$merchantbusiness->mer_pan_number:' '}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label class="control-label col-sm-3" for="pan-number">Authorized Signatory Aadhar No:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">{{$merchantbusiness->mer_aadhar_number != ''?$merchantbusiness->mer_aadhar_number:' '}}</label>
                                                            </div>
                                                        </div>
                                                        <div id="form-pan-holder" class="form-group {{$merchantbusiness->mer_name == '' ?'display-none':''}}">
                                                            <label class="control-label col-sm-3" for="pan-holder-name">Authorized Signatory Name:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">{{$merchantbusiness->mer_name != ''?$merchantbusiness->mer_name:' '}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-3" for="address">Address:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">
                                                                    {{$merchantbusiness->address == '' ?' ':$merchantbusiness->address}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-3" for="pincode">Pincode:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">{{$merchantbusiness->pincode != ''?$merchantbusiness->pincode:' '}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-3" for="city">City:</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">{{$merchantbusiness->city != ''?$merchantbusiness->city:' '}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-3" for="state">State</label>
                                                            <div class="col-sm-3">
                                                                <label for="input-id" class="col-sm-12">
                                                                    @foreach($formdata["statelist"] as $statelist)
                                                                        @if($statelist->id == $merchantbusiness->state)
                                                                        {{$statelist->state_name}}
                                                                        @endif
                                                                    @endforeach
                                                                </label>
                                                            </div>
                                                        </div>
                                                
                                            </form>
                                            <!-- show personal details response modal starts-->
                                            <div id="personal-message-modal" class="modal">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <strong id="personal-response-message"></strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form>
                                                                <input type="submit" class="btn btn-primary btn-sm" value="OK" onlick="location.reload();$('#personal-message-modal').modal('hide')"/>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Item personal details response modal ends-->
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div id="web-hooks" class="tab-pane fade">
                             <div class="tab-button">
                                <div class="btn btn-primary btn-sm" id="call-webhook-modal">{{count($webhookdata) > 0?'Edit Webhook':'Add Webhook'}}</div>
                             </div>
                             <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Webhookurl</th>
                                                <th>Active</th>
                                                <th>No Events Added</th>
                                                <th>Created Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="web-hook-details">
                                            
                                        </tbody>
                                    </table>
                                </div>
                             </div>
                        </div>
                        <!-- Webhooks Modal -->
                        <div id="webhook-modal" class="modal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Webhooks Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Webhook</h4>
                                </div>
                                <div id="ajax-webhook-response" class="text-center"></div>
                                <form class="form-horizontal" id="webhook-form">
                                    @if(count($webhookdata) > 0)
                                    @foreach($webhookdata as $hook)
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Webhook URL <span class="mandatory">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="webhook_url" id="webhook_url" value="{{$hook->webhook_url}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="secretkey" class="control-label col-sm-4">Secret key</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="secret_key" id="secret_key" value="{{$hook->secret_key}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="active" class="control-label  col-sm-4">Webhook active</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="is_active" id="is_active" value="Y" {{ ($hook->is_active == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <strong>Events:</strong>
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Payment Failed</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="payment_failed" id="payment_failed" value="Y" {{ ($hook->payment_failed == 'Y') ?'checked':''}}>
                                                </div>
                                                <label for="webhookurl" class="control-label col-sm-4">Payment Captured</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="payment_captured" id="payment_captured" value="Y" {{ ($hook->payment_captured == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Transfer Processed</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="transfer_processed" id="transfer_processed" value="Y" {{ ($hook->transfer_processed == 'Y') ?'checked':''}}>
                                                </div>
                                                <label for="webhookurl" class="control-label col-sm-4">Refund Processed</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="refund_processed" id="refund_processed" value="Y" {{ ($hook->refund_processed == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Refund Created</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="refund_created" id="refund_created" value="Y" {{ ($hook->refund_created == 'Y') ?'checked':''}}>
                                                </div>
                                                <label for="webhookurl" class="control-label col-sm-4">Refund Speed Changed</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="refund_speed_changed" id="refund_speed_changed" value="Y" {{ ($hook->refund_speed_changed == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Order Paid</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="order_paid" id="order_paid" value="Y" {{ ($hook->order_paid == 'Y') ?'checked':''}}>
                                                </div>
                                                <label for="webhookurl" class="control-label col-sm-4">Dispute Created</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="dispute_created" id="dispute_created" value="Y" {{ ($hook->dispute_created == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Dispute Won</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="dispute_won" id="dispute_won" value="Y" {{ ($hook->dispute_won == 'Y') ?'checked':''}}>
                                                </div>
                                                <label for="webhookurl" class="control-label col-sm-4">Dispute Lost</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="dispute_lost" id="dispute_lost" value="Y" {{ ($hook->dispute_lost == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Dispute Closed</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="dispute_closed" id="dispute_closed" value="Y" {{ ($hook->dispute_closed == 'Y') ?'checked':''}}>
                                                </div>
                                                <label for="webhookurl" class="control-label col-sm-4">Dispute Lost</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="dispute_lost" id="dispute_lost" value="Y" {{ ($hook->dispute_lost == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Dispute Won</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="dispute_won" id="dispute_won" value="Y" {{ ($hook->dispute_won == 'Y') ?'checked':''}}>
                                                </div>
                                                <label for="webhookurl" class="control-label col-sm-4">Settlement Procssed</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="settlement_processed" id="settlement_processed" value="Y" {{ ($hook->settlement_processed == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Invoice Paid</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="invoice_paid" id="invoice_paid" value="Y" {{ ($hook->invoice_paid == 'Y') ?'checked':''}}>
                                                </div>
                                                <label for="webhookurl" class="control-label col-sm-4">Invoice Partially Paid</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="invoice_partially_paid" id="invoice_partially_paid" value="Y" {{ ($hook->invoice_partially_paid == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Invoice Expired</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="invoice_expired" id="invoice_expired" value="Y" {{ ($hook->invoice_expired == 'Y') ?'checked':''}}>
                                                </div>
                                                <label for="webhookurl" class="control-label col-sm-4">Paylink Paid</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="paylink_paid" id="paylink_paid" value="Y" {{ ($hook->paylink_paid == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="webhookurl" class="control-label col-sm-4">Paylink Partially Paid</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="paylink_partially_paid" id="paylink_partially_paid" value="Y" {{ ($hook->paylink_partially_paid == 'Y') ?'checked':''}}>
                                                </div>
                                                <label for="webhookurl" class="control-label col-sm-4">Paylink Cancelled</label>
                                                <div class="col-sm-2 text-center">
                                                    <input type="checkbox" class="center-checkbox" name="paylink_cancelled" id="paylink_cancelled" value="Y" {{ ($hook->paylink_cancelled == 'Y') ?'checked':''}}>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="id" value="{{$hook->id}}">
                                            {{csrf_field()}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                            <input type="submit" class="btn btn-success" value="Submit">
                                        </div>
                                    @endforeach
                                    @else
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Webhook URL <span class="mandatory">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="webhook_url" id="webhook_url" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="secretkey" class="control-label col-sm-4">Secret key</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="secret_key" id="secret_key" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="active" class="control-label  col-sm-4">Webhook active</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="is_active" id="is_active" value="Y">
                                            </div>
                                        </div>
                                        <strong>Events:</strong>
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Payment Failed</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="payment_failed" id="payment_failed" value="Y">
                                            </div>
                                            <label for="webhookurl" class="control-label col-sm-4">Payment Captured</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="payment_captured" id="payment_captured" value="Y">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Transfer Processed</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="transfer_processed" id="transfer_processed" value="Y">
                                            </div>
                                            <label for="webhookurl" class="control-label col-sm-4">Refund Processed</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="refund_processed" id="refund_processed" value="Y">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Refund Created</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="refund_created" id="refund_created" value="Y">
                                            </div>
                                            <label for="webhookurl" class="control-label col-sm-4">Refund Speed Changed</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="refund_speed_changed" id="refund_speed_changed" value="Y">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Order Paid</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="order_paid" id="order_paid" value="Y">
                                            </div>
                                            <label for="webhookurl" class="control-label col-sm-4">Dispute Created</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="dispute_created" id="dispute_created" value="Y">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Dispute Won</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="dispute_won" id="dispute_won" value="Y">
                                            </div>
                                            <label for="webhookurl" class="control-label col-sm-4">Dispute Lost</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="dispute_lost" id="dispute_lost" value="Y">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Dispute Closed</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="dispute_closed" id="dispute_closed" value="Y">
                                            </div>
                                            <label for="webhookurl" class="control-label col-sm-4">Dispute Lost</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="dispute_lost" id="dispute_lost" value="Y">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Dispute Won</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="dispute_won" id="dispute_won" value="Y">
                                            </div>
                                            <label for="webhookurl" class="control-label col-sm-4">Settlement Procssed</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="settlement_processed" id="settlement_processed" value="Y">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Invoice Paid</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="invoice_paid" id="invoice_paid" value="Y">
                                            </div>
                                            <label for="webhookurl" class="control-label col-sm-4">Invoice Partially Paid</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="invoice_partially_paid" id="invoice_partially_paid" value="Y">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Invoice Expired</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="invoice_expired" id="invoice_expired" value="Y">
                                            </div>
                                            <label for="webhookurl" class="control-label col-sm-4">Paylink Paid</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="paylink_paid" id="paylink_paid" value="Y">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="webhookurl" class="control-label col-sm-4">Paylink Partially Paid</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="paylink_partially_paid" id="paylink_partially_paid" value="Y">
                                            </div>
                                            <label for="webhookurl" class="control-label col-sm-4">Paylink Cancelled</label>
                                            <div class="col-sm-2 text-center">
                                                <input type="checkbox" class="center-checkbox" name="paylink_cancelled" id="paylink_cancelled" value="Y">
                                            </div>
                                        </div>
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" id="id" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                        <input type="submit" class="btn btn-success" value="Submit">
                                    </div>
                                    @endif
                                </form>
                                </div>

                            </div>
                        </div>
                        <div id="api-keys" class="tab-pane fade">
                            <div id="merchant-api-view">
                                <div class="row">
                                    <div class="col-sm-12 text-center" id="generate-api-response">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tab-button {{count($api_info)>0?'display-none':''}}">
                                        <div class="btn btn-primary btn-sm" id="generate-api">Generate</div>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Api Key Id</th>
                                                    <th>Created Date</th>
                                                    <th>Action</th>
                                                    <th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($api_info)>0)
                                                    @foreach($api_info as $api)
                                                        <tr>
                                                            <td>{{$api->api_key}}</td>
                                                            <td>{{$api->created_date}}</td>
                                                            <td><button class="btn btn-primary btn-sm" onclick="generateApi('{{$api->id}}')">Regenerate Api</button></td>
                                                            <td><button class="btn btn-primary btn-sm" onclick="viewApi('{{$api->id}}')">View</button></td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="4" class="text-center">No Data Found</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="update-api-modal" class="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Generated Api</h4>
                                    </div>
                                    <form class="form-horizontal" id="update-api-form">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="apikeyid" class="control-label col-sm-4">Key Id:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="api_key" id="api_key" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="apikeyid" class="control-label col-sm-4">Secret Key:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="api_secret" id="api_secret" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="apikeyid" class="control-label col-sm-4">Request Hash Key:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="request_hashkey" id="request_hashkey" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="apikeyid" class="control-label col-sm-4">Request Salt Key:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="request_salt_key" id="request_salt_key" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="apikeyid" class="control-label col-sm-4">Response Hash Key:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="response_hashkey" id="response_hashkey" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="apikeyid" class="control-label col-sm-4">Response Salt Key:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="response_salt_key" id="response_salt_key" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="apikeyid" class="control-label col-sm-4">AES Request Key:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="encryption_request_key" id="encryption_request_key" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="apikeyid" class="control-label col-sm-4">AES Response Key:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="encryption_response_key" id="encryption_response_key" value="" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="reminders" class="tab-pane fade">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" id="remainder-form">
                                        <div class="form-group">
                                            <label for="plwed" class="control-label col-sm-2">Enabled Reminders </label>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="is_reminders_enabled" id="is_reminders_enabled">
                                                    <option value="Y" {{ Auth::user()->is_reminders_enabled == 'Y'?'selected':''}}>Yes</option>
                                                    <option value="N" {{ Auth::user()->is_reminders_enabled == 'N'?'selected':''}}>No</option>
                                                </select>
                                                {{csrf_field()}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div id="display-form-error">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="display-reminders">
                                    <div id="expiry-form-ajax-success-message" class="text-center"></div>
                                    <form class="form-horizontal" id="expiry-form">
                                    <div class="row top-margin-20">
                                        <div class="col-sm-3 col-sm-offset-1">
                                            <label for="plwed" class="control-label">Paylink with expiry</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="btn btn-link" id="add-plwed-options">+Add Reminders</div>
                                            <div id="append-plwed-options">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row top-margin-20">
                                        <div class="col-sm-3 col-sm-offset-1">
                                            <label for="plwoed" class="control-label">Paylink without expiry</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="btn btn-link" id="add-plwoed-options">+Add Reminders</div> 
                                            <div id="append-plwoed-options">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row top-margin-20">
                                        <div class="col-sm-3 col-sm-offset-1">
                                        <label for="plwed" class="control-label">Sent reminders via</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-3">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="send_sms" id="send_sms" class="form-control" value="Y">
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Sms
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="send_email" id="send_email" class="form-control" value="Y">
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Email
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                    <div class="row top-margin-20">
                                        <div class="col-sm-6 col-sm-offset-4">
                                            <input class="btn btn-primary" id="add-reminder-btn" type="submit" value="Add Reminder">
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="products" class="tab-pane fade">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row padding-10">
                                        <div class="col-sm-12">
                                            <div class="pull-right">
                                                <button class="btn btn-primary" id="call-product-modal">Add Product</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Product Id</th>
                                                        <th>Product Title</th>
                                                        <th>Product Price</th>
                                                        <th>Product Description</th>
                                                        <th>Product Status</th>
                                                        <th>Created Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="producttablebody">
                                                
                                                </tbody>
                                            </table>
                                           
                                        </div>
                                    </div>
                                    <!-- Add Product Data Modal Starts-->
                                    <div id="add-product-modal" class="modal" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Product</h4>
                                            </div>
                                            <form class="form-horizontal" id="add-product-form">
                                                <div class="modal-body">
                                                    <div id="ajax-product-response" class="text-center"></div>
                                                    <div class="form-group">
                                                        <label for="produttitle" class="control-label col-sm-3">Title</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="product_title" id="product_title" value=""> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="produtprice" class="control-label col-sm-3">Price</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="product_price" id="product_price" value=""> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="productdescription" class="control-label col-sm-3">Description</label>
                                                        <div class="col-sm-5">
                                                            <textarea name="product_description" id="product_description" cols="20" rows="4" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    {{csrf_field()}}
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                                </div>
                                            </form>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Add Product Data Modal Ends-->
                                    <!-- Update Product Data Modal Starts-->
                                    <div id="update-product-modal" class="modal" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Edit Product</h4>
                                            </div>
                                            <form class="form-horizontal" id="update-product-form">
                                                <div class="modal-body">
                                                    <div id="ajax-update-product-response" class="text-center"></div>
                                                    <div class="form-group">
                                                        <label for="produttitle" class="control-label col-sm-3">Title</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="product_title" id="product_title" value=""> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="produtprice" class="control-label col-sm-3">Price</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="product_price" id="product_price" value=""> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="productdescription" class="control-label col-sm-3">Description</label>
                                                        <div class="col-sm-5">
                                                            <textarea name="product_description" id="product_description" cols="20" rows="4" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    {{csrf_field()}}
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" id="id" value="">
                                                    <input type="submit" class="btn btn-primary" value="Update" />
                                                </div>
                                            </form>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Update Product Data Modal Ends-->
                                    <!-- Delete Product Data modal starts-->
                                    <div id="delete-product-modal" class="modal">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        Are you sure? would you like to delete Product&nbsp;<strong id="delte-item-name"></strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form id="product-delete-form">
                                                            <input type="hidden" name="id" value="">
                                                            {{csrf_field()}}
                                                            <input type="submit" class="btn btn-danger" value="Delete"/>
                                                            <button type="button" data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Delete Product Data modal ends-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
@endsection