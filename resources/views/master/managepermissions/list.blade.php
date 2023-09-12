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
                                    <h4 class="mb-sm-0">Roles and Permissions Management</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">

                        <div class="col">
                        <a href="{{route('master.roles')}}">
                            <div class="card border-bottom border-3 card-animate  border-secondary" >
                                <div class="card-body">
                                   
                                    <h4 class="mb-4 text-reset"><span class="counter-value" data-target="5963">0</span></h4>
                    
                                    <p class="text-muted fw-medium text-uppercase mb-0">Roles </p>
                                </div>
                            </div>
                        </a>
                        </div><!--end col-->

                        <div class="col">
                        <a href="{{route('master.permissions')}}">
                            <div class="card border-bottom border-3 card-animate border-success" >
                                <div class="card-body">
                                    <h4 class="mb-4 text-reset" ><span  class="counter-value" data-target="8541">0</span></h4>
                    
                                    <p class="text-muted fw-medium text-uppercase mb-0">Permissions</p>
                                </div>
                            </div>
                        </a>
                        </div><!--end col-->
                        <div class="col">
                        <a href="{{route('master.rolesandpermissions')}}">
                            <div class="card border-bottom border-3 card-animate border-danger" style="background-color: #2b3030;">
                                <div class="card-body">
                                    <h4 class="mb-4"><span style="color:white" class="counter-value" data-target="2314">0</span></h4>
                    
                                    <p class="text-muted fw-medium text-uppercase mb-0">Manage Role & Permissions</p>
                                </div>
                            </div>
                        </a>
                        </div><!--end col-->
                    </div><!---end row-->



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" id="coursesList">
                                    <div class="card-body">
                                        <div class="row align-items-center g-2">
                                            <div class="col-lg-3 me-auto">
                                                <h6 class="card-title mb-0">Permissions List <span class="badge bg-primary ms-1 align-baseline">1452</span></h6>
                                            </div><!--end col-->
                                            <div class="col-lg-2">
                                                <div class="search-box">
                                                    <input type="text" class="form-control search" placeholder="Search for Permissions...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-lg-auto">
                                                <div class="hstack flex-wrap gap-2">
                                                    <button class="btn btn-subtle-danger d-none" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                                    <a href="#addCourse" data-bs-toggle="modal" class="btn btn-secondary"><i class="bi bi-plus-circle align-baseline me-1"></i> Add Role & Permission</a>
                                                    <!-- <div>
                                                        <button type="button" class="btn btn-info" data-bs-toggle="offcanvas" data-bs-target="#courseFilters" aria-controls="courseFilters"><i class="bi bi-funnel align-baseline me-1"></i> Filter</button>
                                                        <a href="apps-learning-grid.html" class="btn btn-subtle-primary btn-icon"><i class="bi bi-grid"></i></a>
                                                        <a href="apps-learning-list.html" class="btn btn-subtle-primary active btn-icon"><i class="bi bi-list-task"></i></a>
                                                    </div> -->
                                                </div>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table class="table table-centered align-middle table-custom-effect table-nowrap mb-0">
                                                <thead class="text-muted">
                                                    <tr>
                                                        <!-- <th>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="option" id="checkAll">
                                                                <label class="form-check-label" for="checkAll"></label>
                                                            </div>
                                                        </th> -->
                                                        <th scope="col" class="sort cursor-pointer" data-sort="sno">S.No</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="id">Roles & Permission ID</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="role_name">Role Name</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="permission_name">Permission Name</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="description">Description</th>
                                                        <th scope="col" class="sort cursor-pointer" data-sort="status">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    <tr>
                                                        <!-- <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="chk_child">
                                                                <label class="form-check-label"></label>
                                                            </div>
                                                        </td> -->
                                                        <td class="sno">1</td>
                                                        <td class="id fw-medium link-primary">#TBS001</td>
                                                        <td class="role_name">React Development</td>
                                                        <td class="permission_name">React Development</td>
                                                        <td class="description">Themesbrand</td>
                                                        <td class="status"><span class="badge bg-info-subtle text-info">Open</span></td>
                                                        <td>
                                                            <ul class="d-flex gap-2 list-unstyled mb-0">
                                                                <li>
                                                                    <a href="apps-learning-overview.html" class="btn btn-subtle-primary btn-icon btn-sm "><i class="ph-eye"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#addCourse" data-bs-toggle="modal" class="btn btn-subtle-secondary btn-icon btn-sm edit-item-btn"><i class="ph-pencil"></i></a>

                                                                </li>
                                                                <li>
                                                                    <a href="#deleteRecordModal" data-bs-toggle="modal" class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn"><i class="ph-trash"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody><!-- end tbody -->
                                            </table><!-- end table -->
                                            <div class="noresult" style="display: none">
                                                <div class="text-center py-4">
                                                    <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    <p class="text-muted mb-0">We've searched more than 150+ Courses We did not find any Courses for you search.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mt-4 pt-2" id="pagination-element">
                                            <div class="col-sm">
                                                <div class="text-muted text-center text-sm-start">
                                                    Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">15</span> Results
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-sm-auto mt-3 mt-sm-0">
                                                <div class="pagination-wrap hstack gap-2 justify-content-center">
                                                    <a class="page-item pagination-prev disabled" href="javascript:void(0)">
                                                        Previous
                                                    </a>
                                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                                    <a class="page-item pagination-next" href="javascript:void(0)">
                                                        Next
                                                    </a>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Steex.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
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
        <div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border-0">
                    <div class="modal-header bg-danger p-3">
                        <h5 class="modal-title text-white" id="addCourseModalLabel">Add Permission</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="close-addCourseModal"></button>
                    </div>
        
                    <form class="tablelist-form" novalidate autocomplete="off">
                        <div class="modal-body">
                            <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                            <input type="hidden" id="id-field">
        
                            <input type="hidden" id="rating-field">
                            <div class="mb-3">
                            
                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    <li class="mt-2" id="dropzone-preview-list">
                                        <!-- This is used as the file preview template -->
                                        <div class="border rounded">
                                            <div class="d-flex flex-wrap gap-2 p-2">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm bg-light rounded p-2">
                                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="assets/images/new-document.png" alt="Dropzone-Image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                        <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- end dropzon-preview -->
                            </div>
        
                            <div class="mb-3">
                                <label for="course-title-input" class="form-label">Permission Name<span class="text-danger">*</span></label>
                                <input type="text" id="course-title-input" class="form-control" placeholder="Enter Permission Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="course-title-input" class="form-label">Description<span class="text-danger">*</span></label>
                                <input type="text" id="course-title-input" class="form-control" placeholder="Enter kShort Description" required>
                            </div>
        
        
                            <div class="mb-3" hidden>
                                <label for="course-category-input" class="form-label">Course Category<span class="text-danger">*</span></label>
        
                                <select class="form-select" id="course-category-input">
                                    <option value="">Select Course Category</option>
                                    <option value="Marketing & Management">Marketing & Management</option>
                                    <option value="React Development">React Development</option>
                                    <option value="Shopify Development">Shopify Development</option>
                                    <option value="Graphic Design">Graphic Design</option>
                                    <option value="Laravel Development">Laravel Development</option>
                                    <option value="Flask Development">Flask Development</option>
                                    <option value="Web Design">Web Design</option>
                                    <option value="Asp.Net Development">Asp.Net Development</option>
                                    <option value="PHP Development">PHP Development</option>
                                    <option value="Graphic Design">Graphic Design</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Data Science">Data Science</option>
                                </select>
                            </div>
        
                            
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i class="bi bi-x-lg align-baseline me-1"></i> Close</button>
                                <button type="submit" class="btn btn-primary" id="add-btn">Add Permission</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- modal-content -->
            </div>
        </div><!--end add Property modal-->
        
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
@endsection
