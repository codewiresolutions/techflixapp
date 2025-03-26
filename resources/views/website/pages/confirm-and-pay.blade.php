@extends('website.layouts.master')

@push('title')
    Dashboard
@endpush

@section('content')

    <section class="section_confirm_pay">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-sm-12 col-xl-2 col-lg-2 col-md-4">
                    <div class="confirm_pay_box">
                        <div class="box_card_heading">
                            <a href="#">
                                <div class="text_child_head">Order detail</div>
                            </a>
                        </div>
                        <hr>
                        <div class="box_card_heading">
                            <a href="#">
                                <div class="text_child_head ">Submit Requirements</div>
                            </a>
                        </div>
                        <hr>
                        <div class="box_card_heading">
                            <a href="#">
                                <div class="text_child_head active">Confirm and Pay</div>
                            </a>
                        </div>
                        <hr>
                    </div>
                </div>

                <!-- Payment Method and Details -->
                <div class="col-sm-12 col-xl-7 col-lg-7 col-md-8">
                    <div class="text_headings">
                        <p>Available Balance</p>
                        <br>
                        <div>Personal Balance: $0.00</div>
                        <br>
                        <p>Remaining Payment: $0.00</p>
                    </div>

                    @foreach($payment_methods as $key => $payment_method)
                        <div class="box_cardt_details mb-2">
                            <div class="heading_card">
                                <input id="{{ $payment_method->name }}" type="radio" name="group1" value="{{ $payment_method->name }}" {{ $key == 0 ? 'checked' : '' }}>
                                <span>{{ $payment_method->name }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Price and Payment Information -->
                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-12">
                    <div class="box_card_pay">
                        <div class="text_pay">
                            You have to pay
                            <div class="price">${{ $subCategory->price }}</div>
                        </div>

                        <div class="img_pay">
                            <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}">
                            <div class="text">
                                {{ $subCategory->name }}
                                <br>
                                <span>${{ $subCategory->price }}</span>
                            </div>
                        </div>

                        <div class="anoter">
                            <div class="d_flex">
                                <div class="heading">Order Amount</div>
                                <div class="tex_delivery_time">${{ $subCategory->price }}</div>
                            </div>

                            <div class="d_flex">
                                <div class="heading">Service Fee</div>
                                <div class="tex_delivery_time">$0.0</div>
                            </div>

                            <div class="d_flex bold">
                                <div class="heading">Total Amount</div>
                                <div class="tex_delivery_time">${{ $subCategory->price }}</div>
                            </div>
                        </div>

                        <hr>

                        <div class="anothe_secondary">
                            <div class="d_flex">
                                <div class="heading">Wallet Balance</div>
                                <div class="tex_delivery_time">$0.0</div>
                            </div>

                            <div class="d_flex">
                                <div class="heading">Remaining Payment</div>
                                <div class="tex_delivery_time">$0.0</div>
                            </div>
                        </div>

                        <div class="box_parent_text">
                            <div class="sub_div_text">Voucher Code</div>
                            <div class="prcie_child"></div>
                        </div>

                        <div class="form_group_checkout row">
                            <div class="col-sm-12 p-sm-0 flex-column justify-content-center">
                                <input type="text" class="form_checkout form-control">
                                <button class="btn validate_btn">Validate</button>
                            </div>
                        </div>

                        <hr>

                        <form action="{{ route('payments.page', encryptstring($subCategory->id)) }}" method="GET">
                            <input type="hidden" name="payment_type" id="destinationInput">
                            <button type="submit" class="btn btn-main btn_continue">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn_continue').on('click', function () {
                var selectedPaymentMethod = $("input[name='group1']:checked").val();
                $('#destinationInput').val(selectedPaymentMethod);
            });
        });
    </script>
@endpush
