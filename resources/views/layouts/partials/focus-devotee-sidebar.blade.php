    <div class="col-md-3">

        <div class="inbox-sidebar">

            @if(Session::has('focus_devotee'))

                @php 
                    
                    $focus_devotee = Session::get('focus_devotee');

                @endphp 

            <div class="row" id="has_session">

                <div class="col-md-12">
                    <h4>Focus Devotee</h4>
                </div><!-- end col-md-12 -->

                <div class="col-md-12">

                    <div class="row form-horizontal">

                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label class="col-md-12">Devotee ID : <span id="devodee_id">{{ $focus_devotee[0]->devotee_id }}</span></label>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label class="col-md-12">Member ID : <span id="member_id">{{ $focus_devotee[0]->member_id }}</span></label>
                            </div><!-- end form-group -->


                        </div><!-- end col-md-6 -->

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-12">Family Code : <span id="family_code">{{ $focus_devotee[0]->familycode }}</span></label>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label class="col-md-12">Bridging ID : <span id="bridging_id">0</span></label>
                            </div><!-- end form-group -->
                            
                        </div><!-- end col-md-6 -->
                    </div><!-- end row -->
                    
                </div><!-- end col-md-12 -->
                
            </div><!-- end row -->

            <form class="form-horizontal form-bordered" id="focus_devotee_form" method="post" 
                action="{{ URL::to('/operator/focus-devotee') }}">

                {!! csrf_field() !!}
                                        
            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">
                        <label class="col-md-4">Title</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="title" id="title" value="{{ $focus_devotee[0]->title }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Chinese Name</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="chinese_name" id="chinese_name" 
                                value="{{ $focus_devotee[0]->chinese_name }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">English Name</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="english_name" id="english_name" 
                                value="{{ $focus_devotee[0]->english_name }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Guiyi Name</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="guiyi_name" id="guiyi_name" value="{{ $focus_devotee[0]->guiyi_name }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Contact #</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="contact" id="contact" value="{{ $focus_devotee[0]->contact }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Addr - House No</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address_houseno" id="address_houseno" value="{{ $focus_devotee[0]->address_houseno }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Addr - Street</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address_street" id="address_street" 
                                value="{{ $focus_devotee[0]->address_street }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Addr - Unit</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="adress_unit" id="address_unit1" 
                                value="{{ $focus_devotee[0]->address_unit1 }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Addr - Postal</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address_postal" id="address_postal" 
                                value="{{ $focus_devotee[0]->address_postal }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Other Addr - Chinese</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="oversea_addr_in_chinese" id="oversea_addr_in_chinese"
                                value="{{ $focus_devotee[0]->oversea_addr_in_chinese }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Nationality</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="nationality" id="nationality" 
                                value="{{ $focus_devotee[0]->nationality }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Deceased</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="deceased_year" id="deceased_year" 
                                value="{{ $focus_devotee[0]->deceased_year }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Date of Birth</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="dob" id="dob" value="{{ $focus_devotee[0]->dob }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Marital Status</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="marital_status" id="marital_status" 
                                value="{{ $focus_devotee[0]->marital_status }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Dialect</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="dialect" id="dialect" 
                                value="{{ $focus_devotee[0]->dialect }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Introduced By - 1</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="introduced_by1" id="introduced_by1" 
                                value="{{ $focus_devotee[0]->introduced_by1 }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Introduced By - 2</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="introduced_by2" id="introduced_by2" 
                                value="{{ $focus_devotee[0]->introduced_by2 }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Approval Date</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="approved_date" id="approved_date" 
                                value="{{ $focus_devotee[0]->approved_date }}">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Mailer (Y/N)</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Devotee ID</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" id="search_devotee_id">
                        </div><!-- end col-md-8 -->
                    </div>

                </div><!-- end col-md-12 -->

            </div><!-- end row -->

            @else

            <div class="row" id="no_session">

                <div class="col-md-12">
                    <h4>Focus Devotee</h4>
                </div><!-- end col-md-12 -->

                <div class="col-md-12">

                    <div class="row form-horizontal">

                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label class="col-md-12">Devotee ID : <span id="devodee_id">0</span></label>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label class="col-md-12">Member ID : <span id="member_id">0</span></label>
                            </div><!-- end form-group -->


                        </div><!-- end col-md-6 -->

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-12">Family Code : <span id="family_code">0</span></label>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label class="col-md-12">Bridging ID : <span id="bridging_id">0</span></label>
                            </div><!-- end form-group -->
                            
                        </div><!-- end col-md-6 -->
                    </div><!-- end row -->
                    
                </div><!-- end col-md-12 -->
                
            </div><!-- end row -->

            <form class="form-horizontal form-bordered" id="focus_devotee_form" method="post" 
                action="{{ URL::to('/operator/focus-devotee') }}">

                {!! csrf_field() !!}
                                        
            <div class="row">

                <div class="col-md-12">     

                    <div class="form-group">
                        <label class="col-md-4">Title</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="title" id="title" value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Chinese Name</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="chinese_name" id="chinese_name" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">English Name</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="english_name" id="english_name" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Guiyi Name</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="guiyi_name" id="guiyi_name" value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Contact #</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="contact" id="contact" value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Addr - House No</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address_houseno" id="address_houseno" value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Addr - Street</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address_street" id="address_street" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Addr - Unit</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="adress_unit1" id="address_unit1" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Addr - Postal</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address_postal" id="address_postal" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Other Addr - Chinese</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="oversea_addr_in_chinese" id="oversea_addr_in_chinese"
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Nationality</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="nationality" id="nationality" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Deceased</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="deceased_year" id="deceased_year" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Date of Birth</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="dob" id="dob" value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Marital Status</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="marital_status" id="marital_status" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Dialect</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="dialect" id="dialect" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Introduced By - 1</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="introduced_by1" id="introduced_by1" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Introduced By - 2</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="introduced_by2" id="introduced_by2" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Approval Date</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="approved_date" id="approved_date" 
                                value="">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label class="col-md-4">Mailer (Y/N)</label>
                        
                        <div class="col-md-8">
                            <input type="text" class="form-control">
                        </div><!-- end col-md-8 -->

                    </div><!-- end form-group -->

                </div><!-- end col-md-12 -->

            </div><!-- end row -->


            @endif

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">
                    </div><!-- end form-group -->

                    <div class="form-group">
                        <button type="button" class="btn green" style="width: 100px; margin: 0 25px 0 10px;">New
                        </button>
	                   <button type="submit" class="btn default" style="margin-right: 25px;" id="quick_search">Quick Search
	                   </button>
                    </div><!-- end form-group -->
                                        		
                </div><!-- end col-md-12 -->

            </div><!-- end row -->

            </form>

            <form class="form-horizontal form-bordered" id="focus_devotee_form" method="post" 
                action="{{ URL::to('/operator/devotee/new-search') }}">

                {!! csrf_field() !!}

            <div class="form-group">
                <button type="submit" class="btn default" id="new_search">New Search</button>
            </div>

            </form>
                                        
        </div><!-- end inbox-sidebar -->

    </div><!-- end col-md-3 -->