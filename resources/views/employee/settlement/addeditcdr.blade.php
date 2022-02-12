@php
use App\AppOption;
use App\ryapayAdjustmentTrans;

$types = AppOption::get_ryapay_cdr();
$trans_ids = ryapayAdjustmentTrans::get_ryapay_transactions();
@endphp
@extends('layouts.employeecontent')
@section('employeecontent')
<div class="row">
    <div class="col-sm-12 padding-20">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs" id="transaction-tabs">
                    <li class="active"><a data-toggle="tab" class="show-pointer" data-target="#cdr">New/Edit Chargeback/Dispute/Resolution</a></li> 
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div id="cdr" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{route('cdr-home','ryapay-DlcU03aC')}}" class="btn btn-primary pull-right btn-sm">Go Back</a>
                            </div>
                        </div>
                        @if($form == "create")
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" id="cdr-form" class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Transaction Type:</label>
                                        <div class="col-sm-3">
                                            <select name="cdr_id" id="cdr_id" class="form-control">
                                                <option value="">--Select--</option>
                                                @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->option_value}}</option>
                                                @endforeach;
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Transaction Description:</label>
                                        <div class="col-sm-3">
                                            <textarea name="cdr_desc" id="cdr_desc" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Transaction Number:</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="transaction_gid" id="inputtransaction_gid" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Transaction Date:</label>
                                        <div class="col-sm-3">
                                            <div class="input-group date">
                                                <input type="text" name="transaction_date" id="transaction_date" class="form-control" value="" placeholder="YYYY-MM-DD">
                                                <span class="input-group-addon"><span class="fa fa-calendar show-pointer" onclick="($('#transaction_date')).focus();"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Adjustment:</label>
                                        <div class="col-sm-3">
                                            <select name="adjustment_trans_id" id="adjustment_trans_id" class="form-control">
                                                <option value="">--Select--</option>
                                                @foreach($trans_ids as $trans_id)
                                                <option value="{{$trans_id->id}}">{{$trans_id->transaction_gid}}</option>
                                                @endforeach;
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Total Amount:</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="total_amount" id="total_amount" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Remarks:</label>
                                        <div class="col-sm-3">
                                            <textarea name="remarks" id="remarks" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>                               
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" id="update-cdr-form" class="form-horizontal" role="form">
                                    
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Transaction Type:</label>
                                        <div class="col-sm-3">
                                            <select name="cdr_id" id="cdr_id" class="form-control">
                                                <option value="">--Select--</option>
                                                @foreach($types as $type)
                                                    @if($type->id == $edit_data->cdr_id)
                                                        <option value="{{$type->id}}" selected>{{$type->option_value}}</option>
                                                    @else
                                                        <option value="{{$type->id}}">{{$type->option_value}}</option>
                                                    @endif
                                                @endforeach;
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Transaction Description:</label>
                                        <div class="col-sm-3">
                                            <textarea name="cdr_desc" id="cdr_desc" class="form-control" rows="3">{{$edit_data->cdr_desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Transaction Number:</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="transaction_gid" id="transaction_gid" class="form-control" value="{{$edit_data->transaction_gid}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Transaction Date:</label>
                                        <div class="col-sm-3">
                                            <div class="input-group date">
                                                <input type="text" name="transaction_date" id="transaction_date" class="form-control" value="{{$edit_data->transaction_date}}" placeholder="YYYY-MM-DD">
                                                <span class="input-group-addon"><span class="fa fa-calendar show-pointer" onclick="($('#transaction_date')).focus();"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Adjustment:</label>
                                        <div class="col-sm-3">
                                            <select name="adjustment_trans_id" id="adjustment_trans_id" class="form-control">
                                                <option value="">--Select--</option>
                                                @foreach($trans_ids as $trans_id)
                                                @if($trans_id->id == $edit_data->adjustment_trans_id)
                                                <option value="{{$trans_id->id}}" selected>{{$trans_id->transaction_gid}}</option>
                                                @else
                                                <option value="{{$trans_id->id}}">{{$trans_id->transaction_gid}}</option>
                                                @endif
                                                @endforeach;
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Total Amount:</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="total_amount" id="total_amount" class="form-control" value="{{$edit_data->total_amount}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input" class="col-sm-2 control-label">Remarks:</label>
                                        <div class="col-sm-3">
                                            <textarea name="remarks" id="remarks" class="form-control" rows="3">{{$edit_data->remarks}}</textarea>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                    
                                    <input type="hidden" name="id" id="id" class="form-control" value="{{$edit_data->id}}">
                                    
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                        <!-- Porder created modal starts-->
                        <div id="cdr-add-response-message-modal" class="modal fade">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <strong id="cdr-add-response"></strong>
                                    </div>
                                    <div class="modal-footer">
                                        <form>
                                            <input type="submit" class="btn btn-primary btn-sm" value="OK" onlick="location.reload();"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Porder created modal ends-->                           
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
