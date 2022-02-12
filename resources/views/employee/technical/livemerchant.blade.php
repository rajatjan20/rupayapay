@extends('layouts.employeecontent')
@section('employeecontent')
<div class="row">
    <div class="col-sm-12 padding-20">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" class="show-pointer" data-target="live-merchants">Merchants</a></li> 
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div id="live-merchants" class="tab-pane fade in active">
                        <div id="paginate_approvedmerchant">

                        </div>
                        
                        
                        <div class="modal" id="ajax-response">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="modal-message"></h4>
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
<script>
    document.addEventListener('DOMContentLoaded',function(){
        getAllApprovedMerchants();
    });
</script>
@endsection
