@extends('admin.layouts.master')

@push('title')
   Products
@endpush

@section('content')


<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Products</title>
  <meta property="og:title" content="New order" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.apanel.link/custom-data/fs2/fonts3.css" >
  <meta charset="utf-8">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta property="og:description" content="" />
 <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables plugin -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<style>

</style>
</head>

<main>

    <section class="login_page">
        <section class="container_wrapper">
        <h5 class="text-heading">Products</h5>
            <section class="checkout_section">
                <div class="">
                    <div class="">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New</a>
                        <div class="row">
                            <div class="col-md-12 col-md-offset-2">
                              @include('admin.layouts.partials.message')
                                <div class="cart_box_table">
                                  <div class="table_section">
                                    <table class="table" id="example">
                                        <thead>
                                          <tr>
                                            <th scope="col" class="main_heading_top">ID</th>
                                            <th scope="col" class="main_heading_top">Product</th>
                                            <th scope="col" class="main_heading_top">Description</th>
                                            <th scope="col" class="main_heading_top">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                          @if (!empty($products) && count($products) > 0)
                                          @foreach ($products as $key => $product)
                                          <tr>
                                            <td class="pl-3"> {{$product->id}}</td>
                                            <td>
                                                <img
                                                  src="{{asset($product->image)}}"
                                                  alt=""
                                                  class="w-25"
                                                />
                                                {{$product->name}}
                                              </td>

                                            <td> {{ substr($product->description, 0, 50)}} ...</td>
                                            <td>
                                             <div class="d_flexs_table">
                                              <a class="btn btn_secondary" href="{{ route('admin.products.edit',encryptstring($product->id)) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                              </a>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                                  @csrf
                                                  @method('delete')
                                                  <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
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
