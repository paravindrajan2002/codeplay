 <?php include("header.php") ?>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body p-md-5">
                        <div class="text-center">
                            <div class="text-danger">
                                <i class="bi bi-trash display-4"></i>
                            </div>
                            <div class="mt-4 fs-base">
                                <h4 class="mb-1">Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- removeCartModal -->
        <div id="removeCartModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-cartmodal"></button>
                    </div>
                    <div class="modal-body p-md-5">
                        <div class="text-center">
                            <div class="text-danger">
                                <i class="bi bi-trash display-5"></i>
                            </div>
                            <div class="mt-4">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this product ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="remove-cartproduct">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
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
                                <h4 class="mb-sm-0">Add Product</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                       <li class="breadcrumb-item"><a href="javascript: void(0);">Product Manage</a></li>
                                        <li class="breadcrumb-item active">Add Product</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <h5 class="card-title mb-3">Product Information</h5>
                                            <p class="text-muted">Product Information refers to any information held by an organisation about the products it produces, buys, sells or distributes.</p>
                                        </div>
                                        <div class="col-xxl-8">
                                            <form action="#!">
                                                <div class="mb-3">
                                                    <label for="productTitle" class="form-label">Product Title <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="productTitle" placeholder="Enter product title" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productCategories" class="form-label">Categories <span class="text-danger">*</span></label>
                                                    <select class="form-control" data-choices name="productCategories" id="productCategories">
                                                        <option value="">Select categories</option>
                                                        <option value="Appliances">Appliances</option>
                                                        <option value="Automotive Accessories">Automotive Accessories</option>
                                                        <option value="Electronics">Electronics</option>
                                                        <option value="Fashion">Fashion</option>
                                                        <option value="Furniture">Furniture</option>
                                                        <option value="Footwear">Footwear</option>
                                                        <option value="Sportswear">Sportswear</option>
                                                        <option value="Watches">Watches</option>
                                                        <option value="Headphones">Headphones</option>
                                                        <option value="Other Accessories">Other Accessories</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productType" class="form-label">Product Type <span class="text-danger">*</span></label>
                                                    <select class="form-control" data-choices name="productType" id="productType">
                                                        <option value="">Select Type</option>
                                                        <option value="Simple">Simple</option>
                                                        <option value="Classified">Classified</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shortDecs" class="form-label">Short Description <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="shortDecs" placeholder="Must enter minimum of a 100 characters" rows="3"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="productBrand" class="form-label">Brand <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="productBrand" placeholder="Enter brand" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="productUnit" class="form-label">Unit <span class="text-danger">*</span></label>
                                                            <select class="form-control" data-choices name="productUnit" id="productUnit">
                                                                <option value="">Select Unit</option>
                                                                <option value="Kilogram">Kilogram</option>
                                                                <option value="Pieces">Pieces</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tags</label>
                                                    <input class="form-control" id="choices-text-unique-values" data-choices data-choices-text-unique-true data-choices-removeItem type="text" value="Fashion, Style, Brands, Puma">
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-check form-switch mb-3">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="exchangeableInput">
                                                            <label class="form-check-label" for="exchangeableInput">Exchangeable</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-check form-switch mb-3">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="refundableInput">
                                                            <label class="form-check-label" for="refundableInput">Refundable</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <h5 class="card-title mb-3">Description</h5>
                                            <p class="text-muted">Product Information refers to any information held by an organization about the products it produces, buys, sells or distributes.</p>
                                        </div><!--end col-->
                                        <div class="col-xxl-8">
                                            <div>
                                                <label class="form-label">Product Description <span class="text-danger">*</span></label>
                                                <div class="ckeditor-classic"></div>
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <h5 class="card-title mb-3">Images</h5>
                                            <p class="text-muted">Product Information refers to any information held by an organization about the products it produces, buys, sells or distributes.</p>
                                        </div><!--end col-->
                                        <div class="col-xxl-8">
                                            <div class="mb-3">
                                                <label class="form-label">Product Images <span class="text-danger">*</span></label>
                                                <div class="dropzone text-center">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple="multiple">
                                                    </div>
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                        </div>
                                                
                                                        <h4>Drop product images here or click to upload.</h4>
                                                    </div>
                                                </div>
                                                
                                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                    <li class="mt-2" id="dropzone-preview-list">
                                                        <!-- This is used as the file preview template -->
                                                        <div class="border rounded">
                                                            <div class="d-flex p-2">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm bg-light rounded">
                                                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="assets/images/new-document.png" alt="Dropzone-Image">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <div class="pt-1">
                                                                        <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                                        <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-3">
                                                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <!-- end dropzon-preview -->
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Gallery Images <span class="text-danger">*</span></label>
                                                <div class="dropzone text-center" id="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple="multiple">
                                                    </div>
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                        </div>
                                            
                                                        <h4>Drop gallery images here or click to upload.</h4>
                                                    </div>
                                                </div>
                                            
                                                <ul class="list-unstyled mb-0" id="dropzone-preview2">
                                                    <li class="mt-2" id="dropzone-preview-list2">
                                                        <!-- This is used as the file preview template -->
                                                        <div class="border rounded">
                                                            <div class="d-flex p-2">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm bg-light rounded">
                                                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="assets/images/new-document.png" alt="Dropzone-Image">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <div class="pt-1">
                                                                        <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                                        <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-3">
                                                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <!-- end dropzon-preview -->
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <h5 class="card-title mb-3">General Info</h5>
                                            <p class="text-muted mb-0">An informational product can be a digital book (or e-book), a digital report, a white paper, a piece of software, audio or video files, a website, an e-zine or a newsletter.</p>
                                        </div><!--end col-->
                                        <div class="col-xxl-8">
                                            <div class="row gy-3">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label for="manufacturer-name-input" class="form-label">Manufacturer Name</label>
                                                        <input type="text" class="form-control" id="manufacturer-name-input" placeholder="Enter manufacturer name" required>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label" for="manufacturer-brand-input">Manufacturer Brand</label>
                                                        <input type="text" class="form-control" id="manufacturer-brand-input" placeholder="Enter manufacturer brand">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label for="productStocks" class="form-label">Stocks <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="productStocks" placeholder="Stocks" required>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label class="form-label" for="product-price-input">Price</label>
                                                        <div class="input-group has-validation">
                                                            <span class="input-group-text" id="product-price-addon">$</span>
                                                            <input type="text" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required="">
                                                            <div class="invalid-feedback">Please Enter a product price.</div>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label class="form-label" for="product-discount-input">Discount</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="product-discount-addon">%</span>
                                                            <input type="text" class="form-control" id="product-discount-input" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label for="choices-publish-status-input" class="form-label">Status</label>
                                                        <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                                                            <option value="Published" selected>Published</option>
                                                            <option value="Scheduled">Scheduled</option>
                                                            <option value="Draft">Draft</option>
                                                        </select>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                                                        <select class="form-select" id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                                            <option value="Public" selected>Public</option>
                                                            <option value="Hidden">Hidden</option>
                                                        </select>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div>
                                    </div><!--end row-->
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="hstack gap-2 justify-content-end mb-3">
                        <button class="btn btn-danger"><i class="ph-x align-middle"></i> Cancel</button>
                        <button class="btn btn-primary">Submit</button>
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


   
  <?php include("footer.php") ?>
	
	
	<!-- dropzone min -->
    <script src="assets/libs/dropzone/dropzone-min.js"></script>

    <!-- ckeditor -->
    <script src="assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

    <!-- init js -->
    <script src="assets/js/pages/ecommerce-create-product.init.js"></script>