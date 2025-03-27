@extends('admin.layouts.master')

@push('title')
    SubProduct
@endpush

@section('content')
    <main>

        <section class="login_page">
            <section class="container_wrapper">
                <div class="">
                    <h5 class="text-heading">Create SubProduct</h5>
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
                <form id="createsubCategory" method="POST" action="{{ route('admin.subcategory.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="for_prifile_section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form_group_of_profile" id="products">
                                    <label for="category_id">Product</label>
                                    <select id="category_id" name="category_id" class="custom-select form-control">
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->first('store_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('store_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form_group_of_profile">
                                    <label for=""> Name </label>
                                    <div class="input">
                                        <input type="text" class="control_field form-control" id="fv-name"
                                            name="name" value="{{ old('name') }}" required placeholder="Type here...">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form_group_of_profile">
                                    <label for=""> Price </label>
                                    <div class="input">
                                        <input type="text" class="control_field form-control" id="fv-price"
                                            name="price" value="{{ old('price') }}" required placeholder="Type here...">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form_group_of_profile">
                                    <label for="image" class="">sub Product Image: <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="image" accept=".jpeg, .jpg, .png, .gif, .svg" class="control_field form-control"
                                        id="Image">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form_group_of_profile">
                                <label for=""> Description </label>
                                <div class="input">
                                    <input type="text" class="control_field form-control" id="fv-description"
                                        name="description" value="{{ old('description') }}" placeholder="Type here...">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="btn_flex mt-5 mb-2">
                        <a class="btn-main btn" href="{{ route('admin.subcategory.index') }}">Back</a>&nbsp;&nbsp;
                        <button type="submit" class="btn-main btn submit">Save</button>
                    </div>
                    </div>
                </form>

            </section>

        </section>
    </main>
@endsection

@push('js')
    <script type="text/javascript">
        $("#createsubCategory").validate({
            rules: {
                "name": "required",
                "category_id": "required",
            },
            messages: {
                "name": "This field is required.",
                "category_id": "This field is required.",
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
