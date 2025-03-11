@extends('admin.layouts.master')

@push('title')
    Product
@endpush

@section('content')
    <main>

        <section class="login_page">
            <section class="container-fluid container_wrapper">
                <div class="text-heading">
                    Update Product
                </div>
                <br>
                <div class="row">

                    <div class="col-md-8">
                        <div class="card_wrap">
                            <div class="card-body">

                                <form class="row g-3" method="POST"
                                action="{{ route('admin.email-settings.update', $EmailSetting->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label>Mail Mailer</label>
                                        <input type="text" class="form-control" id="inputName" name="mail_mailer"
                                            placeholder="mail_mailer" required value="{{ $EmailSetting->mail_mailer }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label>Mail Host</label>
                                        <input type="text" class="form-control" id="inputmail_host" name="mail_host"
                                            placeholder="mail_host" required value="{{ $EmailSetting->mail_host }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label>Mail Port</label>
                                        <input type="number" class="form-control" id="inputmail_port" name="mail_port"
                                            placeholder="mail_port" required value="{{ $EmailSetting->mail_port }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label>Mail Username</label>
                                        <input type="text" class="form-control" id="inputmail_username" name="mail_username"
                                            placeholder="mail_username" required value="{{ $EmailSetting->mail_username }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label>Mail Password</label>
                                        <input type="text" class="form-control" id="inputmail_password" name="mail_password"
                                            placeholder="mail_password" required value="{{ $EmailSetting->mail_password }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label>Mail From Address</label>
                                        <input type="email" class="form-control" id="inputmail_from_address" name="mail_from_address"
                                            placeholder="mail_from_address" required value="{{ $EmailSetting->mail_from_address }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary px-5 w-100 text-capitalize">
                                            Update Email Setting
                                        </button>
                                    </div>
                                </div>

                            </form>
                                
                            </div>
                        </div>
                    </div>

                </div>

            </section>

        </section>
    </main>
@endsection

@push('js')
    <script type="text/javascript">
        $("#createCategory").validate({
            rules: {
                "name": "required",
            },
            messages: {
                "name": "This field is required.",
            }
        });

        $(document).on('change', '.contentdb_image', function() {
            //alert('success');
            var image = $('#image').val();
            $('#image-label').text(image);
            var ext = this.value.match(/\.(.+)$/)[1];
            ext = ext.toLowerCase();
            switch (ext) {
                case 'jpg':
                case 'jpeg':
                case 'png':
                    $('.imagepanel').text($(this).val().replace(/C:\\fakepath\\/i, ''));
                    $('#mediaerror').html('');
                    break;
                default:
                    $('#mediaerror').html(
                        '<p style="color:red;">This is not an allowed file type. Allowed file: .png | .jpg | .jpeg </p>'
                    );
                    $('.imagepanel').text('');
                    $('.contentdb_image').value = '';
                    $('.contentdb_image').val('');
            }
        });


        document.addEventListener("DOMContentLoaded", function() {
            const fileInput = document.getElementById("image-label");
            fileInput.addEventListener("change", function() {
                const file = this.files[0];
                const maxSize = 3 * 1024 * 1024; // 3MB in bytes (1MB = 1024KB, 1KB = 1024 bytes)

                if (file && file.size > maxSize) {
                    alert("File size exceeds the limit of 3MB.");
                    this.value = ""; // Reset the file input to clear the selected file
                }
            });
        });
    </script>
@endpush
