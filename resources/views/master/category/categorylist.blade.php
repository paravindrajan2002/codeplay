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
                                    <h4 class="mb-sm-0">All Master Category</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Master Category</li>
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
                                           <a href="#" data-bs-toggle="modal" data-bs-target="#showModal"><button type="submit" class="btn btn-success" id="add-btn"><i class="bi bi-plus-circle align-baseline me-1"></i> Add Master Category</button></a>
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
                                                    <th scope="col" >S.No</th>
                                                    <th scope="col" >Category</th>
													 <th scope="col" width="50px" >Sequence No.</th>
													  <th scope="col" >Featured</th>
													  <th scope="col" >Display</th>
													   <th scope="col" >Status</th>
                                                    <th scope="col" >Created at</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">

                                            @if(isset($categorys) && !empty($categorys))
                                            @php $i = 1; @endphp
                                            @foreach($categorys as $category)
											<tr> 
											<!-- <td> 
											<div class="form-check"> 
											<input class="form-check-input" type="checkbox"> 
											<label class="form-check-label"></label>            </div>  
											</td>   -->
											<td> {{$i++}} </td>
											<td class="user">
                                              <div class="product-item d-flex align-items-center gap-2">
                                                                <div class="avatar-sm flex-shrink-0">
                                                                    <div class="avatar-title bg-light rounded-circle">
                                                                        @if($category->image)
                                                                        
                                                                        <img src="{{url('assets/category')}}/{{$category->image}}" alt="" class="rounded-circle avatar-xs">
                                                                   

                                                                        @else
                                                                        <img src="https://dev.humtumbaby.com/assets/category/{{$category->image}}" alt="" class="rounded-circle avatar-xs">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="fs-md mb-0"><a href="#" class="text-reset">{{$category->category_name}}</a></h6>
                                                                    <p class="text-muted mb-0"><a href="#!" class="text-reset">{{$category->slug}}</a></p>
                                                                </div>
                                                            </div>											
											 </td> 
											 <td >
                                            <input type="text" class="category-order-number form-control" style="width: 6em;" data-order-number="{{$category->ordering_number}}" data-id="{{Crypt::encrypt($category->id)}}" value="{{$category->ordering_number}}">
                                            </td>
                                            <td >
                                                @if($category->featured == 1)
                                                <span class="badge bg-success-subtle text-danger"> Active</span>
                                                @else
                                                <span class="badge bg-danger-subtle text-danger"> Inactive</span>
                                                @endif
                                               
                                              

                                            </td>
                                            <td >
                                                @if($category->displayInHeader == 1)
                                                <span class="badge bg-success-subtle text-danger"> Active</span>
                                                @else
                                                <span class="badge bg-danger-subtle text-danger"> Inactive</span>
                                                @endif
                                               
                                              

                                            </td>											 
											 <td >
                                                @if($category->status == 1)
                                                <span class="badge bg-success-subtle text-danger"> Active</span>
                                                @else
                                                <span class="badge bg-danger-subtle text-danger"> Inactive</span>
                                                @endif
                                               
                                              

                                            </td>
											 <td >{{ date('d M Y, h:i A', strtotime($category->created_at)); }}</td> 
											
											
											<td>           
                                                 <ul class="d-flex gap-2 list-unstyled mb-0">               
                                                     <!-- <li>                    <a href="javascript:void(0);" class="btn btn-subtle-primary btn-icon btn-sm" ><i class="ph-eye"></i></a>                </li>    -->
                                                                  <li>                     <a href="#showModal{{$category->id}}" data-bs-toggle="modal" class="btn btn-subtle-success btn-icon btn-sm remove-item-btn"><i class="ph-pencil"></i></a>                </li>                <li>                    <a href="#deleteRecordModal{{$category->id}}" data-bs-toggle="modal" class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn"><i class="ph-trash"></i></a>                </li>            </ul>    
                                                                  
    			
			<!-- EditModal -->
            <div class="modal fade" id="showModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Master Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-ordermodal"></button>
                </div>
                <form id="edit-cat{{$category->id}}" action="{{route('master.edit.masterCategory')}}" enctype="multipart/form-data" method="POST"  class="tablelist-form"  autocomplete="off" >
                @csrf
                                                                        
                    <div class="modal-body">  


                    <div class="mb-3" class="text-end" >
                            <label   class="form-label">Stutus</label> 
                            <br/>
                            @if($category->status  == 1)
                            <b>
                            <input style="padding-right:5opx" type="radio"  checked value="1"   class="form-check-input activeuser"  id="acustomSwitchsizemsd" name="status">  Active </b>
                            &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio"   value="0"     class="form-check-input" id="acustomSwitchsizsemd" name="status"> Inactive
                            @endif
                            @if($category->status  == 0)
                            <input style="padding-right:5opx" type="radio"   value="1"   class="form-check-input" id="acustomSwitchsizemsd" name="status">  Active
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"   value="0"  checked   class="form-check-input" id="acustomSwitchsizsemd" name="status">  <b>Inactive</b>
                            @endif

                        </div>
                        <hr>
                        <br/>
				    <p  class="form-label">Master Category Image</p>
                                        <div class="profile-user position-relative d-inline-block mx-auto mb-3">
                               <input type="text" value="{{Crypt::encrypt($category->id)}}" name="cat_id1" hidden />
                                            <div class="upload-img">
                                                <div class="image-holder"  >

                                       
                                            @if($category->image)
                                           
                                            <img  src="{{url('assets/category')}}/{{$category->image}}" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">	
                                            @else
                                            <img  src="{{asset('master-assets/images/users/avatar-1.jpg')}}" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">	
                                            @endif
                                            </div>
                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit position-absolute end-0 bottom-0">
                                                <input  name="images1" accept="image/*,.gif, .jpg, .png" type="file" class="profile-img-file-input d-none">
                                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="bi bi-camera"></i>
                                                    </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>					
                        <input type="hidden" id="" >
                        <div class="mb-3">
                            <label  class="form-label">Master Category Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{$category->category_name}}" class="form-control" required placeholder="Master Catecory name here .." required >
                        </div>

                        <div class="mb-3" hidden>
                            <label  class="form-label">Sequence No.</label>
                            <input type="text" disabled name="sq_number" value="{{$category->ordering_number}}" class="form-control"  required >
                        </div>
						  <div class="mb-3">
                            <label  class="form-label">Meta Title</label>
                            <input type="text" value="{{$category->meta_title}}" name="meta_title"  class="form-control" placeholder="Meta Title here.." required >
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Meta Description</label>
                            <textarea name="meta_description"   class="form-control" placeholder="Meta Description here.." required > {{$category->meta_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Slug</label>
                            <input type="text" value="{{$category->slug}}" name="slug"  class="form-control" placeholder="Slug here.." required >
                        </div>

					  <div class="form-check form-switch  mb-3 d-flex" dir="ltr">
                        <input hidden type="checkbox" value="0" class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            @if($category->featured  == 1)
                            <input type="checkbox" hidden value="0"  class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            <input type="checkbox" value="1" checked class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            @else
                            <input type="checkbox" hidden value="0" class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            <input type="checkbox" value="0" class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            @endif
                            <label style="padding-right:100px!important" class="form-check-label" for="acustomSwitchsizemd1"> &nbsp;&nbsp;Featured</label>

                            @if($category->displayInHeader  == 1)
                            <input type="checkbox" hidden   value="0"   class="form-check-input" id="acustomSwitchsizemd" name="displayheader">
                            <input type="checkbox"   value="1"  checked  class="form-check-input" id="acustomSwitchsizemd" name="displayheader">
                            @else
                            <input type="checkbox" hidden   value="0"   class="form-check-input" id="acustomSwitchsizemd" name="displayheader">
                            <input type="checkbox"   value="1"   class="form-check-input" id="acustomSwitchsizemd" name="displayheader">
                            @endif
                            <label class="form-check-label" for="acustomSwitchsizemd">&nbsp;&nbsp; Display In Header</label>                      
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
    <div id="deleteRecordModal{{$category->id}}" class="modal as fade zoomIn" tabindex="-1" aria-hidden="true">
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
                        <button type="button" class="btn w-sm btn-light btn-hover" data-bs-dismiss="as">Close</button>
                        <button type="button" data-id="{{Crypt::encrypt($category->id)}}" class=" delete-btn btn w-sm btn-danger btn-hover" id="delete-record">Yes, Delete It!</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Master Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-ordermodal"></button>
                </div>
                <form action="{{route('master.add.masterCategory')}}" enctype="multipart/form-data"method="POST"  class="tablelist-form"  >
                @csrf
                                                                        
                    <div class="modal-body">  
				    <p  class="form-label">Master Category Image</p>
                                        <div class="profile-user position-relative d-inline-block mx-auto mb-3">
                               
                                            <div class="upload-img">
                                                <div  id="image-holder">
                                            <img id="old_image" src="{{asset('master-assets/images/users/avatar-1.jpg')}}" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">				
                                            </div>
                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit position-absolute end-0 bottom-0">
                                                <input id="profile-img-file-input" name="images12" accept="image/*,.gif, .jpg, .png" type="file" class="profile-img-file-input d-none">
                                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="bi bi-camera"></i>
                                                    </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>					
                        <input type="hidden" id="" >
                        <div class="mb-3">
                            <label  class="form-label">Master Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Master Catecory name here .." required >
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
                            <textarea name="meta_description"  class="form-control" placeholder="Meta Description here.." required > </textarea>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Slug</label>
                            <input type="text" name="slug"  class="form-control" placeholder="Slug here.." required >
                        </div>

					  <div class="form-check form-switch  mb-3 d-flex" dir="ltr">

                        <input hidden type="checkbox" value="0" class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            <input type="checkbox" value="1" class="form-check-input" id="acustomSwitchsizemd1" name="featured">
                            <label style="padding-right:100px!important" class="form-check-label" for="acustomSwitchsizemd1">Featured</label>

                            <input type="checkbox" hidden   value="0"   class="form-check-input" id="acustomSwitchsizemd" name="displayheader">
                            <input type="checkbox"   value="1"   class="form-check-input" id="acustomSwitchsizemd" name="displayheader">
                            <label class="form-check-label" for="acustomSwitchsizemd">Display In Header</label>
                        
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
	
    <form hidden id="delete-category" action="{{route('master.mastercategory.delete')}}" method="post" class="tablelist-form"  autocomplete="off">
                @csrf
                <div id="divcategory">
                
                </div>
    </form>

@include('layouts.master.footer')
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


$(document).on("change",".category-order-number",function(event) {


                event.preventDefault();
                old_order_number = $(this).attr("data-order-number");
                order_number = $(this).val();
                category_id = $(this).attr("data-id");
                update_order_no_url = $(this).closest("table").find(".update-order-no-url").val();
                var realPath = path+'/master/order-update-category/';


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