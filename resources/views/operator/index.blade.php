@extends('layouts.backend.app')

@section('main-content')

	<div class="page-container-fluid">
                        
        <div class="page-content-wrapper">
            
            <div class="page-head">
                
                <div class="container-fluid">

                	<div class="page-title">

                        <h1>Edit Account</h1>

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
                            <span>Devotee</span>
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
                                                            <a href="#tab_devoteelists" data-toggle="tab">Devotee Lists</a>
                                                        </li>
                                                        
                                                        <li id="members">
                                                            <a href="#tab_memberlists" data-toggle="tab">Member Lists</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_deceasedlists" data-toggle="tab">Deceased Lists</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_newdevotee" data-toggle="tab">New Devotee</a>
                                                        </li>
                                                        <li id="edit" class="disabled">
                                                            <a href="#tab_editdevotee" data-toggle="tab">Edit Devotee</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_relocation" data-toggle="tab">Relocation Lists</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_history" data-toggle="tab"> History </a>
                                                        </li>
                                                    </ul>
                                                    

                                                    <div class="tab-content">
                                                        
                                                        <div class="tab-pane active" id="tab_devoteelists">

                                                            <div class="form-body">

                                                                <div class="form-group">

                                                                    <table class="table table-bordered" id="devotees_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Chinese Name</th>
                                                                                <th>Devotee#</th>
                                                                                <th>Address</th>
                                                                                <th>Unit</th>
                                                                                <th>Guiyi Name</th>
                                                                                <th>Family Code</th>
                                                                            </tr>
                                                                        </thead>

                                                                        @php $count = 1; @endphp

                                                                        <tbody>
                                                                            @foreach($devotees as $devotee)
                                                                            <tr>
                                                                                <td>{{ $count++ }}</td>
                                                                                <td><a href="#tab_editdevotee" data-toggle="tab" 
                                                                                    class="edit-devotee" id="{{ $devotee->devotee_id }}">
                                                                                    {{ $devotee->chinese_name }}</a>
                                                                                </td>
                                                                                <td>{{ $devotee->devotee_id }}</td>
                                                                                <td>{{ $devotee->address_building }}</td>
                                                                                <td>
                                                                                    {{ $devotee->address_unit1 }} {{ $devotee->address_unit2 }}
                                                                                </td>
                                                                                <td>{{ $devotee->guiyi_name }}</td>
                                                                                <td>{{ $devotee->familycode }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>

                                                                    </table>
                                                                    
                                                                </div><!-- end form-group -->

                                                                <div class="paginate">
                                                                    {{ $devotees->render() }}
                                                                </div><!-- end paginate -->
                                                            
                                                            </div><!-- end form-body -->

                                                        </div><!-- end tab-pane devotee-lists -->
                                                        
                                                        <div class="tab-pane" id="tab_memberlists">

                                                            <div class="form-body">

                                                                <div class="form-group">

                                                                    <table class="table table-bordered" id="members_table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Chinese Name</th>
                                                                                <th>Devotee#</th>
                                                                                <th>Member#</th>
                                                                                <th>Address</th>
                                                                                <th>Unit</th>
                                                                                <th>Guiyi Name</th>
                                                                                <th>Family Code</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                            @foreach($members as $member)
                                                                            <tr>
                                                                                <td><a href="#tab_editdevotee" data-toggle="tab" 
                                                                                    id="edit-member">{{ $member->chinese_name }}</a></td>
                                                                                <td>{{ $member->devotee_id }}</td>
                                                                                <td>{{ $member->member_id }}</td>
                                                                                <td>{{ $member->address_building }}</td>
                                                                                <td>
                                                                                    {{ $member->address_unit1 }} {{ $member->address_unit2 }}
                                                                                </td>
                                                                                <td>{{ $member->guiyi_name }}</td>
                                                                                <td>{{ $member->familycode }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>

                                                                    </table>
                                                                    
                                                                </div><!-- end form-group -->

                                                                <div class="paginate">
                                                                    {{ $members->render() }}
                                                                </div><!-- end paginate -->

                                                            </div><!-- end form-body -->

                                                        </div><!-- end tab-pane member-lists -->
                                                        
                                                        <div class="tab-pane" id="tab_deceasedlists">

                                                            <div class="form-body">

                                                                <div class="form-group">

                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Chinese Name</th>
                                                                                <th>Devotee</th>
                                                                                <th>Member</th>
                                                                                <th>Address</th>
                                                                                <th>Unit</th>
                                                                                <th>Guiyi Name</th>
                                                                                <th>Family Code</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                            @foreach($deceased_lists as $deceased_list)
                                                                            <tr>
                                                                                <td>{{ $deceased_list->chinese_name }}</td>
                                                                                <td>{{ $deceased_list->devotee_id }}</td>
                                                                                <td>{{ $deceased_list->member_id }}</td>
                                                                                <td>{{ $deceased_list->address_building }}</td>
                                                                                <td>
                                                                                    {{ $deceased_list->address_unit1 }} 
                                                                                    {{ $deceased_list->address_unit2 }}
                                                                                </td>
                                                                                <td>{{ $deceased_list->guiyi_name }}</td>
                                                                                <td>{{ $deceased_list->familycode }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>

                                                                    </table>
                                                                    
                                                                </div><!-- end form-group -->

                                                                <div class="paginate">
                                                                    {{ $deceased_lists->render() }}
                                                                </div><!-- end paginate -->
                                                            
                                                            </div><!-- end form-body -->

                                                        </div><!-- end tab-pane deceased-lists -->

                                                        <div class="tab-pane" id="tab_newdevotee">

                                                            <form method="post" action="{{ URL::to('/operator/new-devotee') }}" 
                                                                class="form-horizontal form-bordered">
                                                                {!! csrf_field() !!}

                                                            <div class="form-body">

                                                                <div class="col-md-6">

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Title</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control" name="title">
                                                                                <option value="mr">Mr</option>
                                                                                <option value="miss">Miss</option>
                                                                                <option value="madam">Madam</option>
                                                                            </select>
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Chinese Name *</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="chinese_name"
                                                                                value="{{ old('chinese_name') }}">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">English Name *</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="english_name"
                                                                            value="{{ old('english_name') }}">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Contact # *</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="contact"
                                                                                value="{{ old('contact') }}">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Guiyi Name *</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="guiyi_name"
                                                                            value="{{ old('guiyi_name') }}">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Address - House No *</label>
                                                                        <div class="col-md-3">
                                                                            <input type="text" class="form-control" name="address_houseno"
                                                                                value="{{ old('address_houseno') }}" 
                                                                                id="content_address_houseno">
                                                                        </div><!-- end col-md-3 -->

                                                                        <label class="col-md-1 control-label">Unit *</label>

                                                                        <div class="col-md-2">
                                                                            <input type="text" class="form-control" name="address_unit1"
                                                                                value="{{ old('address_unit1') }}" id="content_address_unit1">
                                                                        </div><!-- end col-md-2 -->

                                                                        <label class="col-md-1">-</label>

                                                                        <div class="col-md-2">
                                                                            <input type="text" class="form-control" name="address_unit2"
                                                                                value="{{ old('address_unit2') }}" id="content_address_unit2">
                                                                        </div><!-- end col-md-2 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Address - Street</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control" name="address_street" 
                                                                                id="content_address_street">
                                                                                <option>Ang Mo Kio Ave 10</option>
                                                                                <option>Ang Mo Kio Ave 8</option>
                                                                                <option>Bishan Ave 4</option>
                                                                                <option>Rehill Ave 1</option>
                                                                                <option>Clementi Ave 3</option>
                                                                            </select>
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Address - Building</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="address_building"
                                                                                value="{{ old('address_building') }}" 
                                                                                id="content_address_building">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Address - Postal *</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="address_postal"
                                                                                value="{{ old('address_postal') }}" id="content_address_postal">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Address - Translate</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" 
                                                                                name="address_translated">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Oversea Addr in Chinese
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" 
                                                                                name="oversea_addr_in_chinese">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3">
                                                                            <button type="button" class="btn default check_family_code">
                                                                                Check Family Code
                                                                            </button>
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                </div><!-- end col-md-6 -->

                                                                <div class="col-md-6">

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">NRIC</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="nric"
                                                                                value="{{ old('nric') }}">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Deceased Year</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="deceased_year form-control" name="deceased_year"
                                                                                data-provide="datepicker" value="{{ old('deceased_year') }}">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Date of Birth</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="dob"
                                                                                data-provide="datepicker" value="{{ old('dob') }}">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Marital Status</label>
                                                                        <div class="col-md-9">
                                                                           <select class="form-control" name="marital_status">
                                                                                <option value="">Please select</option>
                                                                                <option value="single">Single</option>
                                                                                <option value="married">Married</option>
                                                                            </select>
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Dialect</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control" name="dialect">
                                                                                <option value="">Please select</option>
                                                                                <option value="chinese">Chinese</option>
                                                                                <option value="others">Others</option>
                                                                            </select>
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Race</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control" name="race">
                                                                                <option value="">Please select</option>
                                                                                <option value="chinese">Chinese</option>
                                                                                <option value="others">Others</option>
                                                                            </select>
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Nationality</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control" name="nationality">
                                                                                <option value="">Please select</option>
                                                                                <option value="singapore">Singapore</option>
                                                                                <option value="others">Others</option>
                                                                            </select>
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">
                                                                        <label class="col-md-3"></label>

                                                                        <div class="col-md-9">
                                                                            <div class="table-scrollable" id="familycode-table">
                                                                                <table class="table table-bordered table-hover">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>Name</th>
                                                                                            <th>Family Code</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr id="no_familycode">
                                                                                            <td colspan="3">No Family Code</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Mailer</label>
                                                                        <div class="col-md-2">
                                                                            <select class="form-control" name="mailer">
                                                                                <option value="">Yes</option>
                                                                                <option>No</option>
                                                                            </select>
                                                                        </div><!-- end col-md-2 -->

                                                                        <div class="col-md-4">
                                                                        </div><!-- end col-md-4 -->

                                                                    </div><!-- end form-group -->

                                                                </div><!-- end col-md-6 -->

                                                                <div class="clearfix"></div>

                                                                <hr>

                                                                <h4>Optional</h4>

                                                                <div class="col-md-6">

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Opt.Address 
                                                                            <span id="opt_addr_count">1</span>
                                                                        </label>

                                                                        <div class="col-md-3">
                                                                            <select class="form-control" name="address_type[]">
                                                                                <option value="home">Home</option>
                                                                                <option value="company">Company</option>
                                                                                <option value="stall">Stall</option>
                                                                                <option value="office">Office</option>
                                                                            </select>
                                                                        </div><!-- end col-md-3 -->

                                                                        <div class="col-md-5">
                                                                            <input type="text" class="form-control" name="address_data[]">
                                                                        </div><!-- end col-md-5 -->

                                                                        <div class="col-md-1"></div><!-- end col-md-1 -->

                                                                    </div><!-- end form-group -->

                                                                    <div id="append_opt_address">
                                                                    </div><!-- end append_opt_address -->

                                                                    <div class="form-group">

                                                                        <div class="col-md-1"></div><!-- end col-md-1 -->
                                                                        
                                                                        <div class="col-md-5">
                                                                            <i class="fa fa-plus-circle" aria-hidden="true" 
                                                                                id="appendAddressBtn"></i>
                                                                        </div><!-- end col-md-5 -->

                                                                        <div class="col-md-6"></div><!-- end col-md-6 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Opt.Vehicle 1</label>

                                                                        <div class="col-md-3">
                                                                            <select class="form-control" name="vehicle_type[]">
                                                                                <option value="car">Car</option>
                                                                                <option value="ship">Ship</option>
                                                                            </select>
                                                                        </div><!-- end col-md-3 -->

                                                                        <div class="col-md-5">
                                                                            <input type="text" class="form-control" name="vehicle_data[]">
                                                                        </div><!-- end col-md-5 -->

                                                                        <div class="col-md-1"></div><!-- end col-md-1 -->

                                                                    </div><!-- end form-group -->

                                                                    <div id="append_opt_vehicle">
                                                                    </div><!-- end append_opt_vehicle -->

                                                                    <div class="form-group">

                                                                        <div class="col-md-1">
                                                                        </div><!-- end col-md-1 -->
                                                                        
                                                                        <div class="col-md-5">
                                                                            <i class="fa fa-plus-circle" aria-hidden="true" 
                                                                                id="appendVehicleBtn"></i>
                                                                        </div><!-- end col-md-5 -->

                                                                        <div class="col-md-6">
                                                                        </div><!-- end col-md-6 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Special Remark 1</label>

                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="special_remark[]">
                                                                        </div><!-- end col-md-8 -->

                                                                        <div class="col-md-1"></div><!-- end col-md-1 -->

                                                                    </div><!-- end form-group -->

                                                                    <div id="append_special_remark">
                                                                    </div><!-- end append_special_remark -->

                                                                    <div class="form-group">

                                                                        <div class="col-md-1">
                                                                        </div><!-- end col-md-1 -->
                                                                        
                                                                        <div class="col-md-5">
                                                                            <i class="fa fa-plus-circle" aria-hidden="true" 
                                                                                id="appendSpecRemarkBtn"></i>
                                                                        </div><!-- end col-md-5 -->

                                                                        <div class="col-md-6">
                                                                        </div><!-- end col-md-6 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-12 control-label">
                                                                            If you have made Changes to the above. You need to CONFIRM to save the Changes.<br />
                                                                            To Confirm, please enter authorized password to proceed.
                                                                        </label>

                                                                    </div><!-- end form-group -->

                                                                </div><!-- end col-md-6 -->

                                                                <div class="col-md-6">

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Introduced By-1</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="introduced_by1"
                                                                                value="{{ old('introduced_by1') }}">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Introduced By-2</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="introduced_by2"
                                                                                value="{{ old('introduced_by2') }}">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->
                                                                    
                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Member Approved Date</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control form-control-inline date-picker" name="approved_date" data-provide="datepicker">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Member Cancelled Date</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" name="cancelled_date"
                                                                                data-provide="datepicker">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">

                                                                        <label class="col-md-3 control-label">Reason for Cancel</label>
                                                                        <div class="col-md-9">
                                                                            <select class="form-control" name="reason_for_cancel">
                                                                                <option value="">Please select</option>
                                                                                <option value="1">Deceased</option>
                                                                                <option value="2">Self withdrawal</option>
                                                                                <option value="3">Had been inactive for years</option>
                                                                                <option value="4">Others</option>
                                                                            </select>
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-group">
                                                                        <label class="col-md-6"></label>
                                                                        <label class="col-md-3 control-label">Authorized Password</label>
                                                                        <div class="col-md-3">
                                                                            <input type="password" class="form-control" 
                                                                                name="authorized_password">
                                                                        </div><!-- end col-md-9 -->

                                                                    </div><!-- end form-group -->

                                                                    <div class="form-actions pull-right">
                                                                        <button type="submit" class="btn blue" id="confirm_btn" disabled>Confirm</button>
                                                                        <button type="button" class="btn default">Cancel</button>
                                                                    </div><!-- end form-actions -->                                                                    
                                                                </div><!-- end col-md-6 -->

                                                            </div><!-- end form-body -->

                                                            <div class="clearfix"></div><!-- end clearfix -->

                                                            </form>

                                                        </div><!-- end tab-pane new-devotee -->

                                                        <div class="tab-pane" id="tab_editdevotee">

                                                            @include('layouts.partials.edit-devotee')
                                                            
                                                        </div><!-- end tab-pane -->

                                                        <div class="tab-pane" id="tab_relocation">

                                                            <div class="form-body">

                                                                <form method="post" action="{{ URL::to('/operator/relocation') }}" 
                                                                    class="form-horizontal form-bordered">
                                                                    {!! csrf_field() !!}

                                                                <div class="col-md-12">
                                                                    <div class="form-group">

                                                                        <table class="table table-bordered relocation" id="relocation_table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Chinese Name</th>
                                                                                    <th>English Name</th>
                                                                                    <th>Guiyi Name</th>
                                                                                    <th>NRIC</th>
                                                                                    <th>Address</th>
                                                                                    <th>Unit</th>
                                                                                    <th>Family Code</th>
                                                                                    <th>Member Code</th>
                                                                                </tr>
                                                                            </thead>

                                                                            @if(Session::has('devotee_lists'))

                                                                            @php 
                    
                                                                                $devotee_lists = Session::get('devotee_lists');
                                                                                $focus_devotee = Session::get('focus_devotee');

                                                                            @endphp

                                                                            <tbody id="has_session">

                                                                                <tr>
                                                                                    <tr>
                                                                                        <td><input type="checkbox" name="devotee_id[]" 
                                                                                            value="{{ $focus_devotee[0]->devotee_id }}" /></td>
                                                                                        <td>{{ $focus_devotee[0]->chinese_name }}</td>
                                                                                        <td>{{ $focus_devotee[0]->english_name }}</td>
                                                                                        <td>{{ $focus_devotee[0]->guiyi_name }}</td>
                                                                                        <td>{{ $focus_devotee[0]->nric }}</td>
                                                                                        <td>{{ $focus_devotee[0]->address_street }}</td>
                                                                                        <td>
                                                                                            {{ $focus_devotee[0]->address_unit1 }} 
                                                                                            {{ $focus_devotee[0]->address_unit2 }}
                                                                                        </td>
                                                                                        <td>{{ $focus_devotee[0]->familycode }}</td>
                                                                                        <td>{{ $focus_devotee[0]->member_id }}</td>
                                                                                    </tr>
                                                                                </tr>

                                                                                @foreach($devotee_lists as $devotee)
                                                                                    <tr>
                                                                                        <td><input type="checkbox" name="devotee_id[]" 
                                                                                            value="{{ $devotee->devotee_id }}" /></td>
                                                                                        <td>{{ $devotee->chinese_name }}</td>
                                                                                        <td>{{ $devotee->english_name }}</td>
                                                                                        <td>{{ $devotee->guiyi_name }}</td>
                                                                                        <td>{{ $devotee->nric }}</td>
                                                                                        <td>{{ $devotee->address_street }}</td>
                                                                                        <td>
                                                                                            {{ $devotee->address_unit1 }} {{ $devotee->address_unit2 }}
                                                                                        </td>
                                                                                        <td>{{ $devotee->familycode }}</td>
                                                                                        <td>{{ $devotee->member_id }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>

                                                                            @else

                                                                            <tbody id="no_session">
                                                                                
                                                                            </tbody>

                                                                            @endif

                                                                        </table>
                                                                        
                                                                    </div><!-- end form-group -->

                                                                </div><!-- end col-md-12 -->

                                                                <div class="clearfix"></div>

                                                                <hr>

                                                                <div class="col-md-12">

                                                                    <h4>Current Address</h4>
                                                                    <h5>Local Address</h5>

                                                                    @if(Session::has('focus_devotee'))

                                                                    @php 
                                                                        
                                                                        $focus_devotee = Session::get('focus_devotee');

                                                                    @endphp

                                                                    <div class="col-md-6" id="has_session">
                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - House No</label>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_houseno" id="current_address_houseno"
                                                                                    value="{{ $focus_devotee[0]->address_houseno }}">
                                                                            </div><!-- end col-md-3 -->

                                                                            <label class="col-md-1">Unit</label>

                                                                            <div class="col-md-2">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_unit1" id="current_address_unit1"
                                                                                    value="{{ $focus_devotee[0]->address_unit1 }}">
                                                                            </div><!-- end col-md-2 -->

                                                                            <div class="col-md-2">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_unit2" id="current_address_unit2"
                                                                                    value="{{ $focus_devotee[0]->address_unit2 }}">
                                                                            </div><!-- end col-md-2 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - Street</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_street" id="current_address_street"
                                                                                    value="{{ $focus_devotee[0]->address_street }}">
                                                                            </div><!-- end col-md-8 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - Building</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_building" id="current_address_building"
                                                                                    value="{{ $focus_devotee[0]->address_building }}">
                                                                            </div><!-- end col-md-6 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - Postal</label>
                                                                            <div class="col-md-2">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_postal" id="current_address_postal"
                                                                                    value="{{ $focus_devotee[0]->address_postal }}">
                                                                            </div><!-- end col-md-2 -->

                                                                            <label class="col-md-2">Country *</label>
                                                                            <div class="col-md-4">
                                                                                <select class="form-control" name="nationality">
                                                                                    <option value="">Please select</option>
                                                                                    <option value="singapore">Singapore</option>
                                                                                    <option value="others">Others</option>
                                                                                </select>
                                                                            </div><!-- end col-md-3 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Oversea Addr in Chinese</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" 
                                                                                    name="oversea_addr_in_chinese" id="current_oversea_addr_in_chinese" 
                                                                                    value="{{ $focus_devotee[0]->oversea_addr_in_chinese }}">
                                                                            </div><!-- end col-md-6 -->

                                                                        </div><!-- end form-group -->

                                                                    </div><!-- end col-md-6 -->

                                                                    @else

                                                                    <div class="col-md-6" id="no_session">
                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - House No</label>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_houseno" id="current_address_houseno">
                                                                            </div><!-- end col-md-3 -->

                                                                            <label class="col-md-1">Unit</label>

                                                                            <div class="col-md-2">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_unit1" id="current_address_unit1">
                                                                            </div><!-- end col-md-2 -->

                                                                            <div class="col-md-2">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_unit2" id="current_address_unit2">
                                                                            </div><!-- end col-md-2 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - Street</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_street" id="current_address_street">
                                                                            </div><!-- end col-md-8 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - Building</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_building" id="current_address_building">
                                                                            </div><!-- end col-md-6 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - Postal</label>
                                                                            <div class="col-md-2">
                                                                                <input type="text" class="form-control" 
                                                                                    name="address_postal" id="current_address_postal">
                                                                            </div><!-- end col-md-2 -->

                                                                            <label class="col-md-2">Country *</label>
                                                                            <div class="col-md-4">
                                                                                <select class="form-control" name="nationality">
                                                                                    <option value="">Please select</option>
                                                                                    <option value="singapore">Singapore</option>
                                                                                    <option value="others">Others</option>
                                                                                </select>
                                                                            </div><!-- end col-md-3 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Oversea Addr in Chinese</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" 
                                                                                    name="oversea_addr_in_chinese" id="current_oversea_addr_in_chinese">
                                                                            </div><!-- end col-md-6 -->

                                                                        </div><!-- end form-group -->

                                                                    </div><!-- end col-md-6 -->

                                                                    @endif

                                                                    <div class="col-md-6">
                                                                        
                                                                    </div><!-- end col-md-6 -->

                                                                </div><!-- end col-md-12 -->

                                                                <div class="clearfix"></div>

                                                                <hr>

                                                                <div class="col-md-12">

                                                                    <h4>New Address</h4>
                                                                    <h5>Local Address</h5>
                                                                    
                                                                    <div class="col-md-6">

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - House No</label>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control" 
                                                                                    name="new_address_houseno" 
                                                                                    value="{{ old('new_address_houseno') }}">
                                                                            </div><!-- end col-md-3 -->

                                                                            <label class="col-md-1">Unit</label>

                                                                            <div class="col-md-2">
                                                                                <input type="text" class="form-control" 
                                                                                    name="new_address_unit1"
                                                                                    value="{{ old('new_address_unit1') }}">
                                                                            </div><!-- end col-md-2 -->

                                                                            <div class="col-md-2">
                                                                                <input type="text" class="form-control" 
                                                                                    name="new_address_unit2" 
                                                                                    value="{{ old('new_address_unit2') }}">
                                                                            </div><!-- end col-md-2 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - Street</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" 
                                                                                    name="new_address_street"
                                                                                    value="{{ old('new_address_street') }}">
                                                                            </div><!-- end col-md-8 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - Building</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" 
                                                                                    name="new_address_building"
                                                                                    value="{{ old('new_address_building') }}">
                                                                            </div><!-- end col-md-6 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Address - Postal</label>
                                                                            <div class="col-md-2">
                                                                                <input type="text" class="form-control" 
                                                                                    name="new_address_postal"
                                                                                    value="{{ old('new_address_postal') }}">
                                                                            </div><!-- end col-md-2 -->

                                                                            <label class="col-md-2">Country *</label>
                                                                            <div class="col-md-4">
                                                                                <select class="form-control" name="new_nationality">
                                                                                    <option value="">Please select</option>
                                                                                    <option value="singapore">Singapore</option>
                                                                                    <option value="others">Others</option>
                                                                                </select>
                                                                            </div><!-- end col-md-3 -->

                                                                        </div><!-- end form-group -->

                                                                        <div class="form-group">
                                                                            <label class="col-md-4">Oversea Addr in Chinese</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" 
                                                                                    name="new_oversea_addr_in_chinese">
                                                                            </div><!-- end col-md-6 -->

                                                                        </div><!-- end form-group -->
                                                                        
                                                                    </div><!-- end col-md-6 -->

                                                                    <div class="col-md-6">
                                                                        
                                                                    </div><!-- end col-md-6 -->

                                                                </div><!-- end col-md-12 -->

                                                                <div class="clearfix"></div>

                                                                <hr>

                                                                <div class="col-md-12">
                                                                    
                                                                    <div class="col-md-6">
                                                                        
                                                                    </div><!-- end col-md-6 -->

                                                                    <div class="col-md-6">

                                                                        <div class="form-actions pull-right">
                                                                            <button type="submit" class="btn blue" id="confirm_btn">Confirm
                                                                            </button>
                                                                            <button type="button" class="btn default">Cancel</button>
                                                                        </div><!-- end form-actions -->
                                                                        
                                                                    </div><!-- end col-md-6 -->

                                                                </div><!-- end col-md-12 -->

                                                                </form>

                                                                <div class="clearfix"></div>
                                                            
                                                            </div><!-- end form-body -->

                                                        </div><!-- end tab-pane relocation -->

                                                        <div class="tab-pane" id="tab_history">

                                                            <div class="form-body">
                                                                <div class="form-group">

                                                                    <label class="col-md-2 control-label">New Devotee:</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" class="form-control" name="" placeholder="">
                                                                        <span class="help-block"> max 100 chars </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label">Meta Keywords:</label>
                                                                    <div class="col-md-10">
                                                                        <textarea class="form-control" rows="8" name=""></textarea>
                                                                        <span class="help-block"> max 1000 chars </span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label">Meta Description:</label>
                                                                    <div class="col-md-10">
                                                                        <textarea class="form-control maxlength-handler" rows="8" name="product[meta_description]" maxlength="255"></textarea>
                                                                        <span class="help-block"> max 255 chars </span>
                                                                    </div>
                                                                </div>

                                                            </div><!-- end form-body -->

                                                        </div><!-- end tab-pane tab_history -->

                                                    </div><!-- end tab-content -->

                                                </div><!-- end tabbable-bordered -->

                                            </div><!-- end portlet-body -->

                                        </div><!-- end portlet -->

                                    </div><!-- end form-horizontal form-row-seperated -->

                                </div><!-- end col-md-10 -->

                            </div><!-- end row -->

                        </div><!-- end box -->

                    </div><!-- end page-content-inner -->

                </div><!-- end container-fluid -->

            </div><!-- end page-content -->

        </div><!-- end page-content-wrapper -->

    </div><!-- end page-container-fluid -->

@stop

@section('custom-js')
    
    <script src="{{asset('js/custom/common.js')}}"></script>
    <script src="{{asset('js/custom/search-devotee.js')}}"></script>
    <script src="{{asset('js/custom/check-familycode.js')}}"></script>
    <script src="{{asset('js/custom/edit-check-familycode.js')}}"></script>
    
    <script type="text/javascript">

        $(function(){

            var opt_address;

            $('.deceased_year').datepicker({
                minViewMode: 2,
                format: 'yyyy'
            });

            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });

            if ( $('.alert-success').children().length > 0 ) {
                localStorage.removeItem('activeTab');
            }

            else
            {
                var activeTab = localStorage.getItem('activeTab');
            }            

            if (activeTab) {
                $('a[href="' + activeTab + '"]').tab('show');
                console.log(activeTab);
            }


            // Disabled Edit Devotee Tab
            $(".nav-tabs > li").click(function(){
                if($(this).hasClass("disabled"))
                    return false;
            });


            // new button
            $("#new_search").click(function() {
                $("#quick_search").attr("disabled", true);
            });

            // quick search button
            $("#quick_search").click(function(e) {
                
                var chinese_name = $("#chinese_name").val();
                var english_name = $("#english_name").val();
                var guiyi_name = $("#guiyi_name").val();
                
            });

            $("#update_btn").click(function() {

                var count = 0;
                var errors = new Array();
                var validationFailed = false;

                var chinese_name = $("#edit_chinese_name").val();
                var contact = $("#edit_contact").val();
                var address_postal = $("#edit_address_postal").val();
                var address_unit1 = $("#edit_address_unit1").val();
                var address_unit2 = $("#edit_address_unit2").val();
                var address_houseno = $("#edit_address_houseno").val();
                var authorized_password = $("#authorized_password").val();

                if ($.trim(chinese_name).length <= 0)
                {
                    validationFailed = true;
                    errors[count++] = "."
                }

                if ($.trim(contact).length <= 0)
                {
                    validationFailed = true;
                    errors[count++] = "Contact is empty."
                }

                if ($.trim(address_postal).length <= 0)
                {
                    validationFailed = true;
                    errors[count++] = "Address Postal No is empty."
                }

                if ($.trim(address_unit1).length <= 0)
                {
                    validationFailed = true;
                    errors[count++] = "Address Unit 1 is empty."
                }

                if ($.trim(address_unit2).length <= 0)
                {
                    validationFailed = true;
                    errors[count++] = "Address Unit 2 is empty."
                }

                if ($.trim(address_houseno).length <= 0)
                {
                    validationFailed = true;
                    errors[count++] = "Address House No is empty."
                }

                if ($.trim(authorized_password).length <= 0)
                {
                    validationFailed = true;
                    errors[count++] = "Please enter password."
                }

                if (validationFailed)
                {
                    var errorMsgs = '';

                    for(var i = 0; i < count; i++)
                    {                
                        errorMsgs = errorMsgs + errors[i] + "<br/>";
                    }

                    $('html,body').animate({ scrollTop: 0 }, 'slow');

                    $(".validation-error").addClass("bg-danger alert alert-error")
                    $(".validation-error").html(errorMsgs);

                    return false;
                }
            });
            

            $("#devotees_table").on('click','.edit-devotee',function(e) {

                $(".nav-tabs > li:first-child").removeClass("active");
                $("#edit").addClass("active");

                var devotee_id = $(this).attr("id");

                var formData = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    devotee_id: devotee_id
                };

                $.ajax({
                    type: 'GET',
                    url: "/public/operator/devotee/getDevoteeDetail",
                    data: formData,
                    dataType: 'json',
                    success: function(response)
                    {
                        $("#special_remark").empty();
                        $("#opt_address").empty();
                        $("#opt_vehicle").empty();

                        $("#edit_devotee_id").val(response.devotee['devotee_id']);
                        $("#edit_chinese_name").val(response.devotee['chinese_name']);
                        $("#edit_english_name").val(response.devotee['english_name']);
                        $("#edit_contact").val(response.devotee['contact']);
                        $("#edit_guiyi_name").val(response.devotee['guiyi_name']);
                        $("#edit_address_houseno").val(response.devotee['address_houseno']);
                        $("#edit_address_unit1").val(response.devotee['address_unit1']);
                        $("#edit_address_unit2").val(response.devotee['address_unit2']);
                        $("#edit_address_street").val(response.devotee['address_street']);
                        $("#edit_address_building").val(response.devotee['address_building']);
                        $("#edit_address_postal").val(response.devotee['address_postal']);
                        $("#edit_address_translate").val(response.devotee['address_translate']);
                        $("#edit_oversea_addr_in_china").val(response.devotee['oversea_addr_in_chinese']);
                        $("#edit_nric").val(response.devotee['nric']);
                        $("#edit_deceased_year").val(response.devotee['deceased_year']);
                        $("#edit_dob").val(response.devotee['dob']);
                        $("#edit_marital_status").val(response.devotee['marital_status']);
                        $("#edit_dialect").val(response.devotee['dialect']);
                        $("#edit_nationality").val(response.devotee['nationality']);
                        $("#edit_familycode_id").val(response.devotee['familycode_id']);
                        $("#edit_member_id").val(response.devotee['member_id']);

                        if(response.optionaladdresses.length > 0)
                        {
                            $.each(response.optionaladdresses, function(index, data) {

                                $('#opt_address').append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Address " + "</label><div class='col-md-3' id='address'>" + 
                                "<select class='form-control' id='type' name='address_type[]'>" +
                                "<option value='home'" + (data.type == 'home' ? 'selected': '') + ">Home</option>" +
                                "<option value='company'" + (data.type == 'company' ? 'selected': '') + ">Company</option>" +
                                "<option value='stall'" + (data.type == 'stall' ? 'selected': '') + ">Stall</option>" + 
                                "<option value='office'" + (data.type == 'office' ? 'selected': '') + ">Office</option>" +
                                "</select></div><div class='col-md-5'><input type='text' class='form-control' name='address_data[]' value='" + 
                                data.data +"'></div>" +
                                "<div class='col-md-1'><i class='fa fa-minus-circle removeAddressBtn1' aria-hidden='true'></i></div></div>");
                            });
                        }

                        else
                        {
                            $("#opt_address").append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Address1" + 
                                "</label><div class='col-md-3'><select class='form-control' name='address_type[]'><option value='home'>Home" +
                                "</option><option value='company'>Company</option><option value='stall'>Stall</option><option value='office'>" +
                                "Office</option></select></div><div class='col-md-5'><input type='text' class='form-control'" + 
                                "name='address_data[]'></div>");
                        }

                        if(response.optionalvehicles.length > 0)
                        {
                            $.each(response.optionalvehicles, function(index, data) {

                                $('#opt_vehicle').append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Vehicle " + 
                            "</label><div class='col-md-3'><select class='form-control' name='vehicle_type[]'>" + 
                            "<option value='car'" + (data.type == 'car' ? 'selected': '') + ">Car</option>" +
                            "<option value='ship'" + (data.type == 'ship' ? 'selected': '') + ">Ship</option></select></div>" +
                            "<div class='col-md-5'>" +
                            "<input type='text' class='form-control' name='vehicle_data[]' value='" + data.data + "'></div>" +
                            "<div class='col-md-1'><i class='fa fa-minus-circle removeVehicleBtn1' aria-hidden='true'></i></div></div>");
                            });
                        }

                        else
                        {
                            $("#opt_vehicle").append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Vehicle " + 
                            "</label><div class='col-md-3'><select class='form-control' name='vehicle_type[]'><option value='car'>Car</option>" +
                            "<option value='ship'>Ship</option></select></div><div class='col-md-5'>" +
                            "<input type='text' class='form-control' name='vehicle_data[]'></div>" +
                            "<div class='col-md-1'><i class='fa fa-minus-circle removeVehicleBtn1' aria-hidden='true'></i></div></div>");
                        }

                        if(response.specialRemarks.length > 0)
                        {
                            $.each(response.specialRemarks, function(index, data) {
                                $('#special_remark').append("<div class='form-group'><label class='col-md-3 control-label'>Special Remark 1" +
                                    "</label><div class='col-md-8'><input type='text' class='form-control' name='special_remark[]' value='" +
                                    data.data + "'></div><div class='col-md-1'><i class='fa fa-minus-circle removeSpecRemarkBtn1' aria-hidden='true'></i></div></div>");
                            });
                        }

                        else
                        {
                            $("#special_remark").append("<div class='form-group'><label class='col-md-3 control-label'>Special Remark 1" +
                                "</label><div class='col-md-8'><input type='text' class='form-control' name='special_remark[]'></div>");
                        }

                        
                    },

                    error: function (response) {
                        console.log(response);  
                    } 
                });
                
            }); 

            $("#members_table").on('click','#edit-member',function(e) {                

                $("#members").removeClass("active");
                $("#edit").addClass("active");

                var devotee_id = $(this).closest("tr").find('td:eq(1)').text();
                var member_id = $(this).closest("tr").find('td:eq(2)').text();

                var formData = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                     devotee_id: devotee_id,
                    member_id: member_id
                };

                $.ajax({
                    type: 'GET',
                    url: "/public/operator/devotee/getMemberDetail",
                    data: formData,
                    dataType: 'json',
                    success: function(response)
                    {
                        $("#special_remark").empty();
                        $("#opt_address").empty();
                        $("#opt_vehicle").empty();

                        $("#edit_devotee_id").val(response.devotee['devotee_id']);
                        $("#edit_chinese_name").val(response.devotee['chinese_name']);
                        $("#edit_english_name").val(response.devotee['english_name']);
                        $("#edit_contact").val(response.devotee['contact']);
                        $("#edit_guiyi_name").val(response.devotee['guiyi_name']);
                        $("#edit_address_houseno").val(response.devotee['address_houseno']);
                        $("#edit_address_unit1").val(response.devotee['address_unit1']);
                        $("#edit_address_unit2").val(response.devotee['address_unit2']);
                        $("#edit_address_street").val(response.devotee['address_street']);
                        $("#edit_address_building").val(response.devotee['address_building']);
                        $("#edit_address_postal").val(response.devotee['address_postal']);
                        $("#edit_address_translate").val(response.devotee['address_translate']);
                        $("#edit_oversea_addr_in_china").val(response.devotee['oversea_addr_in_chinese']);
                        $("#edit_nric").val(response.devotee['nric']);
                        $("#edit_deceased_year").val(response.devotee['deceased_year']);
                        $("#edit_dob").val(response.devotee['dob']);
                        $("#edit_marital_status").val(response.devotee['marital_status']);
                        $("#edit_dialect").val(response.devotee['dialect']);
                        $("#edit_nationality").val(response.devotee['nationality']);
                        $("#edit_familycode_id").val(response.devotee['familycode_id']);
                        $("#edit_member_id").val(response.devotee['member_id']);

                        $("#edit_introduced_by1").val(response.member['introduced_by1']);
                        $("#edit_introduced_by2").val(response.member['introduced_by2']);
                        $("#edit_approved_date").val(response.member['approved_date']);
                        $("#edit_cancelled_date").val(response.member['cancelled_date']);
                        $("#edit_reason_for_cancel").val(response.member['reason_for_cancel']);

                        if(response.optionaladdresses.length > 0)
                        {
                            $.each(response.optionaladdresses, function(index, data) {

                                $('#opt_address').append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Address " + "</label><div class='col-md-3' id='address'>" + 
                                "<select class='form-control' id='type' name='address_type[]'>" +
                                "<option value='home'" + (data.type == 'home' ? 'selected': '') + ">Home</option>" +
                                "<option value='company'" + (data.type == 'company' ? 'selected': '') + ">Company</option>" +
                                "<option value='stall'" + (data.type == 'stall' ? 'selected': '') + ">Stall</option>" + 
                                "<option value='office'" + (data.type == 'office' ? 'selected': '') + ">Office</option>" +
                                "</select></div><div class='col-md-5'><input type='text' class='form-control' name='address_data[]' value='" + 
                                data.data +"'></div>" +
                                "<div class='col-md-1'><i class='fa fa-minus-circle removeAddressBtn1' aria-hidden='true'></i></div></div>");
                            });
                        }

                        else
                        {
                            $("#opt_address").append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Address1" + 
                                "</label><div class='col-md-3'><select class='form-control' name='address_type[]'><option value='home'>Home" +
                                "</option><option value='company'>Company</option><option value='stall'>Stall</option><option value='office'>" +
                                "Office</option></select></div><div class='col-md-5'><input type='text' class='form-control'" + 
                                "name='address_data[]'></div>");
                        }

                        if(response.optionalvehicles.length > 0)
                        {
                            $.each(response.optionalvehicles, function(index, data) {

                                $('#opt_vehicle').append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Vehicle " + 
                            "</label><div class='col-md-3'><select class='form-control' name='vehicle_type[]'>" + 
                            "<option value='car'" + (data.type == 'car' ? 'selected': '') + ">Car</option>" +
                            "<option value='ship'" + (data.type == 'ship' ? 'selected': '') + ">Ship</option></select></div>" +
                            "<div class='col-md-5'>" +
                            "<input type='text' class='form-control' name='vehicle_data[]' value='" + data.data + "'></div>" +
                            "<div class='col-md-1'><i class='fa fa-minus-circle removeVehicleBtn1' aria-hidden='true'></i></div></div>");
                            });
                        }

                        else
                        {
                            $("#opt_vehicle").append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Vehicle " + 
                            "</label><div class='col-md-3'><select class='form-control' name='vehicle_type[]'><option value='car'>Car</option>" +
                            "<option value='ship'>Ship</option></select></div><div class='col-md-5'>" +
                            "<input type='text' class='form-control' name='vehicle_data[]'></div>" +
                            "<div class='col-md-1'><i class='fa fa-minus-circle removeVehicleBtn1' aria-hidden='true'></i></div></div>");
                        }

                        if(response.specialRemarks.length > 0)
                        {
                            $.each(response.specialRemarks, function(index, data) {
                                $('#special_remark').append("<div class='form-group'><label class='col-md-3 control-label'>Special Remark 1" +
                                    "</label><div class='col-md-8'><input type='text' class='form-control' name='special_remark[]' value='" +
                                    data.data + "'></div><div class='col-md-1'><i class='fa fa-minus-circle removeSpecRemarkBtn1' aria-hidden='true'></i></div></div>");
                            });
                        }

                        else
                        {
                            $("#special_remark").append("<div class='form-group'><label class='col-md-3 control-label'>Special Remark 1" +
                                "</label><div class='col-md-8'><input type='text' class='form-control' name='special_remark[]'></div>");
                        }

                        
                    },

                    error: function (response) {
                        console.log(response);  
                    } 
                });

            });          

            var address_count = 2;

            $("#appendAddressBtn").click(function() {

                $("#append_opt_address").append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Address " + address_count +
                    "</label><div class='col-md-3'>" +
                    "<select class='form-control' name='address_type[]'><option value='home'>Home</option>" +
                    "<option value='company'>Company</option><option value='stall'>Stall</option><option value='office'>Office</option>" +
                    "</select></div><div class='col-md-5'><input type='text' class='form-control' name='address_data[]'></div>" +
                    "<div class='col-md-1'><i class='fa fa-minus-circle removeAddressBtn' aria-hidden='true'></i></div></div>");

                address_count++;
            });

            $("#AddressBtn").click(function() {

                $("#opt_address").append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Address " +
                    "</label><div class='col-md-3'>" +
                    "<select class='form-control' name='address_type[]'><option value='home'>Home</option>" +
                    "<option value='company'>Company</option><option value='stall'>Stall</option><option value='office'>Office</option>" +
                    "</select></div><div class='col-md-5'><input type='text' class='form-control' name='address_data[]'></div>" +
                    "<div class='col-md-1'><i class='fa fa-minus-circle removeAddressBtn1' aria-hidden='true'></i></div></div>");
            });

            $("#append_opt_address").on('click', '.removeAddressBtn', function() {

                $(this).parent().parent().remove();
            });

            $("#opt_address").on('click', '.removeAddressBtn1', function() {

                $(this).parent().parent().remove();
            });

            var vehicle_count = 2;

            $("#appendVehicleBtn").click(function() {

                $("#append_opt_vehicle").append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Vehicle " + vehicle_count + 
                    "</label><div class='col-md-3'><select class='form-control' name='vehicle_type[]'><option value='car'>Car</option>" +
                    "<option value='ship'>Ship</option></select></div><div class='col-md-5'>" +
                    "<input type='text' class='form-control' name='vehicle_data[]'></div>" +
                    "<div class='col-md-1'><i class='fa fa-minus-circle removeVehicleBtn' aria-hidden='true'></i></div></div>");

                vehicle_count++;
            });

            $("#VehicleBtn").click(function() {

                $("#opt_vehicle").append("<div class='form-group'><label class='col-md-3 control-label'>Opt.Vehicle " + 
                    "</label><div class='col-md-3'><select class='form-control' name='vehicle_type[]'><option value='car'>Car</option>" +
                    "<option value='ship'>Ship</option></select></div><div class='col-md-5'>" +
                    "<input type='text' class='form-control' name='vehicle_data[]'></div>" +
                    "<div class='col-md-1'><i class='fa fa-minus-circle removeVehicleBtn1' aria-hidden='true'></i></div></div>");

            });

            $("#append_opt_vehicle").on('click', '.removeVehicleBtn', function() {

                $(this).parent().parent().remove();
            });

            $("#opt_vehicle").on('click', '.removeVehicleBtn1', function() {

                $(this).parent().parent().remove();
            });

            var sremark_count = 2;

            $("#appendSpecRemarkBtn").click(function() {

                $("#append_special_remark").append("<div class='form-group'><label class='col-md-3 control-label'>Special Remark 1" +
                    "</label><div class='col-md-8'><input type='text' class='form-control' name='special_remark[]'></div>" +
                    "<div class='col-md-1'><i class='fa fa-minus-circle removeSpecRemarkBtn' aria-hidden='true'></i></div></div>");

                sremark_count++;
            });

            $("#SpecRemarkBtn").click(function() {

                $("#special_remark").append("<div class='form-group'><label class='col-md-3 control-label'>Special Remark" +
                    "</label><div class='col-md-8'><input type='text' class='form-control' name='special_remark[]'></div>" +
                    "<div class='col-md-1'><i class='fa fa-minus-circle removeSpecRemarkBtn1' aria-hidden='true'></i></div></div>");
            });

            $("#append_special_remark").on('click', '.removeSpecRemarkBtn', function() {

                $(this).parent().parent().remove();
            });

            $("#special_remark").on('click', '.removeSpecRemarkBtn1', function() {

                $(this).parent().parent().remove();
            });

        });
    </script>

@stop