@extends('admin.layouts.master')
@section('content')
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Jobs Appicants</title>
        <meta property="og:title" content="New order"/>
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

                <section class="checkout_section">
                    <div class="">
                        <div class="">
                            <h5 class="text-heading">Job Applicants</h5>
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    @include('admin.layouts.partials.message')
                                    <div class="cart_box_table">
                                        <div class="table_section">
                                            <table class="table" id="example">
                                                <thead>
                                                <tr>
                                                    <th>Applicant Name</th>
                                                    <th>Position</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Resume</th>
                                                    <th>Portfolio</th>
                                                    <th class="text-center">Created at</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if (!empty($jobApplicants) && count($jobApplicants) > 0)
                                                    @foreach ( $jobApplicants as $key => $jobApplicant )

                                                        <tr>


                                                            <td>{{ $jobApplicant->name }}</td>
                                                            <td>{{ $jobApplicant->job->title }}</td>
                                                            <td>{{ $jobApplicant->email }}</td>
                                                            <td>{{ $jobApplicant->phone }}</td>
                                                            <td><a href="{{ Storage::url($jobApplicant->cv) }}"
                                                                   download> Resume</a></td>
                                                            <td>
                                                                @if($jobApplicant->portfolio)
                                                                    <a href="{{ Storage::url($jobApplicant->portfolio) }}"
                                                                       download> Portfolio</a>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">{{ $jobApplicant->created_at ?? 'N/A' }}</td>

                                                            <td class="text-center">
                                                                <div class="d_flexs_table">

                                                                    <form action="{{ route('admin.job-applicants.destroy', $jobApplicant->id) }}" method="POST">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
