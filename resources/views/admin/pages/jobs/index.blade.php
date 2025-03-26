@extends('admin.layouts.master')

@push('title')
    Jobs
@endpush

@section('content')
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Jobs</title>
        <meta property="og:title" content="New order" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.apanel.link/custom-data/fs2/fonts3.css">
        <meta charset="utf-8">
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="expires" content="0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    </head>

    <main>
        <section class="login_page">
            <section class="container_wrapper">
                <h5 class="text-heading">Jobs</h5>
                <section class="checkout_section">
                    <div class="">
                        <div class="">
                            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary my-3">Add New</a>
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    @include('admin.layouts.partials.message')
                                    @include('admin.pages.jobs.table')

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
