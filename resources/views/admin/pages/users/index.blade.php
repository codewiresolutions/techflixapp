@extends('admin.layouts.master')

@push('title')
    Users
@endpush

@section('content')

    <main>
        <section class="manage_order_section">

            <div class=" container_wrapper">
                <h5 class="text-heading">Manage Users</h5>
                <div class="row">
                    <div class="w-100">
                        <div class="table_section smal_device_margin_padding">
                            <tr class="nav_table_row">
                                <div class="to_nav_table">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-link active" data-id="all_id" id="nav-all-tab" data-toggle="tab"
                                                href="#nav-all" role="tab" aria-controls="nav-all"
                                                aria-selected="false">All Users</a>

{{--                                            <a class="nav-link" data-id="complete_id" id="nav-complete-tab"--}}
{{--                                                data-toggle="tab" href="#nav-complete" role="tab"--}}
{{--                                                aria-controls="nav-complete" aria-selected="false">Completed</a>--}}
{{--                                            <a class="nav-link" data-id="pending_id" id="nav-pending-tab" data-toggle="tab"--}}
{{--                                                href="#nav-pending" role="tab" aria-controls="nav-pending"--}}
{{--                                                aria-selected="false">Pending</a>--}}
{{--                                            <a class="nav-link" data-id="canceld_id" id="nav-canceld-tab" data-toggle="tab"--}}
{{--                                                href="#nav-canceld" role="tab" aria-controls="nav-canceld"--}}
{{--                                                aria-selected="false">Cancelled</a>--}}

                                        </div>
                                    </nav>
                                </div>
                            </tr>
                            <div class="tab-content" id="nav-tabContent">

                                {{-- ALL ORDERS START FROM HERE --}}
                                <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                                    aria-labelledby="nav-all-tab">
                                    <div class="table_box">
                                        <div class="icon_img">
{{--                                            <img src="{{ asset('assets/images/user.svg') }}" alt="">--}}
                                        </div>
                                        <div class="text-center">
                                            <table class="table" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="main_heading_top text-left">User ID</th>
                                                        <th scope="col" class="main_heading_top">User</th>
                                                        <th scope="col" class="main_heading_top">Email</th>
                                                        <th scope="col" class="main_heading_top">Status</th>
                                                        <th scope="col" class="main_heading_top">Date Created</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (!empty($visitor_users) && count($visitor_users) > 0)
                                                        @foreach ($visitor_users as $key => $visitor_user)
                                                            <tr>
                                                                <td class="text-left">{{ $visitor_user->id }}</td>
                                                                <td>{{ $visitor_user->name }}</td>
                                                                <td>{{ $visitor_user->email }}</td>


                                                                <td>   @if ($visitor_user->status == 1)
                                                                        <button class="btn btn-success"
                                                                                >Active</button>
                                                                    @else
                                                                        <button class="btn btn-danger"
                                                                        >Inactive</button>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $visitor_user->created_at->format('Y F j') }}</td>
{{--                                                                <td>--}}
{{--                                                                    <div class="d_flexs_table">--}}
{{--                                                                        <form action="{{'admin/users'}}" method="POST">--}}
{{--                                                                            @csrf--}}
{{--                                                                            @method('delete')--}}
{{--                                                                            <button type="submit" class="btn btn-danger">--}}

{{--                                                                                <i class="fa-solid fa-trash"></i>--}}
{{--                                                                            </button>--}}
{{--                                                                        </form>--}}
{{--                                                                    </div>--}}
{{--                                                                </td>--}}

                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>

                                {{-- ALL ORDERS START FROM HERE --}}
                                <div class="tab-pane fade show" id="nav-active" role="tabpanel"
                                    aria-labelledby="nav-active-tab">
                                    <div class="table_box">
                                        <div class="icon_img">
                                            <img src="{{ asset('assets/images/order.svg') }}" alt="">
                                        </div>
                                        <div class="text-center">
                                            <table class="table" id="table2">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="main_heading_top">Order ID</th>
                                                        <th scope="col" class="main_heading_top">User</th>
                                                        <th scope="col" class="main_heading_top">Order Amount</th>
                                                        <th scope="col" class="main_heading_top">Product</th>
                                                        <th scope="col" class="main_heading_top">Status</th>
                                                        <th scope="col" class="main_heading_top">Date Created</th>
                                                        <th scope="col" class="main_heading_top">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (!empty($active_orders) && count($active_orders) > 0)
                                                        @foreach ($active_orders as $key => $order)
                                                            <tr>
                                                                <td>{{ $order->id }}</td>
                                                                <td>{{ $order->user_id }}</td>
                                                                <td>{{ $order->price }}</td>
                                                                <td>{{ $order->name }}</td>
                                                                <th>
                                                                    @if ($order->status == 'Active')
                                                                        <button class="btn btn_table"
                                                                            style="background-color: #	#0000FF">Active</button>
                                                                    @endif
                                                                </th>
                                                                <td>{{ $order->created_at->format('Y F j') }}</td>

                                                                <td>
                                                                    <div class="d_flexs_table">
                                                                        <a class="btn btn_secondary" href="">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>
                                                                        <a class="btn btn_warning" href="">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </a>
                                                                        <form action="" method="POST">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit" class="btn btn-danger">

                                                                                <i class="fa-solid fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                                {{-- ALL ORDERS START FROM HERE --}}
                                <div class="tab-pane fade show" id="nav-complete" role="tabpanel"
                                    aria-labelledby="nav-complete-tab">
                                    <div class="table_box">
                                        <div class="icon_img">
                                            <img src="{{ asset('assets/images/order.svg') }}" alt="">
                                        </div>
                                        <div class="text-center">
                                            <table class="table" id="table3">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="main_heading_top">Order ID</th>
                                                        <th scope="col" class="main_heading_top">User</th>
                                                        <th scope="col" class="main_heading_top">Order Amount</th>
                                                        <th scope="col" class="main_heading_top">Product</th>
                                                        <th scope="col" class="main_heading_top">Status</th>
                                                        <th scope="col" class="main_heading_top">Date Created</th>
                                                        <th scope="col" class="main_heading_top">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (!empty($complete_orders) && count($complete_orders) > 0)
                                                        @foreach ($complete_orders as $key => $order)
                                                            <tr>
                                                                <td>{{ $order->id }}</td>
                                                                <td>{{ $order->user_id }}</td>
                                                                <td>{{ $order->price }}</td>
                                                                <td>{{ $order->name }}</td>
                                                                <th>
                                                                    @if ($order->status == 'Completed')
                                                                        <button class="btn btn_table"
                                                                            style="background-color: #138941">Completed</button>
                                                                    @endif
                                                                </th>
                                                                <td>{{ $order->created_at->format('Y F j') }}</td>

                                                                <td>
                                                                    <div class="d_flexs_table">
                                                                        <a class="btn btn_secondary" href="">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>
                                                                        <a class="btn btn_warning" href="">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </a>
                                                                        <form action="" method="POST">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit" class="btn btn-danger">

                                                                                <i class="fa-solid fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>



                                {{-- ALL ORDERS START FROM HERE --}}
                                <div class="tab-pane fade show" id="nav-pending" role="tabpanel"
                                    aria-labelledby="nav-pending-tab">
                                    <div class="table_box">
                                        <div class="icon_img">
                                            <img src="{{ asset('assets/images/order.svg') }}" alt="">
                                        </div>
                                        <div class="text-center">
                                            <table class="table" id="table4">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="main_heading_top">Order ID</th>
                                                        <th scope="col" class="main_heading_top">User</th>
                                                        <th scope="col" class="main_heading_top">Order Amount</th>
                                                        <th scope="col" class="main_heading_top">Product</th>
                                                        <th scope="col" class="main_heading_top">Status</th>
                                                        <th scope="col" class="main_heading_top">Date Created</th>
                                                        <th scope="col" class="main_heading_top">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (!empty($pending_orders) && count($pending_orders) > 0)
                                                        @foreach ($pending_orders as $key => $order)
                                                            <tr>
                                                                <td>{{ $order->id }}</td>
                                                                <td>{{ $order->user_id }}</td>
                                                                <td>{{ $order->price }}</td>
                                                                <td>{{ $order->name }}</td>
                                                                <th>
                                                                    @if ($order->status == 'Pending')
                                                                        <button class="btn btn_table"
                                                                            style="background-color: #ffc876">Pending</button>
                                                                    @endif
                                                                </th>
                                                                <td>{{ $order->created_at->format('Y F j') }}</td>

                                                                <td>
                                                                    <div class="d_flexs_table">
                                                                        <a class="btn btn_secondary" href="">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>
                                                                        <a class="btn btn_warning" href="">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </a>
                                                                        <form action="" method="POST">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit" class="btn btn-danger">

                                                                                <i class="fa-solid fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                {{-- ALL ORDERS START FROM HERE --}}
                                <div class="tab-pane fade show" id="nav-canceld" role="tabpanel"
                                    aria-labelledby="nav-canceld-tab">
                                    <div class="table_box">
                                        <div class="icon_img">
                                            <img src="{{ asset('assets/images/order.svg') }}" alt="">
                                        </div>
                                        <div class="text-center">
                                            <table class="table" id="table5">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="main_heading_top">Order ID</th>
                                                        <th scope="col" class="main_heading_top">User</th>
                                                        <th scope="col" class="main_heading_top">Order Amount</th>
                                                        <th scope="col" class="main_heading_top">Product</th>
                                                        <th scope="col" class="main_heading_top">Status</th>
                                                        <th scope="col" class="main_heading_top">Date Created</th>
                                                        <th scope="col" class="main_heading_top">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (!empty($canceled_orders) && count($canceled_orders) > 0)
                                                        @foreach ($canceled_orders as $key => $order)
                                                            <tr>
                                                                <td>{{ $order->id }}</td>
                                                                <td>{{ $order->user_id }}</td>
                                                                <td>{{ $order->price }}</td>
                                                                <td>{{ $order->name }}</td>
                                                                <th>
                                                                    @if ($order->status == 'Canceled')
                                                                        <button class="btn btn_table"
                                                                            style="background-color: #e51918">Canceled</button>
                                                                    @endif
                                                                </th>
                                                                <td>{{ $order->created_at->format('Y F j') }}</td>

                                                                <td>
                                                                    <div class="d_flexs_table">
                                                                        <a class="btn btn_secondary" href="">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>
                                                                        <a class="btn btn_warning" href="">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </a>
                                                                        <form action="" method="POST">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit" class="btn btn-danger">

                                                                                <i class="fa-solid fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection

@push('js')
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables plugin -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <script type="text/javascript">
        $(document).ready(function() {
            console.log(jQuery);
            $('#table1').DataTable();
            $('#table2').DataTable();
            $('#table3').DataTable();
            $('#table4').DataTable();
            $('#table5').DataTable();

        })


           // Use event delegation to handle click events on dynamically generated elements
           $('#table1').on('change', '.toggle-status-link', function(e) {
                e.preventDefault(); // Prevent the default link behavior (page refresh)

                // Retrieve order ID and new status from data attributes
                var orderId = $(this).find(':selected').data('orderid');
                var newStatus = $(this).find(':selected').attr('data-orderstatus');

                console.log(orderId, newStatus);

                // Send AJAX request to update order status
                $.ajax({
                    url: '{{ route('admin.update-order-status') }}',
                    method: 'POST',
                    data: {
                        order_id: orderId,
                        new_status: newStatus
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log('Order status updated successfully.');
                        // Show a success alert
                        alert('Order status updated successfully.');
                    },
                    error: function(xhr, status, error) {
                        // Handle error response, if needed
                        console.error('Error updating order status:', error);
                    }
                });
            });



    </script>
@endpush
