@extends('admin.layouts.master')

@push('title')
    Dashboard
@endpush

@section('content')

    <div class="container-fluid container_wrapper">
        <h5 class="text-heading">Latest Orders</h5>
        <div class="row">
            <div class="col-lg-8 table_rad">
                <div class="table_section">
                    @include('admin.layouts.partials.message')
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th scope="col" class="main_heading_top">Date</th>
                                <th scope="col" class="main_heading_top">ID</th>
                                <th scope="col" class="main_heading_top">Order</th>
                                <th scope="col" class="main_heading_top">Description</th>
                                <th scope="col" class="main_heading_top">Status</th>
                                <th scope="col" class="main_heading_top">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (!empty($orders) && count($orders) > 0)
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <th scope="row">{{ date_format($order->created_at, 'M d Y') }}</th>
                                        <td> {{ $order->id }}</td>
                                        <td> {{ $order->name }}</td>
                                        <td> {{ substr($order->description, 0, 50) }} ...</td>
                                        <td>
                                            @if (Auth::check() && Auth::user()->is_admin == 1)
                                                <select class="form-select form-control toggle-status-link"
                                                    aria-label="Default select example" id="status"
                                                    style="width: 130px;">
                                                    <option value="Completed" data-orderid="{{ $order->id }}"
                                                        data-orderstatus="Completed"
                                                        {{ $order->status == 'Completed' ? 'selected' : '' }}>
                                                        Completed
                                                    </option>
                                                    <option value="Canceled" data-orderid="{{ $order->id }}"
                                                        data-orderstatus="Canceled"
                                                        {{ $order->status == 'Canceled' ? 'selected' : '' }}>
                                                        Canceled
                                                    </option>
                                                    <option value="Active" data-orderid="{{ $order->id }}"
                                                        data-orderstatus="Active"
                                                        {{ $order->status == 'Active' ? 'selected' : '' }}>
                                                        Active
                                                    </option>
                                                    <option value="Pending" data-orderid="{{ $order->id }}"
                                                        data-orderstatus="Pending"
                                                        {{ $order->status == 'Pending' ? 'selected' : '' }}>
                                                        Pending
                                                    </option>
                                                </select>
                                            @else
                                                @if ($order->status == 'Completed')
                                                    <button class="btn btn-success">Completed</button>
                                                @elseif ($order->status == 'Canceled')
                                                    <button class="btn btn-danger">Canceled</button>
                                                @elseif ($order->status == 'Active')
                                                    <button class="btn btn-primary">Active</button>
                                                @else
                                                    <button class="btn btn-warning">Pending</button>
                                                @endif
                                            @endif
                                        </td>
                                        <td> <a class=" w-100 btn btn-main"
                                                href="{{ route('dashboard.show', encryptstring($order->id)) }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            {{-- <a class="btn btn_secondary"
                                                href="{{ route('dashboard.edit', encryptstring($order->id)) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a> --}}
                                        </td>

                                    </tr>
                                @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_girl_avtar">
                    <div class="box_img_postion">
                        <img src="https://dummyimage.com/100x100/000/dcdce0&text=stephen_doe" alt="Avatar"
                            class="avatar" />
                        <div class="text_heading_img"></div>
                    </div>
                    <div class="box_with_detail">
                        <div class="design_color">
                            <div class="heading_that_design">Wallet Ballence</div>
                            <div class="box_design">
                                <div class="icon_div">
                                    <i class="fa-regular fa-dollar-sign"></i>
                                </div>
                                <div class="price_div">{{ $total_orders_amount }}</div>
                            </div>
                        </div>
                        <div class="design_color_sec">
                            <div class="heading_that_design">
                                <i class="fa-solid fa-cart-shopping"></i>
                                Total Order
                            </div>
                            <div class="box_design">
                                <div class="icon_div">
                                  .
                                </div>
                                <div class="price_div">{{ $ordersCount }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- this is container padding -->
        <div class="high_charts_set">
            <div class="text_highcharts">order statics</div>
            <div class="row">
                <div class="col-sm-7">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        <p class="highcharts-description"></p>
                    </figure>

                </div>
                <div class="col-sm-5">
                    <div class="box_orders">
                        <div class="text_order">Pending Orders</div>
                        <div class="circle_order">

                            <div class="icon_width">{{ round($pending_percent, 0) }}%</div>
                        </div>
                    </div>

                    <div class="box_orders" style="background-color: #138941; color: #fff !important">
                        <div class="text_order">Completed Orders</div>
                        <div class="circle_order">
                            <div class="icon_widthsec">{{ round($complete_percent, 0) }}%</div>
                        </div>
                    </div>

                    <div class="box_orders" style="background-color: #377dff; color: #fff !important">
                        <div class="text_order">Active Orders</div>
                        <div class="circle_order">
                            <div class="icon_widthsec">{{ round($active_percent, 0) }}%</div>
                        </div>
                    </div>


                    <div class="box_orders" style="background-color: #e51918; color: #fff !important">
                        <div class="text_order">Canceled Orders</div>
                        <div class="circle_order">
                            <div class="icon_widthsec">{{ round($canceled_percent, 0) }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection


@push('js')
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables plugin -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <script src="https://code.highcharts.com/highcharts.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            console.log(jQuery);
            $('#example').DataTable({
                "order": [[ 0, "desc" ]] // Assuming you want to sort by the first column in descending order
            });

            //     Highcharts.ajax({
            //   url: '/orders-charts',
            //   dataType: 'json',
            //   success: function (data) {
            //     console.log(data);
            //     var chart = Highcharts.chart("container", {
            //       // ...
            //       series: [
            //         {
            //           type: "area",
            //           name: "My Data Series Name",
            //           data: data.map(function (point) {
            //             return [Date.parse(point.timestamp), point.value];
            //           }),
            //         },
            //       ],
            //     });

            //     // Add event listener to the dropdown menu (if needed)
            //     // ...
            //   },
            //   error: function (xhr, textStatus, errorThrown) {
            //     // Handle error
            //   }
            // });



            Highcharts.getJSON(
                "https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/usdeur.json",
                function(data) {
                    Highcharts.chart("container", {
                        chart: {
                            zoomType: "x",
                        },
                        title: {
                            text: "USD to EUR exchange rate over time",
                        },
                        subtitle: {
                            text: document.ontouchstart === undefined ?
                                "Click and drag in the plot area to zoom in" :
                                "Pinch the chart to zoom in",
                        },
                        xAxis: {
                            type: "datetime",
                        },
                        yAxis: {
                            title: {
                                text: "Exchange rate",
                            },
                        },
                        legend: {
                            enabled: false,
                        },
                        plotOptions: {
                            area: {
                                fillColor: {
                                    linearGradient: {
                                        x1: 0,
                                        y1: 0,
                                        x2: 0,
                                        y2: 1,
                                    },
                                    stops: [
                                        [0, Highcharts.getOptions().colors[0]],
                                        [
                                            1,
                                            Highcharts.color(Highcharts.getOptions().colors[0])
                                            .setOpacity(0)
                                            .get("rgba"),
                                        ],
                                    ],
                                },
                                marker: {
                                    radius: 2,
                                },
                                lineWidth: 1,
                                states: {
                                    hover: {
                                        lineWidth: 1,
                                    },
                                },
                                threshold: null,
                            },
                        },

                        series: [{
                            type: "area",
                            name: "USD to EUR",
                            data: data,
                        }, ],
                    });
                }
            );



        });


        // Use event delegation to handle click events on dynamically generated elements
        $('#example').on('change', '.toggle-status-link', function(e) {
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
