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
                    <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
                </div>

                <!-- Row -->
                <div class="row">
                    <!-- Datatables -->
                    <div class="col-lg-7">
                        <div class="card mb-4">
                            <div class="table-responsive p-3">
                                <table class="table table-striped align-items-center table-flush" id="dataTable">

                                    <tr>
                                        <th>Order ID</th>
                                        <td>{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <td>${{ $order->subtotal }}.00</td>
                                    </tr>
                                    <tr>
                                        <th>Total Items</th>
                                        <td>{{ $order->total_items }}</td>
                                    </tr>
                                    <tr>
                                        <th>Items</th>
                                        @php
                                            $items = json_decode($order->items);
                                            $itemDeatil = '';
                                            foreach($items as $item) {
                                                $totalPrice = $item->item_qty * $item->item_price;
                                                $itemDeatil .= $item->item_qty . ' x ' . $item->item_name . ' = ' . ' $' . $totalPrice . '.00 <br>';
                                            }
                                        @endphp
                                        <td>{!! nl2br( $itemDeatil ) !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Status</th>
                                        <td>{{ $order->order_status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Order By</th>
                                        <td>{{ $order->firstName . ' ' . $order->lastName }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Card holder name</th>
                                        <td>{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Card Number</th>
                                        <td>{{ substr($order->number, 0, 2) . '** **** **** ' . substr($order->number, -4) }}</td>
                                    </tr>
                                </table>
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
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@include('admin.footer')