@extends('website.layouts.master')
@push('title')
    Blogs
@endpush

@section('content')
    <main>
        <section class="careers_page back_img_full">
            <div class="container_fluid">
                <div class="">
                    <div class="carosel_img">
                        <img src="assets/images/careers.svg" alt="" class="img img-fluid">
                        <div class="container_fluid_career">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="career_form_box">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">Active</a>
                                            </li>
                                        </ul>
                                        @include('website.pages.jobs.table')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('website.pages.jobs.job-description-modal')
            @include('website.pages.jobs.job-apply-modal')

        </section>
    </main>
@endsection

@push('js')
    <script>
        $('#modalForm').on('submit', function(e) {
            e.preventDefault(); // Prevent normal form submission

            // Clear previous errors
            $('.error').text('');

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('job.apply') }}', // Your form submission route
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle success
                    $('#staticBackdropone').modal('hide');

                    // Clear all form fields after success
                    $('#modalForm')[0].reset();  // This will reset the form

                    // Optionally, if you have file inputs, you can clear them as well
                    $('#modalForm input[type="file"]').val('');
                },
                error: function(xhr) {
                    // Handle validation errors
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        for (var field in errors) {
                            $('#' + field + '_error').text(errors[field][0]);
                        }
                    }
                }
            });
        });

        $(document).ready(function () {
            // When the modal is shown
            $('#staticBackdropone').on('show.bs.modal', function (e) {
                // Get the job ID from the button that was clicked
                var jobId = $(e.relatedTarget).data('job-id');  // `data-job-id` is where the job ID is stored

                // Now, you can store the job ID in the modal form or hidden input
                $(this).find('#job_id').val(jobId); // Add the job ID to a hidden input
            });
        });

        $(document).ready(function() {
            // When a "view details" button is clicked
            $('.view_detail_btn').on('click', function() {
                // Get the data attributes from the button
                var jobId = $(this).data('job-id');
                var jobTitle = $(this).data('job-title');
                var jobExp = $(this).data('job-exp');
                var jobType = $(this).data('job-type');
                var jobDescription = $(this).data('job-description');

                // Update the modal content dynamically
                $('#staticBackdrop .heading_modal_lg').text(jobTitle);
                $('#staticBackdrop .heading_modal_md').first().text(jobType);
                $('#staticBackdrop .paragraph').first().text(jobDescription);
                $('#staticBackdrop .jobExp').first().text(jobExp);
            });
        });
    </script>
@endpush
