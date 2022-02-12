@php
    use App\User;
    $merchants = User::get_tmode_bgverfied_merchants();
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
                    @endif
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    @if(count($sublinks) > 0)
                    @foreach($sublinks as $index => $value)
                        @if($index == 0)
                        <div id="{{str_replace(' ','-',strtolower($sublink_name))}}" class="tab-pane fade in active">
                            <div class="row padding-10">
                                <div class="col-sm-12">
                                    <div id="paginate_document">

                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="modal" id="merchant-document-verify-modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Qucik View Merchant Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="regForm" action="">
                                                <!-- One "tab" for each step in the form: -->
                                                <div class="tab text-center text-md"><h4>Personal Details:</h4>
                                                   <div class="row">
                                                       <div class="col-sm-12">
                                                           <div class="col-sm-5 text-right"><label for="">Name:</label></div>
                                                           <div class="col-sm-6 text-left" id="name"></div>
                                                       </div>
                                                   </div>
                                                    <div class="row">
                                                       <div class="col-sm-12">
                                                           <div class="col-sm-5 text-right"><label for="">Email:</label></div>
                                                           <div class="col-sm-6 text-left" id="email"></div>
                                                       </div>
                                                   </div>
                                                    <div class="row">
                                                       <div class="col-sm-12">
                                                           <div class="col-sm-5 text-right"><label for="">Mobile No:</label></div>
                                                           <div class="col-sm-6 text-left" id="mobile_no"></div>
                                                       </div>
                                                   </div>
                                                </div>
                                                
                                                <div class="tab text-center"><h4>Company Info:</h4>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Montly Expenditure:</label></div>
                                                            <div class="col-sm-6 text-left" id="expenditure"></div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Company Name:</label></div>
                                                            <div class="col-sm-6 text-left" id="business_name"></div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Company Address:</label></div>
                                                            <div class="col-sm-6 text-left" id="address"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Pincode:</label></div>
                                                            <div class="col-sm-6 text-left" id="pincode"></div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">City:</label></div>
                                                            <div class="col-sm-6 text-left" id="city"></div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">State:</label></div>
                                                            <div class="col-sm-6 text-left" id="state_name"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Country:</label></div>
                                                            <div class="col-sm-6 text-left" id="country"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="tab text-center"><h4>Business Info:</h4>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Business Type:</label></div>
                                                            <div class="col-sm-6 text-left" id="type_name"></div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Business Category:</label></div>
                                                            <div class="col-sm-6 text-left" id="category_name"></div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Business Sub Category:</label></div>
                                                            <div class="col-sm-6 text-left" id="sub_category_name"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">WebApp/Url:</label></div>
                                                            <div class="col-sm-6 text-left" id="website"></div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Bank Name:</label></div>
                                                            <div class="col-sm-6 text-left" id="bank_name"></div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Bank Acc No:</label></div>
                                                            <div class="col-sm-6 text-left" id="bank_acc_no"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Bank IFSC Code:</label></div>
                                                            <div class="col-sm-6 text-left" id="bank_ifsc_code"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="tab text-center"><h4>Business Cards Info:</h4>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Company PAN No:</label></div>
                                                            <div class="col-sm-6 text-left" id="comp_pan_number"></div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Company GST:</label></div>
                                                            <div class="col-sm-6 text-left" id="comp_gst"></div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Authorized Signatory PAN No:</label></div>
                                                            <div class="col-sm-6 text-left" id="mer_pan_number"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Authorized Signatory Aadhar No:</label></div>
                                                            <div class="col-sm-6 text-left" id="mer_aadhar_number"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-5 text-right"><label for="">Authorized Signatory Name:</label></div>
                                                            <div class="col-sm-6 text-left" id="mer_name"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div style="overflow:auto;">
                                                  <div style="float:right;">
                                                    <button type="button" class="btn btn-success btn-sm" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                                    <button type="button" class="btn btn-primary btn-sm" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                                  </div>
                                                </div>
                                                
                                                <!-- Circles which indicates the steps of the form: -->
                                                <div style="text-align:center;margin-top:40px;">
                                                  <span class="step"></span>
                                                  <span class="step"></span>
                                                  <span class="step"></span>
                                                  <span class="step"></span>
                                                </div>
                                                
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div id="{{str_replace(' ','-',strtolower($value->link_name))}}" class="tab-pane fade">

                            <a class="btn btn-sm btn-success margin-right-lg margin-bottom-lg pull-right" data-toggle="modal" id="call-new-doc-add-modal">Add New Doc</a>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="paginate_extdocs">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="modal" id="new-doc-add-modal"> 
                                    <div class="modal-dialog">
                                        <div class="modal-content modal-lg">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Add Extra Document</h4>
                                            </div>
                                            <div class="modal-body"> 
                                                <div class="add-document-success-response"></div> 
                                                <form id="add-extra-document-form" method="POST" class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label for="input" class="col-sm-2 control-label">Merchant:</label>
                                                        <div class="col-sm-4">
                                                            <select name="merchant_id" id="input" class="form-control">
                                                                <option value="">-- Select Merchant --</option>
                                                                @foreach($merchants as $merchant)
                                                                    <option value="{{$merchant->id}}">{{$merchant->name}}</option>
                                                                @endforeach;
                                                            </select>
                                                            <div id="merchant_id_error"></div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <a class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="addNewFileIput()" role="button">Add</a>
                                                        </div>
                                                    </div>
                                                    <div id="input-file-area" class="input-file-area">
                                                        <div class="form-group">
                                                            <label for="input" class="col-sm-2 control-label">Name:</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="doc_name[]" id="input" class="form-control" value="">
                                                                <div id="doc_name.0._error"></div>
                                                            </div>
                                                            <label for="input" class="col-sm-2 control-label">File:</label>
                                                            <div class="col-sm-3">
                                                                <input type="file" name="doc_file[]" id="file-1" class="inputfile form-control inputfile-1" multiple/>
                                                                <label for="file-1" class="custom-file-upload">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                                                    </svg> 
                                                                    <span id="doc_file_file">
                                                                        <span class="file-name-display" id="doc_file_exist">Choose a file...</span>
                                                                    </span>
                                                                </label>
                                                                <div id="doc_file.0._error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    {{csrf_field()}}
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
                        @endif
                    @endforeach
                    @else
                        
                    @endif
                </div>
            </div>
        </div>    
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded',function(){
        getMerchantDocsDetails();
    });
</script>
@endsection
