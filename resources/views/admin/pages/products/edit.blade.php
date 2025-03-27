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
            <form id="createCategory" method="post" action="{{ route('admin.products.update',encryptstring($category->id)) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
                <div class="for_prifile_section">
                    <div class="row">
                       <div class="col-sm-12">
                          <div class="form_group_of_profile">
                             <label for="">  Name </label>
                             <div class="input">
                                <input type="text" class="control_field form-control" id="fv-name" name="name"
                                        value="{{ $category->name ? $category->name : '' }}" required placeholder="Type here...">
                             </div>
                          </div>
                       </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">  Icon </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-name" name="icon"
                                      value="{{ $category->icon ? $category->icon : '' }}" required placeholder="Type here...">
                           </div>
                        </div>
                     </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">  URL </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-name" name="url"
                                      value="{{ $category->url ? $category->url : '' }}" required placeholder="Type here...">
                           </div>
                        </div>
                     </div>
               
                       <div class="col-sm-12">
                          <div class="form_group_of_profile">
                             <label for=""> Description </label>
                             <div class="input">
                                <input type="text" class="control_field form-control" id="fv-description"
                                        name="description" value="{{ $category->description ? $category->description : '' }}" placeholder="Type here...">
                             </div>
                          </div>
                       </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                            <span>
                                <label for="default-06">Image: <span class="text-danger">*</span></label>
                            </span>
                            <div class="">
                                <div class="custom-file">
                                    <input type="file" name="image" id="image" class="control_field form-control custom-file-input contentdb_image" id="customFile" accept=".jpeg, .jpg, .png, .gif, .svg">
                                    <label class="custom-file-label imagepanel" id="image-label" for="customFile">Choose file</label>
                                </div>
                                <span id="mediaerror"></span>
                                <!-- Display the image -->
                                @if($category->image)
                                <img class="w-25 img-fluid mt-2" src="{{ asset($category->image) }}" alt="Category Image" />
                                @endif
                            </div>
                        </div>
                    </div>
                    
                     
                    </div>
                    <div class="btn_flex mt-5 mb-2">
                        <a class="btn-main btn" href="{{ route('admin.products.index') }}">Back</a>&nbsp;&nbsp;
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