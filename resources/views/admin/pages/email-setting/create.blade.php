@extends('admin.layouts.master')

@push('title')
    Create Product
@endpush

@section('content')
    <main>

        <section class="login_page">
            <section class="container-fluid container_wrapper">
                <div class="text-heading">
                    create product
                </div>

                @if ($errors->any())
                    <div class="example-alert">
                        <div class="alert alert-danger alert-icon alert-dismissible">
                            <strong>Error</strong>! {{ $errors->first() }} <button class="close"
                                data-dismiss="alert"></button>
                        </div>
                    </div>
                @endif
                <br>
                <div class="row">

                    <div class="col-md-8">
                        <div class="card_wrap">
                            <div class="card-body">
                                <form class="row g-3" id="createGeneralSettings" method="post"
                                    action="{{ route('admin.email-settings.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Mail Mailer</label>
                                        <input type="text"
                                            class="form-control  @error('mail_mailer') is-invalid @enderror"
                                            id="inputFirstName" name="mail_mailer" value="" placeholder="MAIL_MAILER"
                                            required autocomplete="mail_mailer" />
                                        @error('mail_mailer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">Mail Host</label>
                                        <input type="text" class="form-control  @error('mail_host') is-invalid @enderror"
                                            id="inputmail_host" name="mail_host" value="" placeholder="MAIL_HOST"
                                            required autocomplete="mail_host" />
                                        @error('mail_host')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">Mail Port</label>
                                        <input type="number" class="form-control  @error('mail_port') is-invalid @enderror"
                                            id="inputmail_port" name="mail_port" value="" placeholder="MAIL_PORT"
                                            required autocomplete="mail_port" />
                                        @error('mail_port')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">Mail Username</label>
                                        <input type="text"
                                            class="form-control  @error('mail_username') is-invalid @enderror"
                                            id="inputmail_username" name="mail_username" value=""
                                            placeholder="MAIL_USERNAME" required autocomplete="mail_username" />
                                        @error('mail_username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">Mail Password</label>
                                        <input type="text"
                                            class="form-control  @error('mail_password') is-invalid @enderror"
                                            id="inputmail_password" name="mail_password" value=""
                                            placeholder="MAIL_PASSWORD" required autocomplete="mail_password" />
                                        @error('mail_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">Mail Encrytpion Optional</label>
                                        <input type="text"
                                            class="form-control  @error('mail_encrytpion') is-invalid @enderror"
                                            id="inputmail_encrytpion" name="mail_encrytpion" value=""
                                            placeholder="MAIL_ENCRYPTION" required autocomplete="mail_encrytpion" />
                                        @error('mail_encrytpion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">Mail From Address</label>
                                        <input type="email"
                                            class="form-control  @error('mail_from_address') is-invalid @enderror"
                                            id="inputmail_from_address" name="mail_from_address" value=""
                                            placeholder="mail_from_address" required autocomplete="mail_from_address" />
                                        @error('mail_from_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">Mail From Name (Optional)</label>
                                        <input type="text"
                                            class="form-control  @error('mail_from_name') is-invalid @enderror"
                                            id="inputmail_from_name" name="mail_from_name" value=""
                                            placeholder="MAIL_FROM_NAME" required autocomplete="mail_from_name" />
                                        @error('mail_from_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary px-5 w-100">
                                            Save Email Setting
                                        </button>
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
            const fileInput = document.getElementById("Image");
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
