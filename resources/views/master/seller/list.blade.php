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
                                <h4 class="mb-sm-0">Seller</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Seller</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
					 <ul class="nav nav-pills arrow-navtabs nav-success bg-light mb-3" role="tablist">
                                        <li class="nav-item" id="new">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#new-request" role="tab">
                                                <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                                <span class="d-none d-sm-block">New Seller Requests<span class="position-absolute topbar-badge fs-3xs translate-middle badge rounded-pill bg-danger"><span class="notification-badge">{{$new_sellers_count}}</span><span class="visually-hidden">unread messages</span></span></span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="list">
                                            <a class="nav-link" data-bs-toggle="tab" href="#seller-list" role="tab">
                                                <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                                <span class="d-none d-sm-block">Active Sellers</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="list">
                                            <a class="nav-link" data-bs-toggle="tab" href="#reject-list" role="tab">
                                                <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                                <span class="d-none d-sm-block">Rjected Sellers</span>
                                            </a>
                                        </li>
                                     
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="new-request" role="tabpanel">
										 <div class="row align-items-center g-3 mb-4">
                        <div class="col-md-auto me-auto">
                          <h5 class="mb-sm-0">New Seller Requests</h5>
                        </div><!--end col-->
                        <div class="col-md-3">
                            <div class="search-box">
                                <input type="text" class="form-control" id="searchResultList" autocomplete="off" placeholder="Search for new seller "> <i class="ri-search-line search-icon"></i>
                            </div>
                        </div><!--end col-->
                
                    </div><!--end row-->
                   <div class="row" id="new_seller_list">	
                   @if(isset($new_sellers) && !empty($new_sellers))
                   @foreach($new_sellers as $new_seller)
                   @if($new_seller->status == 0)

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                <div class="text-end mb-3">
									<i class="fa fa-circle text-primary"> New</i>                               
                                    </div>                              
                                    <div class="text-center mt-4">
                                        <a href="#"><h5>
                                            @if($new_seller->first_name == '')
                                                Name Not Found
                                            @endif

                                            {{$new_seller->first_name}} {{$new_seller->last_name}}
                                        </h5></a>
                                        <p class="text-muted mb-0">{{$new_seller->business_address}} <br> GST: {{$new_seller->gst}}
                                     </p>
                                    </div>
                                </div>                             
                                <div class="card-body text-center gap-2">                                 
                                  <button style="cursor:pointer" data-id="{{Crypt::encrypt($new_seller->id)}} " class="view-seller btn btn-subtle-primary w-100"  >View Details</button>
                                </div>
                            </div>
                        </div><!--end col-->
                    @endif
                        @endforeach
                        @endif        

                    </div><!--end row-->
                                        </div>
                    <div class="tab-pane" id="seller-list" role="tabpanel">
                                            <div class="row align-items-center g-3 mb-4">
                        <div class="col-md-auto me-auto">
                          <h5 class="mb-sm-0">Active Sellers List</h5>
                        </div><!--end col-->
                        <div class="col-md-3">
                            <div class="search-box">
                                <input type="text" class="form-control" id="searchResultList1" autocomplete="off" placeholder="Search for active sellers "> <i class="ri-search-line search-icon"></i>
                            </div>
                        </div><!--end col-->
                
                    </div><!--end row-->
                    <div class="row" id="seller_list" >		
                        
                    @if(isset($sellers) && !empty($sellers))
                   @foreach($sellers as $seller)
                   @if($seller->status == 1)
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-end mb-3">
									<i class="fa fa-circle text-success"> Active</i>                                       
                                    </div>                                   
                                    <div class="text-center mt-4">
                                    <a href="#"><h5>
                                            @if($seller->first_name == '')
                                                Name Not Found
                                            @endif

                                            {{$seller->first_name}} {{$seller->last_name}}
                                        </h5></a>
                                        <p class="text-muted mb-0">{{$seller->business_address}} <br> GST: {{$seller->gst}}
                                    </div>
                                </div>                             
                                <div class="card-body text-center gap-2">                                 
                                  <a > <button type="button"  data-id="{{Crypt::encrypt($seller->id)}} " class="seller_dash btn btn-subtle-primary w-100"  >Seller Portfolio </button></a>
                                </div>
                            </div>
                        </div><!--end col-->
                        @endif
                        @endforeach
                        @endif
					                       
                    </div><!--end row-->
                                        </div>
                                     
                                 

                                    <div class="tab-pane" id="reject-list" role="tabpanel">
                                            <div class="row align-items-center g-3 mb-4">
                        <div class="col-md-auto me-auto">
                          <h5 class="mb-sm-0">Rejected Sellers List</h5>
                        </div><!--end col-->
                        <div class="col-md-3">
                            <div class="search-box">
                                <input type="text" class="form-control" id="searchResultList2" autocomplete="off" placeholder="Search for Rejected sellers "> <i class="ri-search-line search-icon"></i>
                            </div>
                        </div><!--end col-->
                
                    </div><!--end row-->
                    <div class="row" id="reject_list" >		
                        
                    @if(isset($rsellers) && !empty($rsellers))
                   @foreach($rsellers as $rseller)
                   @if($rseller->status == 2)
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-end mb-3">
									<i class="fa fa-circle text-danger"> Rejected</i>                                       
                                    </div>                                   
                                    <div class="text-center mt-4">
                                    <a href="#"><h5>
                                            @if($rseller->first_name == '')
                                                Name Not Found
                                            @endif

                                            {{$rseller->first_name}} {{$rseller->last_name}}
                                        </h5></a>
                                        <p class="text-muted mb-0">{{$rseller->business_address}} <br> GST: {{$rseller->gst}}
                                    </div>
                                </div>                             
                                <div class="card-body text-center gap-2">                                 
                                  <a > <button type="button"  data-id="{{Crypt::encrypt($rseller->id)}} " class="seller_dash btn btn-subtle-primary w-100"  >Seller Portfolio </button></a>
                                </div>
                            </div>
                        </div><!--end col-->
                        @endif
                        @endforeach
                        @endif
					                       
                    </div><!--end row-->
                                        </div>
                                     
                                    </div>
					
					 

                   

                </div>
                <!-- container-fluid -->


               




            </div>
            <!-- End Page-content -->
			
			
			
			
			
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

        <form id="seller-details" hidden action="{{route('master.view.seller')}}" method="post" class="tablelist-form" novalidate autocomplete="off">
                @csrf
                <div id="divselleredit">
                
                </div>
        </form>
        <form id="seller-dashboard" hidden action="{{route('master.seller.details')}}" method="post" class="tablelist-form" novalidate autocomplete="off">
                @csrf
                <div id="divsellerdash">
                
                </div>
        </form>

@include('layouts.master.footer')

<script>
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var token = $('meta[name="csrf-token"]').attr('content'); 
var path = window.location.origin; 
$(document).ready(function () {

     $('button.view-seller').click(function () {

        $('div#divselleredit').empty();

        var input = '<input type="text" value="'+$(this).attr("data-id")+'" name="id" />'

        $('div#divselleredit').append(input);

        $('form#seller-details').submit();

    });
    $('button.seller_dash').click(function () {

    $('div#divsellerdash').empty();

    var input = '<input type="text" value="'+$(this).attr("data-id")+'" name="id" />'

    $('div#divsellerdash').append(input);

    $('form#seller-dashboard').submit();

    }); 

    $("#searchResultList").on( "keyup", function() {

    var filter = $(this).val();
    var products = '';
    var realPath = path+'/master/newSellerSearch/';
    var html = [];
   $.ajax({ 

        url:realPath,
        type: "get", 
        dataType: "json",
        data:{
        _token: token,
        filter: filter,
        mode: "new1"
        },  

        success:function(data){

            $('div#new_seller_list').empty();


if(data.length == 0){
    html +='<div class="col-lg-12 col-md-12"><div class="card"><div class="card-body"><div class="text-end mb-3"></div><div class="text-center mt-4"><a href="#"><h5>Data Not Found...</h5></a></div></div></div></div>';

 $('div#new_seller_list').append(html);

}else{
    $.each(data, function(id,value){

var encrypted = '{{ Crypt::encrypt("'+value.id+'") }}';
if(value.status == 0){
 var icon = '<i class="fa fa-circle text-primary"> New</i>';
}
if(value.status == 2){
    var icon = '<i class="fa fa-circle text-danger"> Rejected</i>';
}
       
html +='<div class="col-lg-3 col-md-6"><div class="card"><div class="card-body"><div class="text-end mb-3">'+icon+'</div><div class="text-center mt-4"><a href="#"><h5>'+value.first_name+' '+value.last_name+'</h5></a><p class="text-muted mb-0">'+value.business_address+'<br> GST: '+value.gst+'</p></div></div><div class="card-body text-center gap-2"><button style="cursor:pointer" data-id="'+encrypted+'" class="view-seller btn btn-subtle-primary w-100"  >View Details</button></div></div></div>';
 
})  
$('div#new_seller_list').append(html);
filter = '';
}


}  

});  



    } );
    // End for new seller 

    // starting seller list search

    $("#searchResultList1").on( "keyup", function() {

var filter = $(this).val();
var products = '';
var realPath = path+'/master/newSellerSearch/';
var html = [];
$.ajax({ 

    url:realPath,
    type: "get", 
    dataType: "json",
    data:{
    _token: token,
    filter: filter,
    mode: "list"
    },  

    success:function(data){

        $('div#seller_list').empty();


if(data.length == 0){
    html +='<div class="col-lg-12 col-md-12"><div class="card"><div class="card-body"><div class="text-end mb-3"></div><div class="text-center mt-4"><a href="#"><h5>Data Not Found...</h5></a></div></div></div></div>';
$('div#seller_list').append(html);

}else{
$.each(data, function(id,value){

var encrypted = '{{ Crypt::encrypt("'+value.id+'") }}';
   
html +='<div class="col-lg-3 col-md-6"><div class="card"><div class="card-body"><div class="text-end mb-3"><i class="fa fa-circle text-success"> Active</i></div><div class="text-center mt-4"><a href="#"><h5>'+value.first_name+' '+value.last_name+'</h5></a><p class="text-muted mb-0">'+value.business_address+'<br> GST: '+value.gst+'</p></div></div><div class="card-body text-center gap-2"><button style="cursor:pointer" data-id="'+encrypted+'" class="seller_dash btn btn-subtle-primary w-100"  >Seller Portfolio</button></div></div></div>';

})  
$('div#seller_list').append(html);
filter = '';
}


}  

});  



} );
    // End search seller list


      // starting Rejected list search

      $("#searchResultList2").on( "keyup", function() {

var filter = $(this).val();
var products = '';
var realPath = path+'/master/newSellerSearch/';
var html = [];
$.ajax({ 

    url:realPath,
    type: "get", 
    dataType: "json",
    data:{
    _token: token,
    filter: filter,
    mode: "reject"
    },  

    success:function(data){

        $('div#reject_list').empty();


if(data.length == 0){
    html +='<div class="col-lg-12 col-md-12"><div class="card"><div class="card-body"><div class="text-end mb-3"></div><div class="text-center mt-4"><a href="#"><h5>Data Not Found...</h5></a></div></div></div></div>';
$('div#reject_list').append(html);

}else{
$.each(data, function(id,value){

var encrypted = '{{ Crypt::encrypt("'+value.id+'") }}';
   
html +='<div class="col-lg-3 col-md-6"><div class="card"><div class="card-body"><div class="text-end mb-3"><i class="fa fa-circle text-danger"> Rejected</i></div><div class="text-center mt-4"><a href="#"><h5>'+value.first_name+' '+value.last_name+'</h5></a><p class="text-muted mb-0">'+value.business_address+'<br> GST: '+value.gst+'</p></div></div><div class="card-body text-center gap-2"><button style="cursor:pointer" data-id="'+encrypted+'" class="view-seller btn btn-subtle-primary w-100"  >View Details</button></div></div></div>';

})  
$('div#reject_list').append(html);
filter = '';
}


}  

});  



} );
    // End search Rejected list



});

</script>


@endsection