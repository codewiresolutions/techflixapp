@extends('admin.layouts.master')

@push('title')
   Sub-Products
@endpush

@section('content')
<main>

    <section class="login_page">
        <section class="container_wrapper">
        <h5 class="text-heading">Sub Products</h5>
            <section class="checkout_section">
                <div class="">
                    <div class="">
                        <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary">Add New</a>
                        <div class="row">
                            <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12">
                              @include('admin.layouts.partials.message')
                                <div class="cart_box_table">
                                  <div class="table_section">
                                    <table class="table" id="example">
                                        <thead>
                                          <tr>
                                            <th scope="col" class="main_heading_top">Product</th>
                                            <th scope="col" class="main_heading_top">Sub Product</th>
                                            <th scope="col" class="main_heading_top">Price</th>
                                            <th scope="col" class="main_heading_top">Description</th>
                                            <th scope="col" class="main_heading_top">Action</th>

                                          </tr>
                                        </thead>
                                        <tbody>

                                          @if (!empty($products) && count($products) > 0)
                                          @foreach ($products as $key => $product)
                                          @if (!empty($product->sub_categories) && count($product->sub_categories) > 0)
                                          @foreach ($product->sub_categories as $key => $value)

                                          <tr>
                                            <td> {{$product->name}}</td>
                                            <td>
                                                <img
                                                  src="{{asset($value->image)}}"
                                                  alt=""
                                                  class="w-25"
                                                />
                                                {{$value->name}}
                                              </td>
                                            <td>$ {{$value->price}}</td>
                                            <td> {{$value->description}}</td>
                                            <td>
                                              <div class="d_flexs_table">
                                              <a class="btn btn_secondary" href="{{ route('admin.subcategory.edit',encryptstring($value->id)) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                              </a>
                                              <form action="{{ route('admin.subcategory.destroy', $value->id) }}" method="POST">
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
