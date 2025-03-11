@extends('website.layouts.master')

@push('title')
    Dashboard
@endpush

@section('content')
<main>

    <section class="login_page">
        <section class="container mt-5 mb-5">
            <section class="checkout_section">
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="col-sm-12 col-xl-2 col-lg-2 col-md-4">
                                <div class="box_coloring_bg_checkout">
                                    <div class="box_card_heading">
                                        <div class="text_child_head active">Order detail</div>
                                    </div>
                                    <hr>
                                    <div class="box_card_heading">
                                        <div class="text_child_head active">Submit Requirements</div>
                                    </div>
                                    <hr>
                                    <div class="box_card_heading">
                                        <div class="text_child_head active">Confirm And Pay</div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-7 col-lg-7 col-md-8">
                                <div class="cart_box_table">

                                </div>
                                {{-- <form id="createOrder" method="POST" action="{{ route('orders.store') }}"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="{{$subCategory->name}}" name="name">
    <input type="hidden" value="{{$subCategory->price}}" name="price">
    <input type="hidden" value="{{$subCategory->id}}" name="subcategory_id"> --}}
                                <div class="another_table_txt_bottom">
                                    <div class="heading_parent">
                                        Describe  here for reference [optional]
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="btn_flexs">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <textarea rows="4" name="description_data" id="sourceInput" cols="50" placeholder="Describe  here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-3 col-lg-3 col-md-12">
                                <div class="box_coloring_bg_checkout secondr_option_padding">
                                    <div class="text_align_card_main">Price summary</div>
                                    <div class="box_parent_text">
                                        <div class="sub_div_text">Subtotal</div>
                                        <div class="prcie_child">${{ $subCategory->price }}</div>
                                    </div>
                                    <div class="box_parent_text">
                                        <div class="sub_div_text">Service Fee</div>
                                        <div class="prcie_child">$0.0</div>
                                    </div>
                                    <div class="box_parent_text">
                                        <div class="sub_div_text">Total</div>
                                        <div class="prcie_child">${{ $subCategory->price }}</div>
                                    </div>

                                    <div class="form_group_checkout row">
                                        <form action="{{  route('confirm_and_pay.page',encryptstring($subCategory->id)) }}" method="GET">
                                             <input type="hidden" name="des_data" id="destinationInput">
                                            <button type="submit" class="btn btn-main btn_continue_chekout">Continue</button>
                                        </form>


                                      {{-- <button type="submit" class="btn-main btn submit">Continue</button> --}}
{{--                  <a href="{{ route('confirm_and_pay.page',encryptstring($subCategory->id)) }}" class="btn btn-main btn_continue_chekout">Continue</a>--}}

                                    </div>
                                </div>
                            </div>
        {{-- </form> --}}

                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>

 <div class="inner_modal">
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">upload file</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           <div class="modal_upload_file">
            <div>
                <label class="imgUploadCss" id="imgLabel" for="imgUpload"><i class="fa-solid fa-cloud-arrow-up pr-5"></i> Choose Image</label>
                 <input class="imgHidden" id="imgUpload" type="file">
               </div>

               <button class="btn btn-main" class="close" data-dismiss="modal">Continue</button>
           </div>
            </div>

          </div>
        </div>
      </div>
 </div>
</main>

@endsection

@push('js')

<script type="text/javascript">

    $(document).ready(function() {
        $('.btn_continue_chekout').on('click', function() {
            var sourceValue = $('#sourceInput').val(); // Get the value of the source input
            $('#destinationInput').val(sourceValue); // Set the value of the destination input
        });
    });

  $('#closemodal').click(function() {
    $('#staticBackdrop').modal('hide');
});



  </script>



@endpush
