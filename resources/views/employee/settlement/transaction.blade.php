@php
    use App\User;
    $merchants = User::get_merchant_options();
@endphp
@extends('layouts.employeecontent')
@section('employeecontent')
<div class="row">
    <div class="col-sm-12 padding-20">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs" id="transaction-tabs">
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
                        <li><a data-toggle="tab" class="show-pointer" data-target="#vendor-adjustments">Vendor Adjustments</a></li>
                        <li><a data-toggle="tab" class="show-pointer" data-target="#rupayapay-adjustments">Rupayapay Adjustments</a></li>
                    @endif
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    @if(count($sublinks) > 0)
                    @foreach($sublinks as $index => $value)
                        @if($index == 0)
                        <div id="{{str_replace(' ','-',strtolower($value->link_name))}}" class="tab-pane fade in active">
                        
                        </div>
                        @else
                        <div id="{{str_replace(' ','-',strtolower($value->link_name))}}" class="tab-pane fade"> 
                        
                        </div>
                        @endif
                    @endforeach 
                    @else
                        <div id="{{str_replace(' ','-',strtolower($sublink_name))}}" class="tab-pane fade in active">
                            <div class="src">
                                <form id="transaction-form">
                                    <input class="form-control" id="trans_date_range" name="trans_date_range" placeholder="MM/DD/YYYY" type="text" value="">
                                    <input type="hidden" name="trans_from_date" value="{{session()->get('fromdate')}}">
                                    <input type="hidden" name="trans_to_date" value="{{session()->get('todate')}}">
                                    <input type="hidden" name="perpage" value="10">
                                    <input type="hidden" name="transaction_page" value="transactions">
                                    <i class="fa fa-calendar"></i>
                                    {{csrf_field()}} 
                                </form>
                            </div>
                            <div class="row">
                               <div class="col-sm-12">
                                 <div class="row margin-bottom-lg"> 
                                    <div class="col-sm-12">
                                        <!-- <a href="{{route('add-new-settlement')}}" class="btn btn-primary btn-sm pull-right margin-right-md">New Settlement</a>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm pull-right margin-right-md" onclick="bulkSettlement();">Bulk Settlement</a> -->

                                        <form id="transaction-download-form" action="{{route('download-transactiondata')}}" method="POST" role="form">
                                            <input type="hidden" name="trans_from_date" id="input_trans_from_date" class="form-control" value="{{session()->get('fromdate')}}">
                                            <input type="hidden" name="trans_to_date" id="input_trans_to_date" class="form-control" value="{{session()->get('todate')}}">
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-primary btn-sm">Download Excel</button>
                                        </form>
                                        
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm pull-right margin-right-md" id="call-adjustment-modal">Bulk Adjustment</a>
                                     </div>
                                 </div>
                                 <div id="paginate_alltransaction">

                                </div>
                               </div>
                           </div>
                           <!-- Adjustment created modal starts-->
                            <div class="modal" id="adjusttrans-add-response-message-modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Vendor Adjustment Response</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Transaction Id</th>
                                                        <th>Adjustment Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="adjustment-response-rows">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Adjustment created modal ends-->
                            
                            <div class="modal" id="adjustment-select-option-modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="adjustment-select-form" method="POST" class="form-horizontal" role="form">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Adjustment</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-6">
                                                                <div class="checkbox"> 
                                                                    <label>
                                                                        <input type="checkbox" name="adjustment" id="vendor" class="form-control" value="vendor">
                                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                        Vendor Adjustment
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="adjustment" id="rupayapay" class="form-control" value="rupayapay">
                                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                        Rupayapay Adjustment
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6 col-sm-offset-5">
                                                        <button type="submit" class="btn btn-primary btn-sm">Do Adjustment</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                                     
                        </div>
                        <div id="vendor-adjustments" class="tab-pane fade in">
                            <div class="src">
                                <form id="vendor-adjustment-form">
                                    <input class="form-control" id="trans_date_range" name="trans_date_range" placeholder="MM/DD/YYYY" type="text" value="">
                                    <input type="hidden" name="trans_from_date" value="{{session('trans_from_date')}}">
                                    <input type="hidden" name="trans_to_date" value="{{session('trans_to_date')}}">
                                    <input type="hidden" name="perpage" value="10">
                                    <input type="hidden" name="transaction_page" value="ryapayadjustment">
                                    <i class="fa fa-calendar"></i>
                                    {{csrf_field()}} 
                                </form>
                            </div>
                            <div class="row margin-bottom-lg">
                                <div class="col-sm-12">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm pull-right margin-right-md" onclick="bulkRupayapayAdjustments();">Rupayapay Adjustment</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="paginate_vendoradjustment">

                                    </div>
                                </div> 
                            </div>                         
                         </div>
                        <div id="rupayapay-adjustments" class="tab-pane fade in">
                            <div class="src">
                                <form id="rupayapay-adjustment">
                                    <input class="form-control" id="trans_date_range" name="trans_date_range" placeholder="MM/DD/YYYY" type="text" value="">
                                    <input type="hidden" name="trans_from_date" value="{{session('trans_from_date')}}">
                                    <input type="hidden" name="trans_to_date" value="{{session('trans_to_date')}}">
                                    <input type="hidden" name="perpage" value="10">
                                    <i class="fa fa-calendar"></i>
                                    {{csrf_field()}} 
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="paginate_ryapayadjustment">

                                    </div>
                                </div> 
                            </div>                         
                        </div>
                    @endif
                </div>
                 <!-- Porder created modal starts-->
                 <div id="adjustment-alert-modal" class="modal">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body">
                                <strong id="adjustment-alert-message"></strong>
                            </div>
                            <div class="modal-footer">
                                <form>
                                    <input type="submit" class="btn btn-primary btn-sm" value="OK" onlick="location.refresh();"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Porder created modal ends-->
                <!-- Porder created modal starts-->
                <div id="adjustment-alert" class="modal">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body">
                                <strong id="adjustment-alert-show"></strong>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Porder created modal ends-->
                <div class="modal" id="rupayapay-adjustment-add-response-message-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Vendor Adjustment Response</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Transaction Id</th>
                                            <th>Adjustment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rupayapay-adjustment-response-rows">
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <form>
                                    <input type="submit" class="btn btn-primary btn-sm" value="Close" onlick="location.refresh();"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded",function(e){
        //getAdjustmentDetails();
        getMerchantTransactionsByDate();
    });
</script>
@endsection
