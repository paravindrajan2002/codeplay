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
                                <h4 class="mb-sm-0">Products Variant</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product Manage</a></li>
                                        <li class="breadcrumb-item active">Product Variant</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">Filters</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="#!" class="text-reset text-decoration-underline">Clear All</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="search-box mb-3">
                                        <input type="text" class="form-control" id="searchResultList" autocomplete="off" placeholder="Search products, category etc...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <div class="accordion accordion-flush filter-panel" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="categoryAccordion">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                                                    Product Category
                                                </button>
                                            </h2>
                                            <div id="collapseCategory" class="accordion-collapse collapse show" aria-labelledby="categoryAccordion" data-bs-parent="#categoryFilters">
                                                <div class="accordion-body">
                                                    <ul class="list-unstyled mb-0 filter-list">
                                                        <li>
                                                            <a href="#" class="d-flex py-1 align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-sm mb-0 listname">Appliances</h5>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex py-1 align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-sm mb-0 listname">Automotive Accessories</h5>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex py-1 align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-sm mb-0 listname">Electronics</h5>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex py-1 align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-sm mb-0 listname">Fashion</h5>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <span class="badge bg-light text-muted">7</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex py-1 align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-sm mb-0 listname">Furniture</h5>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex py-1 align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-sm mb-0 listname">Grocery</h5>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex py-1 align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-sm mb-0 listname">Headphones</h5>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <span class="badge bg-light text-muted">2</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    
                                                        <li>
                                                            <a href="#" class="d-flex py-1 align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-sm mb-0 listname">Luggage</h5>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <span class="badge bg-light text-muted">1</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex py-1 align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-sm mb-0 listname">Sports</h5>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <span class="badge bg-light text-muted">1</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex py-1 align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-sm mb-0 listname">Watches</h5>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="priceAccordion">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="true" aria-controls="collapsePrice">
                                                    Price
                                                </button>
                                            </h2>
                                            <div id="collapsePrice" class="accordion-collapse collapse show" aria-labelledby="priceAccordion" data-bs-parent="#priceFilters">
                                                <div class="accordion-body">
                                                    <div id="product-price-range" data-slider-color="secondary"></div>
                                                    <div class="formCost d-flex gap-2 align-items-center mt-3">
                                                        <input class="form-control form-control-sm" type="text" id="minCost" value="0"> <span class="fw-semibold text-muted">to</span> <input class="form-control form-control-sm" type="text" id="maxCost" value="1000">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="ColorsAccordion">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseColors" aria-expanded="true" aria-controls="collapseColors">
                                                    Colors
                                                </button>
                                            </h2>
                                            <div id="collapseColors" class="accordion-collapse collapse show" aria-labelledby="ColorsAccordion" data-bs-parent="#ColorsFilters">
                                                <div class="accordion-body">
                                                    <div class="hstack gap-2 flex-wrap">
                                                        <a href="#!" class="btn btn-sm btn-subtle-primary">Blue</a>
                                                        <a href="#!" class="btn btn-sm btn-subtle-secondary">Dark</a>
                                                        <a href="#!" class="btn btn-sm btn-subtle-success">Green</a>
                                                        <a href="#!" class="btn btn-sm btn-subtle-danger">Red</a>
                                                        <a href="#!" class="btn btn-sm btn-subtle-dark">Black</a>
                                                        <a href="#!" class="btn btn-sm btn-subtle-warning">Yellow</a>
                                                        <a href="#!" class="btn btn-sm btn-subtle-info">Cyan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="brandsAccordion">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrands" aria-expanded="true" aria-controls="collapseBrands">
                                                    Brands <span class="badge bg-primary ms-2 fs-xxs">3</span>
                                                </button>
                                            </h2>
                                            <div id="collapseBrands" class="accordion-collapse collapse show" aria-labelledby="brandsAccordion" data-bs-parent="#brandsFilters">
                                                <div class="accordion-body">
                                                    <div class="d-flex flex-column gap-2 filter-check">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="Boat" id="productBrandAll">
                                                            <label class="form-check-label" for="productBrandAll">All Select</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="Boat" id="productBrandRadio5" checked>
                                                            <label class="form-check-label" for="productBrandRadio5">Boat</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="OnePlus" id="productBrandRadio4">
                                                            <label class="form-check-label" for="productBrandRadio4">OnePlus</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="Realme" id="productBrandRadio3">
                                                            <label class="form-check-label" for="productBrandRadio3">Realme</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="Sony" id="productBrandRadio2">
                                                            <label class="form-check-label" for="productBrandRadio2">Sony</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="JBL" id="productBrandRadio1" checked>
                                                            <label class="form-check-label" for="productBrandRadio1">JBL</label>
                                                        </div>
                                                    
                                                        <div>
                                                            <button type="button" class="btn btn-link text-decoration-none text-uppercase fw-medium p-0">1,235
                                                                More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="discountAccordion">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDiscount" aria-expanded="false" aria-controls="collapseDiscount">
                                                    Discount
                                                </button>
                                            </h2>
                                            <div id="collapseDiscount" class="accordion-collapse collapse" aria-labelledby="discountAccordion" data-bs-parent="#brandsFilters">
                                                <div class="accordion-body">
                                                    <div class="d-flex flex-column gap-2 filter-check" id="discount-filter">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="50" id="productdiscountRadio6">
                                                            <label class="form-check-label" for="productdiscountRadio6">50% or more</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="40" id="productdiscountRadio5">
                                                            <label class="form-check-label" for="productdiscountRadio5">40% or more</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="30" id="productdiscountRadio4">
                                                            <label class="form-check-label" for="productdiscountRadio4">
                                                                30% or more
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="20" id="productdiscountRadio3">
                                                            <label class="form-check-label" for="productdiscountRadio3">
                                                                20% or more
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="10" id="productdiscountRadio2">
                                                            <label class="form-check-label" for="productdiscountRadio2">
                                                                10% or more
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="0" id="productdiscountRadio1">
                                                            <label class="form-check-label" for="productdiscountRadio1">
                                                                Less than 10%
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-9">
                            <div class="row align-items-center mb-4 g-3">
                                <div class="col-xxl-2 col-lg-4 col-sm-6 me-auto">
                                    <h5 class="mb-0">Products <span class="badge bg-secondary-subtle text-secondary align-middle ms-1">254</span></h5>
                                </div><!--end col-->
                                <div class="col-xxl-2 col-lg-4 col-sm-6">
                                    <select class="form-control" data-choices data-choices-search-false>
                                        <option value="All Select" selected>All Select</option>
                                        <option value="Best Rated">Best Rated</option>
                                        <option value="Best Selling">Best Selling</option>
                                        <option value="Newest">Newest</option>
                                        <option value="Trending">Trending</option>
                                    </select>
                                </div><!--end col-->
                                <div class="col-lg-auto">
                                    <a href="add-product.php" class="btn btn-primary" ><i class="bi bi-plus-circle align-baseline me-1"></i> Add Product</a>
                                </div><!--end col-->
                            </div><!--end row-->

                            <div class="row" id="product-grid">
                            </div><!--end row-->

                            <div class="row mb-4 align-items-center" id="pagination-element">
                                <div class="col-sm">
                                    <div class="text-muted">
                                        Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">35</span> Results
                                    </div>
                                </div>
                            
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                        <div class="page-item">
                                            <a href="javascript:void(0);" class="page-link" id="page-prev">←</a>
                                        </div>
                                        <span id="page-num" class="pagination"></span>
                                        <div class="page-item">
                                            <a href="javascript:void(0);" class="page-link" id="page-next">→</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end pagination -->

                            <div class="row d-none" id="search-result-elem">
                                <div class="col-lg-12">
                                    <div class="text-center py-5">
                                        <div class="avatar-lg mx-auto mb-4">
                                            <div class="avatar-title bg-light text-primary rounded-circle fs-4xl">
                                                <i class="bi bi-search"></i>
                                            </div>
                                        </div>
    
                                        <h5>No matching records found</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- end search-result -->
                        </div><!--end col-->
                    </div><!--end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


 <?php include("footer.php") ?>
    <!-- nouisliderribute js -->
    <script src="assets/libs/nouislider/nouislider.min.js"></script>
    <script src="assets/libs/wnumb/wNumb.min.js"></script>

    <!-- ecommerce-product-grid-list js -->
    <script src="assets/js/pages/ecommerce-product-grid-list.init.js"></script>