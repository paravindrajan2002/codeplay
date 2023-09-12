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
                                    <h4 class="mb-sm-0">Roles List</h4>

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

                     <div class="text-end mb-3">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#showModal"><button type="submit" class="btn btn-success" id="add-btn"><i class="bi bi-plus-circle align-baseline me-1"></i> Add New Role</button></a>
                        </div>
                        <div class="row align-items-center">
                            @if(isset($roles) && !empty($roles))
                            @foreach($roles as $role)
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

                                        <ul class="" style="min-height:100px">
                                                @if(isset($datas) && !empty($datas))
                                                    @php $i = 1; @endphp
                                                    @foreach($datas as $data)
                                                    @if($data->role_id  == $role->roles_id &&  $data->status  == 1  && $i++ <= 5)
													<li>{{$data->permission_name}}</li>
                                                    @endif

                                                    @endforeach
                                                 
                                                    @if(count($datas) > 4)
                                                    <!-- <li>and 3 more...</li> -->
                                                    @endif

                                                @endif
												</ul>
												<hr/>
												<div class="d-flex flex-wrap mt-n1 justify-content-between">
                                                        <div>
                                                            <a style="cursor:pointer"  class="view-role text-body p-1 px-2" data-id="{{Crypt::encrypt($role->roles_id)}}" ><i class="ri-eye-fill text-muted align-bottom me-1"></i> View Role</a>
                                                        </div>
                                                        <div>
                                                            <a style="cursor:pointer" class="edit-role text-body p-1 px-2" data-id="{{Crypt::encrypt($role->roles_id)}}" ><i class="ri-pencil-fill text-muted align-bottom me-1"></i> Edit Role</a>
                                                        </div>
														
                                                    </div>
                                    </div>
                                </div><!--end card-->


                            </div><!--end col-->


@endforeach
@endif


							
							<div class="col-lg-4">
							<a href="#" data-bs-toggle="modal" data-bs-target="#showModal">
							<div class="text-center justify-content-end">
							<img src="{{asset('master-assets/images/role.png')}}" alt="" class="img-fluid">
							<h5>Add New Role</h5>
							</div>
							</a>
							</div>
                           
                        </div><!--end row-->

                        

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

			
		<!-- showModal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-ordermodal"></button>
                </div>
                <form action="{{route('master.rolesStore')}}" method="post" class="tablelist-form"  autocomplete="off">
                @csrf
                    <div class="modal-body">
                        <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                        <input type="hidden" id="id-field" >
                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Role Name<span class="text-danger">*</span></label>
                            <input type="text" value="add" name="mode" hidden />
                            <input type="text" id="customername-field" name="role_name" class="form-control required" placeholder="Enter name" required  >
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
             <th scope="col" rowspan="3">
                <div class="form-check">
                    <input type="text" name="permission_id[]" hidden value="{{$permission->permission_id}}" />
                    <input class="form-check-input admin_no check_class{{$permission->permission_id}}" type="checkbox" checked value="0" selected name="check[]" id="activetableCheck{{$i++}}" >
                    
                    <label class="form-check-label check_class{{$permission->permission_id}}" for="activetableCheck01"></label><b>NO</b> &nbsp;&nbsp; 
                    
                    <input class="form-check-input admin_yes check_class{{$permission->permission_id}}"  type="checkbox" name="check[]"  value="1" id="activetableCheckk{{$i++}}">
                    <label class="form-check-label" for="activetableCheck01"></label><b>YES</b> &nbsp;&nbsp;
                </div>
            </th>
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
                    <input class="form-check-input check_class{{$permission->permission_id}}" type="checkbox" checked value="0" selected name="check[]" id="activetableCheck{{$i++}}" >
                    
                    <label class="form-check-label check_class{{$permission->permission_id}}" for="activetableCheck01"></label><b>NO</b> &nbsp;&nbsp; 
                    
                    <input class="form-check-input check_class{{$permission->permission_id}}"  type="checkbox" name="check[]"  value="1" id="activetableCheckk{{$i++}}">
                    <label class="form-check-label" for="activetableCheck01"></label><b>VIEW</b> &nbsp;&nbsp;

                    <input class="form-check-input check_class{{$permission->permission_id}}"  type="checkbox" name="check[]"  value="2" id="activetableCheckk{{$i++}}">
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
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Submit</button>
                          
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div  >
    <form id="role-edit" action="{{route('master.roles.edit')}}" method="post" class="tablelist-form" novalidate autocomplete="off">
                @csrf
                <div id="divroleedit">
                
                </div>
    </form>

    <form id="role-view" action="{{route('master.roles.view')}}" method="post" class="tablelist-form" novalidate autocomplete="off">
                @csrf
                <div id="divroleview">
                
                </div>
    </form>

    </div>

    <!-- end showModal -->
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
       


            $('a.edit-role').click(function () {
                // alert($(this).attr("data-id"));

                $('div#divroleedit').empty();

                var input = '<input type="text" value="'+$(this).attr("data-id")+'" name="id" />'

                $('div#divroleedit').append(input);

                $('form#role-edit').submit();

            });

            $('a.view-role').click(function () {
                // alert($(this).attr("data-id"));

                $('div#divroleview').empty();

                var input = '<input type="text" value="'+$(this).attr("data-id")+'" name="id" />'

                $('div#divroleview').append(input);

                $('form#role-view').submit();

            });
        });
    </script>
@endsection

