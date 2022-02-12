@php
    use App\User;
    $merchants = User::get_tmode_docupload_merchants();
@endphp 

@extends('layouts.employeecontent')
@section('employeecontent')
<div class="row">
    <div class="col-sm-12 padding-20">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs" id="transaction-tabs">
                    <li class="active"><a data-toggle="tab" class="show-pointer" data-target="documentt-verify">Document Verify</a></li>  
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div id="#documentt-verify" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{route('merchant-document','ryapay-7WRwwggm')}}" class="btn btn-primary btn-sm pull-right">Go Back</a>
                            </div>
                        </div>
                        <div class="row padding-10">
                            <div class="col-sm-12">
                                @if($module == "docscreen")
                                    @if($form == "create")
                                        <form id="merchant-details-form" method="POST" class="form-horizontal">
                                            @foreach($merchant_details as $index => $merchant_detail)
                                            <div class="form-group">
                                                <label for="input" class="col-sm-2 control-label">{{$merchant_detail->field_label}}:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" id="input" class="form-control" value="{{$merchant_detail->field_value}}">
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="{{$merchant_detail->field_name}}" value="Y" onclick="UpdateRncVerify('{{$merchant_detail->id}}',this)" {{($merchant_detail->field_verified =='Y')?'checked':''}}>
                                                        <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                        No Correction
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="{{$merchant_detail->field_name}}" value="N" onclick="UpdateRncVerify('{{$merchant_detail->id}}',this)" {{($merchant_detail->field_verified =='N')?'checked':''}}>
                                                        <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                        Correction
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </form>
                                        <form id="document-details-form" method="POST" class="form-horizontal">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>File Name</th>
                                                        <th>File</th>
                                                        <th>Document Verified</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($documents as $index => $value)
                                                    <tr>
                                                        <td>{{$value->file_name}}</td>
                                                        <td>
                                                            <div class="col-sm-12">
                                                                <input type="file" name="{{$value->doc_name}}" id="file-{{$index}}" class="inputfile uploadfile form-control inputfile-{{$index}}" data-multiple-caption="{count} files selected" multiple />
                                                                <label for="file-{{$index}}" class="custom-file-upload">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                                                    </svg> 
                                                                    <span id="{{$value->doc_name}}_file">
                                                                        @if(!empty($value->file_ext))
                                                                        <span id="{{$value->doc_name}}_file_not_exist">{{$value->file_name}}</span>
                                                                        @else
                                                                        <span id="{{$value->doc_name}}_file_not_exist">Choose a file...</span>
                                                                        @endif
                                                                    </span>
                                                                </label>
                                                                @if(!empty($value->file_ext))
                                                                <button type="reset" class="button124" data-name="{{$value->file_ext}}" data-id="{{$value->id}}">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                                @endif
                                                                <div id="{{$value->doc_name}}_error"></div>
                                                            </div>
                                                            @if(!empty($value->file_ext))
                                                            <a href="/document-verify/download/merchant-document/{{$folder_name}}/{{$value->file_ext}}">{{$value->file_name}}</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="{{$value->doc_name}}" value="Y" onclick="UpdateDocVerify('{{$value->id}}',this)"; {{($value->doc_verified =='Y')?'checked':''}}>
                                                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                                    No Correction
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="{{$value->doc_name}}" value="N" onclick="UpdateDocVerify('{{$value->id}}',this)"; {{($value->doc_verified =='N')?'checked':''}}>
                                                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                                    Correction
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary pull-right" onclick="callReportModal();">Submit Report</button>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="modal" id="document-response-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Document Status</h4> 
                                    </div>
                                    <div class="modal-body">
                                        <div id="document-response-message"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{route('merchant-document','ryapay-7WRwwggm')}}" class="btn btn-primary btn-sm">Ok</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal" id="report-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Rnc Report To Merchant</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="rnc-report-form" method="POST" class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Note:</label>
                                                <div class="col-sm-9">
                                                    <span class="text-danger">Fill the below textarea if you would like to make a note to merchant via email</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="textarea" class="col-sm-3 control-label">Email Note:</label>
                                                <div class="col-sm-9">
                                                    <textarea name="email_note" id="textarea" class="form-control" rows="6"></textarea>
                                                </div>
                                            </div>
                                            {{csrf_field()}}
                                            <input type="hidden" id="merchant_id" name="merchant_id" value={{$merchant_id}}>
                                            <div class="form-group">
                                                <div class="col-sm-10 col-sm-offset-3">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
