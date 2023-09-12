@extends('layouts.master.header')


@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"/>
<style>
.bootstrap-select .dropdown-menu li a {
    color: #4f687e !important;
    font-weight: 700 !important;
}
.bootstrap-select .dropdown-toggle .filter-option-inner-inner {
    overflow: hidden;
    color: #4f687e !important;
    font-weight: 700 !important;
}
    </style>
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
                                    <h4 class="mb-sm-0">All  Category</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Category</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                       

                                <div class="card mb-4">
                                   <div class="card-header">
                                    <div class="row align-items-center g-2">
                                        <div class="col-lg-3 me-auto z-3">
                                           <a href="#" data-bs-toggle="modal" data-bs-target="#showModal"><button type="submit" class="btn btn-success" id="add-btn"><i class="bi bi-plus-circle align-baseline me-1"></i> Add Category</button></a>
                                        </div><!--end col-->
                                     
                                    
                                    </div><!--end row-->
                                </div>
                                    <div class="card-body mrg-top">
                                    <div class="table-responsive table-card">
                                        <table id="example" class="table table-centered align-middle table-custom-effect table-nowrap mb-0"> 
                                            <thead class="table-light">
                                                <tr>
                                                    <!-- <th>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th> -->
                                                    <th width="20px" scope="col">S.No.</th>
                                                    <th scope="col" >Master Category</th>
                                                    <th scope="col" >Category</th>
													 <th scope="col" width="50px" >Sequence No.</th>
													  <th scope="col" >Featured</th>
													   <th scope="col" >Status</th>
                                                    <th scope="col" >Created at</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">


                                            @if(isset($subcategorys) && !empty($subcategorys))
                                            @php $i = 1; @endphp
                                            @foreach($subcategorys as $subcategory)
											<tr> 
											<!-- <td> 
											<div class="form-check"> 
											<input class="form-check-input" type="checkbox"> 
											<label class="form-check-label"></label>            </div>  
											</td>   -->
                                            <td>{{$i++}}</td>
											<td class="user">
                                          
                                              <div class="product-item d-flex align-items-center gap-2">
                                                                <div class="avatar-sm flex-shrink-0">
                                                                    <div class="avatar-title bg-light rounded-circle">
                                                                        @if($subcategory->cat_image)
                                                                        
                                                                        <img src="{{url('assets/category')}}/{{$subcategory->cat_image}}" alt="" class="rounded-circle avatar-xs">
                                                                   

                                                                        @else
                                                                        <img src="https://dev.humtumbaby.com/assets/category/{{$subcategory->cat_image}}" alt="" class="rounded-circle avatar-xs">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="fs-md mb-0"><a href="#" class="text-reset">{{$subcategory->cat_name}}</a></h6>
                                                                    <p class="text-muted mb-0"><a href="#!" class="text-reset">{{$subcategory->cat_slug}}</a></p>
                                                                </div>
                                                            </div>											
											 </td> 
											<td class="user">
                                              <div class="product-item d-flex align-items-center gap-2">
                                                             
                                                                <div class="flex-grow-1">
                                                                    <h6 class="fs-md mb-0"><a href="#" class="text-reset">{{$subcategory->sub_category_name}}</a></h6>
                                                                    <p class="text-muted mb-0"><a href="#!" class="text-reset">{{$subcategory->slug}}</a></p>
                                                                </div>
                                                            </div>											
											 </td> 
											 <td >
                                            <input type="text" class="category-order-number1 form-control" style="width: 6em;" data-order-number="{{$subcategory->ordering_number}}" data-id="{{Crypt::encrypt($subcategory->id)}}" value="{{$subcategory->ordering_number}}">
                                            </td>
                                            <td >
                                                @if($subcategory->featured == 1)
                                                <span class="badge bg-success-subtle text-danger"> Active</span>
                                                @else
                                                <span class="badge bg-danger-subtle text-danger"> Inactive</span>
                                                @endif
                                               
                                              

                                            </td>
											 
											 <td >
                                                @if($subcategory->status == 1)
                                                <span class="badge bg-success-subtle text-danger"> Active</span>
                                                @else
                                                <span class="badge bg-danger-subtle text-danger"> Inactive</span>
                                                @endif
                                               
                                              

                                            </td>
											 <td >{{ date('d M Y, h:i A', strtotime($subcategory->created_at)); }}</td> 
											
											
											<td>           
                                                 <ul class="d-flex gap-2 list-unstyled mb-0">               
                                                     <!-- <li>                    <a href="javascript:void(0);" class="btn btn-subtle-primary btn-icon btn-sm" ><i class="ph-eye"></i></a>                </li>    -->
                                                                  <li>                     <a href="#showModal{{$subcategory->id}}" data-bs-toggle="modal" class="btn btn-subtle-success btn-icon btn-sm remove-item-btn"><i class="ph-pencil"></i></a>                </li>                <li>                    <a href="#deleteRecordModal{{$subcategory->id}}" data-bs-toggle="modal" class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn"><i class="ph-trash"></i></a>                </li>            </ul>    
                                                                  
    			
			<!-- EditModal -->
            <div class="modal fade" id="showModal{{$subcategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-ordermodal"></button>
                </div>
                <form action="{{route('master.edit.subCategory')}}" enctype="multipart/form-data" method="POST"  class="tablelist-form"  autocomplete="off" >
                @csrf
                                                                        
                    <div class="modal-body">  
                    <input type="text" value="{{Crypt::encrypt($subcategory->id)}}" name="cat_id" hidden />

                    <div class="mb-3" class="text-end" >
                            <label   class="form-label">Stutus</label> 
                            <br/>
                            @if($subcategory->status  == 1)
                            <b>
                            <input style="padding-right:5opx" type="radio"  checked value="1"   class="form-check-input activeuser"  id="acustomSwitchsizemsd" name="status">  Active </b>
                            &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"   value="0"     class="form-check-input" id="acustomSwitchsizsemd" name="status"> Inactive
                            @endif
                            @if($subcategory->status  == 0)
                            <input style="padding-right:5opx" type="radio"   value="1"   class="form-check-input" id="acustomSwitchsizemsd" name="status">  Active
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"   value="0"  checked   class="form-check-input" id="acustomSwitchsizsemd" name="status">  <b>Inactive</b>
                            @endif

                        </div>
                        <hr>
                        <br/>
				
                                       				
                        <input type="hidden" id="" >
                        <div class="mb-3">
                            <label  class="form-label">Category </label>
                            <br>
                            <select name="master_category" id="master_category" required class="selectpicker col-md-12 p-0"  aria-label="Default select example" data-live-search="true">
                                @if(isset($categorys) && !empty($categorys))
                                @foreach($categorys as $category)
                                @if($subcategory->category_id == $category->id) 
                                <option selected value="{{$category->id}}">{{$category->category_name}}</option>
                                @else
                                <option  value="{{$category->id}}">{{$category->category_name}}</option>
                                @endif
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Category Name</label>
                            <input type="text" value="{{$subcategory->sub_category_name}}" name="name"  class="form-control" placeholder="Category here.." required >
                        </div>
                        <div class="mb-3" hidden>
                            <label  class="form-label">Sequence No.</label>
                            <input type="text" disabled name="sq_number" value="{{$subcategory->ordering_number}}" class="form-control"  required >
                        </div>
						  <div class="mb-3">
                            <label  class="form-label">Meta Title</label>
                            <input type="text" value="{{$subcategory->meta_title}}" name="meta_title"  class="form-control" placeholder="Meta Title here.." required >
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Meta Description</label>
                            <textarea name="meta_description"   class="form-control" placeholder="Meta Description here.." required > {{$subcategory->meta_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Slug</label>
                            <input type="text" value="{{$subcategory->slug}}" name="slug"  class="form-control" placeholder="Slug here.." required >
                        </div>

					  <div class="form-check form-switch  mb-3 d-flex" dir="ltr">

                        <input hidden type="checkbox" value="0" class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            @if($subcategory->featured  == 1)
                            <input type="checkbox" hidden value="0"  class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            <input type="checkbox" value="1" checked class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            @else
                            <input type="checkbox" hidden value="0" class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            <input type="checkbox" value="0" class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            @endif
                   

                            <label style="padding-right:100px!important" class="form-check-label" for="acustomSwitchsizemd1"> &nbsp;&nbsp;Featured</label>

                        
                        </div>
                        <br/>
              
              

                    </div>
					
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-success" id="add-btn11">Submit</button>
                          
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end EditModal -->

                                                                
                                                                
	   <!-- deleteRecordModal -->
    <div id="deleteRecordModal{{$subcategory->id}}" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="text-center">
                        <div class="text-danger">
                            <i class="bi bi-trash display-5"></i>
                        </div>
                        <div class="mt-4">
                            <h4 class="mb-2">Are you sure ? </h4>
                            <p class="text-muted mx-3 mb-0">Are you sure you want to remove this record ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                        <button type="button" class="btn w-sm btn-light btn-hover" data-bs-dismiss="model">Close</button>
                        <button type="button" data-id="{{Crypt::encrypt($subcategory->id)}}" class=" delete-btn btn w-sm btn-danger btn-hover" id="delete-record">Yes, Delete It!</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /deleteRecordModal -->
                                              
    

    
                                                                
                                                                
                                                                </td>
											</tr>
										
											@endforeach
                                            @endif
											
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                     
                                    </div>
                                   
                                </div>
                                </div><!--end card-->
                           
                        

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

			
		<!-- showModal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-ordermodal"></button>
                </div>
                <form action="{{route('master.add.subCategory')}}" enctype="multipart/form-data" method="POST"  class="tablelist-form"  autocomplete="off" >
                @csrf
                                                                        
                    <div class="modal-body">  
                                        		
                        <input type="hidden" id="">
                        <div class="mb-3">
                            <label  class="form-label">Master Category </label>
                            <select name="master_category" id="master_category" required class="selectpicker col-md-12 p-0"  aria-label="Default select example" data-live-search="true">
                            <option value="0">Select Master Category</option>   
                            @if(isset($categorys) && !empty($categorys))
                                @foreach($categorys as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Catecory name here .." required >
                        </div>
                        <div class="mb-3" hidden>
                            <label  class="form-label">Sequence No.</label>
                            <input type="text" disabled name="sq_number" value="{{$count+1}}" class="form-control"  required >
                        </div>
						<div class="mb-3">
                            <label  class="form-label">Meta Title</label>
                            <input type="text" name="meta_title"  class="form-control" placeholder="Meta Title here.." required >
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Meta Description</label>
                            <textarea name="meta_description"  class="form-control" placeholder="YOUR TEXT" required > </textarea>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Slug</label>
                            <input type="text" name="slug"  class="form-control" placeholder="Slug here.." required >
                        </div>

					  <div class="form-check form-switch  mb-3 d-flex" dir="ltr">

                        <input hidden type="checkbox" value="0" class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            <input type="checkbox" value="1" class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            <label style="padding-right:100px!important" class="form-check-label" for="acustomSwitchsizemd1">&nbsp;&nbsp;Featured</label>

                        
                        </div>
              

                    </div>
					
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-success" id="add-btn11">Submit</button>
                          
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end showModal -->
	
    <form hidden id="delete-category" action="{{route('master.subcategory.delete')}}" method="post" class="tablelist-form"  autocomplete="off">
                @csrf
                <div id="divcategory">
                
                </div>
    </form>

@include('layouts.master.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
        $(document).ready(function () {
            $('button.delete-btn').click(function () {
                // alert($(this).attr("data-id"));

                $('div#divcategory').empty();

                var input = '<input type="text" value="'+$(this).attr("data-id")+'" name="id" />'

                $('div#divcategory').append(input);

                $('form#delete-category').submit();

            });
        });




$( '#select-field' ).select2( {
    theme: 'bootstrap-5'
} );


</script>


<script>

  var myReader = new FileReader();

$("#profile-img-file-input").on('change', function () {

    if (typeof (FileReader) != "undefined") {

        var image_holder = $("#image-holder");
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image"
            }).appendTo(image_holder);

        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
        alert("This browser does not support FileReader.");
    }
});
$(".profile-img-file-input").on('change', function () {

if (typeof (FileReader) != "undefined") {

    var image_holder = $(".image-holder");
    image_holder.empty();

    var reader = new FileReader();
    reader.onload = function (e) {
        $("<img />", {
            "src": e.target.result,
            "class": "avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image"
        }).appendTo(image_holder);

    }
    image_holder.show();
    reader.readAsDataURL($(this)[0].files[0]);
} else {
    alert("This browser does not support FileReader.");
}
});


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// var token = $('meta[name="csrf-token"]').attr('content'); 
var path = window.location.origin; 


$(document).on("change",".category-order-number1",function(event) {


                event.preventDefault();
                old_order_number = $(this).attr("data-order-number");
                order_number = $(this).val();
                category_id = $(this).attr("data-id");
                update_order_no_url = $(this).closest("table").find(".update-order-no-url").val();
                var realPath = path+'/master/order-update-subcategory/';


                $.ajax({ 

                        url:realPath,
                        type: "post", 
                        dataType: "json",
                        data:{
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        order_number: order_number,
                        id : category_id,
                        old_order_number : old_order_number
                        },  

                                success: function(response){
                                    window.location.reload();
                            }

                        });  


            });



</script>

@endsection