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
                                <h4 class="mb-sm-0">Seller Details</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Seller</a></li>
                                        <li class="breadcrumb-item active">Seller Details</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
					
					
        @php
         
         $total_order = (isset($data) && !empty($data) && !empty($data['total_order'])) ? $data['total_order'] : 0;
         $earnings = (isset($data) && !empty($data) && !empty($data['earnings'])) ? $data['earnings'] : 0;
         $refund = (isset($data) && !empty($data) && !empty($data['refund'])) ? $data['refund'] : 0;

         @endphp

                            
                        
              <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body d-flex align-items-center gap-2">
                                    <h5 class="card-title flex-grow-1 mb-0">Portfolio Overview</h5>
                                    <div class="flex-shrink-0">
                                        <button type="button" data-id="{{Crypt::encrypt($id)}}" class="active dash_graphRevenue btn btn-subtle-secondary btn-sm">
                                            ALL
                                        </button>
                                        <button type="button" data-id="{{Crypt::encrypt($id)}}" class="btn dash_graphRevenue btn-subtle-secondary btn-sm">
                                            1M
                                        </button>
                                        <button type="button" data-id="{{Crypt::encrypt($id)}}}" class="btn dash_graphRevenue btn-subtle-secondary btn-sm">
                                            6M
                                        </button>
                                        <button type="button" data-id="{{Crypt::encrypt($id)}}" class="btn dash_graphRevenue btn-subtle-primary btn-sm">
                                            1Y
                                        </button>
                                    </div>
                                </div>
                                <div class="border border-start-0 border-end-0">
                                    <div class="row g-0">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card-body text-center border-end-md border-bottom-lg-0 border-bottom">
                                                <h5 class="mb-2"><span class="counter-value" data-target="{{$total_order}}">{{$total_order}}</span></h5>
                                                <p class="text-muted mb-0">Orders</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card-body text-center border-end-lg border-bottom-lg-0 border-bottom">
                                                <h5 class="mb-2">₹<span class="counter-value" data-target="{{$earnings}}">{{$earnings}}</span></h5>
                                                <p class="text-muted mb-0">Earnings</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card-body text-center border-end-md border-bottom-md-0 border-bottom">
                                                <h5 class="mb-2">₹<span class="counter-value" data-target="{{$refund}}">{{$refund}}</span></h5>
                                                <p class="text-muted mb-0">Refunds</p>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-3 col-md-6">
                                            <div class="card-body text-center">
                                                <h5 class="mb-2 text-success"><span class="counter-value" data-target="18.92">0</span>%</h5>
                                                <p class="text-muted mb-0">Conversation Ratio</p>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card-body ">
                                                <div class="w-100" id="">
                                                <div id="column_chart2" data-colors='["--tb-danger", "--tb-primary", "--tb-success"]' class="apex-charts" dir="ltr"></div>
                                                </div>
     
                                </div><!-- end card body -->
                            </div>
							
							
							
                            <div id="productList">
                               
                                <div class="card">
                                    <div class="card-body">
									
									 <div class="table-responsive ">
                                        <table id="example" class="table table-centered align-middle table-custom-effect table-nowrap mb-0"> 
                                            <thead class="table-light">
                                                <tr>
                                                    <!-- <th>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th> -->
                                                   
                                                    <th scope="col" >Products</th>
													 <th scope="col" >Category</th>
													  <th scope="col" >Stock</th>
                                                    <th scope="col" >Orders</th>
													<th scope="col" >Rating</th>
													<th scope="col" >Published</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
											
                                            @if(isset($products) && !empty($products))
                                            @php $temp = ''; @endphp
                                            @foreach($products as $product)
                                            @if($product->product_name != $temp)
                                            
                                            <tr> 
											<!-- <td> 
											<div class="form-check"> 
											<input class="form-check-input" type="checkbox"> 
											<label class="form-check-label"></label>            </div>  
											</td>   -->
											
											 <td class="products">
                                                            <div class="d-flex align-items-center">
                                                               
                                                            <div class="avatar-xs bg-light rounded p-1 me-2">

                                                                @if($product->mainimage)
                                                                <img src="https://dev.humtumbaby.com/uploads/products/{{$product->mainimage}}" alt="" class="img-fluid d-block">
                                                                @else
                                                                <img src="assets/images/products/32/img-1.png" alt="" class="img-fluid d-block">
                                                                @endif
                                                           

                                                                
                                                                </div>

                                                                <div>
                                                                    <h6 class="mb-0"><a href="apps-ecommerce-product-details.html" class="text-reset text-capitalize products">{{$product->product_name}}</a></h6>
                                                                </div>
                                                            </div>
                                                        </td>
											<td >{{$product->category_name}}</td>
                                                        <td> {{$product->product_qty}}</td>
                                                        <td >
                                                           @foreach($product_orders as $product_order) 
                                                       @if($product_order->pid ==  $product->id)
                                                           {{$product_order->order_count}}
                                                        @endif

                                                        @endforeach
                                                    
                                                        </td>
                                                        <td >
                                                            <span class="badge bg-warning-subtle text-warning"><i class="bi bi-star-fill align-baseline me-1"></i> 4.9</span>
                                                        </td>
                                                        <td >                                     {{date("d M, Y", strtotime($product->created_at))}}
                                                        </td>
											
											
											<td>            <ul class="d-flex gap-2 list-unstyled mb-0">                <li>                    <a href="javascript:void(0);" class="btn btn-subtle-primary btn-icon btn-sm" ><i class="ph-eye"></i></a>                </li>                           </ul>        </td>
											</tr>
                                          
                                            @endif
										
                                            @endforeach
                                            @endif
											
											
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                     
                                    </div>
									
									
									
                                        
                                       
                                        
                                       
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-3">
                            <div class="card overflow-hidden">
                                <!-- <div class="ratio ratio-16x9">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509156.773725123!2d-123.79622260161696!3d37.19312212390098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C%20USA!5e0!3m2!1sen!2sin!4v1678106410566!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div> -->
                                <div class="card-body pt-1">
                                   
                                    <div class="text-center mt-4">
                                        <h5 class="mb-2">@if($seller->business_name) {{$seller->business_name}} @else NA @endif </h5>
                                        <p class="text-muted mb-4 pb-2">@if($seller->business_address) {{$seller->business_address }} @else NA @endif</p>
                                    </div>
                                    <div class="table-responsive table-card">
                                        <table class="table align-middle table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Owner Name</th>
                                                    <td>@if($seller->first_name) {{$seller->first_name }} @else NA @endif
                                                    @if($seller->last_name) {{$seller->last_name }} @else  @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>GSTIN</th>
                                                    <td>@if($seller->gst) {{$seller->gst}} @else NA @endif</td>
                                                </tr>
                                                <tr>
                                                    <th>Pan</th>
                                                    <td>EQ25483</td>
                                                </tr>												
                                                <tr>
                                                    <th>Email</th>
                                                    <td><a href="#!" class="text-reset">@if($seller->email) {{$seller->email}} @else NA @endif</a></td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td><a href="tel:+(542) 95135 74123">@if($seller->phone) {{$seller->phone}} @else NA @endif</a></td>
                                                </tr>
                                                <tr>
                                                    <th>Account Holder Name</th>
                                                    <td>@if($seller->holder_name) {{$seller->holder_name}} @else NA @endif</td>
                                                </tr>
												 <tr>
                                                    <th>Account Number</th>
                                                    <td>@if($seller->account_number) {{$seller->account_number}} @else NA @endif</td>
                                                </tr>
												 <tr>
                                                    <th>IFSC Code</th>
                                                    <td>@if($seller->ifsc) {{$seller->ifsc}} @else NA @endif</td>
                                                </tr>
												 <tr>
                                                    <th>Branch</th>
                                                    <td>@if($seller->bank_name) {{$seller->bank_name}} @else NA @endif</td>
                                                </tr>
												<tr>
                                                    <th>Address Proof</th>
                                                    <td>
                                                        <!-- <img class="img-fluid rounded " src="assets/images/aadhar-card1.jpg" alt="" > -->
                                                
                                                    @if($seller->address_proof)

                                                    <img class="img-fluid rounded " style="height:90px !important" src="https://dev.humtumbaby.com/vendorassets/uploads/{{$seller->address_proof}}" alt="" >

                                                    @else
                                                    Data Not Found
                                                    @endif
                                                
                                                </td>
                                                </tr>
												<tr>
                                                    <th>Signature</th>
                                                    <td>
                                                    @if($seller->signature)

                                                    <img class="img-fluid rounded " style="height:90px !important" src="https://dev.humtumbaby.com/vendorassets/uploads/{{$seller->signature}}" alt="" >

                                                    @else
                                                    Data Not Found

                                                    @endif    
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="hstack gap-2 justify-content-center list-unstyled mt-4 pt-2 mb-0">
                                        <li>
                                            <a href="#!" class="btn btn-success btn-sm"><i class="bi bi-whatsapp"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!" class="btn btn-primary btn-sm"><i class="bi bi-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!" class="btn btn-info btn-sm"><i class="bi bi-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!" class="btn btn-danger btn-sm"><i class="bi bi-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--end card-->
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <h6 class="text-muted text-uppercase fw-semibold mb-4">Customer Reviews</h6>
                                        <div>
                                            <div>
                                                <div class="bg-warning-subtle px-3 py-2 rounded-2 mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <div class="fs-16 align-middle text-warning">
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-half-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h6 class="mb-0">4.8 out of 5</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <div class="text-muted">Total <span class="fw-medium">5.50k</span> reviews</div>
                                                </div>
                                            </div>
                        
                                            <div class="mt-3">
                                                <div class="row align-items-center g-3 pt-2">
                                                    <div class="col-auto">
                                                        <div>
                                                            <h6 class="mb-0">5 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div>
                                                            <h6 class="mb-0 text-muted">2758</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                        
                                                <div class="row align-items-center g-3 pt-2">
                                                    <div class="col-auto">
                                                        <div>
                                                            <h6 class="mb-0">4 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 29.32%" aria-valuenow="29.32" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div>
                                                            <h6 class="mb-0 text-muted">1063</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                        
                                                <div class="row align-items-center g-3 pt-2">
                                                    <div class="col-auto">
                                                        <div>
                                                            <h6 class="mb-0">3 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div>
                                                            <h6 class="mb-0 text-muted">997</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                        
                                                <div class="row align-items-center g-3 pt-2">
                                                    <div class="col-auto">
                                                        <div>
                                                            <h6 class="mb-0">2 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                    <div class="col-auto">
                                                        <div>
                                                            <h6 class="mb-0 text-muted">227</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                        
                                                <div class="row align-items-center g-3 pt-2">
                                                    <div class="col-auto">
                                                        <div>
                                                            <h6 class="mb-0">1 star</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <div class="progress animated-progress progress-sm">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div>
                                                            <h6 class="mb-0 text-muted">408</h6>
                                                        </div>
                                                    </div>
                                                </div><!-- end row -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Contact Support</h6>
                                </div>
                                <div class="card-body">
                                    <form action="#">
                                        <div class="mb-3">
                                            <textarea class="form-control" id="" rows="4" placeholder="Enter your messages..."></textarea>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-secondary"><i class="bi bi-envelope align-baseline me-1"></i> Send Messages</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->


                  

                   

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
			
			

 


@include('layouts.master.footer')

<script>
    
var earning = <?php echo json_encode($earning)?>;
var refund = <?php echo json_encode($refund1)?>;

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
	(e = getChartColorsArray("column_chart2")) && (t = {
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
        {
			name: "Earnings",
			data: earning
		}, 
        {
			name: "Refund",
			data: refund
		}
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
	}, "" != chartColumnChart && chartColumnChart.destroy(), (chartColumnChart = new ApexCharts(document.querySelector("#column_chart2"), t)).render())
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

//  Graph Revenue  Summary 
$('.dash_graphRevenue').on("click", function() {

   

$('.dash_graphRevenue').removeClass('active').addClass('inactive');
 $(this).removeClass('inactive').addClass('active');
var filter = $(this).text();
var sid = $(this).attr("data-id");
var graph = '';
var realPath = path+'/master/sellerFiltergraph/';
var html = [];
$.ajax({ 

    url:realPath,
    type: "get", 
    dataType: "json",
    data:{
    _token: token,
    filter: filter,
    sid: sid
    },  

    success:function(data){

        $('#column_chart2').empty();


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
(e = getChartColorsArray("column_chart2")) && (t = {
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
        name: "Earning",
        data: data.earning
    },
    {
    	name: "Refund",
    	data: data.refund
    }
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
}, "" != chartColumnChart && chartColumnChart.destroy(), (chartColumnChart = new ApexCharts(document.querySelector("#column_chart2"), t)).render())
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

@endsection
