@extends('admin.layouts.master')

@push('title')
    Payments
@endpush

@section('content')
    <main>
        <section class="manage_order_section">

            <div class=" container_wrapper">
                <h5 class="text-heading">Manage Payments</h5>
                <div class="row">
                    <div class="w-100">
                        <div class="table_section smal_device_margin_padding">
                            <tr class="nav_table_row">
                                <div class="to_nav_table">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-link active" data-id="all_id" id="nav-all-tab" data-toggle="tab"
                                               href="#nav-all" role="tab" aria-controls="nav-all"
                                               aria-selected="false">All Payments</a>
{{--                                            <a class="nav-link" data-id="active_id" id="nav-active-tab" data-toggle="tab"--}}
{{--                                               href="#nav-active" role="tab" aria-controls="nav-active"--}}
{{--                                               aria-selected="true">Active</a>--}}
{{--                                            <a class="nav-link" data-id="complete_id" id="nav-complete-tab"--}}
{{--                                               data-toggle="tab" href="#nav-complete" role="tab"--}}
{{--                                               aria-controls="nav-complete" aria-selected="false">Completed</a>--}}
{{--                                            <a class="nav-link" data-id="pending_id" id="nav-pending-tab" data-toggle="tab"--}}
{{--                                               href="#nav-pending" role="tab" aria-controls="nav-pending"--}}
{{--                                               aria-selected="false">Pending</a>--}}
{{--                                            <a class="nav-link" data-id="canceld_id" id="nav-canceld-tab" data-toggle="tab"--}}
{{--                                               href="#nav-canceld" role="tab" aria-controls="nav-canceld"--}}
{{--                                               aria-selected="false">Cancelled</a>--}}

                                        </div>
                                    </nav>
                                </div>
                            </tr>
                            <div class="tab-content" id="nav-tabContent">

                                {{-- ALL ORDERS START FROM HERE --}}
                                <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                                     aria-labelledby="nav-all-tab">
                                    <div class="table_box">
{{--                                        <div class="icon_img">--}}
{{--                                            <img src="{{ asset('assets/images/order.svg') }}" alt="">--}}
{{--                                        </div>--}}
                                        <div class="text-center">
                                            <table class="table" id="table1">
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="main_heading_top text-left">User</th>
                                                    <th scope="col" class="main_heading_top text-left">Product</th>
                                                    <th scope="col" class="main_heading_top text-left">Reference number</th>
                                                    <th scope="col" class="main_heading_top">Order Id</th>
                                                    <th scope="col" class="main_heading_top">Status</th>
                                                    <th scope="col" class="main_heading_top">Date Created</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @if (!empty($payments) && count($payments) > 0)
                                                    @foreach ($payments as $key => $payment)
                                                        <tr>
                                                            <td class="text-left">{{ $payment->user?  $payment->user->name :'' }}</td>
                                                            <td class="text-left">{{ $payment->product?  $payment->product->description:'' }}</td>
                                                            <td class="text-left">{{ $payment->reference_number }}</td>
                                                            <td>{{ $payment->order_id }}</td>
                                                            <td>{{ $payment->status }}</td>
                                                            <td>{{ $payment->created_at->format('Y F j') }}</td>

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
