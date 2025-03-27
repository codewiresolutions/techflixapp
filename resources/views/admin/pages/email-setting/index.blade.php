@extends('admin.layouts.master')

@push('title')
    Email Setting
@endpush

@section('content')


    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title> Email Setting</title>
        <meta property="og:title" content="New order" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.apanel.link/custom-data/fs2/fonts3.css">
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
                <h5 class="text-heading">Email Settings</h5>
                <section class="checkout_section">
                    <div class="">
                        <div class="">
                            @if (!$EmailSettingExists)
                                <a href="{{ route('admin.email-settings.create') }}" class="btn btn-primary">Add New</a>
                            @endif

                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    @include('admin.layouts.partials.message')


                                    <div class="cart_box_table">
                                        <div class="table_section">
                                            <table class="table" id="example">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Mail Mailer</th>
                                                        <th>Mail Host</th>
                                                        <th>Mail Port</th>
                                                        <th>Mail Username</th>
                                                        <th>Mail Password</th>
                                                        <th>Mail From Address</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (!empty($EmailSetting) && count($EmailSetting) > 0)
                                                        @foreach ($EmailSetting as $key => $EmailSet)
                                                            <tr>
                                                                <td>#{{ $EmailSet->id }}</td>
                                                                <td>{{ $EmailSet->mail_mailer }}</td>
                                                                <td>{{ $EmailSet->mail_host }}</td>
                                                                <td>{{ $EmailSet->mail_port }}</td>
                                                                <td>{{ $EmailSet->mail_username }}</td>
                                                                <td>{{ $EmailSet->mail_password }}</td>
                                                                <td>{{ $EmailSet->mail_from_address }}</td>
                                                                <td>
                                                                    <div class="d_flexs_table">
                                                                        <a class="btn btn_secondary"
                                                                            href="{{ route('admin.email-settings.edit', $EmailSet->id) }}">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>
                                                                        <form
                                                                            action="{{ route('admin.email-settings.destroy', $EmailSet->id) }}"
                                                                            method="POST">
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
