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
                                    <h4 class="mb-sm-0">All User</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">All User</li>
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
                                           <a href="#" data-bs-toggle="modal" data-bs-target="#showModal"><button type="submit" class="btn btn-success" id="add-btn"><i class="bi bi-plus-circle align-baseline me-1"></i> Add User</button></a>
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
                                                    <th scope="col" >User</th>
													 <th scope="col" >Role</th>
													  <th scope="col" >Last Login</th>
													   <th scope="col" >Status</th>
                                                    <th scope="col" >Joined date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">

                                            @if(isset($users) && !empty($users))
                                            @php $i = 1; @endphp
                                            @foreach($users as $user)
											<tr> 
											<!-- <td> 
											<div class="form-check"> 
											<input class="form-check-input" type="checkbox"> 
											<label class="form-check-label"></label>            </div>  
											</td>   -->
											<td>{{$i++}}
											<td class="user">
                                              <div class="product-item d-flex align-items-center gap-2">
                                                                <div class="avatar-sm flex-shrink-0">
                                                                    <div class="avatar-title bg-light rounded-circle">
                                                                        @if($user->master_image)
                                                                        <img src="{{url('img/uploads/MasterUsersimage')}}/{{$user->master_image}}" alt="" class="rounded-circle avatar-xs">
                                                                        @else
                                                                        <img src="{{asset('master-assets/images/users/avatar-3.jpg')}}" alt="" class="rounded-circle avatar-xs">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="fs-md mb-0"><a href="#" class="text-reset">{{$user->name}}</a></h6>
                                                                    <p class="text-muted mb-0"><a href="#!" class="text-reset">{{$user->email}}</a></p>
                                                                </div>
                                                            </div>											
											 </td> 
											 <td >{{$user->role_name}}</td>
											 <td >20 mins ago</td>											 
											 <td >
                                                @if($user->is_master_role == 1)
                                                <span class="badge bg-success-subtle text-danger"> Active</span>
                                                @else
                                                <span class="badge bg-danger-subtle text-danger"> Inactive</span>
                                                @endif
                                                @if($user->is_master_status ==  2)
                                                <p class="text-muted mb-0"><a href="#!" class="text-reset">Password link send</a></p>
                                                @endif
                                                @if($user->is_master_status ==  3)
                                                <p class="text-muted mb-0"><a href="#!" class="text-reset">Waiting for Active </a></p>
                                                @endif
                                              

                                            </td>
											 <td >{{ date('d M Y, h:i A', strtotime($user->created_at)); }}</td> 
											
											
											<td>           
                                                 <ul class="d-flex gap-2 list-unstyled mb-0">               
                                                     <!-- <li>                    <a href="javascript:void(0);" class="btn btn-subtle-primary btn-icon btn-sm" ><i class="ph-eye"></i></a>                </li>    -->
                                                                  <li>                     <a href="#showModal{{$user->id}}" data-bs-toggle="modal" class="btn btn-subtle-success btn-icon btn-sm remove-item-btn"><i class="ph-pencil"></i></a>                </li>                <li>                    <a href="#deleteRecordModal{{$user->id}}" data-bs-toggle="modal" class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn"><i class="ph-trash"></i></a>                </li>            </ul>    
                                                                  
    			
		<!-- showModal -->
        <div class="modal fade" id="showModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-ordermodal"></button>
                </div>
                <form  action="{{route('master.edit.users')}}" enctype="multipart/form-data" method="POST"  class="tablelist-form"  autocomplete="off" >
                @csrf
                                      
                                  
                    <div class="modal-body">  
				    <p  class="form-label">Avatar</p>
                                        <div class="profile-user position-relative d-inline-block mx-auto mb-3">
                                            <!-- <img src="{{asset('master-assets/images/users/avatar-1.jpg')}}" alt="" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image"> -->
                                            <div class="upload-img">
                                                <div  class="image-holder">
                                            @if($user->master_image)  
                                            <img id="old_image" src="{{url('img/uploads/MasterUsersimage')}}/{{$user->master_image}}" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">	
                                            @else
                                            <img id="old_image" src="{{asset('master-assets/images/users/avatar-1.jpg')}}" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">	
                                            @endif
                                            
                                            </div>



                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit position-absolute end-0 bottom-0">
                                                <input id="profile-img-file-input" name="images1" accept="image/*,.gif, .jpg, .png" type="file" class="abc profile-img-file-input d-none">
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
                            <label  class="form-label">Full Name</label>
                            <input type="text" name="name"  value="{{$user->name}}" class="form-control" placeholder="Enter name" required >
                        </div>
						  <div class="mb-3">
                            <label  class="form-label">Email</label>
                            <input type="email" name="email" value="{{$user->email}}"  class="form-control" placeholder="Enter Email" required >
                        </div>


                      <label for="customername-field1" class="form-label">Role Permissions</label>
					  @if(isset($roles) && !empty($roles))
                      @foreach($roles as $role)
					  <div class="form-check form-switch  mb-3" dir="ltr">
                            @if($role->roles_id == $user->master_role_id )
                            <input type="radio" value="{{$role->roles_id}}" checked class="form-check-input" id="acustomSwitchsizemd" name="role_id">
                            @else
                            <input type="radio" value="{{$role->roles_id}}"  class="form-check-input" id="acustomSwitchsizemd" name="role_id">
                            @endif


                            <label class="form-check-label" for="acustomSwitchsizemd">{{$role->role_name}}</label>
                        </div>
                        @endforeach
                        @endif

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
                                                                  


                                                                
                                                                
	   <!-- deleteRecordModal -->
    <div id="deleteRecordModal{{$user->id}}" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
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
                        <button type="button" class="btn w-sm btn-light btn-hover" data-bs-dismiss="modal">Close</button>
                        <button type="button" data-id="{{Crypt::encrypt($user->id)}}" class=" delete-btn btn w-sm btn-danger btn-hover" id="delete-record">Yes, Delete It!</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-ordermodal"></button>
                </div>
                <form action="{{route('master.add.users')}}" enctype="multipart/form-data" method="POST"  class="tablelist-form"  autocomplete="off" >
                @csrf
                                      
                                  
                    <div class="modal-body">  
				    <p  class="form-label">Avatar</p>
                                        <div class="profile-user position-relative d-inline-block mx-auto mb-3">
                                            <!-- <img src="{{asset('master-assets/images/users/avatar-1.jpg')}}" alt="" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image"> -->
                                            <div class="upload-img">
                                                <div  id="image-holder">
                                            <img id="old_image" src="{{asset('master-assets/images/users/avatar-1.jpg')}}" class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">				
                                            
                                            </div>



                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit position-absolute end-0 bottom-0">
                                                <input id="profile-img-file-input" name="images" accept="image/*,.gif, .jpg, .png" type="file" class="profile-img-file-input d-none">
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
                            <label  class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" required >
                        </div>
						  <div class="mb-3">
                            <label  class="form-label">Email</label>
                            <input type="email" name="email"  class="form-control" placeholder="Enter Email" required >
                        </div>


                      <label for="customername-field1" class="form-label">Role Permissions</label>
					  @if(isset($roles) && !empty($roles))
                      @foreach($roles as $role)
					  <div class="form-check form-switch  mb-3" dir="ltr">
                            <input type="radio" value="{{$role->roles_id}}" class="form-check-input" id="acustomSwitchsizemd" name="role_id">
                            <label class="form-check-label" for="acustomSwitchsizemd">{{$role->role_name}}</label>
                        </div>
                        @endforeach
                        @endif

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
	
    <form hidden id="delete-user" action="{{route('master.users.delete')}}" method="post" class="tablelist-form"  autocomplete="off">
                @csrf
                <div id="divuserview">
                
                </div>
    </form>

@include('layouts.master.footer')

<script>
        $(document).ready(function () {
            $('button.delete-btn').click(function () {
                // alert($(this).attr("data-id"));

                $('div#divuserview').empty();

                var input = '<input type="text" value="'+$(this).attr("data-id")+'" name="id" />'

                $('div#divuserview').append(input);

                $('form#delete-user').submit();

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

$("#profile-img-file-input").on('change', function () {
  console.log('deva');
});
</script>

@endsection