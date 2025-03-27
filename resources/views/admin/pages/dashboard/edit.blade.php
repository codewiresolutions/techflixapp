@extends('admin.layouts.master')

@push('title')
Order
@endpush

@section('content') 
<main>

    <section class="login_page">
        <section class="container-fluid container_wrapper">
    <div class="text-heading">
        Update Order
    </div>
<br>
<div class="row">

 <div class="col-md-8">
    <div class="card_wrap">
        <div class="card-body">
            <form id="updateOrder" method="post" action="{{ route('admin.order.update',encryptstring($order_deatil->id)) }}"
        enctype="multipart/form-data">
        @csrf
                <div class="for_prifile_section">
                    <div class="row">
                       {{-- <div class="col-sm-12">
                          <div class="form_group_of_profile">
                             <label for="">  Name </label>
                             <div class="input">
                                <input type="text" class="control_field form-control" id="fv-name" name="name"
                                        value="{{ $order_deatil->name ? $order_deatil->name : '' }}" disabled placeholder="Type here...">
                             </div>
                          </div>
                       </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">  Description </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-description" name="description"
                                      value="{{ $order_deatil->description ? $order_deatil->description : '' }}" disabled placeholder="Type here...">
                           </div>
                        </div>
                     </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">  Price </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-price" name="price"
                                      value="{{ $order_deatil->price ? $order_deatil->price : '' }}" disabled placeholder="Type here...">
                           </div>
                        </div>
                     </div> --}}
                  
                       <div class="col-sm-12">
                          <div class="form_group_of_profile">
                            <label for="status">Order Status</label>
                            <select id="status" name="status">
                              <option value="Pending" {{ $order_deatil->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                              <option value="Active" {{ $order_deatil->status == 'Active' ? 'selected' : '' }}>Active</option>
                              <option value="Completed" {{ $order_deatil->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                              <option value="Canceled" {{ $order_deatil->status == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                            </select>
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
  </script>
@endpush