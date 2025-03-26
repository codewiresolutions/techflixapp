@extends('admin.layouts.master')

@push('title')
    Quizzes
@endpush

@section('content')

    <main>
        <section class="login_page">
            <section class="container_wrapper">
                <h5 class="text-heading">Quizzes</h5>
                <section class="checkout_section">
                    <div class="">
                        <div class="">
                            <a href="{{ route('admin.quizzes.create') }}" class="btn btn-primary my-3">Add New</a>
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    @include('admin.layouts.partials.message')
                                    @include('admin.pages.quizzes.table')

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
