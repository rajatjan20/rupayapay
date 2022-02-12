@php
    use \App\Http\Controllers\MerchantController;

    $per_page = MerchantController::page_limit();
@endphp
@extends('layouts.merchantcontent')
@section('merchantcontent')

    <div id="buton-1">
    <button class="btn btn-primary" id="Show">Show</button>
<button  class="btn btn-danger" id="Hide">Remove</button>
    </div>
        
    <section id="about-1" class="about-1">
      <div class="container-1">

        <div class="row">
         
          <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content-1 pt-4 pt-lg-0">
            
              <h3>Welcome to Rupayapay Dashboard </h3>
              <p>Get started with accepting payments right away</p>

                <p>You are just one step away from activating your account to accept domestic and international payments from your customers. We just need a few more details</p>
            </div>
          </div>
          <div class="col-lg-6" data-aos="zoom-in" id="img-dash">
            <img src="/assets/img/dash-bnr.png" width="450" height="280" class="img-fluid"  alt="dash-bnr.png">
          </div>
        </div>

      </div>
    </section>
<!--Module Banner-->
<div class="row">
    <div class="col-sm-12 padding-20">
        <div class="panel panel-default">
            <div class="page-header text-center">
            </div>  
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" class="show-cursor" data-target="#dash-graphs">Graphs</a></li>
                    <li><a data-toggle="tab" class="show-cursor" data-target="#dash-payments">Payments</a></li>
                    <li><a data-toggle="tab" class="show-cursor" data-target="#dash-refunds">Refunds</a></li>
                    <li><a data-toggle="tab" class="show-cursor" data-target="#dash_settlements">Adjustments</a></li>
                    <li><a data-toggle="tab" class="show-cursor" data-target="#dash_logactivities">Login Activities</a></li>
                </ul>
               
                <div class="social-bx tab-content">
                    <div id="dash-graphs" class="tab-pane fade in active">
                        <div class="src">
                            <form id="dashboard-form">
                                <input class="form-control" id="dash_date_range" name="dash_date_range" placeholder="MM/DD/YYYY" type="text" value="">
                                <input type="hidden" name="dash_from_date" value="{{session('dash_from_date')}}">
                                <input type="hidden" name="dash_to_date" value="{{session('dash_to_date')}}">
                                <input type="hidden" name="perpage" value="10">
                                <i class="fa fa-calendar"></i>
                                <input type="hidden" name="module" value="dash_graph">
                                {{csrf_field()}} 
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1 pie-graph">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <select name="dashboar_graph" id="dashboar_graph" class="form-control" onchange="loadPieChart($(this).val());"> 
                                            <option value="1">Transaction Amount Per Month</option>
                                            <option value="2">No Of Transaction Per Month</option>
                                            <option value="3">No Of Settlements Per Month</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box" id="graph-1">
                                    
					           </div>
                            
                            </div>
                            <div class="col-sm-5 col-sm-offset-1">
                            
                                <div class="box" id="graph-2">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1">
                                <div class="box" id="graph-3">
                                   
                                </div>
                            </div>
                            <div class="col-sm-5 col-sm-offset-1">
                                <div class="box" id="graph-4">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dash-payments" class="tab-pane fade">
                        <div class="src">
                            <form id="dashboard-form">
                                <input class="form-control" id="dash_date_range" name="dash_date_range" placeholder="MM/DD/YYYY" type="text" value="">
                                <i class="fa fa-calendar"></i>
                                <input type="hidden" name="module" value="dash_payment">
                                <input type="hidden" name="perpage" value="10">
                                {{csrf_field()}} 
                            </form>
                        </div>
                        <div class="row padding-top-10">
                            <div class="col-sm-6">
                                <div class="col-sm-4">
                                    <select name="page_limit" class="form-control" onchange="setDashboardPageLimit($(this).val())">
                                        @foreach($per_page as $index => $page)
                                        <option value="{{$index}}">{{$page}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="search-box">
                                    <form action="">
                                        <input type="search" id="dash-transaction-table" placeholder="Search">
                                        <i class="fa fa-search"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row padding-top-20">
                            <div class="col-sm-12 col-md-12">
                                <div class="display-block" id="paginate_dash_payment">                                
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Payment Id</th>
                                                    <th>Amount</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>status</th>
                                                    <th>Days Completed</th>
                                                </tr>
                                            </thead>
                                            <tbody id="paymenttable">

                                            </tbody>
                                            <tfoot>
                                                <div></div>
                                            </tfoot>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dash-refunds" class="tab-pane fade">
                    <div class="src">
                        <form id="dashboard-form">
                            <input class="form-control" id="dash_date_range" name="dash_date_range" placeholder="MM/DD/YYYY" type="text" value="">
                            <i class="fa fa-calendar"></i>
                            <input type="hidden" name="module" value="dash_refund">
                            <input type="hidden" name="perpage" value="10">
                            {{csrf_field()}} 
                        </form>
                    </div>
                    <div class="row padding-top-10">
                        <div class="col-sm-6">
                            <div class="col-sm-4">
                                <select name="page_limit" class="form-control" onchange="setDashboardPageLimit($(this).val());">
                                    @foreach($per_page as $index => $page)
                                    <option value="{{$index}}">{{$page}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="search-box">
                                <form action="">
                                    <input type="search" id="dash-refund-table" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row padding-top-20">
                        <div class="col-sm-12 col-md-12">
                            <div class="display-block" id="paginate_dash_refund">
                                
                            </div>
                        </div>
                    </div>
                    </div>
                    <div id="dash_settlements" class="tab-pane fade">
                        <div class="src">
                            <form id="dashboard-form">
                                <input class="form-control" id="dash_date_range" name="dash_date_range" placeholder="MM/DD/YYYY" type="text" value="">
                                <i class="fa fa-calendar"></i>
                                <input type="hidden" name="module" value="dash_settlement">
                                <input type="hidden" name="perpage" value="10">
                                {{csrf_field()}} 
                            </form>
                       </div>
                       <div class="row padding-top-10">
                            <div class="col-sm-6">
                                <div class="col-sm-4">
                                    <select name="page_limit" class="form-control" onchange="setDashboardPageLimit($(this).val());">
                                        @foreach($per_page as $index => $page)
                                        <option value="{{$index}}">{{$page}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="search-box">
                                    <form action="">
                                        <input type="search" id="dash-settlement-table" placeholder="Search">
                                        <i class="fa fa-search"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row padding-top-20">
                            <div class="col-sm-12 col-md-12">
                                <div class="display-block" id="paginate_dash_setllement">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dash_logactivities" class="tab-pane fade">
                        <div class="src">
                            <form id="dashboard-form">
                                <input class="form-control" id="dash_date_range" name="dash_date_range" placeholder="MM/DD/YYYY" type="text" value="">
                                <i class="fa fa-calendar"></i>
                                <input type="hidden" name="module" value="dash_logactivities">
                                <input type="hidden" name="perpage" value="10">
                                {{csrf_field()}} 
                            </form>
                       </div>
                       <div class="row padding-top-10">
                           <div class="col-sm-6">
                                <div class="col-sm-4">
                                    <select name="page_limit" class="form-control" onchange="setDashboardPageLimit($(this).val());">
                                        @foreach($per_page as $index => $page)
                                        <option value="{{$index}}">{{$page}}</option>
                                    @endforeach
                                    </select>
                                </div>
                           </div>
                           <div class="col-sm-6">
                                <div class="search-box">
                                    <form action="">
                                        <input type="search" id="dash-logactivities-table" placeholder="Search">
                                        <i class="fa fa-search"></i>
                                    </form>
                            </div>
                           </div>
                       </div>
                        <div class="row padding-top-20">
                            <div class="col-sm-12">
                                <div class="display-block" id="paginate_dash_logactivities">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="display-block">
                                    <strong>Note:Through online we save three months of login details Through Offline we save 1 Year of login details</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded",function(){
        setDashboardDateRange();
    });
</script>
@endsection


