@extends('layouts.master.header')


@section('content')
 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

                         @php
         
                            $total_sales = (isset($data) && !empty($data) && !empty($data['total_sales'])) ? $data['total_sales'] : 0;

                            $total_number_of_orders = (isset($data) && !empty($data) && !empty($data['total_number_of_orders'])) ? $data['total_number_of_orders'] : 0;

                            $total_vendors = (isset($data) && !empty($data) && !empty($data['total_vendors'])) ? $data['total_vendors'] : 0;

                            $total_customers = (isset($data) && !empty($data) && !empty($data['total_customers'])) ? $data['total_customers'] : 0;

                            $total_pending_orders = (isset($data) && !empty($data) && !empty($data['total_pending_orders'])) ? $data['total_pending_orders'] : 0;


                            $total_delivered_orders = (isset($data) && !empty($data) && !empty($data['total_delivered_orders'])) ? $data['total_delivered_orders'] : 0;

                        @endphp

    
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
					 <h4 class="card-title mb-2 flex-grow-1 fw-bold">Hello {{ Auth::user()->name }},</h4>
					
                     
                    
                     <div class="row">
                            <div class="col-xl-4">
                                <div class="card card-height-100 border-0 overflow-hidden">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                            <div class="col-md-6">
                                                <!-- card -->
                                                <div class="card shadow-none border-end-md border-bottom rounded-0 mb-0">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end ">
                                                                <a class="dash_sales dropdown-item"  >Today</a>
                                                                <a class="dash_sales dropdown-item"  >This Week</a>
                                                                <a class="dash_sales dropdown-item"  >This Month</a>
                                                                <a class="dash_sales dropdown-item"  >Current Year</a>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-3">
                                                                <i class="ph-chart-line"></i>
                                                            </span>
                                                        </div>
                                                        <div class="mt-4">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">Total Sales</p>
                                                            <div id="div_sales">
                                                            <h4 class="fw-semibold mb-3">₹<span class="counter-value" data-target="{{$total_sales}}">{{number_format($total_sales,2)}}</span></h4>
                                                            <div class=" align-items-center gap-2">
                                                            <p class="text-muted mb-0">Current Year</p>  
                                                           
                                                                    @if($sales_percentage > 0 )
                                                                    <h5 class="text-success fs-xs mb-0">
                                                                    <i class="ri-arrow-right-up-line fs-sm align-middle"></i> {{$sales_percentage}}%
                                                                    </h5>
                                                                    @else
                                                                    <h5 class="text-danger fs-xs mb-0">
                                                                    <i class="ri-arrow-right-down-line fs-sm align-middle"></i> {{$sales_percentage}}%
                                                                    </h5>
                                                                    @endif
                                                     
                                                               
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div><!-- end col -->
                                            <div class="col-md-6">
                                                <!-- card -->
                                                <div class="card shadow-none border-bottom rounded-0 mb-0">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item dash_orders"  >Today</a>
                                                                <a class="dropdown-item dash_orders"  >This Week</a>
                                                                <a class="dropdown-item dash_orders"  >This Month</a>
                                                                <a class="dropdown-item dash_orders"  >Current Year</a>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title bg-dark-subtle text-dark rounded-circle fs-3">
                                                                <i class="ph-bag"></i>
                                                            </span>
                                                        </div>
                                                        <div class="mt-4">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">Number of Orders</p>
                                                            <div id="div_orders">
															 <h4 class="fw-semibold mb-3"><span class="counter-value" data-target="{{$total_number_of_orders}}">0</span></h4>
                                                            <div class=" align-items-center gap-2">
                                                            <p class="text-muted mb-0">Current Year</p>

                                                                    @if($orders_percentage > 0 )
                                                                    <h5 class="text-success fs-xs mb-0">
                                                                    <i class="ri-arrow-right-up-line fs-sm align-middle"></i> {{$orders_percentage}}%
                                                                    </h5>
                                                                    @else
                                                                    <h5 class="text-danger fs-xs mb-0">
                                                                    <i class="ri-arrow-right-down-line fs-sm align-middle"></i> {{$orders_percentage}}%
                                                                    </h5>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div><!-- end col -->
                                            <div class="col-md-6">
                                                <!-- card -->
                                                <div class="card shadow-none border-end-md rounded-0 mb-0">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item dash_pendingOrders"  >Today</a>
                                                                <a class="dropdown-item dash_pendingOrders"  >This Week</a>
                                                                <a class="dropdown-item dash_pendingOrders"  >This Month</a>
                                                                <a class="dropdown-item dash_pendingOrders"  >Current Year</a>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-3">
                                                               <i class="ph-package"></i>
                                                            </span>
                                                        </div>
                                                        <div class="mt-4">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">Pending Orders</p>
                                                            <div id="div_pending_orders">
                                                             <h4 class="fw-semibold mb-3"><span class="counter-value" data-target="{{$total_pending_orders}}">0</span></h4>
                                                            <div class="align-items-center gap-2">
                                                            <p class="text-muted mb-0">Current Year</p>

                                                                        @if($pending_orders_percentage > 0 )
                                                                        <h5 class="text-success fs-xs mb-0">
                                                                        <i class="ri-arrow-right-up-line fs-sm align-middle"></i> {{$pending_orders_percentage}}%
                                                                        </h5>
                                                                        @else
                                                                        <h5 class="text-danger fs-xs mb-0">
                                                                        <i class="ri-arrow-right-down-line fs-sm align-middle"></i> {{$pending_orders_percentage}}%
                                                                        </h5>
                                                                        @endif
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div><!-- end col -->
                                            <div class="col-md-6">
                                                <!-- card -->
                                                <div class="card shadow-none border-top border-top-md-0 rounded-0 mb-0">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item dash_deliveredOrders"  >Today</a>
                                                                <a class="dropdown-item dash_deliveredOrders"  >This Week</a>
                                                                <a class="dropdown-item dash_deliveredOrders"  >This Month</a>
                                                                <a class="dropdown-item dash_deliveredOrders"  >Current Year</a>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-sm">
                                                          <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-3">
                                                                <i class="ph-wallet"></i>
                                                            </span>
                                                        </div>
                                                        <div class="mt-4">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">Delivered Orders</p>
                                                            <div id="div_delivered_orders">
															 <h4 class="fw-semibold mb-3"><span class="counter-value" data-target="{{$total_delivered_orders}}">0</span> </h4>
                                                            <div class=" align-items-center gap-2">
                                                            <p class="text-muted mb-0">Current Year</p>                                                                     @if($delivered_orders_percentage > 0 )
                                                                        <h5 class="text-success fs-xs mb-0">
                                                                        <i class="ri-arrow-right-up-line fs-sm align-middle"></i> {{$delivered_orders_percentage}}%
                                                                        </h5>
                                                                        @else
                                                                        <h5 class="text-danger fs-xs mb-0">
                                                                        <i class="ri-arrow-right-down-line fs-sm align-middle"></i> {{$delivered_orders_percentage}}%
                                                                        </h5>
                                                                        @endif
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div><!-- end col -->
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-8">
                               
                                 <div class="row ">
                                        <div class="col-xl-9">
										 <div class="card card-height-100 overflow-hidden">
                                            <div class="card-header border-0 align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>
                                                <div>
                                                    <button type="button" class="active btn btn-subtle-secondary btn-sm dash_graphRevenue">
                                                        ALL
                                                    </button>
                                                    <button type="button" class="btn btn-subtle-secondary btn-sm dash_graphRevenue">
                                                        1M
                                                    </button>
                                                    <button type="button" class="btn btn-subtle-secondary btn-sm dash_graphRevenue">
                                                        6M
                                                    </button>
                                                    <button type="button" class="btn btn-subtle-primary btn-sm dash_graphRevenue">
                                                        1Y
                                                    </button>
                                                </div>
                                            </div><!-- end card header -->
                                            <div class="card-body ">
                                                <div class="w-100" id="">
                                                <div id="column_chart1" data-colors='["--tb-danger", "--tb-primary", "--tb-success"]' class="apex-charts" dir="ltr"></div>
                                                </div>
     
                                            </div><!-- end card body -->
                                   
											</div>
											</div>
											  <div class="col-xl-3">
											  <div class="card card-height-100 border-0 overflow-hidden">
											      <div class="card-body p-0">
											  <div class="card  shadow-none border-bottom-md rounded-0 mb-0">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item dash_vendors"  >Today</a>
                                                                <a class="dropdown-item dash_vendors"  >This Week</a>
                                                                <a class="dropdown-item dash_vendors"  >This Month</a>
                                                                <a class="dropdown-item dash_vendors"  >Current Year</a>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title bg-light text-body rounded-circle fs-3">
                                                                <i class="ph-eye"></i>
                                                            </span>
                                                        </div>
                                                        <div class="mt-4">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">Vendors</p>
                                                            <div id="div_vendors">

                                                            <h4 class="fw-semibold mb-3"><span class="counter-value" data-target="{{$total_vendors}}">{{$total_vendors}}</span></h4>
                                                            <div class=" align-items-center gap-2">
                                                            <p class="text-muted mb-0">Current Year</p>                                                                     @if($vendors_percentage > 0 )
                                                            <h5 class="text-success fs-xs mb-0">
                                                            <i class="ri-arrow-right-up-line fs-sm align-middle"></i> {{$vendors_percentage}}%
                                                            </h5>
                                                            @else
                                                            <h5 class="text-danger fs-xs mb-0">
                                                            <i class="ri-arrow-right-down-line fs-sm align-middle"></i> {{$vendors_percentage}}%
                                                            </h5>
                                                            @endif
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div>
												  <div class="card shadow-none rounded-0 mb-0">
												<div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item dash_customers"  >Today</a>
                                                                <a class="dropdown-item dash_customers"  >This Week</a>
                                                                <a class="dropdown-item dash_customers"  >This Month</a>
                                                                <a class="dropdown-item dash_customers"  >Current Year</a>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title bg-info-subtle text-info rounded-circle fs-3">
                                                                <i class="ph-users-three"></i>
                                                            </span>
                                                        </div>
                                                        <div class="mt-4">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-sm">Customers</p>
                                                            <div id="div_customers">
                                                            <h4 class="fw-semibold mb-3"><span class="counter-value" data-target="{{$total_customers}}">{{$total_customers}}</span></h4>
                                                            <div class=" align-items-center gap-2">
                                                            <p class="text-muted mb-0">Current Year</p>                                                                     @if($customers_percentage > 0 )
                                                            <h5 class="text-success fs-xs mb-0">
                                                            <i class="ri-arrow-right-up-line fs-sm align-middle"></i> {{$customers_percentage}}%
                                                            </h5>
                                                            @else
                                                            <h5 class="text-danger fs-xs mb-0">
                                                            <i class="ri-arrow-right-down-line fs-sm align-middle"></i> {{$customers_percentage}}%
                                                            </h5>
                                                            @endif
                                                            </div>
</div>
                                                        </div>
                                                    </div>
											  </div>
											  </div>
											  </div>
											</div>
                                       
                                     
                                  
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-xl-6">
                                <!-- card -->
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Sales by Countries</h4>
                                        <div class="flex-shrink-0">
                                            <!-- <button type="button" class="btn btn-subtle-primary btn-sm">
                                                Export Report
                                            </button> -->
                                        </div>
                                    </div><!-- end card header -->

                                    <!-- card body -->
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div id="world-map-line-markers" data-colors='["--tb-light"]' style="height: 340px"></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-4">
                                                    <h6 class="text-muted mb-3 fw-medium fs-xs text-uppercase">Compared to last month</h6>
                                                    <h3>₹<span class="counter-value" data-target="{{$total_sales}}"></span> <small class="text-muted fw-normal fs-sm">Sales</small></h3>
                                                </div>
                                                <div>
                                                    <ul class="list-unstyled vstack gap-2">
                                                        <li class="p-2 rounded">
                                                            <i class="ri-checkbox-blank-circle-fill text-primary align-bottom me-1"></i> India <span class="float-end">₹{{number_format($total_sales,2)}}</span>
                                                        </li>
                                                        <li class="bg-light-subtle p-2 rounded">
                                                            <i class="ri-checkbox-blank-circle-fill text-secondary align-bottom me-1"></i> Greenland <span class="float-end">0</span>
                                                        </li>
                                                        <li class="p-2 rounded">
                                                            <i class="ri-checkbox-blank-circle-fill text-info align-bottom me-1"></i> Serbia <span class="float-end">0</span>
                                                        </li>
                                                        <li class="bg-light-subtle p-2 rounded">
                                                            <i class="ri-checkbox-blank-circle-fill text-success align-bottom me-1"></i> Russia <span class="float-end">0</span>
                                                        </li>
                                                        <li class="p-2 rounded">
                                                            <i class="ri-checkbox-blank-circle-fill text-danger align-bottom me-1"></i> Brazil <span class="float-end">0</span>
                                                        </li>
                                                        <li class="bg-light-subtle p-2 rounded">
                                                            <i class="ri-checkbox-blank-circle-fill text-warning align-bottom me-1"></i> Sydney <span class="float-end">0</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-height-100">
                                    <div class="card-header d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Traffic Source</h4>
                                        <div class="dropdown card-header-dropdown float-end">
                                            <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ph-dots-three-outline-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item"  >Today</a>
                                                <a class="dropdown-item"  >This Week</a>
                                                <a class="dropdown-item"  >This Month</a>
                                                <a class="dropdown-item"  >Current Year</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="column_chart" data-colors='["--tb-primary", "--tb-light"]' class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-3 col-lg-6">
                                <div class="card card-height-100">
                                    <div class="card-header d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Recent Sales</h4>
                                        <a href="#!" class="text-muted">View All <i class="ph-caret-right align-middle"></i></a>
                                    </div>
                                    <div class="card-body px-0">
                                        <div data-simplebar class="px-3" style="max-height: 360px;">
                                            <table class="table mb-0">
                                                <tbody>


                                                @if(isset($recentOrders) && !empty($recentOrders))
                                                @foreach ($recentOrders as $recentOrder)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <div class="flex-shrink-0">
                                                                    <img src="{{asset('master-assets/images/users/48/avatar-2.jpg')}}" alt="" class="avatar-sm rounded-circle p-1">
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="fs-md mb-1">
                                                                    {{!empty($recentOrder->first_name) && !empty($recentOrder->first_name) ? $recentOrder->first_name : 'Data Not Found' }} {{$recentOrder->last_name}}
                                                                    </h6>
                                           
                                                                    <p class="text-muted mb-0">
                                                                    @php  $order_date = date("d M, Y", strtotime($recentOrder->created_at)); @endphp
                                                                    {{$order_date}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <h6 class="fs-md">${{number_format($recentOrder->total_price,2)}}</h6>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card" id="contactList">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Latest Orders</h4>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown card-header-dropdown sortble-dropdown">
                                                <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fw-semibold text-uppercase fs-12">Sort by:
                                                    </span><span class="text-muted dropdown-title">Order Date</span> <i class="mdi mdi-chevron-down ms-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <button class="dropdown-item sort" data-sort="order_date">Order Date</button>
                                                    <button class="dropdown-item sort" data-sort="order_id">Order ID</button>
                                                    <button class="dropdown-item sort" data-sort="vendors">Vendors</button>
                                                    <button class="dropdown-item sort" data-sort="products">Products</button>
                                                    <button class="dropdown-item sort" data-sort="amount">Amount</button>
                                                    <button class="dropdown-item sort" data-sort="status">Status</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                <thead class="text-muted table-light">
                                                    <tr>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="order_date">Order Date</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="order_id">Order ID</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="vendors">Vendors</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="customer">Customers</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="products">Products</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="amount">Amount</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="status">Status</th>
                                                        <th hidden scope="col" class="sort cursor-pointer" data-sort="rating">Rating</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                @if(isset($latestOrders) && !empty($latestOrders))
                                                @foreach ($latestOrders as $latestOrder)
                                                    <tr>
                                                        <td class="order_date">
                                                            @php  $order_date = date("d M, Y", strtotime($latestOrder->order_date)); @endphp
                                                                    {{$order_date}}
                                                        </td>
                                                        <td class="order_id">
                                                            <a href="apps-ecommerce-order-overview.html" class="fw-medium link-primary">{{$latestOrder->order_code}}</a>
                                                        </td>
                                                        <td class="shop">
                                                            <!-- <img src="{{asset('master-assets/images/companies/img-7.png')}}" alt="" class="avatar-xxs rounded-circle"> -->
                                                            {{!empty($latestOrder->vendor_fname) && !empty($latestOrder->vendor_fname) ? $latestOrder->vendor_fname : 'Data Not Found' }} {{$latestOrder->vendor_lname}}
                                                        </td>
                                                        <td class="customer">
                                                        {{!empty($latestOrder->first_name) && !empty($latestOrder->first_name) ? $latestOrder->first_name : 'Data Not Found' }} {{$latestOrder->last_name}}
                                                        </td>
                                                        <td class="products">
                                                        {{!empty($latestOrder->product_name) && !empty($latestOrder->product_name) ? $latestOrder->product_name : 'Data Not Found' }}
                                                        </td>
                                                        <td class="amount">
                                                            <span class="fw-medium">${{number_format($latestOrder->amount,2)}}</span>
                                                        </td>
                                                        <td class="status">
                                                            @if($latestOrder->status == 'pending')
                                                            <span class="badge bg-secondary-subtle text-secondary">{{$latestOrder->status}}</span>
                                                            @elseif($latestOrder->status == 'delivered')
                                                            <span class="badge bg-success-subtle text-secondary">{{$latestOrder->status}}</span>
                                                            @else
                                                            <span class="badge bg-primary-subtle text-secondary">{{$latestOrder->status}}</span>
                                                            @endif
                                                        </td>
                                                        <td class="rating" hidden>
                                                            <h5 class="fs-md fw-medium mb-0">-</h5>
                                                        </td>
                                                    </tr><!-- end tr -->
                                                    @endforeach
                                                    @endif
                                                 
                                                </tbody><!-- end tbody -->
                                            </table><!-- end table -->
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    <p class="text-muted mb-0">We've searched more than 150+ transactions We did not find any transactions for you search.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">Orders Status</h5>
                                        <div class="dropdown card-header-dropdown">
                                            <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ph-dots-three-outline-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item dash_orderStatus"  >Current Year</a>
                                                <a class="dropdown-item dash_orderStatus"  >Last Year</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" >
                                        <div class="mb-3 pb-1 text-center">
                                            <h6 class="mb-0"><span id="Opop_filter">Current Year</span></h6>
                                        </div>
                                        <div id="div_order_status" style="height: 300px;">
                                        @php $s_color = '';  $s_name = ''; @endphp
                                        @if(isset($order_status) && !empty($order_status))
                                            @foreach ($order_status as $order_statu)

                                            @php $s_count = $order_statu->status_count;

                                            $s_percentage = 0.10*$order_statu->status_count;
                                            @endphp

                                        @if($order_statu->status == 'pending')
                                        @php $s_color = "bg-primary";
                                            $s_name = "Pending"; @endphp
                                            @endif
                                        @if($order_statu->status == 'confirmed')
                                        @php   $s_color = "bg-warning";
                                            $s_name = "Confirmed"; @endphp
                                        @endif

                                        @if($order_statu->status == 'shipped')
                                        @php  $s_color = "bg-secondary";
                                            $s_name = "Shipped"; @endphp
                                        @endif

                                        @if($order_statu->status == 'outfordelivery')
                                        @php $s_color = "bg-danger bg-opacity-75";
                                            $s_name = "Out For Delivery"; @endphp
                                        @endif

                                        @if($order_statu->status == 'delivered')
                                        @php $s_color = "bg-info";
                                            $s_name = "Delivered";
                                            @endphp
                                        @endif

                                        @if($order_statu->status == 'return')
                                        @php $s_color = "bg-success";
                                            $s_name = "Return"; @endphp
                                            @endif

                                        @if($order_statu->status == 'refund')
                                        @php $s_color = "bg-danger";
                                            $s_name = "Refund"; @endphp
                                        @endif

                                        @if($order_statu->status == 'cancelled')
                                        @php $s_color = "bg-danger";
                                            $s_name = "Cancelled"; @endphp
                                        @endif
                                      
                                        <div class="row align-items-center mb-3">
                                            <div class="col-lg-4">
                                                <div class="hstack gap-2">
                                                    <p class="mb-0 flex-grow-1">{{$s_name}}</p>
                                                    <h6 class="mb-0">{{$s_count}}</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="progress animated-progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1000">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated {{$s_color}}" style="width: {{$s_percentage}}%"></div>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                        
                                        @endforeach
                                        @endif

                                    </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <h4 class="card-title mb-0 flex-grow-1">Popular Products</h4>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fw-semibold text-uppercase">Sort by:
                                                    </span><span class="text-muted"><span id="pop_filter">Current Year</span><i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item dash_popularProduct" >Current Year</a>
                                                    <a class="dropdown-item dash_popularProduct" >Today</a>
                                                    <a class="dropdown-item dash_popularProduct" >Yesterday</a>
                                                    <a class="dropdown-item dash_popularProduct" >Last 7 Days</a>
                                                    <a class="dropdown-item dash_popularProduct" >Last 30 Days</a>
                                                    <a class="dropdown-item dash_popularProduct" >This Month</a>
                                                    <a class="dropdown-item dash_popularProduct" >Last Month</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                     
                                        <div data-simplebar class="px-3" style="height: 333px;">
                                     
                                        <div id="div_popular_product" >

                                        @if(isset($popular_products) && !empty($popular_products))
                                            @foreach ($popular_products as $popular_product)
                                        
                                            <div class="vstack gap-2">
                                                <div class="p-2 border border-dashed">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <div class="avatar-title bg-light rounded">
                                                            @if(isset($popular_product->image) && !empty($popular_product->image))
                                                            <img src="https://dev.humtumbaby.com/uploads/products/{{$popular_product->image}}" alt="" class="avatar-xs">
                                                            @else
                                                            <img src="{{asset('master-assets/images/products/32/img-1.png')}}" alt="" class="avatar-xs">
                                                            @endif
                                                      
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="#!">
                                                                <h6 class="fs-md mb-2"> {{!empty($popular_product->product_name) && !empty($popular_product->product_name) ? $popular_product->product_name : 'Data Not Found' }}</h6>
                                                            </a>
                                                            <ul class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                                <!-- <li>
                                                                    <i class="ph-star align-baseline"></i> 487
                                                                </li> -->
                                                                <li>
                                                                    <i class="ph-shopping-cart align-baseline"></i> {{!empty($popular_product->product_count) && !empty($popular_product->product_count) ? $popular_product->product_count : 'Data Not Found' }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-end">
                                                            <h5 class="fs-md text-primary mb-0">${{!empty($popular_product->total) && !empty($popular_product->total) ? number_format($popular_product->total,2) : '0' }}</h5>
                                                            <h6 class=" mb-0 " style="font-size:12px;color:#878A99">Vendor: {{$popular_product->vendor_name}}</h6>
                                                        </div>
                                                        <!-- <div class="flex-shrink-0">
                                                            <button class="btn btn-secondary btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#productModal"><i class="ph-arrow-right"></i></button>
                                                        </div> -->
                                                    </div>
                                                   
                                                </div>
                                               
                                                @endforeach
                                                @endif
                                               
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                       
                           
                            <div class="col-xl-4 col-lg-6" hidden>
                                <div class="card card-height-100">
                                    <div class="card-header d-flex">
                                        <h5 class="card-title flex-grow-1 mb-0">Recent Activity</h5>
                                        <div class="flex-shrink-0">
                                            <a href="#!" class="btn btn-subtle-info btn-sm">View More <i class="ph-caret-right align-middle"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <div data-simplebar class="px-3" style="max-height: 258px;">
                                            <div class="acitivity-timeline acitivity-main">
                                                <div class="acitivity-item d-flex">
                                                    <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                        <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                            <i class="ph-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1 lh-base">Purchased by James Price</h6>
                                                        <p class="text-muted mb-2">Product noise evolve smartwatch </p>
                                                        <small class="mb-0 text-muted">05:57 AM Today</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{asset('master-assets/images/users/32/avatar-2.jpg')}}" alt="" class="avatar-xs rounded-circle acitivity-avatar">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1 lh-base">Natasha Carey have liked the products</h6>
                                                        <p class="text-muted mb-2">Allow users to like products in your WooCommerce store.</p>
                                                        <small class="mb-0 text-muted">25 Dec, 2022</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-xs acitivity-avatar">
                                                            <div class="avatar-title rounded-circle bg-secondary-subtle text-secondary">
                                                                <i class="mdi mdi-sale fs-14"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1 lh-base">Today offers by <a href="apps-ecommerce-seller-details.html" class="link-secondary">Digitech Galaxy</a></h6>
                                                        <p class="text-muted mb-2">Offer is valid on orders of $230 Or above for selected products only.</p>
                                                        <small class="mb-0 text-muted">12 Dec, 2022</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-xs acitivity-avatar">
                                                            <div class="avatar-title rounded-circle bg-warning-subtle text-warning">
                                                                <i class="ri-bookmark-fill"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1 lh-base">Favoried Product</h6>
                                                        <p class="text-muted mb-2">Esther James have favorited product.</p>
                                                        <small class="mb-0 text-muted">25 Nov, 2022</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-xs acitivity-avatar">
                                                            <div class="avatar-title rounded-circle bg-secondary-subtle text-secondary">
                                                                <i class="mdi mdi-sale fs-14"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1 lh-base">Flash sale starting <span class="text-primary">Tomorrow.</span></h6>
                                                        <p class="text-muted mb-2">Flash sale by <a href="javascript:void(0);" class="link-secondary fw-medium">Zoetic Fashion</a></p>
                                                        <small class="mb-0 text-muted">22 Oct, 2022</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-xs acitivity-avatar">
                                                            <div class="avatar-title rounded-circle bg-info-subtle text-info">
                                                                <i class="ri-line-chart-line"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1 lh-base">Monthly sales report</h6>
                                                        <p class="text-muted mb-2"><span class="text-danger">2 days left</span> notification to submit the monthly sales report. <a href="javascript:void(0);" class="link-warning text-decoration-underline">Reports Builder</a></p>
                                                        <small class="mb-0 text-muted">15 Oct, 2022</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-4 col-lg-6" hidden>
                                <div class="card card-height-100">
                                    <div class="card-header d-flex align-items-center">
                                        <h5 class="card-title flex-grow-1 mb-0">Stock</h5>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn"   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">This Month<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"  >This Month</a>
                                                    <a class="dropdown-item"  >Last Month</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
									   <div data-simplebar class="px-3" style="max-height: 258px;">
                                       <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-borderless">
                                                <thead class="table-active">
                                                    <tr>
                                                        <th>Product Items</th>
                                                        <th>Quantity</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="product-item d-flex align-items-center gap-2">
                                                                <div class="avatar-sm flex-shrink-0">
                                                                    <div class="avatar-title bg-light rounded">
                                                                        <img src="{{asset('master-assets/images/products/32/img-1.png')}}" alt="" class="avatar-xs">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="fs-md"><a   class="text-reset">Branded T-Shirts</a></h6>
                                                                    <p class="text-muted mb-0"><a href="#!" class="text-reset">Fashion</a></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                      
                                                        <td>50</td>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="product-item d-flex align-items-center gap-2">
                                                                <div class="avatar-sm flex-shrink-0">
                                                                    <div class="avatar-title bg-light rounded">
                                                                        <img src="{{asset('master-assets/images/products/32/img-3.png')}}" alt="" class="avatar-xs">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="fs-md"><a   class="text-reset">Fossil gen 5E smart watch</a></h6>
                                                                    <p class="text-muted mb-0"><a href="#!" class="text-reset">Watch</a></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                       
                                                        <td>20</td>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="product-item d-flex align-items-center gap-2">
                                                                <div class="avatar-sm flex-shrink-0">
                                                                    <div class="avatar-title bg-light rounded">
                                                                        <img src="{{asset('master-assets/images/products/32/img-6.png')}}" alt="" class="avatar-xs">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="fs-md"><a   class="text-reset">Printed Men Round Neck</a></h6>
                                                                    <p class="text-muted mb-0"><a href="#!" class="text-reset">Fashion</a></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                     
                                                        <td>06</td>
                                                       
                                                    </tr>
													 <tr>
                                                        <td>
                                                            <div class="product-item d-flex align-items-center gap-2">
                                                                <div class="avatar-sm flex-shrink-0">
                                                                    <div class="avatar-title bg-light rounded">
                                                                        <img src="{{asset('master-assets/images/products/32/img-6.png')}}" alt="" class="avatar-xs">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="fs-md"><a   class="text-reset">Printed Men Round Neck</a></h6>
                                                                    <p class="text-muted mb-0"><a href="#!" class="text-reset">Fashion</a></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                     
                                                        <td>06</td>
                                                       
                                                    </tr>
                                                  
                                                </tbody>
                                            </table>
                                        </div>
										</div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                @include('layouts.master.footer')
@endsection
