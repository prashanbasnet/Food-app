@include('admin.header')
<div id="wrapper">
    <!-- Sidebar -->
@include('admin.sidebar')
<!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
        @include('admin.topbar')
        <!-- Topbar -->

            <!-- Container Fluid-->
            <!-- Container Fluid-->
            <div class="container-fluid" id="container-wrapper">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Category</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}/admin/addCategory">Add Category</a></li>
                    </ol>
                </div>

                <!-- Row -->
                <div class="row">
                    <!-- Datatables -->
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush" id="dataTable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>category ID</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($CategoryList) > 0)
                                    @foreach($CategoryList as $MainList)
                                    <tr>
                                        <td>{{$MainList->categoryID}}</td>
                                        <td>{{$MainList->categoryName}}</td>
                                        <td><a href="{{url('/').'/admin/'.$MainList->categoryID.'/viewItems'}}"> Food Items&nbsp;</a>|&nbsp;
                                            <a href="{{url('/').'/admin/'.$MainList->categoryID.'/editCategory'}}">Edit&nbsp;</a>|&nbsp;
                                            <a href="javascript:void(0)" onclick="deleteCategory({{$MainList->categoryID}})">Delete</a></td>
                                    </tr>
                                        @endforeach
                                      @else
                                        <tr><td colspan="3">No record found...</td></tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Row-->

                <!-- Documentation Link -->

                <!-- Modal Logout -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to logout?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                <a href="login.html" class="btn btn-primary">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!---Container Fluid-->
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by Online Restaurant
            </span>
                </div>
            </div>
        </footer>
        <!-- Footer -->
    </div>
</div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
   function deleteCategory(id) {
       var x = confirm('Are you sure to remove?');
       if(x){
           baseurl='{{url('/')}}';
           var ajax_url = baseurl + '/admin/deleteCategory';
           $.ajax({
               url: ajax_url,
               type: 'GET',
               data: "categoryID=" + id ,
               success: function (response) {
                   console.log(response.status);
                   if (response.status == 'success') {
                      alert(response.message)
                       window.location.href = baseurl + '/admin/category';
                   } else {
                       //toastr.error(response.message, "Error", toastr_opts);
                   }
               }, error: function (ErrorResponse) {
                   console.log(response.status);
                   toastr.error(ErrorResponse.message, "Error", toastr_opts);
                   return false;
               }
           });
       }
   }
</script>
@include('admin.footer')