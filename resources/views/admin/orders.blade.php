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
                    <h1 class="h3 mb-0 text-gray-800">Orders</h1>
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
                                        <th>Order ID</th>
                                        <th>Total Items</th>
                                        <th>Total Amount</th>
                                        <th>status</th>
                                        <th>User</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($ordersHistory))
                                        @foreach($ordersHistory as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->total_items }}</td>
                                                <td>${{ $order->subtotal }}.00</td>
                                                <td>{{ $order->order_status }}</td>
                                                <td>{{ $order->firstName . ' ' . $order->lastName }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    <a href="/admin/order-detail/{{$order->id}}">Detail</a>
                                                    &nbsp; | &nbsp;
                                                    <a href="/admin/order/delivered/{{$order->id}}">Delivered</a>
                                                    &nbsp; | &nbsp;
                                                    <a href="/admin/order/completed/{{$order->id}}">Completed</a>
                                                </td>
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

@include('admin.footer')