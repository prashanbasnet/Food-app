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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h4>Total Categories</h4>
                                <h1 class="text-center mb0">{{ $categoryCount > 9 ? $categoryCount : '0'. $categoryCount }}</h1>
                            </div>
                            <div class="card-footer">
                                <a href="/admin/category">View Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h4>Total Reservations</h4>
                                <h1 class="text-center mb0">{{ $reservationCount > 9 ? $reservationCount : '0'. $reservationCount }}</h1>
                            </div>
                            <div class="card-footer">
                                <a href="/admin/reservation">View Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h4>Total Orders</h4>
                                <h1 class="text-center mb0">{{ $orderCount > 9 ? $orderCount : '0'. $orderCount }}</h1>
                            </div>
                            <div class="card-footer">
                                <a href="/admin/orders">View Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Row-->


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

@include('admin.footer')