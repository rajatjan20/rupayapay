@php
    use App\Http\Controllers\MerchantController;

    $per_page = MerchantController::page_limit();
@endphp
@extends('layouts.merchantcontent')
@section('merchantcontent')
<!--Module Banner-->
<div id="buton-1">
    <button class="btn btn-primary" id="Show">Show</button>
    <button  class="btn btn-danger" id="Hide">Remove</button>
</div>
<section id="about-1" class="about-1">
    <div class="container-1">

        <div class="row">
        
        <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content-1 pt-4 pt-lg-0">
            <h3>Welcome to transaction Dashboard </h3>
            <p class="font-italic">
            Get started with accepting payments right away</p>

            <p>You are just one step away from activating your account to accept domestic and international payments from your customers. We just need a few more details</p>
            </div>
        </div>
        <div class="col-lg-6" data-aos="zoom-in">
            <img src="/assets/img/trans.png" width="400" height="240" class="img-fluid" id="img-dash" alt="merchant-transaction.png">
        </div>
        </div>

    </div>
</section>
<!--Module Banner-->
    <div class="row">
        <div class="col-sm-12 padding-20">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs" id="transaction-tabs">
                        <li class="active"><a data-toggle="tab" class="show-cursor" data-target="#payments">Payments</a></li>
                        <li><a data-toggle="tab" class="show-cursor" data-target="#refunds">Refunds</a></li>
                        <li><a data-toggle="tab" class="show-cursor" data-target="#orders">Orders</a></li>
                        <li><a data-toggle="tab" class="show-cursor" data-target="#disputes">Disputes</a></li>
                    </ul>
                    <form action="" id="transaction-tabs-form" method="POST">
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="payments" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <select name="page_limit" class="form-control" onchange="getAllPayments($(this).val())">
                                                @foreach($per_page as $index => $page)
                                                <option value="{{$index}}">{{$page}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="search-box">
                                        <form action="">
                                            <input type="search" id="transaction-table" placeholder="Search">
                                            <i class="fa fa-search"></i>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="display-block" id="paginate_payment">
                                        
                                    </div>
                                </div>
                                <!-- Transactiond Details Modal -->
                                <div id="transaction-details-modal" class="modal" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Transactiond Details Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Transaction Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" id="edit-transaction-form">
                                                <div class="form-group">
                                                    <label for="transactionid" class="control-label col-sm-4">Transaction Id</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="transaction_gid_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="orderid" class="control-label col-sm-4">Order Id</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="order_gid_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="transactionemail" class="control-label col-sm-4">Transaction Email</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="transaction_email_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="transactioncontact" class="control-label col-sm-4">Transaction Contact</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="transaction_contact_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="transactionamount" class="control-label col-sm-4">Transaction Amount</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="transaction_amount_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="transactionstatus" class="control-label col-sm-4">Transaction Status</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="transaction_status_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createddate" class="control-label col-sm-4">Created Date</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="created_date_label"></label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="refunds" class="tab-pane ">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-sm-4">
                                        <select name="page_limit" class="form-control" onchange="getAllPayments($(this).val())">
                                            @foreach($per_page as $index => $page)
                                            <option value="{{$index}}">{{$page}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="search-box">
                                        <form action="">
                                            <input type="search" id="refund-table" placeholder="Search">
                                            <i class="fa fa-search"></i>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="display-block" id="paginate_refund">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="orders" class="tab-pane ">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-sm-4">
                                        <select name="page_limit" class="form-control" onchange="getAllOrders($(this).val())">
                                            @foreach($per_page as $index => $page)
                                            <option value="{{$index}}">{{$page}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="search-box">
                                        <form action="">
                                            <input type="search" id="order-table" placeholder="Search">
                                            <i class="fa fa-search"></i>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="display-block" id="paginate_order">
                                         
                                    </div>
                                </div>
                                <!-- Order Details Modal -->
                                <div id="order-details-modal" class="modal" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Order Details Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Order Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" id="edit-order-form">
                                                <div class="form-group">
                                                    <label for="orderid" class="control-label col-sm-4">Order Id</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="order_gid_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="transactionid" class="control-label col-sm-4">Transaction Id</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="transaction_gid_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="orderreceipt" class="control-label col-sm-4">Order Receipt</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="order_receipt_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="orderattempts" class="control-label col-sm-4">Order Attempts</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="order_attempts_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="orderamount" class="control-label col-sm-4">Order Amount</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="order_amount_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="orderstatus" class="control-label col-sm-4">Order Status</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="order_status_label"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="createddate" class="control-label col-sm-4">Created Date</label>
                                                    <div class="col-sm-5">
                                                        <label for="" class="cotrol-label col-sm-12" id="created_date_label"></label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="disputes" class="tab-pane">
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-sm-4">
                                        <select name="page_limit" class="form-control" onchange="getAllDisputes($(this).val())">
                                            @foreach($per_page as $index => $page)
                                            <option value="{{$index}}">{{$page}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="search-box">
                                        <form action="">
                                            <input type="search" id="dispute-table" placeholder="Search">
                                            <i class="fa fa-search"></i>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="display-block" id="paginate_dispute">
                                        
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