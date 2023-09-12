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
                                <h4 class="mb-sm-0">Product Overview</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product Manage</a></li>
                                        <li class="breadcrumb-item active">Product Overview</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-4">
                            <div class="card p-3 sticky-side-div">
                                <div class="product-img-slider">
                                    <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="p-5 mx-4">
                                                    <img src="assets/images/products/img-1.png" alt="" class="img-fluid d-block" >
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="p-5 mx-4">
                                                    <img src="assets/images/products/img-7.png" alt="" class="img-fluid d-block" >
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="p-5 mx-4">
                                                    <img src="assets/images/products/img-8.png" alt="" class="img-fluid d-block" >
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="p-5 mx-4">
                                                    <img src="assets/images/products/img-10.png" alt="" class="img-fluid d-block" >
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="p-5 mx-4">
                                                    <img src="assets/images/products/img-6.png" alt="" class="img-fluid d-block" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <!-- end swiper thumbnail slide -->
                                    <div class="swiper product-nav-slider mt-2">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="nav-slide-item">
                                                    <img src="assets/images/products/img-1.png" alt="" class="img-fluid d-block" >
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="nav-slide-item">
                                                    <img src="assets/images/products/img-7.png" alt="" class="img-fluid d-block" >
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="nav-slide-item">
                                                    <img src="assets/images/products/img-8.png" alt="" class="img-fluid d-block" >
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="nav-slide-item">
                                                    <img src="assets/images/products/img-10.png" alt="" class="img-fluid d-block" >
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="nav-slide-item">
                                                    <img src="assets/images/products/img-6.png" alt="" class="img-fluid d-block" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end swiper nav slide -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8">
                            <div class="row g-0">
                                <div class="col-xxl-8">
                                    <div class="card rounded-end-0">
                                        <div class="card-body p-4">
                                            <p class="text-muted float-md-end mb-md-0"><a href="#!"><i class="ph-storefront align-middle me-1"></i> Visit Store</a></p>
                                            <h4 class="text-capitalize mb-3">Unite wear solid men hooded neck blue T-shirt</h4>
                                            <div class="hstack gap-3 flex-wrap mb-4">
                                                <div class="text-muted"><b class="text-body fw-medium">3.7k</b> Sold</div>
                                                <div class="vr"></div>
                                                <div class="text-muted"><b class="text-body fw-medium">3.5k</b> Reviews</div>
                                                <div class="vr"></div>
                                                <div class="text-muted">Published : <span class="text-body fw-medium">26 Mar, 2021</span></div>
                                            </div>

                                            <h6 class="fs-md mb-3">Choose Size:</h6>
                                            <div class="d-flex flex-wrap gap-2">
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="Out of Stock">
                                                    <input type="radio" class="btn-check" name="productsize-radio" id="productsize-radio1" disabled>
                                                    <label class="btn btn-subtle-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center" for="productsize-radio1">S</label>
                                                </div>

                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="04 Items Available">
                                                    <input type="radio" class="btn-check" name="productsize-radio" id="productsize-radio2">
                                                    <label class="btn btn-subtle-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center" for="productsize-radio2">M</label>
                                                </div>
                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="06 Items Available">
                                                    <input type="radio" class="btn-check" name="productsize-radio" id="productsize-radio3">
                                                    <label class="btn btn-subtle-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center" for="productsize-radio3">L</label>
                                                </div>

                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="Out of Stock">
                                                    <input type="radio" class="btn-check" name="productsize-radio" id="productsize-radio4" disabled>
                                                    <label class="btn btn-subtle-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center" for="productsize-radio4">XL</label>
                                                </div>

                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="08 Items Available">
                                                    <input type="radio" class="btn-check" name="productsize-radio" id="productsize-radio5">
                                                    <label class="btn btn-subtle-primary avatar-xs rounded-circle p-0 d-flex justify-content-center align-items-center" for="productsize-radio5">2xl</label>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <h5 class="fs-md mb-3">Colors :</h5>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="Out of Stock">
                                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-5xl text-primary" disabled="">
                                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                                        </button>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="03 Items Available">
                                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-5xl text-secondary">
                                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                                        </button>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="03 Items Available">
                                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-5xl text-success">
                                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                                        </button>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="02 Items Available">
                                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-5xl text-info">
                                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                                        </button>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="01 Items Available">
                                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-5xl text-warning">
                                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                                        </button>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="04 Items Available">
                                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-5xl text-danger">
                                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                                        </button>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="03 Items Available">
                                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-5xl text-light">
                                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                                        </button>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" data-bs-original-title="04 Items Available">
                                                        <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-5xl text-dark">
                                                            <i class="ri-checkbox-blank-circle-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <h5 class="fs-md mb-3">Shipping Information:</h5>
                                                <p class="text-muted mb-2"><b>Delivery Location</b> </p>
                                                <p class="text-muted mb-0">A thicker knit T-Shirt with a rag cut edge and sleeves and a printed muscle man on the back, you will feel #ULTRA in one of these.</p>
                                            </div>

                                        </div>
                                    </div><!--end card-->
                                </div><!--end col-->
                                <div class="col-xxl-4">
                                    <div class="card card-height-100 border-start rounded-start-0">
                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card card-primary">
                                                        <div class="card-body d-flex align-items-center">
                                                            <div class="flex-grow-1">
                                                                <h5 class="card-title text-white fs-xl">25% Off</h5>
                                                                <p class="mb-0 text-white-50">If order over $120</p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <button type="button" class="btn btn-secondary">Util 10 Feb, 2024</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <div class="card border shadow-none mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="text-center">
                                                                        <p class="text-muted text-truncate mb-2">PRICE</p>
                                                                        <h6 class="fs-lg">$245.99</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-md-6">
                                                            <div class="card border shadow-none mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="text-center">
                                                                        <p class="text-muted text-truncate mb-2">No. of Orders</p>
                                                                        <h6 class="fs-lg">3.7k</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-md-6">
                                                            <div class="card border shadow-none mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="text-center">
                                                                        <p class="text-muted text-truncate mb-2">Available Stocks</p>
                                                                        <h6 class="fs-lg">764</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-md-6">
                                                            <div class="card border shadow-none mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="text-center">
                                                                        <p class="text-muted text-truncate mb-2">Total Revenue</p>
                                                                        <h6 class="fs-lg">$59,239</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->
                                                </div><!--end col-->
                                            </div><!--end row-->
                                            <div class="mt-4 d-flex gap-2">
                                                <button type="button" class="btn btn-primary w-100">Edit</button>
                                                <button type="button" class="btn btn-danger w-100"><i class="ph-trash align-middle me-1"></i> Delete</button>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="card">
                                <div class="card-body p-4">
                                    <div>
                                        <h5 class="fs-md mb-3">Description:</h5>
                                        <p class="text-muted mb-2">A <b>hoodie</b> is a sweatshirt with a hood attached that may also have a kangaroo pocket or full zipper. A sweatshirt is a long-sleeved pullover shirt fashioned out of thick, usually cotton cloth material. Sweatshirts are almost exclusively casual attire and hence not as dressy as some sweaters.</p>
                                        <p class="text-muted">A thicker knit T-Shirt with a rag cut edge and sleeves and a printed muscle man on the back, you will feel #ULTRA in one of these.</p>
                                    </div>

                                    <div class="mt-4">
                                        <h5 class="fs-md mb-3">Product Details:</h5>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-borderless align-middle description-table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Type</th>
                                                        <td>Stripped shirts</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sleeve</th>
                                                        <td>Full Sleeve</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country of Origin</th>
                                                        <td>California</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pack of</th>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Style</th>
                                                        <td>Modern</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Style Code</th>
                                                        <td>TBS037</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Generic Name</th>
                                                        <td>Formal Shirt</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ideal For</th>
                                                        <td>Men</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Size</th>
                                                        <td>All Available</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Suitable For</th>
                                                        <td>Formal Wear,Party Wear</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Seller</th>
                                                        <td>Zibra Fashion</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fabric</th>
                                                        <td>Cotton</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                 


    <!-- removeItemModal -->
    <div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal-review"></button>
                </div>
                <div class="modal-body">
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
                        <button type="button" class="btn w-sm btn-danger" id="remove-product">Yes, Delete It!</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


  <?php include("footer.php") ?>
    <!-- rater-js plugin -->
    <script src="assets/libs/rater-js/index.js"></script>
    
    <script src="assets/js/pages/ecommerce-product-overview.init.js"></script>