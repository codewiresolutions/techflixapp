@extends('website.layouts.master')

@push('title')
    Dashboard
@endpush

@section('content')
    <main>
        <section class="login_page">
            <section class="container mt-5 mb-5">
                <section class="checkout_section">
                    <div class="row">
                        <!-- Sidebar Navigation -->
                        <div class="col-sm-12 col-xl-2 col-lg-2 col-md-4">
                            <div class="box_coloring_bg_checkout">
                                <div class="box_card_heading">
                                    <div class="text_child_head ">Order detail</div>
                                </div>
                                <hr>
                                <div class="box_card_heading">
                                    <div class="text_child_head active">Submit Requirements</div>
                                </div>
                                <hr>
                                <div class="box_card_heading">
                                    <div class="text_child_head ">Confirm And Pay</div>
                                </div>
                                <hr>
                            </div>
                        </div>

                        <!-- Cart Details & Text Area -->
                        <div class="col-sm-12 col-xl-7 col-lg-7 col-md-8">
                            <div class="cart_box_table">
                                <!-- You can add cart items here if needed -->
                            </div>

                            <div class="another_table_txt_bottom">
                                <div class="heading_parent">
                                    Describe here for reference [optional]
                                </div>

                                <div class="col-sm-6">
                                    <div class="btn_flexs">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea rows="4" name="description_data" id="sourceInput" cols="50" placeholder="Describe here..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Price Summary Section -->
                        <div class="col-sm-12 col-xl-3 col-lg-3 col-md-12">
                            <div class="box_coloring_bg_checkout secondr_option_padding">
                                <div class="text_align_card_main">Price summary</div>
                                <div class="box_parent_text">
                                    <div class="sub_div_text">Subtotal</div>
                                    <div class="prcie_child" id="subtotal">${{ $subCategory->price }}</div>
                                </div>
                                <div class="box_parent_text">
                                    <div class="sub_div_text">Service Fee</div>
                                    <div class="prcie_child">$0.0</div>
                                </div>
                                <div class="box_parent_text">
                                    <div class="sub_div_text">Total</div>
                                    <div class="prcie_child" id="total">${{ $subCategory->price }}</div>
                                </div>

                               
                                <!-- Form to Submit Description -->
                                <form action="{{ route('confirm_and_pay.page', encryptstring($subCategory->id)) }}" method="GET">
                                    <input type="hidden" name="des_data" id="destinationInput">
                                    <button type="submit" class="btn btn-main btn_continue_chekout">Continue</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>

        <!-- Modal for File Upload -->
        <div class="inner_modal">
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Upload File</h5>
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

                                <button class="btn btn-main" data-dismiss="modal">Continue</button>
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
            // Copy value from source textarea to hidden input before form submission
            $('.btn_continue_chekout').on('click', function() {
                var sourceValue = $('#sourceInput').val(); // Get the value of the source input
                $('#destinationInput').val(sourceValue); // Set the value of the destination input
            });
        });

        // Close modal on clicking close button
        $('#closemodal').click(function() {
            $('#staticBackdrop').modal('hide');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantity = sessionStorage.getItem('orderQuantity') || 1;
            const subtotal = sessionStorage.getItem('orderSubtotal') || '{{ $subCategory->price }}';
            const total = sessionStorage.getItem('orderTotal') || '{{ $subCategory->price }}';

            // Update quantity display if it exists
            const quantityElement = document.getElementById('quantity');
            if (quantityElement) {
                quantityElement.textContent = quantity;
            }

            // Update price elements
            const subtotalElement = document.getElementById('subtotal');
            const totalElement = document.getElementById('total');

            if (subtotalElement) {
                subtotalElement.textContent = `$${subtotal}`;
            }
            if (totalElement) {
                totalElement.textContent = `$${total}`;
            }
        });
    </script>
@endpush
