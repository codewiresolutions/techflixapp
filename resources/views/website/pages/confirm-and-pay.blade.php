@extends('website.layouts.master')



@push('title')

    Dashboard

@endpush



@section('content')

    <head>

        <meta http-equiv="content-type" content="text/html; charset=UTF-8">

        <title>Confirm And Pay</title>

        <meta property="og:title" content="New order"/>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
              crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.apanel.link/custom-data/fs2/fonts3.css">

        <meta charset="utf-8">

        <meta http-equiv="cache-control" content="no-cache">

        <meta http-equiv="expires" content="0">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="keywords" content=""/>

        <meta name="description" content=""/>

        <meta property="og:description" content=""/>

        <link href="{{asset('assets/v2.91/style.css')}}" rel="stylesheet">

        <link href="https://cdn.apanel.link/main/fa5151/css/all.min.css" rel="stylesheet">

        <link rel="dns-prefetch" href="//cdn.apanel.link">

        <link href="https://cdn.apanel.link/main/css/global.main.v22.17.04.css" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

        <link rel="stylesheet" href="{{asset('assets//css/responsive.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
              integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>

        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
              integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>


        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="https://code.highcharts.com/highcharts.js"></script>

        <script src="https://code.highcharts.com/modules/data.js"></script>

        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <script src="https://code.highcharts.com/modules/export-data.js"></script>

        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <style>


        </style>

    </head>



    <body>


    <section class="section_confirm_pay">

        <div class="container">

            <div class="row">

                <div class="col-sm-12 col-xl-2 col-lg-2 col-md-4">

                    <div class="confirm_pay_box">

                        <div class="box_card_heading">

                            <a href="#">

                                <div class="text_child_head ">order detail</div>

                            </a>

                        </div>

                        <hr>

                        <div class="box_card_heading">

                            <a href="#">

                                <div class="text_child_head ">submit requirements</div>

                            </a>

                        </div>

                        <hr>

                        <div class="box_card_heading">

                            <a href="#">

                                <div class="text_child_head active">confirm and pay</div>

                            </a>

                        </div>

                        <hr>

                    </div>

                </div>

                <div class="col-sm-12 col-xl-7 col-lg-7 col-md-8">

                    <div class="text_headings">
                        <p>available balance</p>
                        <br>
                        <div>personal balance : $ 0.00</div>
                        <br>
                        <p>remaining payment : $ 0.00</p>
                    </div>


                    {{--                    @dd($payment_methods);--}}
                    {{--                    @foreach($payment_methods as $payment_method)--}}
                    @foreach($payment_methods as $key =>$payment_method)

                        <div class="box_cardt_details mb-2">

                            <div class="heading_card">
                                <input id="{{$payment_method->name}}" type="radio" {{$key == 0 ? 'checked' :''}}
                                       value="{{$payment_method->name}}" name="group1">
                                <span>{{$payment_method->name}}

                            </span>
                            </div>

                        </div>
                    @endforeach

                    {{--                    <div class="box_cardt_details">--}}
                    {{--                        <div class="heading_card">--}}
                    {{--                            <input id="perfect_money" type="radio"  value="perfect_money" name="group1">--}}
                    {{--                            <span>Perfect Money--}}
                    {{--                                <hr>--}}
                    {{--                            </span>--}}
                    {{--                        </div>--}}

                    {{--                    </div>--}}


                    {{--                    <div class="box_cardt_details">--}}

                    {{--                        <div class="heading_card">--}}
                    {{--                            <input type="checkbox">--}}
                    {{--                            <span>Perfect Money--}}
                    {{--                                <hr>--}}
                    {{--                            </span>--}}

                    {{--                        </div>--}}

                    {{--                        --}}{{-- <div class="card_detail_form">--}}

                    {{--                             <form>--}}

                    {{--                                  <div class="form-row">--}}

                    {{--                                    <div class="col-7">--}}

                    {{--                                       <label for="">card number</label>--}}

                    {{--                                      <input type="text" class="form-control" placeholder="">--}}

                    {{--                                    </div>--}}

                    {{--                                    <div class="col">--}}

                    {{--                                       <label for="">expiry</label>--}}

                    {{--                                      <input type="text" class="form-control" placeholder="">--}}

                    {{--                                    </div>--}}

                    {{--                                    <div class="col">--}}

                    {{--                                       <label for="">cvv</label>--}}

                    {{--                                      <input type="text" class="form-control" placeholder="">--}}

                    {{--                                    </div>--}}

                    {{--                                    <div class="col-6 mt-5 mb-4">--}}

                    {{--                                       <label for="">name of card holder number</label>--}}

                    {{--                                      <input type="text" class="form-control" placeholder="">--}}

                    {{--                                    </div>--}}

                    {{--                                  </div>--}}

                    {{--                                </form>--}}

                    {{--                                   <hr>--}}



                    {{--                                <div class="row">--}}

                    {{--                                  <div class="col-6 form_group">--}}

                    {{--                                       <label for="">street adress</label>--}}

                    {{--                                      <input type="text" class="form-control" placeholder="">--}}

                    {{--                                    </div>--}}

                    {{--                                    <div class="col-6 form_group">--}}

                    {{--                                       <label for="">city </label>--}}

                    {{--                                      <input type="text" class="form-control" placeholder="">--}}

                    {{--                                    </div>--}}

                    {{--                                    <div class="col-6 form_group">--}}

                    {{--                                       <label for="">state / province </label>--}}

                    {{--                                      <input type="text" class="form-control" placeholder="">--}}

                    {{--                                    </div>--}}

                    {{--                                    <div class="col-6 form_group ">--}}

                    {{--                                       <label for="">zip code</label>--}}

                    {{--                                      <input type="text" class="form-control" placeholder="">--}}

                    {{--                                    </div>--}}

                    {{--                                </div>--}}



                    {{--                               <div class="div_bottom">--}}

                    {{--                                 <span><input type="radio"></span> belling address is same as acoount address--}}

                    {{--                               </div>--}}

                    {{--                    </div> --}}


                    {{--                    </div>--}}


                </div>

                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-12">

                    <div class="box_card_pay">

                        <div class="text_pay">
                            you have to pay
                            <div class="price">
                                ${{$subCategory->price}}
                            </div>

                        </div>


                        <div class="img_pay">

                            <img src="{{asset($subCategory->image)}}" alt="" srcset="">

                            <div class="text">

                                {{$subCategory->name}}

                                <br>

                                <span>

      ${{$subCategory->price}}

    </span>

                            </div>

                        </div>


                        <div class="text_align_items">

{{--                            <div class="d-flex  ">--}}

{{--                                <div class="icon">--}}

{{--                                    <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img">--}}

{{--                                </div>--}}

{{--                                <div class="tex_delivery_time">--}}

{{--                                    delivery time--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <div class="d-flex">--}}

{{--                                <div class="icon">--}}

{{--                                    <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img opacity">--}}

{{--                                </div>--}}

{{--                                <div class="tex_delivery_time">--}}

{{--                                    3-pages--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <div class="d-flex">--}}

{{--                                <div class="icon">--}}

{{--                                    <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img opacity">--}}

{{--                                </div>--}}

{{--                                <div class="tex_delivery_time">--}}

{{--                                    Lorem ipsum--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <div class="d-flex">--}}

{{--                                <div class="icon">--}}

{{--                                    <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img ">--}}

{{--                                </div>--}}

{{--                                <div class="tex_delivery_time">--}}

{{--                                    Lorem ipsum dolr smit--}}

{{--                                </div>--}}

{{--                            </div>--}}

                            <div class="anoter">

                                <div class="d_flex ">

                                    <div class="heading">

                                        order amount

                                    </div>

                                    <div class="tex_delivery_time">

                                        ${{$subCategory->price}}

                                    </div>

                                </div>

                                <div class="d_flex ">

                                    <div class="heading">

                                        service free

                                    </div>

                                    <div class="tex_delivery_time">

                                        $0.0

                                    </div>

                                </div>


                                <div class="d_flex bold">

                                    <div class="heading ">

                                        total amount

                                    </div>

                                    <div class="tex_delivery_time">

                                        ${{$subCategory->price}}

                                    </div>

                                </div>

                            </div>

                            <hr>

                            <div class="anothe_secondary">

                                <div class="d_flex ">

                                    <div class="heading">

                                        wallet balance

                                    </div>

                                    <div class="tex_delivery_time">

                                        $0.0

                                    </div>

                                </div>

                                <div class="d_flex ">

                                    <div class="heading">

                                        remaining payment

                                    </div>

                                    <div class="tex_delivery_time">

                                        $0.0

                                    </div>

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

                        </div>

                        <hr>

                        <form action="{{ route('payments.page', encryptstring($subCategory->id))}}" method="GET">
                            <input type="hidden" name="payment_type" id="destinationInput">
                            <button type="submit" class="btn btn-main btn_continue">Continue</button>
                        </form>


                    </div>


                </div>

            </div>


            <!-- row end  </div>   --> </div>

        </div>

    </section>


    </body>





    <script

            src="https://code.jquery.com/jquery-3.5.1.slim.min.js"

            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"

            crossorigin="anonymous"

    ></script>

    <script

            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"

            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"

            crossorigin="anonymous"

    ></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
            crossorigin="anonymous"></script>

    </html>

@endsection



@push('js')
    <script type="text/javascript">

        $(document).ready(function() {
            $('.btn_continue').on('click', function() {
                var radios = document.getElementsByName('group1');

                // Loop through the radio buttons
                for (var i = 0; i < radios.length; i++) {
                    // Check if the radio button is checked
                    if (radios[i].checked) {
                        // If checked, display its value
                        // console.log("Selected Value: " + radios[i].value);
                        // You can use this value as per your requirement
                        // alert("Selected Value: " + radios[i].value);

                        $('#destinationInput').val(radios[i].value);
                        // Break the loop as we found the selected radio button
                        break;
                    }
                }
            });
        });

    </script>
@endpush

