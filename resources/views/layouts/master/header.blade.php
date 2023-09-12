@guest

@else
<!doctype html>

<html lang="en" data-layout="horizontal" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="creative" data-topbar="light" data-bs-theme="light" data-layout-width="fluid" data-sidebar-image="none" data-layout-position="fixed" data-layout-style="default">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta charset="utf-8">
        <title>Master Dashboard | HumTum Baby</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('master-assets/images/favicon.png')}}">

        <!-- Fonts css load -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link id="fontsLink" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

        <!-- jsvectormap css -->
        <link href="{{asset('master-assets/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css">

        <!--Swiper slider css-->
        <link href="{{asset('master-assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css">


        <!-- dropzone css -->
        <link href="{{asset('master-assets/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css">

        <!-- Layout config Js -->
        <script src="{{asset('master-assets/js/layout.js')}}"></script>
        <!-- Bootstrap Css -->
        <link href="{{asset('master-assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{asset('master-assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{asset('master-assets/css/app.min.css')}}" rel="stylesheet" type="text/css">
        <!-- custom Css-->
        <link href="{{asset('master-assets/css/custom.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--datatable css-->
    <link rel="stylesheet" href="{{asset('master-assets/css/jquery.dataTables.min1.css')}}">
		
        <!--datatable css-->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" >
      <!--datatable responsive css-->
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" >
  
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

        @include('layouts.master.navbarmenu')

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
            <header id="page-topbar">
                <div class="layout-width">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <!-- LOGO -->
                            <div class="navbar-brand-box horizontal-logo">
                                <a href="{{route('master.home')}}" class="logo logo-dark">
                                  
                                    <span class="logo-lg">
                                        <img src="{{asset('master-assets/images/logo2.png')}}" alt="" height="52">
                                    </span>
                                </a>

                            </div>

                            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
                                <span class="hamburger-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </button>

                            <form class="app-search d-none d-md-inline-flex">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                                    <span class="mdi mdi-magnify search-widget-icon"></span>
                                    <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                                </div>
                               
                            </form>
                        </div>

                        <div class="d-flex align-items-center">

                            <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown"  data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                    <i class='bi bi-bell fs-2xl'></i>
                                    <span class="position-absolute topbar-badge fs-3xs translate-middle badge rounded-pill bg-danger"><span class="notification-badge">4</span><span class="visually-hidden">unread messages</span></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">

                                    <div class="dropdown-head rounded-top">
                                        <div class="p-3 border-bottom border-bottom-dashed">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="mb-0 fs-lg fw-semibold"> Notifications <span class="badge bg-danger-subtle text-danger fs-sm notification-badge"> 4</span></h6>
                                                    <p class="fs-md text-muted mt-1 mb-0">You have <span class="fw-semibold notification-unread">3</span> unread messages</p>
                                                </div>
                                                <div class="col-auto dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" class="link-secondary fs-md"><i class="bi bi-three-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">All Clear</a></li>
                                                        <li><a class="dropdown-item" href="#">Mark all as read</a></li>
                                                        <li><a class="dropdown-item" href="#">Archive All</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="py-2 ps-2" id="notificationItemsTabContent">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            <h6 class="text-overflow text-muted fs-sm my-2 text-uppercase notification-title">New</h6>
                                            <div class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3 flex-shrink-0">
                                                        <span class="avatar-title bg-info-subtle text-info rounded-circle fs-lg">
                                                            <i class="bx bx-badge-check"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 fs-md mb-2 lh-base">Your <b>Elite</b> author Graphic
                                                                Optimization <span class="text-secondary">reward</span> is ready!
                                                            </h6>
                                                        </a>
                                                        <p class="mb-0 fs-2xs fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-base">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                                                            <label class="form-check-label" for="all-notification-check01"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                                <div class="d-flex">
                                                    <div class="position-relative me-3 flex-shrink-0">
                                                        <img src="{{asset('master-assets/images/users/32/avatar-2.jpg')}}" class="rounded-circle avatar-xs" alt="user-pic">
                                                        <span class="active-badge position-absolute start-100 translate-middle p-1 bg-success rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-md fw-semibold">Angela Bernier</h6>
                                                        </a>
                                                        <div class="fs-sm text-muted">
                                                            <p class="mb-1">Answered to your comment on the cash flow forecast's graph 🔔.</p>
                                                        </div>
                                                        <p class="mb-0 fs-2xs fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-base">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check02">
                                                            <label class="form-check-label" for="all-notification-check02"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3 flex-shrink-0">
                                                        <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-lg">
                                                            <i class='bx bx-message-square-dots'></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-2 fs-md lh-base">You have received <b class="text-success">20</b> new messages in the conversation
                                                            </h6>
                                                        </a>
                                                        <p class="mb-0 fs-2xs fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-base">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check03">
                                                            <label class="form-check-label" for="all-notification-check03"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h6 class="text-overflow text-muted fs-sm my-2 text-uppercase notification-title">Read Before</h6>

                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">

                                                    <div class="position-relative me-3 flex-shrink-0">
                                                        <img src="{{asset('master-assets/images/users/32/avatar-8.jpg')}}" class="rounded-circle avatar-xs" alt="user-pic">
                                                        <span class="active-badge position-absolute start-100 translate-middle p-1 bg-warning rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-md fw-semibold">Maureen Gibson</h6>
                                                        </a>
                                                        <div class="fs-sm text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.</p>
                                                        </div>
                                                        <p class="mb-0 fs-2xs fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-base">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check04">
                                                            <label class="form-check-label" for="all-notification-check04"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notification-actions" id="notification-actions">
                                            <div class="d-flex text-muted justify-content-center align-items-center">
                                                Select <div id="select-content" class="text-body fw-semibold px-1">0</div> Result <button type="button" class="btn btn-link link-danger p-0 ms-2" data-bs-toggle="modal" data-bs-target="#removeNotificationModal">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown ms-sm-3 header-item topbar-user">
                                <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <img class="rounded-circle header-profile-user" src="{{asset('master-assets/images/users/32/avatar-1.jpg')}}" alt="Header Avatar">
                                        <span class="text-start ms-xl-2">
                                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                                            <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text">Master Admin</span>
                                        </span>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                                    <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                                    <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                                    <a class="dropdown-item" href="apps-tickets-overview.html"><i class="mdi mdi-calendar-check-outline text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                                    <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Help</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Balance : <b>$8451.36</b></span></a>
                                    <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                                    <a class="dropdown-item" href="auth-lockscreen.html"><i class="mdi mdi-lock text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                                    

                                    <a class="dropdown-item" href="{{ url('master/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span>
                                    </a>

                                    <form id="logout-form" action="{{ url('master/logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

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




        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © HumTum Baby.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Vivid info tech
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="addAmount" tabindex="-1" aria-labelledby="addAmountLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="addAmountLabel">Add Amount</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#!">
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <div>
                                        <label for="AmountInput" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="AmountInput" placeholder="$000.00">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Select Method</label>
                                    <div class="row g-3">
                                        <div class="col-lg-4">
                                            <label class="border rounded w-100 form-label p-2">
                                                <input class="form-check-input me-1" name="exampleRadios" type="radio" value="" checked>
                                                Visa
                                            </label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="border rounded w-100 form-label p-2">
                                                <input class="form-check-input me-1" name="exampleRadios" type="radio" value="">
                                                Mastercard
                                            </label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="border rounded w-100 form-label p-2">
                                                <input class="form-check-input me-1" name="exampleRadios" type="radio" value="">
                                                Credit Card
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label for="cardNumber" class="form-label">Card Number</label>
                                        <input type="number" class="form-control" id="cardNumber" placeholder="xxxx xxxx xxxx xxxx">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div>
                                        <label for="month" class="form-label">Expiry Date</label>
                                        <div class="row g-3">
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="month" placeholder="MM">
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="years" placeholder="YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <label for="cvv/cvc" class="form-label">CVV/CVC</label>
                                        <input type="number" class="form-control" id="cvv/cvc" placeholder="***">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label for="cardHoldersName" class="form-label">Cardholders Name</label>
                                        <input type="text" class="form-control" id="cardHoldersName" placeholder="Enter name">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i class="ph-x align-middle"></i> Close</button>
                        <button type="button" class="btn btn-primary">Add Amount</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal -->

        <!-- Product Modal -->
        <div class="modal fade" id="productModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-body p-0 ribbon-box">
                        <div class="ribbon ribbon-danger ribbon-shape trending-ribbon">
                            <span class="trending-ribbon-text">Trending</span> <i class="ri-flashlight-fill text-white align-bottom float-end ms-1"></i>
                        </div>
                        <div class="row g-0">
                            <div class="col-lg-5">
                                <div class="bg-primary-subtle p-5 h-100">
                                    <div class="p-lg-4">
                                        <img src="assets/images/products/img-3.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-7">
                                <div class="p-4 h-100">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <a href="#!"><h5 class="mb-1">Craft Women Black Sling Bag</h5></a>
                                    <p class="text-muted">Fashion & Clothing</p>

                                    <h5 class="mb-3">$199.99 <del class="text-muted fs-sm fw-normal">$299.99</del></h5>

                                    <ul class="list-unstyled hstack gap-2 mb-4">
                                        <li>
                                            Available Colors
                                        </li>
                                        <li>
                                            <div class="avatar-xxs">
                                                <div class="avatar-title rounded bg-primary-subtle"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="avatar-xxs">
                                                <div class="avatar-title rounded bg-success-subtle"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="avatar-xxs">
                                                <div class="avatar-title rounded bg-danger-subtle"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="avatar-xxs">
                                                <div class="avatar-title rounded bg-dark-subtle"></div>
                                            </div>
                                        </li>
                                    </ul>

                                    <ul class="list-unstyled vstack gap-2 mb-4">
                                        <li class=""><i class="bi bi-check2-circle me-2 align-middle text-success"></i>In stock</li>
                                        <li class=""><i class="bi bi-check2-circle me-2 align-middle text-success"></i>Free delivery available</li>
                                        <li class=""><i class="bi bi-check2-circle me-2 align-middle text-success"></i>Sales 10% Off Use Code: <b>STEEX10</b></li>
                                    </ul>

                                    <div class="hstack gap-2 justify-content-end">
                                        <button class="btn btn-primary"><i class="bi bi-cart align-baseline me-1"></i> Add To Cart</button>
                                        <button class="btn btn-subtle-secondary">View Details <i class="bi bi-arrow-right align-baseline ms-1"></i></button>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Modal -->


        <!--start back-to-top-->
        <button class="btn btn-dark btn-icon" id="back-to-top">
            <i class="bi bi-caret-up fs-3xl"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <script src="{{asset('master-assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('master-assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('master-assets/js/plugins.js')}}"></script>

        @include('layouts.master.footer')

        

<script>

$(document).ready( function () {
   $('#example').DataTable();
} );
                
</script>
<script>

</script>

<?php

if(isset($revenue)&&!empty($revenue))
{
?>
<script>

var rev = <?php echo json_encode($revenue)?>;

function getChartColorsArray(e) {
	var t = document.getElementById(e);
	if (t) {
		t = t.dataset.colors;
		if (t) return JSON.parse(t).map(e => {
			var t = e.replace(/\s/g, "");
			return t.includes(",") ? 2 === (e = e.split(",")).length ? `rgba(${getComputedStyle(document.documentElement).getPropertyValue(e[0])}, ${e[1]})` : t : getComputedStyle(document.documentElement).getPropertyValue(t) || t
		});
		console.warn("data-colors attribute not found on: " + e)
	}
}
var chartColumnChart = "",
	chartColumnDatatalabelChart = "",
	chartColumnStackedChart = "",
	chartColumnStacked100Chart = "",
	columnGroupedStackedChart = "",
	columnDumbbellChart = "",
	chartColumnMarkersChart = "",
	chartColumnRotateLabelsChart = "",
	chartNagetiveValuesChart = "",
	chartBarChart = "",
	chartNagetiveValuesChart = "",
	chartColumnDistributedChart = "",
	chartColumnGroupLabelsChart = "";

function loadCharts() {
	(e = getChartColorsArray("column_chart1")) && (t = {
		chart: {
			height: 350,
			type: "bar",
			toolbar: {
				show: !1
			}
		},
		plotOptions: {
			bar: {
				horizontal: !1,
				columnWidth: "45%",
				endingShape: "rounded"
			}
		},
		dataLabels: {
			enabled: !1
		},
		stroke: {
			show: !0,
			width: 2,
			colors: ["transparent"]
		},
		series: [
        //     {
		// 	name: "Net Profit",
		// 	data: [46, 57, 59, 54, 62, 58, 64, 60, 66, 114, 94]
		// }, 
        {
			name: "Revenue",
			data: rev
		} 
        // {
		// 	name: "Free Cash Flow",
		// 	data: [37, 42, 38, 26, 47, 50, 54, 55, 43, 114, 94]
		// }
    ],
		colors: e,
		xaxis: {
			categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
		},
		yaxis: {
			title: {
				text: "$ (thousands)"
			}
		},
		grid: {
			borderColor: "#f1f1f1"
		},
		fill: {
			opacity: 1
		},
		tooltip: {
			y: {
				formatter: function(e) {
					return "$ " + e 
				}
			}
		}
	}, "" != chartColumnChart && chartColumnChart.destroy(), (chartColumnChart = new ApexCharts(document.querySelector("#column_chart1"), t)).render())
}
window.addEventListener("resize", function() {
	setTimeout(() => {
		loadCharts()
	}, 250)
}), loadCharts();
</script>



<script>
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var token = $('meta[name="csrf-token"]').attr('content'); 
var path = window.location.origin; 

$(document).ready(function(e) {


// Sales Summary 
$('.dash_sales').on("click", function() {
    var filter = $(this).text();
    var sales = '';
    var realPath = path+'/master/dashboardFilterSales/';
  
   $.ajax({ 

        url:realPath,
        type: "get", 
        dataType: "json",
        data:{
        _token: token,
        filter: filter
        },  

        success:function(data){

            $('div#div_sales').empty();
            if(data.percentage > 0){
                var style = 'text-success';
                var icon = 'up';
            }else{
                var style = 'text-danger';
                var icon ='down';
            }

            sales ='<h4 class="fw-semibold mb-3">₹<span class="counter-value" data-target="'+parseFloat(data.sales)+'">'+parseFloat(data.sales)+'</span></h4><div class=" align-items-center gap-2"><p class="text-muted mb-0"> '+data.text+'</p><h5 class="'+style+' fs-xs mb-0"><i class="ri-arrow-right-'+icon+'-line fs-sm align-middle"></i> '+data.percentage+' %</h5>';
            $('div#div_sales').append(sales);

            filter = '';
}  

});  
$data
});

// End Sales Summary


// Orders Summary 
$('.dash_orders').on("click", function() {
    var filter = $(this).text();
    var orders = '';
    var realPath = path+'/master/dashboardFilterOrders/';
  
   $.ajax({ 

        url:realPath,
        type: "get", 
        dataType: "json",
        data:{
        _token: token,
        filter: filter
        },  

        success:function(data){

            $('div#div_orders').empty();
            if(data.percentage > 0){
                var style = 'text-success';
                var icon = 'up';
            }else{
                var style = 'text-danger';
                var icon ='down';
            }

            orders ='<h4 class="fw-semibold mb-3"><span class="counter-value" data-target="'+parseFloat(data.total_number_of_orders)+'">'+parseFloat(data.total_number_of_orders)+'</span></h4><div class=" align-items-center gap-2"><p class="text-muted mb-0"> '+data.text+'</p><h5 class="'+style+' fs-xs mb-0"><i class="ri-arrow-right-'+icon+'-line fs-sm align-middle"></i> '+data.percentage+' %</h5>';
            $('div#div_orders').append(orders);

            filter = '';
}  

});  

});

// End Orders Summary



// Pending Orders Summary 
$('.dash_pendingOrders').on("click", function() {
    var filter = $(this).text();
    var pendingorders = '';
    var realPath = path+'/master/dashboardFilterPendingOrders/';
  
   $.ajax({ 

        url:realPath,
        type: "get", 
        dataType: "json",
        data:{
        _token: token,
        filter: filter
        },  

        success:function(data){

            $('div#div_pending_orders').empty();
            if(data.percentage > 0){
                var style = 'text-success';
                var icon = 'up';
            }else{
                var style = 'text-danger';
                var icon ='down';
            }

            pendingorders ='<h4 class="fw-semibold mb-3"><span class="counter-value" data-target="'+parseFloat(data.total_number_of_orders)+'">'+parseFloat(data.total_pending_orders)+'</span></h4><div class=" align-items-center gap-2"><p class="text-muted mb-0"> '+data.text+'</p><h5 class="'+style+' fs-xs mb-0"><i class="ri-arrow-right-'+icon+'-line fs-sm align-middle"></i> '+data.percentage+' %</h5>';
            $('div#div_pending_orders').append(pendingorders);

            filter = '';
}  

});  

});

// End Pending Orders Summary


// Delivered Orders Summary 
$('.dash_deliveredOrders').on("click", function() {
    var filter = $(this).text();
    var deliveredorders = '';
    var realPath = path+'/master/dashboardFilterDeliveredOrders/';
  
   $.ajax({ 

        url:realPath,
        type: "get", 
        dataType: "json",
        data:{
        _token: token,
        filter: filter
        },  

        success:function(data){

            $('div#div_delivered_orders').empty();
            if(data.percentage > 0){
                var style = 'text-success';
                var icon = 'up';
            }else{
                var style = 'text-danger';
                var icon ='down';
            }

            deliveredorders ='<h4 class="fw-semibold mb-3"><span class="counter-value" data-target="'+parseFloat(data.total_delivered_orders)+'">'+parseFloat(data.total_delivered_orders)+'</span></h4><div class=" align-items-center gap-2"><p class="text-muted mb-0"> '+data.text+'</p><h5 class="'+style+' fs-xs mb-0"><i class="ri-arrow-right-'+icon+'-line fs-sm align-middle"></i> '+data.percentage+' %</h5>';
            $('div#div_delivered_orders').append(deliveredorders);

            filter = '';
}  

});  

});

// End Delivered Orders Summary



// Vendors  Summary 
$('.dash_vendors').on("click", function() {
    var filter = $(this).text();
    var vendors = '';
    var realPath = path+'/master/dashboardFilterVendors/';
  
   $.ajax({ 

        url:realPath,
        type: "get", 
        dataType: "json",
        data:{
        _token: token,
        filter: filter
        },  

        success:function(data){

            $('div#div_vendors').empty();
            if(data.percentage > 0){
                var style = 'text-success';
                var icon = 'up';
            }else{
                var style = 'text-danger';
                var icon ='down';
            }

            vendors ='<h4 class="fw-semibold mb-3"><span class="counter-value" data-target="'+parseFloat(data.total_vendors)+'">'+parseFloat(data.total_vendors)+'</span></h4><div class=" align-items-center gap-2"><p class="text-muted mb-0"> '+data.text+'</p><h5 class="'+style+' fs-xs mb-0"><i class="ri-arrow-right-'+icon+'-line fs-sm align-middle"></i> '+data.percentage+' %</h5>';
            $('div#div_vendors').append(vendors);

            filter = '';
}  

});  

});

// End Vendors  Summary



// Customer  Summary 
$('.dash_customers').on("click", function() {
    var filter = $(this).text();
    var customers = '';
    var realPath = path+'/master/dashboardFilterCustomers/';
  
   $.ajax({ 

        url:realPath,
        type: "get", 
        dataType: "json",
        data:{
        _token: token,
        filter: filter
        },  

        success:function(data){

            $('div#div_customers').empty();
            if(data.percentage > 0){
                var style = 'text-success';
                var icon = 'up';
            }else{
                var style = 'text-danger';
                var icon ='down';
            }

            customers ='<h4 class="fw-semibold mb-3"><span class="counter-value" data-target="'+parseFloat(data.total_customers)+'">'+parseFloat(data.total_customers)+'</span></h4><div class=" align-items-center gap-2"><p class="text-muted mb-0"> '+data.text+'</p><h5 class="'+style+' fs-xs mb-0"><i class="ri-arrow-right-'+icon+'-line fs-sm align-middle"></i> '+data.percentage+' %</h5>';
            $('div#div_customers').append(customers);

            filter = '';
}  

});  

});

// End Customer  Summary


//  Popular Product  Summary 
$('.dash_popularProduct').on("click", function() {
    var filter = $(this).text();
    var products = '';
    var realPath = path+'/master/dashboardFilterPopularProduct/';
    var html = [];
   $.ajax({ 

        url:realPath,
        type: "get", 
        dataType: "json",
        data:{
        _token: token,
        filter: filter
        },  

        success:function(data){

            $('div#div_popular_product').empty();
            $('span#pop_filter').empty();


if(data.products.length == 0){
    html +='<div class="vstack gap-2"><div class="p-2 border border-dashed">Data Not Found..</div></div>';

 $('div#div_popular_product').append(html);
$('span#pop_filter').append(filter);

}else{
    $.each(data.products, function(id,value){

if(value.image){
    var image = "https://dev.humtumbaby.com/uploads/products/"+value.image;
}else{
    var image = "{{asset('master-assets/images/products/32/img-1.png')}}"
}
html +='<div class="vstack gap-2"><div class="p-2 border border-dashed"><div class="d-flex align-items-center gap-2"><div class="avatar-sm flex-shrink-0"><div class="avatar-title bg-light rounded"><img src="'+image+'" alt="" class="avatar-xs"></div></div><div class="flex-grow-1"><a href="#!"><h6 class="fs-md mb-2"> '+value.product_name+'</h6></a><ul class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted"><li><i class="ph-shopping-cart align-baseline"></i> '+value.product_count+'</li></ul></div><div class="text-end"><h5 class="fs-md text-primary mb-0">$'+value.total+'</h5><h6 class=" mb-0" style="font-size:12px;COLOR:#878A99">Vendor: '+value.vendor_name+'</h6></div></div></div>';
 
})  
$('div#div_popular_product').append(html);
$('span#pop_filter').append(filter);
filter = '';
}


}  

});  

});

// End Popular Product  Summary



//  Order Status  Summary 
$('.dash_orderStatus').on("click", function() {
    var filter = $(this).text();
    var products = '';
    var realPath = path+'/master/dashboardFilterOrderStatus/';
    var html = [];
    var s_color = '';  
    var s_name = '';
   $.ajax({ 

        url:realPath,
        type: "get", 
        dataType: "json",
        data:{
        _token: token,
        filter: filter
        },  

        success:function(data){

            $('div#div_order_status').empty();
            $('span#Opop_filter').empty();

            if(data.Ostatus.length == 0){

                html +='<div class="row align-items-center mb-3"><div class="col-lg-12"><div class="hstack gap-2"><h4 class="mt-10">Data Not Found..</h4></div></div></div></div>';

            $('div#div_order_status').append(html);
            $('span#Opop_filter').append(filter);

            }else{

            $.each(data.Ostatus, function(id,value){

                var s_count = value.status_count;
                var s_percentage = 0.10*value.status_count;

                if(value.status == 'pending')
                { s_color = 'bg-primary';
                    s_name = 'Pending';
                    }
                if(value.status == 'confirmed')
                {   s_color = 'bg-warning';
                    s_name = 'Confirmed'; 
                }

                if(value.status == 'shipped')
                {  s_color = 'bg-secondary';
                    s_name = 'Shipped';
                }

                if(value.status == 'outfordelivery')
                { s_color = 'bg-danger bg-opacity-75';
                    s_name = 'Out For Delivery'; 
                }

                if(value.status == 'delivered')
                { s_color = 'bg-info';
                    s_name = 'Delivered';
            
                }

                if(value.status == 'return')
                { s_color = 'bg-success';
                    s_name = 'Return'; 
                    }

                if(value.status == 'refund')
                { s_color = 'bg-danger';
                    s_name = 'Refund'; 
                }

                if(value.status == 'cancelled')
                { s_color = 'bg-danger';
                    s_name = 'Cancelled'; 
                }



                html +='<div class="row align-items-center mb-3"><div class="col-lg-4"><div class="hstack gap-2"><p class="mb-0 flex-grow-1">'+s_name+'</p><h6 class="mb-0">'+s_count+'</h6></div></div><div class="col-lg-8"><div class="progress animated-progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1000"><div class="progress-bar progress-bar-striped progress-bar-animated '+s_color+'" style="width: '+s_percentage+'%"></div></div></div></div>';


                 
            })  
            $('div#div_order_status').append(html);
            $('span#Opop_filter').append(filter);
            filter = '';

}  
        }
});  

});

// End Order Status  Summary




//  Graph Revenue  Summary 
$('.dash_graphRevenue').on("click", function() {

    $('.dash_graphRevenue').removeClass('active').addClass('inactive');
     $(this).removeClass('inactive').addClass('active');
    var filter = $(this).text();
    var graph = '';
    var realPath = path+'/master/dashboardFiltergraph/';
    var html = [];
   $.ajax({ 

        url:realPath,
        type: "get", 
        dataType: "json",
        data:{
        _token: token,
        filter: filter
        },  

        success:function(data){

            $('#column_chart1').empty();


function getChartColorsArray(e) {
	var t = document.getElementById(e);
	if (t) {
		t = t.dataset.colors;
		if (t) return JSON.parse(t).map(e => {
			var t = e.replace(/\s/g, "");
			return t.includes(",") ? 2 === (e = e.split(",")).length ? `rgba(${getComputedStyle(document.documentElement).getPropertyValue(e[0])}, ${e[1]})` : t : getComputedStyle(document.documentElement).getPropertyValue(t) || t
		});
		console.warn("data-colors attribute not found on: " + e)
	}
}
var chartColumnChart = "",
	chartColumnDatatalabelChart = "",
	chartColumnStackedChart = "",
	chartColumnStacked100Chart = "",
	columnGroupedStackedChart = "",
	columnDumbbellChart = "",
	chartColumnMarkersChart = "",
	chartColumnRotateLabelsChart = "",
	chartNagetiveValuesChart = "",
	chartBarChart = "",
	chartNagetiveValuesChart = "",
	chartColumnDistributedChart = "",
	chartColumnGroupLabelsChart = "";

function loadCharts() {
	(e = getChartColorsArray("column_chart1")) && (t = {
		chart: {
			height: 350,
			type: "bar",
			toolbar: {
				show: !1
			}
		},
		plotOptions: {
			bar: {
				horizontal: !1,
				columnWidth: "45%",
				endingShape: "rounded"
			}
		},
		dataLabels: {
			enabled: !1
		},
		stroke: {
			show: !0,
			width: 2,
			colors: ["transparent"]
		},
		series: [
        //     {
		// 	name: "Net Profit",
		// 	data: [46, 57, 59, 54, 62, 58, 64, 60, 66, 114, 94]
		// }, 
        {
			name: "Revenue",
			data: data.revenue
		} 
        // {
		// 	name: "Free Cash Flow",
		// 	data: [37, 42, 38, 26, 47, 50, 54, 55, 43, 114, 94]
		// }
    ],
		colors: e,
		xaxis: {
			categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
		},
		yaxis: {
			title: {
				text: "$ (thousands)"
			}
		},
		grid: {
			borderColor: "#f1f1f1"
		},
		fill: {
			opacity: 1
		},
		tooltip: {
			y: {
				formatter: function(e) {
					return "$ " + e 
				}
			}
		}
	}, "" != chartColumnChart && chartColumnChart.destroy(), (chartColumnChart = new ApexCharts(document.querySelector("#column_chart1"), t)).render())
}
window.addEventListener("resize", function() {
	setTimeout(() => {
		loadCharts()
	}, 250)
}), loadCharts();



        }
});  

});

// Graph Revenue  Summary





});

</script>
<?php } ?>




    </body>

</html>
@endguest