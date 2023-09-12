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
                                <h4 class="mb-sm-0">Products</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product Manage</a></li>
                                        <li class="breadcrumb-item active">Products</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div id="productList">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-xxl-3">
                                                <div class="search-box">
                                                    <input type="text" class="form-control search" placeholder="Search products, price etc...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div>
                                                    <select class="form-control" data-choices data-choices-search-false data-choices-removeItem multiple data-choices-limit="Required Limit" data-choices-text-unique-true>
                                                        <option value="">Select Brands</option>
                                                        <option value="Adidas">Adidas</option>
                                                        <option value="Boat" selected>Boat</option>
                                                        <option value="Puma" selected>Puma</option>
                                                        <option value="Realme">Realme</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div>
                                                    <select class="form-control" id="idCategory" data-choices data-choices-search-false data-choices-removeItem>
                                                        <option value="all">Select Category</option>
                                                        <option value="Appliances">Appliances</option>
                                                        <option value="Automotive Accessories">Automotive Accessories</option>
                                                        <option value="Electronics">Electronics</option>
                                                        <option value="Fashion">Fashion</option>
                                                        <option value="Furniture">Furniture</option>
                                                        <option value="Grocery">Grocery</option>
                                                        <option value="Headphones">Headphones</option>
                                                        <option value="Kids">Kids</option>
                                                        <option value="Luggage">Luggage</option>
                                                        <option value="Sports">Sports</option>
                                                        <option value="Watches">Watches</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-xxl-2 col-sm-6">
                                                <div>
                                                    <select class="form-control" id="idDiscount"  data-choices data-choices-search-false data-choices-removeItem>
                                                        <option value="all">Select All Discount</option>
                                                        <option value="50">50% or more</option>
                                                        <option value="40">40% or more</option>
                                                        <option value="30">30% or more</option>
                                                        <option value="20">20% or more</option>
                                                        <option value="10">10% or more</option>
                                                        <option value="0">Less than 10%</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-xxl-1 col-sm-6">
                                                <button type="button" class="btn btn-secondary w-100" onclick="filterData();"><i class="bi bi-funnel align-baseline me-1"></i> Filters</button>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="card-title mb-0">Products <span class="badge bg-dark-subtle text-dark ms-1">254</span></h5>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="d-flex flex-wrap align-items-start gap-2">
                                                <button class="btn btn-subtle-danger d-none" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                                <a href="add-product.php"><button type="button" class="btn btn-primary add-btn" ><i class="bi bi-plus-circle align-baseline me-1"></i> Add Product</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-centered align-middle table-nowrap mb-0">
                                                <thead class="table-active">
                                                    <tr>
                                                        <th>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="option" id="checkAll">
                                                                <label class="form-check-label" for="checkAll"></label>
                                                            </div>
                                                        </th>
                                                        <th class="sort cursor-pointer" data-sort="products">Products</th>
                                                        <th class="sort cursor-pointer" data-sort="category">Category</th>
                                                        <th class="sort cursor-pointer" data-sort="stock">Stock</th>
                                                        <th class="sort cursor-pointer" data-sort="price">Price</th>
                                                        <th class="sort cursor-pointer" data-sort="orders">Orders</th>
                                                        <th class="sort cursor-pointer" data-sort="rating">Rating</th>
                                                        <th class="sort cursor-pointer" data-sort="published">Published</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="chk_child">
                                                                <label class="form-check-label"></label>
                                                            </div>
                                                        </td>
                                                        <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#TB01</a></td>
                                                        <td class="products">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-xs bg-light rounded p-1 me-2">
                                                                    <img src="assets/images/products/32/img-1.png" alt="" class="img-fluid d-block">
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-0"><a href="apps-ecommerce-product-details.html" class="text-reset products">Branded T-Shirts</a></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="discount d-none">Fashion</td>
                                                        <td class="category">Fashion</td>
                                                        <td class="stock">12</td>
                                                        <td class="price">$215.00</td>
                                                        <td class="orders">48</td>
                                                        <td class="rating">
                                                            <span class="badge bg-warning-subtle text-warning"><i class="bi bi-star-fill align-baseline me-1"></i> 4.9</span>
                                                        </td>
                                                        <td class="published">12 Oct, 2022</td>
                                                        <td>
                                                            <div class="dropdown position-static">
                                                                <button class="btn btn-subtle-secondary btn-sm btn-icon" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                            
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="product-details.php"><i class="ph-eye align-middle me-1"></i> View</a></li>
                                                                    <li><a class="dropdown-item edit-item-btn" data-bs-toggle="modal" href="#showModal"><i class="ph-pencil align-middle me-1"></i> Edit</a></li>
                                                                    <li><a class="dropdown-item remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ph-trash align-middle me-1"></i> Remove</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><!--end table-responsive-->
    
                                        <div class="noresult" style="display: none">
                                            <div class="text-center py-4">
                                                <div class="avatar-md mx-auto mb-4">
                                                    <div class="avatar-title bg-light text-primary rounded-circle fs-4xl">
                                                        <i class="bi bi-search"></i>
                                                    </div>
                                                </div>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted mb-0">We've searched more than 150+ products We did not find any products for you search.</p>
                                            </div>
                                        </div>
                                        <!-- end noresult -->

                                        <div class="row mt-3 align-items-center" id="pagination-element">
                                            <div class="col-sm">
                                                <div class="text-muted text-center text-sm-start">
                                                    Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">35</span> Results
                                                </div>
                                            </div>

                                            <div class="col-sm-auto mt-3 mt-sm-0">
                                                <div class="pagination-wrap hstack gap-2 justify-content-center">
                                                    <a class="page-item pagination-prev disabled" href="#">
                                                        <i class="mdi mdi-chevron-left align-middle"></i>
                                                    </a>
                                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                                    <a class="page-item pagination-next" href="#">
                                                        <i class="mdi mdi-chevron-right align-middle"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end pagination-element -->
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
       

    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-4 pt-4">
                    <h5 class="modal-title" id="exampleModalLabel">Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>

                <form class="tablelist-form" novalidate autocomplete="off">
                    <div class="modal-body p-4">
                        <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                        <input type="hidden" id="id-field">

                        <input type="hidden" id="order-field">
                        <input type="hidden" id="rating-field">
                        <input type="hidden" id="discount-field">

                        <div class="mb-3">
                            <label for="product-title-input" class="form-label">Product title</label>
                            <input type="text" id="product-title-input" class="form-control" placeholder="Enter product title" required >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Images</label>
                            <div class="dropzone my-dropzone border border-1 border-dashed text-center" style="min-height: 100px;">
                                <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="bi bi-cloud-download fs-1"></i>
                                    </div>
                            
                                    <h5 class="fs-md mb-0">Drop files here or click to upload.</h5>
                                </div>
                            </div>
                            
                            <ul class="list-unstyled mb-0" id="dropzone-preview">
                                <li class="mt-2" id="dropzone-preview-list">
                                    <!-- This is used as the file preview template -->
                                    <div class="border rounded">
                                        <div class="d-flex flex-wrap gap-2 p-2">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm bg-light rounded p-2">
                                                    <img data-dz-thumbnail class="img-fluid rounded d-block" src="assets/images/new-document.png" alt="Dropzone-Image" >
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
                            <label for="product-category-input" class="form-label">Product category</label>
                            
                            <select class="form-select" id="product-category-input">
                                <option value="">Select product category</option>
                                <option value="Appliances">Appliances</option>
                                <option value="Automotive Accessories">Automotive Accessories</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Grocery">Grocery</option>
                                <option value="Headphones">Headphones</option>
                                <option value="Kids">Kids</option>
                                <option value="Luggage">Luggage</option>
                                <option value="Sports">Sports</option>
                                <option value="Watches">Watches</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-stock-input" class="form-label">Stocks</label>
                                    <input type="number" id="product-stock-input" class="form-control" placeholder="Enter product stocks" required >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-price-input" class="form-label">Price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="product-price-input" placeholder="Enter product price" required >
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i class="bi bi-x-lg align-baseline me-1"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="add-btn">Add User</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- modal -->

    <!-- deleteRecordModal -->
    <div id="deleteRecordModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="text-center">
                        <div class="text-danger">
                            <i class="bi bi-trash display-4"></i>
                        </div>
                        <div class="mt-4">
                            <h3 class="mb-2">Are you sure ?</h3>
                            <p class="text-muted fs-lg mx-3 mb-0">Are you sure you want to remove this record ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light btn-hover" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger btn-hover" id="delete-record">Yes, Delete It!</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /deleteRecordModal -->



  <?php include("footer.php") ?>
    <!-- list.js min js -->
    <script src="assets/libs/list.js/list.min.js"></script>
    <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>
    <!-- sweetalert2 js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- dropzone js -->
    <script src="assets/libs/dropzone/dropzone-min.js"></script>
    <!--Ecommerce Product List init js-->
    <script src="assets/js/pages/ecommerce-product-list.init.js"></script>