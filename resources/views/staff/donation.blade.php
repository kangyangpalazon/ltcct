@extends('layouts.backend.app')

@section('main-content')
	
	<div class="page-container-fluid">

		<div class="page-content-wrapper">

			<div class="page-head">
                
                <div class="container-fluid">

                	<div class="page-title">

                        <h1>General Donation</h1>

                    </div><!-- end page-title -->

                </div><!-- end container-fluid -->

            </div><!-- end page-head -->

            <div class="page-content">

            	<div class="container-fluid">

            		<ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>General Donation</span>
                        </li>
                    </ul>

                    <div class="page-content-inner">

                    	<div class="inbox">

                    		 <div class="row">

                    		 	@include('layouts.partials.focus-devotee-sidebar')

                    		 	<div class="col-md-9">

                    		 		<div class="form-horizontal form-row-seperated">

                    		 			<div class="portlet">

                                            <div class="validation-error">
                                            </div><!-- end validation-error -->

                    		 				@if($errors->any())

                                                <div class="alert alert-danger">

                                                    @foreach($errors->all() as $error)
                                                        <p>{{ $error }}</p>
                                                    @endforeach
                                                    
                                                </div>

                                            @endif

                                            @if(Session::has('success'))
                                                <div class="alert alert-success"><em> {{ Session::get('success') }}</em></div>
                                            @endif

                                            @if(Session::has('error'))
                                                <div class="alert alert-danger"><em> {{ Session::get('error') }}</em></div>
                                            @endif

                                            <div class="portlet-body">

                                            	<div class="tabbable-bordered">

                                            		<ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a href="#tab_xiangyou" data-toggle="tab">Xiangyou</a>
                                                        </li>
                                                        
                                                        <li id="members">
                                                            <a href="#tab_ciji" data-toggle="tab">Ciji</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_yuejuan" data-toggle="tab">Yuejuan</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content">

                                                    	<div class="tab-pane active" id="tab_xiangyou">

                                                    		<div class="form-body">

                                                    			<form method="post" action="{{ URL::to('/staff/donation') }}"
                                                    				class="form-horizontal form-bordered" id="donationform">

                                                    				{!! csrf_field() !!}

                                                    			<div class="form-group">

                                                    				<h4>Same address and same family code</h4>

                                                                    <table class="table table-bordered" id="generaldonation_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Chinese Name</th>
                                                                                <th>Devotee#</th>
                                                                                <th>Block</th>
                                                                                <th>Address</th>
                                                                                <th>Unit</th>
                                                                                <th>Guiyi Name</th>
                                                                                <th>Amount</th>
                                                                                <th>Pay Till</th>
                                                                                <th>HJ/ GR</th>
                                                                                <th>Display</th>
                                                                                <th>XYReceipt</th>
                                                                                <th>Trans Date</th>
                                                                            </tr>
                                                                        </thead>

                                                                        @if(Session::has('devotee_lists'))

                                                                            @php 
                    
                                                                                $devotee_lists = Session::get('devotee_lists');
                                                                                $focus_devotee = Session::get('focus_devotee');

                                                                            @endphp

                                                                        <tbody id="has_session">

                                                                            <tr>
                                                                            	<td>{{ $focus_devotee[0]->chinese_name }}</td>
                                                                            	<td>
                                                                            		{{ $focus_devotee[0]->devotee_id }}
                                                                            		<input type="hidden" name="devotee_id[]" 
	                                                    								value="{{ $focus_devotee[0]->devotee_id }}">
                                                                            	</td>
                                                                            	<td>{{ $focus_devotee[0]->address_building }}</td>
                                                                            	<td>{{ $focus_devotee[0]->address_street }}</td>
                                                                            	<td>
                                                                            		{{ $focus_devotee[0]->address_unit1 }}
                                                                            		{{ $focus_devotee[0]->address_unit2 }}
                                                                            	</td>
                                                                            	<td>{{ $focus_devotee[0]->guiyi_name }}</td>
                                                                            	<td width="100px">
                                                                            		<input type="text" class="form-control amount" name="amount[]">
                                                                            	</td>
                                                                            	<td width="120px">
                                                                            		<input type="text" class="form-control paid_till" 
                                                                            			name="paid_till[]" data-provide="datepicker">
                                                                            	</td>
                                                                            	<td>
                                                                            		<select class="form-control" name="hjgr_arr[]">
	                                                                                    <option value="hj">hj</option>
	                                                                                    <option value="gr">gr</option>
	                                                                                </select>
                                                                            	</td>
                                                                            	<td>
                                                                            		<select class="form-control" name="display[]">
	                                                                                    <option value="Y">Y</option>
	                                                                                    <option value="N">N</option>
	                                                                                </select>
                                                                            	</td>
                                                                            	<td></td>
                                                                            	<td></td>
                                                                            </tr>

                                                                            @foreach($devotee_lists as $devotee)

                                                                            <tr>
                                                                            	<td>{{ $devotee->chinese_name }}</td>
                                                                            	<td>
                                                                            		{{ $devotee->devotee_id }}
                                                                            		<input type="hidden" name="devotee_id[]" 
                                                                            		value="{{ $devotee->devotee_id }}">
                                                                            	</td>
                                                                            	<td>{{ $devotee->address_building }}</td>
                                                                            	<td>{{ $devotee->address_street }}</td>
                                                                            	<td>{{ $devotee->address_unit1 }} {{ $devotee->address_unit2 }}
                                                                            	</td>
                                                                            	<td>{{ $devotee->guiyi_name }}</td>
                                                                            	<td width="100px" class="amount-col">
                                                                            		<input type="text" class="form-control amount" name="amount[]">
                                                                            	</td>
                                                                            	<td width="120px">
                                                                            		<input type="text" class="form-control paid_till" 
                                                                            			name="paid_till[]" data-provide="datepicker">
                                                                            	</td>
                                                                            	<td>
                                                                            		<select class="form-control" name="hjgr_arr[]">
	                                                                                    <option value="hj">hj</option>
	                                                                                    <option value="gr">gr</option>
	                                                                                </select>
                                                                            	</td>
                                                                            	<td>
                                                                            		<select class="form-control" name="display[]">
	                                                                                    <option value="Y">Y</option>
	                                                                                    <option value="N">N</option>
	                                                                                </select>
                                                                            	</td>
                                                                            	<td></td>
                                                                            	<td></td>
                                                                            </tr>

                                                                            @endforeach

                                                                        </tbody>

                                                                        @else

                                                                            <tbody id="no_session">
                                                                                <tr>
	                                                                            	<td colspan="12">No Data</td>
	                                                                            </tr>
                                                                            </tbody>

                                                                        @endif

                                                                    </table>
                                                                    
                                                                </div><!-- end form-group -->

                                                                <div class="form-group">

                                                    				<h4>Relatives and friends</h4>
                                                                    
                                                                </div><!-- end form-group -->

                                                                <div class="form-group">

                                                                    <div class="col-md-12">

                                                                        <div class="col-md-6">
                                                                            <label class="col-md-2">Devotee ID</label>

                                                                            <div class="col-md-5">
                                                                                <input type="text" class="form-control" id="search_devotee">
                                                                            </div><!-- end col-md-5 -->

                                                                            <div class="col-md-3">
                                                                                <button type="button" class="btn default" id="search_devotee_btn">
                                                                                    Search Devotee
                                                                                </button>
                                                                            </div><!-- end-com-md-3 -->
                                                                        </div><!-- end col-md-6 -->

                                                                        <div class="col-md-6"></div><!-- end col-md-6 -->

                                                                    </div><!-- end col-md-12 -->

                                                                </div><!-- end form-group -->

                                                                <div class="form-group">

                                                                    <table class="table table-bordered" id="generaldonation_table2">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Chinese Name</th>
                                                                                <th>Devotee#</th>
                                                                                <th>Block</th>
                                                                                <th>Address</th>
                                                                                <th>Unit</th>
                                                                                <th>Guiyi Name</th>
                                                                                <th>Amount</th>
                                                                                <th>Pay Till</th>
                                                                                <th>HJ/ GR</th>
                                                                                <th>Display</th>
                                                                                <th>XYReceipt</th>
                                                                                <th>Trans Date</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody id="appendDevoteeLists">
                                                                            <tr id="no_data">
                                                                                <td colspan="12">No Data</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </div><!-- end form-group -->

                                                    		</div><!-- end form-body -->

                                                    		<hr>

                                                    		<div class="form-body">

                                                    			<div class="form-group">
                                                    			
	                                                    			<div class="col-md-12">
	                                                    				<h5><b>Total Amount: S$ <span class="total"></span></b></h5>
	                                                    			</div><!-- end col-md-12 -->

	                                                    		</div><!-- end form-group -->

	                                                    		<div class="form-group">

	                                                    			<div class="col-md-12">

	                                                    				<div class="col-md-4">
	                                                    					
	                                                    					<div class="form-group">

		                                                                        <label class="col-md-4">Transation No:</label>
		                                                                        <div class="col-md-8">T1620251</div><!-- end col-md-8 -->

		                                                                    </div><!-- end form-group -->

		                                                                    <div class="form-group">

		                                                                        <label class="col-md-12">Mode of Payment</label>

		                                                                    </div><!-- end form-group -->

		                                                                    <div class="form-group">

		                                                                        <div class="col-md-12">
		                                                                        	<div class="mt-radio-list">

				                                                                        <div class="col-md-6">
				                                                                        	<label class="mt-radio mt-radio-outline"> Cash
					                                                                            <input type="radio" name="mode_payment" 
					                                                                            	value="cash" checked>
					                                                                            <span></span>
					                                                                        </label>
				                                                                        </div><!-- end col-md-6 -->

				                                                                        <div class="col-md-6">                   	
				                                                                        </div><!-- end col-md-6 -->

				                                                                        <div class="clearfix"></div>

				                                                                        <div class="col-md-6">
				                                                                        	<label class="mt-radio mt-radio-outline"> Cheque
					                                                                            <input type="radio" name="mode_payment" 
					                                                                            	value="cheque" class="form-control">
					                                                                            <span></span>
					                                                                        </label>
				                                                                        </div><!-- end col-md-6 -->

				                                                                        <div class="col-md-6">
				                                                                        	<input type="text" name="cheque_no" value=""
				                                                                        		class="form-control input-small" id="cheque_no">
				                                                                        </div><!-- end col-md-6 -->

				                                                                        <div class="clearfix"></div>
				                                                                        
				                                                                        <div class="col-md-6">
				                                                                        	<label class="mt-radio mt-radio-outline"> NETS
					                                                                            <input type="radio" name="mode_payment" 
					                                                                            	value="nets">
					                                                                            <span></span>
					                                                                        </label>
				                                                                        </div><!-- end col-md-6 -->

				                                                                        <div class="col-md-6">
				                                                                        </div><!-- end col-md-6 -->

				                                                                        <div class="clearfix"></div>

				                                                                        <div class="col-md-6">
				                                                                        	<label class="mt-radio mt-radio-outline"> Manual Receipt
					                                                                            <input type="radio" name="mode_payment" 
					                                                                            	value="receipt">
					                                                                            <span></span>
					                                                                        </label>
				                                                                        </div><!-- end col-md-6 -->

				                                                                        <div class="col-md-6">
				                                                                        	<input type="text" name="manualreceipt" value=""
				                                                                        		class="form-control input-small" 
                                                                                                id="manualreceipt">
				                                                                        </div><!-- end col-md-6 -->

				                                                                        <div class="clearfix"></div>

				                                                                        <div class="col-md-6">
				                                                                        	<label class="mt-radio mt-radio-outline">
				                                                                        		Date of Receipts
					                                                                        </label>
				                                                                        </div><!-- end col-md-6 -->

				                                                                        <div class="col-md-6">
				                                                                        	<input type="text" name="receipt_at"
				                                                                        		class="form-control input-small" 
				                                                                        		data-provide="datepicker" id="receipt_at">
				                                                                    	</div><!-- end col-md-6 -->

				                                                                    </div><!-- end mt-radio-list -->                 

		                                                                        </div><!-- end col-md-12 -->

		                                                                    </div><!-- end form-group -->

		                                                    			</div><!-- end col-md-4 -->

		                                                    			<div class="col-md-4">

		                                                    				<div class="form-group">

		                                                                        <label class="col-md-12">Type of Receipt Printing</label>

		                                                                    </div><!-- end form-group -->

		                                                                    <div class="form-group">

		                                                                        <div class="col-md-12">
		                                                                        	<div class="mt-radio-list">

				                                                                        <label class="mt-radio mt-radio-outline"> 1 Receipt Printing for Same Address
				                                                                            <input type="radio" name="hjgr" value="hj" checked>
				                                                                            <span></span>
				                                                                        </label>

				                                                                        <label class="mt-radio mt-radio-outline"> Individual Receipt Printing
				                                                                            <input type="radio" name="hjgr" value="gr">
				                                                                            <span></span>
				                                                                        </label>
				                                                                    </div><!-- end mt-radio-list -->

		                                                                        </div><!-- end col-md-12 -->

		                                                                    </div><!-- end form-group -->

		                                                    			</div><!-- end col-md-4 -->

		                                                    			<div class="col-md-4">
		                                                    			</div><!-- end col-md-4 -->

	                                                    			</div><!-- end col-md-12 -->

	                                                    		</div><!-- end form-group -->

	                                                    		@if(Session::has('focus_devotee'))
	                                                    		<div class="form-group">
	                                                    			<input type="hidden" name="focusdevotee_id" 
	                                                    				value="{{ $focus_devotee[0]->devotee_id }}">
	                                                    			<input type="hidden" name="total_amount" id="total_amount" value="">
	                                                    		</div>

	                                                    		@else

	                                                    		<div class="form-group">
	                                                    			<input type="hidden" name="focusdevotee_id" 
	                                                    				value="">
	                                                    			<input type="hidden" name="total_amount" id="total_amount" value="">
	                                                    		</div>

	                                                    		@endif

	                                                    		<div class="form-group">
                                                    			
	                                                    			<div class="col-md-12">

	                                                    				<div class="form-actions">
	                                                                        <button type="submit" class="btn blue" id="confirm_donation_btn">Confirm
	                                                                        </button>
	                                                                        <button type="button" class="btn default">Cancel</button>
	                                                                    </div><!-- end form-actions -->

	                                                    			</div><!-- end col-md-12 -->

	                                                    		</div><!-- end form-group -->

	                                                    		</form>
                                                    			
                                                    		</div><!-- end form-body -->

                                                            <hr>

                                                            <div class="form-body">
                                                                
                                                                <div class="form-group portlet-body">

                                                                    <table class="table table-bordered order-column" 
                                                                        id="receipt_history_table sample_1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>XY Receipt</th>
                                                                                <th>Trans Date</th>
                                                                                <th>Transaction</th>
                                                                                <th>Description</th>
                                                                                <th>Paid By</th>
                                                                                <th>Devotee ID</th>
                                                                                <th>HJ/ GR</th>
                                                                                <th>Amount</th>
                                                                                <th>Manual Receipt</th>
                                                                                <th>View Details</th>
                                                                            </tr>
                                                                        </thead>

                                                                        @if(Session::has('receipts'))

                                                                            @php 
                    
                                                                                $receipts = Session::get('receipts');

                                                                            @endphp

                                                                            <tbody>
                                                                                @foreach($receipts as $receipt)
                                                                                <tr>
                                                                                    <td>{{ $receipt->xy_receipt }}</td>
                                                                                    <td>{{ $receipt->trans_date }}</td>
                                                                                    <td>{{ $receipt->xy_receipt }}</td>
                                                                                    <td>{{ $receipt->description }}</td>
                                                                                    <td>{{ $receipt->chinese_name }}</td>
                                                                                    <td>{{ $receipt->focusdevotee_id }}</td>
                                                                                    <td>{{ $receipt->hjgr }}</td>
                                                                                    <td>{{ $receipt->amount }}</td>
                                                                                    <td>{{ $receipt->manualreceipt }}</td>
                                                                                    <td><a href="#">View</a></td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>

                                                                        @else



                                                                        @endif

                                                                        
                                                                    </table>

                                                                </div><!-- end form-group -->

                                                            </div><!-- end form-body -->

                                                    	</div><!-- end tab-pane -->

                                                    </div><!-- end tab-content -->

                                            	</div><!-- end tabbable-bordered -->

                                            </div><!-- end portlet-body -->

                    		 			</div><!-- end portlet -->

                    		 		</div><!-- end form-horizontal -->

                    		 	</div><!-- end col-md-9 -->

                    		 </div><!-- end row -->

                    	</div><!-- end inbox -->

                    </div><!-- end page-content-inner -->

            	</div><!-- end container-fluid -->

            </div><!-- end page-content -->

		</div><!-- end page-content-wrapper -->

	</div><!-- end page-container-fluid -->

@stop

@section('custom-js')

	<script src="{{asset('js/custom/common.js')}}"></script>
	<script src="{{asset('js/custom/search-devotee.js')}}"></script>
	
	<script type="text/javascript">
		$(function() {

			$('body').on('focus',".paid_till", function(){
                $(this).datepicker({ dateFormat: 'yy-mm-dd' });
            });

			$('body').on('keyup',".amount-col", function(){

                var sum = 0;

			    $(".amount").each(function(){
			        sum += +$(this).val();
			    });

			    $(".total").text(sum);
			    $("#total_amount").val(sum);
            });



            // var focusdevotee_id = $("#focusdevotee_id").val();

            // if($("#focusdevotee_id").val() == null )
            // {
            // 	$("#confirm_donation_btn").attr("disabled", true);
            // }

            // else
            // {
            // 	$("#confirm_donation_btn").attr("disabled", false);
            // }            

		});
	</script>
	
@stop