@extends('admin.layouts.master')

@push('title')
  Sub Product detail
@endpush

@section('content') 
<main>

    <section class="login_page">
        <section class="container-fluid container_wrapper">
    <div class="text-heading">
        Create SubProduct Detail
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
            <form id="createCategory" method="POST" action="{{ route('admin.subcategory_deatil.store') }}"
        enctype="multipart/form-data">
        @csrf
                <div class="for_prifile_section">
                    <div class="row">

                        <div class="col-sm-12">
                        <div class="form-group mb-3 mt-3 team-full" id="sub_category_id">
                            <label for="sub_category_id">Sub Product</label>
                            <select id="sub_category_id" name="sub_category_id" class="custom-select">                 
                            @foreach($sub_category as $sub_cat)
                               <option value="{{ $sub_cat->id}}">{{ $sub_cat->name}}</option>
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
                                  <option value="basic">Basic</option>
                                  <option value="standard">Standard</option>
                                  <option value="premium">Premium</option>
                                </select>
                            </div>
                          </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">  Description </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-name" name="description"
                                      value="{{ old('description') }}" required placeholder="Type here...">
                           </div>
                        </div>
                     </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">  Price </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-name" name="price"
                                      value="{{ old('price') }}" required placeholder="Type here...">
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
                                <input type="text" class="control_field form-control" id="fv-delivery_time"
                                        name="delivery_time" value="{{ old('delivery_time') }}" placeholder="Type here...">
                             </div>
                          </div>
                       </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for=""> Pages </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-pages"
                                      name="pages" value="{{ old('pages') }}" placeholder="Type here...">
                           </div>
                        </div>
                     </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for=""> Sub Details </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-sub_details"
                                      name="sub_details" value="{{ old('sub_details') }}" placeholder="Type here...">
                           </div>
                        </div>
                     </div>
                     
                    </div>
                    <div class="btn_flex mt-5 mb-2">
                        <a class="btn-main btn" href="{{ route('admin.subcategory_deatil.index') }}">Back</a>&nbsp;&nbsp;
                        <button type="submit" class="btn-main btn submit">Save</button>
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