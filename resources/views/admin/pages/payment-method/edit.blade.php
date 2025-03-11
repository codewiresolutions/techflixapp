@extends('admin.layouts.master')

@push('title')
   Product
@endpush

@section('content')
<main>

    <section class="login_page">
        <section class="container-fluid container_wrapper">
    <div class="text-heading">
        Update Payment Method
    </div>
<br>
<div class="row">

 <div class="col-md-8">
    <div class="card_wrap">
        <div class="card-body">
            <form id="updatePaymentMethod" method="post" action="{{ route('admin.PaymentMethod.update',encryptstring($payment_method->id)) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
                <div class="for_prifile_section">
                    <div class="row">

                          <div class="col-sm-12">
                           <div class="form_group_of_profile">
                              <label for=""> NAME </label>
                              <div class="input">
                                 <input type="text" class="control_field form-control" id="fv-name"
                                         name="name" value="{{ $payment_method->name ? $payment_method->name : '' }}" placeholder="Type here...">
                              </div>
                           </div>
                        </div>

                         @if($payment_method->payment_method == 'Perfect Money')
                       <div class="col-sm-12">
                          <div class="form_group_of_profile">
                             <label for="">PM ACCOUNT ID </label>
                             <div class="input">
                                <input type="text" class="control_field form-control" id="fv-name" name="pm_account_id"
                                        value="{{ $payment_method->pm_account_id ? $payment_method->pm_account_id : '' }}" required placeholder="Type here...">
                             </div>
                          </div>
                       </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">PM PASSPHRASE </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-pm_passphrase" name="pm_passphrase"
                                      value="{{ $payment_method->pm_passphrase ? $payment_method->pm_passphrase : '' }}" required placeholder="Type here...">
                           </div>
                        </div>
                     </div>

                     @elseif($payment_method->payment_method == 'Paypal')

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">  PAYPAL SANDBOX CLIENT ID </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-paypal_sandbox_client_id" name="paypal_sandbox_client_id"
                                      value="{{ $payment_method->paypal_sandbox_client_id ? $payment_method->paypal_sandbox_client_id : '' }}" required placeholder="Type here...">
                           </div>
                        </div>
                     </div>

                       <div class="col-sm-12">
                          <div class="form_group_of_profile">
                             <label for=""> PAYPAL SANDBOX CLIENT SECRET </label>
                             <div class="input">
                                <input type="text" class="control_field form-control" id="fv-paypal_sandbox_client_secret"
                                        name="paypal_sandbox_client_secret" value="{{ $payment_method->paypal_sandbox_client_secret ? $payment_method->paypal_sandbox_client_secret : '' }}" placeholder="Type here...">
                             </div>
                          </div>
                       </div>
                       @elseif($payment_method->payment_method == 'Stripe')

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">  Secret key </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-name" name="secret_key"
                                      value="{{ $payment_method->secret_key ? $payment_method->secret_key : '' }}" required placeholder="Type here...">
                           </div>
                        </div>
                     </div>

                       <div class="col-sm-12">
                          <div class="form_group_of_profile">
                             <label for=""> STRIPE SECRET </label>
                             <div class="input">
                                <input type="text" class="control_field form-control" id="fv-stripe_secret"
                                        name="stripe_secret" value="{{ $payment_method->stripe_secret ? $payment_method->stripe_secret : '' }}" placeholder="Type here...">
                             </div>
                          </div>
                       </div>

                       @else

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">  AAMARPAY SANDBOX </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-aamarpay_sandbox" name="aamarpay_sandbox"
                                      value="{{ $payment_method->aamarpay_sandbox ? $payment_method->aamarpay_sandbox : '' }}" required placeholder="Type here...">
                           </div>
                        </div>
                     </div>

                       <div class="col-sm-12">
                          <div class="form_group_of_profile">
                             <label for=""> AAMARPAY KEY </label>
                             <div class="input">
                                <input type="text" class="control_field form-control" id="fv-aamarpay_key"
                                        name="aamarpay_key" value="{{ $payment_method->aamarpay_key ? $payment_method->aamarpay_key : '' }}" placeholder="Type here...">
                             </div>
                          </div>
                       </div>


                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for=""> AAMARPAY STORE ID </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-aamarpay_store_id"
                                      name="aamarpay_store_id" value="{{ $payment_method->aamarpay_store_id ? $payment_method->aamarpay_store_id : '' }}" placeholder="Type here...">
                           </div>
                        </div>
                     </div>

                       @endif

                     <div class="col-sm-12">
                        <div class="form_group_of_profile">
                            <label for="sub_category_id">Status</label>
                            <select name="status" id="status" class="custom-select">
                              <option value="1">Active</option>
                              <option value="0">InActive</option>
                            </select>
                        </div>
                     </div>


                     <div class="col-sm-12">
                        <div class="form_group_of_profile">
                            <label for="sub_category_id">Display Order</label>
                            <div class="input">
                                <input type="number" class="control_field form-control" id="fv-display_order"
                                        name="display_order" value="{{ $payment_method->display_order ? $payment_method->display_order : '' }}" placeholder="Type here...">
                             </div>
                        </div>
                     </div>




                    </div>
                    <div class="btn_flex mt-5 mb-2">
                        <a class="btn-main btn" href="{{ route('admin.products.index') }}">Back</a>&nbsp;&nbsp;
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


    $("#createpayment_method").validate({
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
