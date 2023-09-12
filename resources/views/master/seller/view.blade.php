@extends('layouts.master.header')


@section('content')

 <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

               <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">New Seller Details</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Seller</a></li>
                                        <li class="breadcrumb-item active">New Seller Details</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
					
					
					  
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
					   
                                      <div class="col-lg-6 col-md-6">                                   
                                 
                    <div class="modal-body">
                        <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                        <input type="hidden" id="id-field">
                        <div>
                           

                            <div class="mb-3">
                                <label  class="form-label">Shop Name </label>
                                <input type="text" class="form-control" value="@if ($seller->first_name) {{ $seller->first_name}} @else Name Not Found @endif  @if ($seller->last_name) {{ $seller->last_name}}  @endif "  placeholder="Zibra Fashion" disabled>
                            </div>
        
                            <div class="mb-3">
                                <label class="form-label">GSTIN </label>
                                <input type="text" class="form-control" value="@if ($seller->gst) {{ $seller->gst}} @else GST Not Found @endif"  placeholder="123456789" disabled>
                            </div>

                        
							
							 <div class="mb-3">
                                <label class="form-label">Account Holder Name</label>
                                <input type="text" class="form-control" value="@if ($seller->holder_name) {{ $seller->holder_name}} @else Name Not Found @endif" placeholder="sathiskumar" disabled>
                            </div>
							 <div class="mb-3">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control" value="@if ($seller->account_number) {{ $seller->account_number}} @else A/C No. Not Found @endif"  placeholder="sc2154899789" disabled>
                            </div>
							 <div class="mb-3">
                                <label class="form-label">IFSC Code</label>
                                <input type="text" class="form-control" value="@if ($seller->ifsc) {{ $seller->ifsc}} @else IFSC No. Not Found @endif" placeholder="sc0005555" disabled>
                            </div>
							
							
							
							</div>
							</div>
							</div>
							
							 <div class="col-lg-6 col-md-6"> 
							  <div class="mb-3">
                                <label class="form-label">Branch</label>
                                <input type="text" class="form-control" placeholder="NA" value="@if ($seller->business_name) {{ $seller->business_name}} @else Branch Not Found @endif" disabled>
                            </div>
							   <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" value="@if ($seller->email) {{ $seller->email}} @else Email Not Found @endif" class="form-control" placeholder="example@gmail.com" disabled>
                            </div>
							  <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" value="@if ($seller->phone) {{ $seller->phone}} @else Phone No. Not Found @endif" class="form-control" placeholder="9658741235" disabled>
                            </div>
							 <div class="mb-3">
                                <label class="form-label">Address1</label>
                                <input type="text" class="form-control" value="@if ($seller->business_address) {{ $seller->business_address}} @else Address Not Found @endif"  placeholder="24 MGM street, Ashok Nager" disabled>
                            </div>
						
							 </div>
							
							
							 <div class="mb-3">
							 <label class="form-label">KYC Details</label>                              
                                        <div class="border rounded">
                                            <div class="row p-2">
											  <div class="col-lg-6 col-md-6"> 
											   <label class="form-label">Address Proof</label> 
                                                <br>
                                               @if($seller->address_proof)

                                               <img class="img-fluid rounded " style="height:250px !important" src="https://dev.humtumbaby.com/vendorassets/uploads/{{$seller->address_proof}}" alt="" >

                                               @else
                                               <img style="height:250px !important" class="img-fluid rounded " src="{{asset('vendorassets/uploads/aadhar-card1.jpg')}}/{{$seller->address_proof}}" alt="" >

                                               @endif
                                              
											  </div>
											  <div class="col-lg-6 col-md-6"> 
											   <label class="form-label w-100">Signature</label> 
                                               @if($seller->signature)

                                                <img class="img-fluid rounded " style="height:250px !important" src="https://dev.humtumbaby.com/vendorassets/uploads/{{$seller->signature}}" alt="" >

                                                @else
                                                <img style="height:250px !important" class="img-fluid rounded " src="{{asset('vendorassets/uploads/aadhar-card1.jpg')}}/{{$seller->signature}}" alt="" >

                                                @endif

											  </div>
                                            </div>
                                        </div>                                                          
                            </div>
							
        
                            
                        
                    </div>
                    <div class="modal-footer">

                    <a href="#rejectModal" data-bs-toggle="modal" ><button type="button" class="btn btn-danger me-2" >Rejected</button></a>
                        <a href="#acceptModal" data-bs-toggle="modal" > <button type="submit" class="btn btn-primary submit-btn">Accepted</button></a>
                  
                        
                    </div>                             
                              
                            </div>
                        </div><!--end col-->
                        
                    </div><!--end row-->
                   


                  

                   

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
			
			
  <!-- acceptSellerModal -->
  <div id="acceptModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="text-center">
                        <div class="text-danger">
                            <i style="color:#0e837c" class="bi bi-person-check display-5"></i>
                        </div>
                        <div class="mt-4">
                            <h4 class="mb-2">Are you sure ? </h4>
                            <p class="text-muted mx-3 mb-0">Are you sure you want to Accept this Seller ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                        <span  class="btn w-sm btn-light btn-hover" data-bs-dismiss="modal">Close</span>
                        <form  id="accept-seller" action="{{route('master.change.seller.status')}}" method="post" class="tablelist-form"  autocomplete="off">
                            @csrf
                            <input type="text" value="{{Crypt::encrypt($seller->id)}}" hidden name="id" />
                            <input type="text" value="accept" hidden name="mode" />
                        <button type="submit" data-id="" class=" delete-btn btn w-sm btn-danger btn-hover" id="accept-record">Yes, Accept It!</button>
                        
                        </form>


                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /acceptSellerModal bi-person-slash-->


		
  <!-- rejectSellerModal -->
  <div id="rejectModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="text-center">
                        <div class="text-danger">
                            <i  class="bi bi-person-slash display-5"></i>
                        </div>
                        <div class="mt-4">
                            <h4 class="mb-2">Are you sure ? </h4>
                            <p class="text-muted mx-3 mb-0">Are you sure you want to Reject this Seller ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                        <span  class="btn w-sm btn-light btn-hover" data-bs-dismiss="modal">Close</span>
                        <form  id="accept-seller" action="{{route('master.change.seller.status')}}" method="post" class="tablelist-form"  autocomplete="off">
                            @csrf
                            <input type="text" value="{{Crypt::encrypt($seller->id)}}" hidden name="id" />
                            <input type="text" value="reject" hidden name="mode" />
                        <button type="submit" data-id="" class=" delete-btn btn w-sm btn-danger btn-hover" id="accept-record">Yes, Reject It!</button>
                        
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /rejectSellerModal bi-person-slash-->
			
		

@include('layouts.master.footer')

<script>

// $(document).ready(function () {

//      $('button.view-seller').click(function () {
//         // alert($(this).attr("data-id"));

//         $('div#divselleredit').empty();

//         var input = '<input type="text" value="'+$(this).attr("data-id")+'" name="id" />'

//         $('div#divselleredit').append(input);

//         $('form#seller-details').submit();

//     });
// });


@endsection