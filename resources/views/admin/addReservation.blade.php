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
            <div class="container-fluid" id="container-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Form Basic -->
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Add Reservation</h6>

                            </div>
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif


                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @if($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                                <form method="post" action="{{ url('/') }}/admin/saveReservation">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                               placeholder="Enter Your Name" name="name" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone #</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                               placeholder="Enter Your Phone" name="phoneNumber" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No. of Seats</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                               placeholder="Enter the seats" name="size" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Expected Time</label>
                                        <input type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                               placeholder="Enter The Expected Time" name="expectedTime" value="">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <!--Row-->


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

@include('admin.footer')