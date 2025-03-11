@extends('admin.layouts.master')

@push('title')
   Sub Products Detail
@endpush

@section('content') 
<main>

    <section class="login_page">
        <section class="container_wrapper">
        <h5 class="text-heading"> Sub Products Detail</h5>
            <section class="checkout_section">
                <div class="">
                    <div class="">
                        <a href="{{ route('admin.subcategory_deatil.create') }}" class="btn  mb-5 btn-primary">Add New</a>
                        <div class="row">
                            <div class="col-md-12">
                              @include('admin.layouts.partials.message')
                              <div class="cart_box_table">
                              <div class="table_section">
                            <div class="table_header"></div>
                                    <table class="table" id="example">
                                        <thead>
                                          <tr>
                                            <th scope="col" class="main_heading_top">ID</th>
                                            <th scope="col" class="main_heading_top">Sub Product</th>
                                            <th scope="col" class="main_heading_top">Type</th>
                                            <th scope="col" class="main_heading_top">Description</th>
                                            <th scope="col" class="main_heading_top">Price</th>
                                            <th scope="col" class="main_heading_top">Delivery Time</th>
                                            {{-- <th scope="col" class="main_heading_top">pages</th>
                                            <th scope="col" class="main_heading_top">sub_details</th> --}}
                                            <th scope="col" class="main_heading_top">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                        
                                          @if (!empty($sub_category) && count($sub_category) > 0)
                                          @foreach ($sub_category as $key => $product)

                                          @if (!empty($product->sub_category_details) && count($product->sub_category_details) > 0)
                                          @foreach ($product->sub_category_details as $key => $value)
                                          <tr>
                                            <td> {{$value->id}}</td>
                                            <td> {{$product->name}}</td>
                                            <td> {{$value->type}}</td>
                                            <td> {{$value->description}}</td>
                                            <td>$ {{$value->price}}</td>
                                            <td> {{$value->delivery_time}}</td>
                                            {{-- <td> {{$value->pages}}</td>
                                            <td> {{$value->sub_details}}</td> --}}
                                            <td> 
                                              <div class="d_flexs_table">
                                                <a class="btn btn_secondary" href="{{ route('admin.subcategory_deatil.edit',encryptstring($value->id)) }}">
                                                  <i class="fa-solid fa-pen-to-square"></i>
                                                  {{-- <i class="fa-solid fa-pencil"></i> --}}
                                                </a>
                                              <form action="{{ route('admin.subcategory_deatil.destroy', $value->id) }}" method="POST">
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
            </section>
        </section>
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