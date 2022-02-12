@php
    use \App\Http\Controllers\MerchantController;

    $per_page = MerchantController::page_limit(); 
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
                            <li class="active"><a data-toggle="tab" class="show-cursor" data-target="#{{str_replace(' ','-',strtolower($value->link_name))}}">{{$value->link_name}}</a></li> 
                        @else
                        <li><a data-toggle="tab" class="show-pointer" data-target="#{{str_replace(' ','-',strtolower($value->link_name))}}">{{$value->link_name}}</a></li>
                        @endif
                    @endforeach
                    @else
                        <li class="active"><a data-toggle="tab" class="show-cursor" data-target="#{{str_replace(' ','-',strtolower($sublink_name))}}">{{$sublink_name}}</a></li> 
                    @endif
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    @if(count($sublinks) > 0)
                    @foreach($sublinks as $index => $value)
                        @switch(str_replace(' ','-',strtolower($value->link_name)))
                            @case("direct-expense-supplier-invocie-booking")
                                <div id="{{str_replace(' ','-',strtolower($value->link_name))}}" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="col-sm-4">
                                                <select name="page_limit" class="form-control" onchange="getAllItems($(this).val())">
                                                    @foreach($per_page as $index => $page)
                                                        <option value="{{$index}}">{{$page}}</option>
                                                    @endforeach
                                                </select>
                                            </div>   
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="search-box">
                                                <form action="">
                                                    <input type="search" placeholder="Search" onkeyup="SearchRecord('supexps',this)">
                                                    <i class="fa fa-search"></i>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row padding-10">
                                        <div class="col-sm-12">
                                            <a href="{{route('create-supexp-invoice')}}" class="btn btn-primary pull-right btn-sm">New Supplier Expensive</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="paginate_supexps">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                            @case("supplier-debit-note-credit-note-booking")
                                <div id="{{str_replace(' ','-',strtolower($value->link_name))}}" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="col-sm-4">
                                                <select name="page_limit" class="form-control" onchange="getAllItems($(this).val())">
                                                    @foreach($per_page as $index => $page)
                                                        <option value="{{$index}}">{{$page}}</option>
                                                    @endforeach
                                                </select>
                                            </div>   
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="search-box">
                                                <form action="">
                                                    <input type="search" placeholder="Search" onkeyup="SearchRecord('supnotes',this)">
                                                    <i class="fa fa-search"></i>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row padding-10">
                                        <div class="col-sm-12">
                                            <a href="{{route('new-debit-note')}}" class="btn btn-primary pull-right btn-sm">New Note</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="paginate_supnotes">
        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                        
                            @default
                        @endswitch
                    @endforeach
                    @else
                        <div id="{{str_replace(' ','-',strtolower($sublink_name))}}" class="tab-pane fade in active">
                            @if(isset($id))
                                @include('employee.'.$id)
                            @endif                            
                        </div>
                    @endif
                </div>
            </div>
        </div>    
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded",function(){
        getAllSupExpInvoice();
    });
</script>
@endsection
