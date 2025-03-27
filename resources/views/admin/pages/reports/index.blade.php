@extends('admin.layouts.master')

@push('title')
    Reports
@endpush

@section('content')  

<main>
  <section class="reports_Section">

  <div class="container-fluid container_wrapper">
<h5 class="text-heading">Reports</h5>

    <div class="row">
      <div class="w-100">
        <div class="table_section smal_device_margin_padding">
          <tr class="nav_table_row">
            <div class="to_nav_table">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Payemnt</a>
                  <a class="nav-link" id="nav-order-tab" data-toggle="tab" href="#nav-order" role="tab" aria-controls="nav-order" aria-selected="false">Order</a>
                  <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">tickets</a>
                  {{-- <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-allorder" role="tab" aria-controls="nav-contact" aria-selected="false">profit</a>
                  <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-allorder" role="tab" aria-controls="nav-contact" aria-selected="false">charges</a>
                  <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-allorder" role="tab" aria-controls="nav-contact" aria-selected="false">quality</a>
                </div> --}}
              </nav>
            </div>
            </tr>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">  
            <div class="table_reports">
               <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Dates</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <tr>
                        @if (!empty($monthlysales) && count($monthlysales) > 0)
                    @foreach ($monthlysales as $key => $monthly)
                    <tr>
                    {{-- <th scope="row">{{date_format($monthly->dates,"M d Y")}}</th> --}}
                      <td>{{ $monthly->dates }}</td> 
                      <td>{{$monthly->total}}</td>
                    </tr>
                    @endforeach
                    @endif
                      </tr>
                    
                    </tbody>
                  </table>
            </div>
          </div>
              <div class="tab-pane fade" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                <table class="table" id="example">
       
                  <tbody class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" >
                    <tr>
                      <th scope="col" class="main_heading_top">Due Date</th>
                      <th scope="col" class="main_heading_top">Deliver Date</th>
                      <th scope="col" class="main_heading_top">Order ID</th>
                      <th scope="col" class="main_heading_top">Products</th>
                      <th scope="col" class="main_heading_top">Description</th>
                      <th scope="col" class="main_heading_top">Order Amount</th>
                    </tr>
                    <tr>
                      @if (!empty($orders) && count($orders) > 0)
                    @foreach ($orders as $key => $order)
                    <tr>
                      <th scope="row">{{date_format($order->created_at,"d/m/Y")}}</th> 
                      <th scope="row">{{date_format($order->created_at,"d/m/Y")}}</th>
                      <td>{{$order->id}}</td>
                      <td>{{$order->name}}</td>
                      <td>{{$order->description}}</td>
                      {{-- <td class="width_mange_order">
                        <img
                          src="{{asset($order->image)}}"
                          alt=""
                          class="w-25"
                        />
                        {{$order->name}}
                      </td> --}}
                      <td><span class="order_class">
                        ${{$order->price}}
                      </span></td>
                    </tr>
                    @endforeach
                    @endif
                    </tr>
                  </div>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"></div>
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
               $('#example').DataTable();
           });
           
      </script>

 @endpush

