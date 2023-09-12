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
                                    <h4 class="mb-sm-0">Edit Roles List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Roles List</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                       

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card roles mb-4">
                                    <div class="card-header d-flex align-items-center gap-3">
                                        <h6 class="card-title mb-0 flex-grow-1">{{$role->role_name}}</h6>                                       
                                    </div>
                                    <div class="card-body">
                                    <?php 

                                        $user_counts = DB::table('users')
                                        ->where('master_role_id',$role->roles_id)   
                                        ->groupBy('master_role_id')
                                        ->count();
                                            ?>
                                        <p >Total user with this role: {{$user_counts}}</p>
                                        <ul class="">
                                                    @foreach($datas as $data)
													<li>{{$data->permission_name}}</li>
                                                    @endforeach
												</ul>
												<hr/>
												<div class="d-flex flex-wrap mt-n1 justify-content-between">
                                                     
                                                        <div>
                                                            <a href="{{route('master.roles')}}" class="d-block text-body p-1 px-2"><i class="bi bi-plus-circle align-baseline me-1 text-muted align-bottom me-1"></i> Add Role</a>
                                                        </div>
                                                    </div>
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->
							
							  <div class="col-lg-8">
                                <div class="card mb-4">
                                   <div class="card-header">
                                    <div class="row align-items-center g-2">
                                        <div class="col-lg-3 me-auto">
                                            <h6 class="card-title mb-0">Edit  Role Permissions</h6>
                                        </div><!--end col-->
                                     
                                    
                                    </div><!--end row-->
                                </div>
                                    <div class="card-body">
                                    <div class="">
                <form action="{{route('master.rolesEdit')}}" method="post" class="tablelist-form"  autocomplete="off">
                @csrf
                    <div class="modal-body">
                        <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                        <input type="hidden" id="id-field" >
                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Role Name<span class="text-danger">*</span></label>
                            <input type="text" value="add" name="mode" hidden />
                            <input type="text" hidden value="{{Crypt::encrypt($role->roles_id)}}" name="id" />
                            <input type="text" id="customername-field" name="role_name" class="form-control required"  value="{{$role->role_name}}" placeholder="Enter name" required >
                        </div>

                      <label for="customername-field" class="form-label">Role Permissions</label>
<table class="table table-nowrap mb-0">



       <thead>
        <tr>
           
            <th scope="col">Administrator Access *</th>
            @if(isset($permissions) && !empty($permissions))
            @php $i = 1; @endphp
            @foreach ($permissions as $permission)
            @if($permission->permission_name == 'Administrator')
            @if($i == 1)
             <th scope="col" rowspan="3">
                <div class="form-check">
                    <input type="text" name="permission_id[]" hidden value="{{$permission->permission_id}}" />
                    @if($permission->status == 0)
                    <input class="form-check-input admin_no check_class{{$permission->permission_id}}" type="checkbox" checked value="0" selected name="check[]" id="activetableCheck{{$i++}}" >
                    @else
                    <input class="form-check-input admin_no check_class{{$permission->permission_id}}" type="checkbox"  value="0" selected name="check[]" id="activetableCheck{{$i++}}" >
                    @endif
                    
                    <label class="form-check-label" for="activetableCheck01"></label><b>NO</b> &nbsp;&nbsp; 
                    @if($permission->status == 1)
                    <input class="form-check-input admin_yes check_class{{$permission->permission_id}}"  type="checkbox" checked name="check[]"  value="1" id="activetableCheckk{{$i++}}">
                    @else
                    <input class="form-check-input admin_yes check_class{{$permission->permission_id}}"  type="checkbox"  name="check[]"  value="1" id="activetableCheckk{{$i++}}">
                    @endif
                    <label class="form-check-label" for="activetableCheck01"></label><b>YES</b>




                </div>
            </th>
            @endif @php $i++; @endphp 
            @endif
            @endforeach
            @endif

          
        </tr>
    </thead>

    <tbody id ="all_permissions">
    @if(isset($permissions) && !empty($permissions))
    @php $i = 1; @endphp
       @foreach ($permissions as $permission)
       @if($permission->permission_name != 'Administrator')
        <tr>
		 <td>{{$permission->permission_name}}</td>
            <td scope="row">
                <div class="form-check">
                    <input type="text" name="permission_id[]" hidden value="{{$permission->permission_id}}" />
                    @if($permission->status == 0)
                    <input class="form-check-input check_class{{$permission->permission_id}}" type="checkbox" checked value="0" selected name="check[]" id="activetableCheck{{$i++}}" >
                    @else
                    <input class="form-check-input check_class{{$permission->permission_id}}" type="checkbox"  value="0" selected name="check[]" id="activetableCheck{{$i++}}" >
                    @endif
                    
                    <label class="form-check-label" for="activetableCheck01"></label><b>NO</b> &nbsp;&nbsp; 
                    @if($permission->status == 1)
                    <input class="form-check-input check_class{{$permission->permission_id}}"  type="checkbox" checked name="check[]"  value="1" id="activetableCheckk{{$i++}}">
                    @else
                    <input class="form-check-input check_class{{$permission->permission_id}}"  type="checkbox"  name="check[]"  value="1" id="activetableCheckk{{$i++}}">
                    @endif
                    <label class="form-check-label" for="activetableCheck01"></label><b>VIEW</b> &nbsp;&nbsp; 


                    @if($permission->status == 2)
                    <input class="form-check-input check_class{{$permission->permission_id}}"  type="checkbox" checked name="check[]"  value="2" id="activetableCheckk{{$i++}}">
                    @else
                    <input class="form-check-input check_class{{$permission->permission_id}}"  type="checkbox"  name="check[]"  value="2" id="activetableCheckk{{$i++}}">
                    @endif
                    <label class="form-check-label" for="activetableCheck01"></label><b>EDIT</b>


                </div>
            </td>
         
        </tr>
        
		@endif  
        @endforeach
     @endif
      
    </tbody>
</table>
            
                    </div>
                    <br>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                           
                            <button type="submit" class="btn btn-success" id="add-btn">Edit</button>
                          
                        </div>
                    </div>
                </form>

</div>
                                     
                                    </div>
                                   
                                </div>
                                </div><!--end card-->
                            </div><!--end col-->
							
                           
                        </div><!--end row-->

                        

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

	
	
	
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
                            <i class="bi bi-trash display-5"></i>
                        </div>
                        <div class="mt-4">
                            <h4 class="mb-2">Are you sure ?</h4>
                            <p class="text-muted mx-3 mb-0">Are you sure you want to remove this record ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                        <button type="button" class="btn w-sm btn-light btn-hover" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger btn-hover" id="delete-record">Yes, Delete It!</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /deleteRecordModal -->
    @include('layouts.master.footer')
    <script>
                $(document).ready(function () {
  $("#all_permissions").show();

$('input.admin_no').click(function () {
    $("#all_permissions").show();
});
$('input.admin_yes').click(function () {
    $("#all_permissions").hide();
});

for (let i = 0; i < 10; i++) {
$(".check_class"+i).on('click', function() {
var $box = $(this);
if ($box.is(":checked")) {
    var group = ".check_class"+i+"[name='" + $box.attr("name") + "']";
    $(group).prop("checked", false);
    $box.prop("checked", true);
} else {
    $box.prop("checked", false);
}
});
}    
                });

        </script>
@endsection
