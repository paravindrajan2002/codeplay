      <?php include("header.php") ?>
	  
	  
	  
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
				
					 
					 
					 <div class="seller-account mb-4">
						<div class="row">
							<div class="col-12">
								<div class="page-title-box d-sm-flex align-items-center justify-content-between">
									<h4 class="mb-sm-0 fs-5">Returns Setting</h4>
								</div>
							</div>
						</div>
						
						<div class="alert alert-dark" role="alert">
						 <div class="d-flex">
							<div class="me-2"> <i class="fa fa-exclamation-triangle"></i></div>
							<div class="">
							
								<p class="mb-0 ">Welcome to the new Returns SettingS! Return Setting are now marketplace-secific. if selling account is enabled for multiple regions, you page to configure for each marketplace.</p>
							</div>
						 </div>
						</div>
						
						
						<div class="card">
                                <div class="card-body">
                                    <p class="text-muted text-end"><a href="#" data-bs-toggle="modal" data-bs-target="#settheaddress">Edit returns setting</a></p>
                                    <ul class="nav nav-pills arrow-navtabs nav-success bg-light mb-3" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#arrow-overview" role="tab" aria-selected="true">
                                                <span class="">General Settings</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#arrow-profile" role="tab" aria-selected="false" tabindex="-1">
                                                <span class="">Returns Address Settings</span>
                                            </a>
                                        </li>
                                     
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="arrow-overview" role="tabpanel">
                                            <h6>E-mail format</h6>
                                          
											<div class="form-check form-radio-warning form-check-inline mb-4 ">
												<input class="form-check-input" type="checkbox" name="formradiocolor4" id="formradioRight8" checked>
												<label class="form-check-label" for="formradioRight8">
													Recive return request e-mails with links to Authorize, Close, or Replay
												</label>
											</div>
											<h6>Default Automated Return Rules</h6>
											<div class="form-check form-radio-success form-check-inline w-100">
												<input class="form-check-input" type="radio" name="formradiocolor4" id="formradioRight8" >
												<label class="form-check-label" for="formradioRight8">
													I want to authorize each request
												</label>
											</div>
											<div class="form-check form-radio-success form-check-inline w-100">
												<input class="form-check-input" type="radio" name="formradiocolor4" id="formradioRight8" >
												<label class="form-check-label" for="formradioRight8">
													I want HumTum Baby to automatically aurhorize all requests that meet HumTum Baby policy
												</label>
											</div>
											<div class="form-check form-radio-success form-check-inline w-100 mb-4">
												<input class="form-check-input" type="radio" name="formradiocolor4" id="formradioRight8" >
												<label class="form-check-label" for="formradioRight8">
													I want HumTum Baby to automatically aurhorize all requests
												</label>
											</div>
											<h6>Return Merchandise Authorization (RMA) number settings</h6>
											<div class="form-check form-radio-success form-check-inline w-100">
												<input class="form-check-input" type="radio" name="formradiocolor4" id="formradioRight8" >
												<label class="form-check-label" for="formradioRight8">
													I want HumTum Baby to generate a Return Merchandise Authorization number
												</label>
											</div>											
											<div class="form-check form-radio-success form-check-inline w-100 mb-4">
												<input class="form-check-input" type="radio" name="formradiocolor4" id="formradioRight8" >
												<label class="form-check-label" for="formradioRight8">
													I want to provide a Return Merchandise Authorization number
												</label>
											</div>
											
																</div>
                                        <div class="tab-pane" id="arrow-profile" role="tabpanel">
                                            <h6 class="fw-bold">humtumbaby.com Overrides</h6>
                                            <p class="">Default Returns Address </p>
											<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#settheaddress">Set the address</button>
                                        </div>
										<!-- Modal settheaddress-->
											<div class="modal fade" id="settheaddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Set The Address</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												  </div>
												  <div class="modal-body">
													...
												  </div>
												
												</div>
											  </div>
											</div>
																				 
                                    </div>
                                </div><!-- end card-body -->
                            </div>
						
						
			  
			
						
			
                       

           <?php include("footer.php") ?>
