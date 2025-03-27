@extends('admin.layouts.master')

@push('title')
    OrderS
@endpush

@section('content')

    <main>
        <section class="manage_order_section">

            <div class=" container_wrapper">
                <h5 class="text-heading">Manage Orders</h5>
                <div class="row">
                    <div class="w-100">
                        <div class="table_section smal_device_margin_padding">
                            <tr class="nav_table_row">
                                <div class="to_nav_table">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-link active" data-id="all_id" id="nav-all-tab" data-toggle="tab"
                                                href="#nav-all" role="tab" aria-controls="nav-all"
                                                aria-selected="false">All Orders</a>

                                            @if (Auth::check() && Auth::user()->user_type == 'superadmin')
                                            <a class="nav-link" data-id="active_id" id="nav-active-tab" data-toggle="tab"
                                                href="#nav-active" role="tab" aria-controls="nav-active"
                                                aria-selected="true">Active</a>
                                            <a class="nav-link" data-id="complete_id" id="nav-complete-tab"
                                                data-toggle="tab" href="#nav-complete" role="tab"
                                                aria-controls="nav-complete" aria-selected="false">Completed</a>
                                            <a class="nav-link" data-id="pending_id" id="nav-pending-tab" data-toggle="tab"
                                                href="#nav-pending" role="tab" aria-controls="nav-pending"
                                                aria-selected="false">Pending</a>
                                            <a class="nav-link" data-id="canceld_id" id="nav-canceld-tab" data-toggle="tab"
                                                href="#nav-canceld" role="tab" aria-controls="nav-canceld"
                                                aria-selected="false">Cancelled</a>
                                            @endif

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
                                            <img src="{{ asset('assets/images/order.svg') }}" alt="">
                                        </div>
                                        <div class="text-center">
                                            <table class="table" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-left">Order ID</th>
                                                        <th scope="col" class="main_heading_top">User</th>
                                                        <th scope="col" class="main_heading_top">Order Amount</th>
                                                        <th scope="col" class="main_heading_top">Product</th>
                                                        <th scope="col" class="main_heading_top">Status</th>
                                                        <th scope="col" class="main_heading_top">Date Created</th>
                                                        <th scope="col" class="main_heading_top">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (!empty($all_orders) && count($all_orders) > 0)
                                                        @foreach ($all_orders as $key => $order)
                                                            <tr>
                                                                <td class="text-left">{{ $order->id }}</td>
                                                                <td>{{ $order->user->name }}</td>
                                                                <td>{{ $order->price }}</td>
                                                                <td>{{ $order->name }}</td>
                                                                <td>
                                                                    @if (Auth::check() && Auth::user()->user_type == 'superadmin')
                                                                        <select
                                                                            class="form-select form-control toggle-status-link"
                                                                            aria-label="Default select example"
                                                                            id="status" style="width: 130px;">
                                                                            <option value="Completed"
                                                                                data-orderid="{{ $order->id }}"
                                                                                data-orderstatus="Completed"
                                                                                {{ $order->status == 'Completed' ? 'selected' : '' }}>
                                                                                Completed
                                                                            </option>
                                                                            <option value="Canceled"
                                                                                data-orderid="{{ $order->id }}"
                                                                                data-orderstatus="Canceled"
                                                                                {{ $order->status == 'Canceled' ? 'selected' : '' }}>
                                                                                Canceled
                                                                            </option>
                                                                            <option value="Active"
                                                                                data-orderid="{{ $order->id }}"
                                                                                data-orderstatus="Active"
                                                                                {{ $order->status == 'Active' ? 'selected' : '' }}>
                                                                                Active
                                                                            </option>
                                                                            <option value="Pending"
                                                                                data-orderid="{{ $order->id }}"
                                                                                data-orderstatus="Pending"
                                                                                {{ $order->status == 'Pending' ? 'selected' : '' }}>
                                                                                Pending
                                                                            </option>
                                                                        </select>
                                                                    @else
                                                                        @if ($order->status == 'Completed')
                                                                            <button
                                                                                class="btn btn-success">Completed</button>
                                                                        @elseif ($order->status == 'Canceled')
                                                                            <button class="btn btn-danger">Canceled</button>
                                                                        @elseif ($order->status == 'Active')
                                                                            <button class="btn btn-primary">Active</button>
                                                                        @else
                                                                            <button class="btn btn-warning">Pending</button>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td>{{ $order->created_at->format('Y F j') }}</td>
                                                                <td>
                                                                    <div class="d_flexs_table">
{{--                                                                        <a class="btn btn_secondary" href="">--}}
{{--                                                                            <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                                                        </a>--}}
                                                                        <a class=" w-100 btn btn-main"
                                                                           href="{{ route('dashboard.show', encryptstring($order->id)) }}">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </a>
{{--                                                                        <form action="" method="POST">--}}
{{--                                                                            @csrf--}}
{{--                                                                            @method('delete')--}}
{{--                                                                            <button type="submit" class="btn btn-danger">--}}

{{--                                                                                <i class="fa-solid fa-trash"></i>--}}
{{--                                                                            </button>--}}
{{--                                                                        </form>--}}
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
                                                        <th scope="col" class="text-left">Order ID</th>
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
                                                                <td class="text-left">{{ $order->id }}</td>
                                                                <td>{{ $order->user->name }}</td>
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
{{--                                                                        <a class="btn btn_secondary" href="">--}}
{{--                                                                            <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                                                        </a>--}}
                                                                        <a class=" w-100 btn btn-main"
                                                                           href="{{ route('dashboard.show', encryptstring($order->id)) }}">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </a>
{{--                                                                        <form action="" method="POST">--}}
{{--                                                                            @csrf--}}
{{--                                                                            @method('delete')--}}
{{--                                                                            <button type="submit" class="btn btn-danger">--}}

{{--                                                                                <i class="fa-solid fa-trash"></i>--}}
{{--                                                                            </button>--}}
{{--                                                                        </form>--}}
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
                                                        <th scope="col" class="text-left">Order ID</th>
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
                                                                <td class="text-left">{{ $order->id }}</td>
                                                                <td>{{ $order->user->name }}</td>
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
{{--                                                                        <a class="btn btn_secondary" href="">--}}
{{--                                                                            <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                                                        </a>--}}
                                                                        <a class=" w-100 btn btn-main"
                                                                           href="{{ route('dashboard.show', encryptstring($order->id)) }}">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </a>
{{--                                                                        <form action="" method="POST">--}}
{{--                                                                            @csrf--}}
{{--                                                                            @method('delete')--}}
{{--                                                                            <button type="submit" class="btn btn-danger">--}}

{{--                                                                                <i class="fa-solid fa-trash"></i>--}}
{{--                                                                            </button>--}}
{{--                                                                        </form>--}}
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
                                                        <th scope="col" class="text-left">Order ID</th>
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
                                                                <td class="text-left">{{ $order->id }}</td>
                                                                <td>{{ $order->user->name }}</td>
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
{{--                                                                    <div class="d_flexs_table">--}}
{{--                                                                        <a class="btn btn_secondary" href="">--}}
{{--                                                                            <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                                                        </a>--}}
                                                                    <a class=" w-100 btn btn-main"
                                                                       href="{{ route('dashboard.show', encryptstring($order->id)) }}">
                                                                        <i class="fa-solid fa-eye"></i>
                                                                    </a>
{{--                                                                        <form action="" method="POST">--}}
{{--                                                                            @csrf--}}
{{--                                                                            @method('delete')--}}
{{--                                                                            <button type="submit" class="btn btn-danger">--}}

{{--                                                                                <i class="fa-solid fa-trash"></i>--}}
{{--                                                                            </button>--}}
{{--                                                                        </form>--}}
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
                                                        <th scope="col" class="text-left">Order ID</th>
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
                                                                <td class="text-left">{{ $order->id }}</td>
                                                                <td>{{ $order->user->name }}</td>
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
{{--                                                                        <a class="btn btn_secondary" href="">--}}
{{--                                                                            <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                                                        </a>--}}
                                                                        <a class=" w-100 btn btn-main"
                                                                           href="{{ route('dashboard.show', encryptstring($order->id)) }}">
                                                                            <i class="fa-solid fa-eye"></i>
                                                                        </a>
{{--                                                                        <form action="" method="POST">--}}
{{--                                                                            @csrf--}}
{{--                                                                            @method('delete')--}}
{{--                                                                            <button type="submit" class="btn btn-danger">--}}

{{--                                                                                <i class="fa-solid fa-trash"></i>--}}
{{--                                                                            </button>--}}
{{--                                                                        </form>--}}
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
            $('#table1').DataTable({
                "order": [[ 0, "desc" ]] // Sort the first column (index 0) in descending order
            });
            $('#table2').DataTable({
                "order": [[ 0, "desc" ]] // Sort the first column (index 0) in descending order
            });
            $('#table3').DataTable({
                "order": [[ 0, "desc" ]] // Sort the first column (index 0) in descending order
            });
            $('#table4').DataTable({
                "order": [[ 0, "desc" ]] // Sort the first column (index 0) in descending order
            });
            $('#table5').DataTable({
                "order": [[ 0, "desc" ]] // Sort the first column (index 0) in descending order
            });

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
