@extends('admin.layouts.master')

@push('title')
    SubProduct Detail
@endpush

@section('content')
    <main>

        <section class="login_page">
            <section class="container-fluid container_wrapper">
                <div class="text-heading">
                    Update SubProduct Detail
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
                                <form id="createCategory" method="POST"
                                    action="{{ route('admin.subcategory_deatil.update', encryptstring($sub_category_detail->id)) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="for_prifile_section">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group mb-3 mt-3 team-full" id="sub_category_id">
                                                    <label for="sub_category_id">Sub Product</label>
                                                    <select id="sub_category_id" name="sub_category_id"
                                                        class="custom-select">
                                                        @foreach ($sub_category as $sub_cat)
                                                            <option value="{{ $sub_cat->id }}"
                                                                @if ($sub_cat->id == $sub_category_detail->sub_category_id) selected @endif>
                                                                {{ $sub_cat->name }}
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->first('sub_category_id'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('sub_category_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="form-group mb-3 mt-3 team-full" id="sub_category_id">
                                                    <label for="sub_category_id">Package Type</label>
                                                    <select name="type" id="type" class="custom-select">
                                                        <option value="basic"
                                                            @if ($sub_category_detail->type == 'basic') selected @endif>Basic</option>
                                                        <option value="standard"
                                                            @if ($sub_category_detail->type == 'standard') selected @endif>Standard
                                                        </option>
                                                        <option value="premium"
                                                            @if ($sub_category_detail->type == 'premium') selected @endif>Premium
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form_group_of_profile">
                                                    <label for=""> Description </label>
                                                    <div class="input">
                                                        <input type="text" class="control_field form-control"
                                                            id="fv-name" name="description"
                                                            value="{{ $sub_category_detail->description ? $sub_category_detail->description : '' }}"
                                                            required placeholder="Type here...">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form_group_of_profile">
                                                    <label for=""> Price </label>
                                                    <div class="input">
                                                        <input type="text" class="control_field form-control"
                                                            id="fv-name" name="price"
                                                            value="{{ $sub_category_detail->price ? $sub_category_detail->price : '' }}"
                                                            required placeholder="Type here...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form_group_of_profile">


                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form_group_of_profile">
                                                    <label for=""> Delivery Time </label>
                                                    <div class="input">
                                                        <input type="text" class="control_field form-control"
                                                            id="fv-delivery_time" name="delivery_time"
                                                            value="{{ $sub_category_detail->delivery_time ? $sub_category_detail->delivery_time : '' }}"
                                                            placeholder="Type here...">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form_group_of_profile">
                                                    <label for=""> Pages </label>
                                                    <div class="input">
                                                        <input type="text" class="control_field form-control"
                                                            id="fv-pages" name="pages"
                                                            value="{{ $sub_category_detail->pages ? $sub_category_detail->pages : '' }}"
                                                            placeholder="Type here...">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form_group_of_profile">
                                                    <label for=""> Sub Details </label>
                                                    <div class="input">
                                                        <input type="text" class="control_field form-control"
                                                            id="fv-sub_details" name="sub_details"
                                                            value="{{ $sub_category_detail->sub_details ? $sub_category_detail->sub_details : '' }}"
                                                            placeholder="Type here...">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="btn_flex mt-5 mb-2">
                                            <a class="btn-main btn"
                                                href="{{ route('admin.subcategory_deatil.index') }}">Back</a>&nbsp;&nbsp;
                                            <button type="submit" class="btn-main btn submit">Update</button>
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
    </script>
@endpush
