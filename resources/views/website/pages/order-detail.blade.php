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
                        <!-- Sidebar Navigation for Steps -->
                        <div class="col-sm-12 col-xl-2 col-lg-2 col-md-4">
                            <div class="box_coloring_bg_checkout">
                                <div class="box_card_heading">
                                    <div  class="text_child_head active">Order Detail</div>
                                </div>
                                <hr />
                                <div class="box_card_heading">
                                    <div class="text_child_head">Submit Requirements</div>
                                </div>
                                <hr />
                                <div class="box_card_heading">
                                    <div class="text_child_head">Confirm And Pay</div>
                                </div>
                                <hr />
                            </div>
                        </div>

                        <!-- Cart Table Section -->
                        <div class="col-sm-12 col-xl-7 col-lg-7 col-md-8">
                            <div class="cart_box_table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="main_heading_top">Product</th>
                                        <th scope="col" class="main_heading_top">Price</th>
                                        <th scope="col" class="main_heading_top">Qty</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="checckout_img_box_table">
                                                <img src="{{ asset($subCategory->image) }}" class="img-fluid" alt="" style="width: 100px !important;" />
                                                <span class="word_wrap_table">
                          {{ $subCategory->name }}
                          <button class="btn btn_detail_img_table">View Detail</button>
                        </span>
                                            </div>
                                        </td>
                                        <td id="price">${{ $subCategory->price }}</td>
                                        <td>
                                            <div class="quantity">
                                                <button class="btn minus-btn" type="button" onclick="updatePrice(-1)">-</button>
                                                <input type="text" id="quantity" value="1" readonly />
                                                <button class="btn plus-btn" type="button" onclick="updatePrice(1)">+</button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Optional Upgrade Section -->
                            <div class="another_table_txt_bottom">
                                <div class="heading_parent">Upgrade your order with lorem ipsum [optional]</div>
                                <input type="radio" />
                                <span> Lorem ipsum dolor sit. </span>
                                <div class="text_child">
                                    <div class="wrap_padding">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa autem, dolorum iste id quibusdam officia.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Price Summary Section -->
                        <div class="col-sm-12 col-xl-3 col-lg-3 col-md-12">
                            <div class="box_coloring_bg_checkout secondr_option_padding">
                                <div class="text_align_card_main">Price Summary</div>
                                <div class="box_parent_text">
                                    <div class="sub_div_text">Subtotal</div>
                                    <div class="prcie_child" id="subtotal">${{ $subCategory->price }}</div>
                                </div>
                                <div class="box_parent_text">
                                    <div class="sub_div_text">Service Fee</div>
                                    <div class="prcie_child" id="service-fee">$0.0</div>
                                </div>
                                <div class="box_parent_text">
                                    <div class="sub_div_text">Total</div>
                                    <div class="prcie_child" id="total">${{ $subCategory->price }}</div>
                                </div>

                                <!-- Continue Button -->
                                <a href="{{ route('upload_file.page', encryptstring($subCategory->id)) }}" class="btn btn-main btn_continue_chekout">Continue</a>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    </main>

@endsection

@push('js')
<script>
    const basePrice = {{ $subCategory->price }};
    const quantityInput = document.getElementById('quantity');
    const priceElement = document.getElementById('price');
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');
    const serviceFee = 0.0; // Static service fee

    function updatePrice(change) {
        let quantity = parseInt(quantityInput.value) + change;
        if (quantity < 1) quantity = 1; // Prevent quantity from going below 1
        quantityInput.value = quantity;

        // Calculate prices
        const subtotal = (basePrice * quantity).toFixed(2);
        const total = (parseFloat(subtotal) + serviceFee).toFixed(2);

        // Update the price elements
        priceElement.textContent = `$${subtotal}`;
        subtotalElement.textContent = `$${subtotal}`;
        totalElement.textContent = `$${total}`;
    }
</script>
@endpush
