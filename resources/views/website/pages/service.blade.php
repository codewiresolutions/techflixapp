@extends('website.layouts.master')

@push('title')
    Dashboard
@endpush

@section('content')
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>services</title>
    <meta property="og:title" content="New order" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.apanel.link/custom-data/fs2/fonts3.css"
    />
    <meta charset="utf-8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta property="og:description" content="" />


    <link rel="dns-prefetch" href="//cdn.apanel.link" />
    <link
      href="https://cdn.apanel.link/main/css/global.main.v22.17.04.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- thisn is lick  -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>

  </head>
  <body>
    <main>
      <section class="section_services">
        <div class="container">
          <div class="">
            <div class="">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
              </div
          </div>

          {{-- <div class="">
            <div class="services_btn_box">
              <div class=" row ">
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                  <div class="btn_box">
                    <button class="btn btn_services active">graphic design</button>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                  <div class="btn_box">
                    <button class="btn btn_services">website design</button>
                  </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                  <div class="btn_box">
                    <button class="btn btn_services">domain design</button>
                  </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                  <div class="btn_box">
                    <button class="btn btn_services">digital design</button>
                  </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                  <div class="btn_box">
                    <button class="btn btn_services">
                      payemnt gateway solutions
                    </button>
                  </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                  <div class="btn_box">
                    <button class="btn btn_services">web hosting</button>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}


{{-- <div class="">
  <div class="row">
  <div class="box_border">
    <ul class="services_nav">
      <li class="nav-item">
        <a href="#" class="nav-link">
          overview
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          description
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          lorem ipsum
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          lorem ipsum
        </a>
      </li>
    </ul>
  </div>
  </div>
</div> --}}

<div class="box_img_carousel">
  <div class="row">
    <div class="col-md-6 p-sm-0">
  <ul class="navs_box_img">
    <li class="nav-item">
      <a href="#" class="nav-link">
        graphic designing  >
      </a>

    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        logo design
      </a>

    </li>
  </ul>
  <div class="text_heading_bx_img">
    {{ $subCategory->name }}
  </div>
  <div class="img_carousel_inner">
    <div class="main">
      <div class="slider slider-for">
        <div>
          <div class="img_services">
            <img src="{{ asset($subCategory->image) }}" alt="" class="w-100 img-fluid img">
          </div>
        </div>
        <div>
          <div class="img_services">
            <img src="https://dummyimage.com/600x400/000/fff&text=carousel_img-2" alt="" class="w-100 img-fluid img">
          </div>
        </div>
        <div>
          <div class="img_services">
            <img src="{{ asset($subCategory->image) }}" alt="" class="w-100 img-fluid img">
          </div>
        </div>
        <div>
          <div class="img_services">
            <img src="https://dummyimage.com/600x400/000/fff&text=carousel_img-4" alt="" class="w-100 img-fluid img">
          </div>
        </div>
        <div>
          <div class="img_services">
            <img src="https://dummyimage.com/600x400/000/fff&text=carousel_img-5" alt="" class="w-100 img-fluid img">
          </div>
        </div>
      </div>

      <div class="slider slider-nav">
        <div>
          <div class="img_services">
            <img src="{{ asset($subCategory->image) }}" alt="" class="w-100 img-fluid img">
          </div>
        </div>
        <div>
          <div class="img_services">
            <img src=" https://dummyimage.com/300x200/000/fff&text=carousel_img-2" alt="" class="w-100 img-fluid img">
          </div>
        </div>
        <div>
          <div class="img_services">
            <img src="{{ asset($subCategory->image) }}" alt="" class="w-100 img-fluid img">
          </div>
        </div>
        <div>
          <div class="img_services">
            <img src=" https://dummyimage.com/300x200/000/fff&text=carousel_img-4" alt="" class="w-100 img-fluid img">
          </div>
        </div>
        <div>
          <div class="img_services">
            <img src=" https://dummyimage.com/300x200/000/fff&text=carousel_img-5" alt="" class="w-100 img-fluid img">
          </div>
        </div>
      </div>

    </div>
    </div>
    {{-- <div class="box_rating">
      <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="color_text"> 4.5 (29)</span>
    </div> --}}
    <div class="description_slick">
      <div class="main_heading">
        description
      </div>
      <div class="text_child row">
<div class="col-sm-12 p-sm-0">
  {{$subCategory->description }}
</div>
      </div>
    </div>

  </div>
  <div class="col-sm-2"></div>
<div class="col-md-4 p-sm-0">
  <div class="services_box_nav">

    <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
      @if(isset($sub_category_detail))
      @foreach($sub_category_detail as $product)
      <li class="nav-item" role="presentation">
        <a class="nav-link active btn-sub-cat-details" data-id="{{ $product->id }}" id="basic-tab" data-toggle="tab" role="tab" aria-controls="basic" aria-selected="true" >{{$product->type}}</a>
      </li>
      @endforeach
      @endif

{{--
      <li class="nav-item" role="presentation">
        <a class="nav-link"  id="standard-tab" data-toggle="tab" href="#standard" role="tab" aria-controls="standard" aria-selected="false">Standard</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="premium-tab" data-toggle="tab" href="#premium" role="tab" aria-controls="premium" aria-selected="false">Premium</a>
      </li> --}}
    </ul>



    <div class="tab-content">
      <div class="tab-pane active" id="basic" role="tabpanel" aria-labelledby="basic-tab">

        <div class="text_inside_box">
          <div class="text_first">
            <!-- {{ $subCategory->name }} -->
          </div>
          <div class="tex_sec price">
            <!-- ${{ $subCategory->price }} -->
          </div>
          <div class="tex_third_smal description">
            <!-- {{ $subCategory->description }} -->
          </div>


          <div class="text_align_items">
            <div class="d-flex  ">
              <div class="icon">
                <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img">
               </div>
               <div class="tex_delivery_time delivery_time">
                  delivery time  -  {{$sub_category_detail[0]->delivery_time}}
               </div>
            </div>
           <div class="d-flex">
            <div class="icon">
              <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img opacity-25">
            </div>
            <div class="tex_delivery_time pages">
                {{$sub_category_detail[0]->pages}}
            </div>
           </div>
            <div class="d-flex">
              <div class="icon">
                <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img opacity-25">
              </div>
              <div class="tex_delivery_time sub_details">
                  Type -    {{$sub_category_detail[0]->type}}
              </div>
            </div>


            <!-- <div class="d-flex ">
              <div class="icon">
                <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img">
              </div>
              <div class="tex_delivery_time">
                Lorem ipsum dolor sit.
              </div>
            </div> -->
          </div>

          <div class="btn_box">
            <a href="{{ route('order_detail.page',encryptstring($subCategory->id)) }}" class="btn btn-main btn_services">continue</a>
          </div>
        </div>

      </div>




      <div class="tab-pane" id="standard" role="tabpanel" aria-labelledby="standard-tab">  <div class="text_inside_box">
        <div class="text_first">
          {{ $subCategory->name }}
        </div>
        <div class="tex_sec">
          ${{ $subCategory->price }}
        </div>
        <div class="tex_third_smal">
          {{ $subCategory->description }}
        </div>

        <div class="text_align_items">
          <div class="d-flex  ">
            <div class="icon">
              <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img">
             </div>
             <div class="tex_delivery_time">
               delivery time
             </div>
          </div>
         <div class="d-flex">
          <div class="icon">
            <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img opacity-25">
          </div>
          <div class="tex_delivery_time">
            3-pages
          </div>
         </div>
          <div class="d-flex">
            <div class="icon">
              <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img opacity-25">
            </div>
            <div class="tex_delivery_time">
             Lorem ipsum
            </div>
          </div>
          <div class="d-flex ">
            <div class="icon">
              <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img">
            </div>
            <div class="tex_delivery_time">
              Lorem ipsum dolor sit.
            </div>
          </div>
        </div>

        <div class="btn_box">
          <a href="{{ route('order_detail.page',encryptstring($subCategory->id)) }}" class="btn btn-main btn_services">continue</a>
        </div>
      </div>
    </div>

      <div class="tab-pane" id="premium" role="tabpanel" aria-labelledby="premium-tab">  <div class="text_inside_box">
        <div class="text_first">
          {{ $subCategory->name }}
        </div>
        <div class="tex_sec">
          ${{ $subCategory->price }}
        </div>
        <div class="tex_third_smal">
          {{ $subCategory->description }}
        </div>

        <div class="text_align_items">
          <div class="d-flex  ">
            <div class="icon">
              <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img">
             </div>
             <div class="tex_delivery_time">
               delivery time
             </div>
          </div>
         <div class="d-flex">
          <div class="icon">
            <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img opacity-25">
          </div>
          <div class="tex_delivery_time">
            3-pages
          </div>
         </div>
          <div class="d-flex">
            <div class="icon">
              <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img opacity-25">
            </div>
            <div class="tex_delivery_time">
             Lorem ipsum
            </div>
          </div>
          <div class="d-flex ">
            <div class="icon">
              <img src="{{asset('assets/images/clock.png')}}" alt="img" class="img">
            </div>
            <div class="tex_delivery_time">
              Lorem ipsum dolor sit.
            </div>
          </div>
        </div>

        <div class="btn_box">
          <a href="{{ route('order_detail.page',encryptstring($subCategory->id)) }}" class="btn btn-main btn_services">continue</a>
        </div>
      </div>
    </div>

    </div>

  </div>
</div>

</div>

<div class="main-img_lenght">
  <div class=" main-text">
    related services
  </div>
  <div class="row">
    <div class="col-sm-3 pr-sm-0">
      <div class="img_box">
        <div class="img-div">
          <img src="https://dummyimage.com/300x150/000/ffffff&text=related_imges" alt="" srcset="" class="w-100 img-fluid">
        </div>
        <div class="text_img">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, vel?
          <div class="text-float">
            $50
          </div>
        </div>
      </div>

    </div>
    <div class="col-sm-3 ">
      <div class="img_box">
        <div class="img-div">
          <img src="https://dummyimage.com/300x150/000/ffffff&text=related_imges" alt="" srcset="" class="w-100 img-fluid">
        </div>
        <div class="text_img">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, vel?
          <div class="text-float">
            $50
          </div>
        </div>
      </div>

    </div>
    <div class="col-sm-3 ">
      <div class="img_box">
        <div class="img-div">
          <img src="https://dummyimage.com/300x150/000/ffffff&text=related_imges" alt="" srcset="" class="w-100 img-fluid">
        </div>
        <div class="text_img">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, vel?
          <div class="text-float">
            $50
          </div>
        </div>
      </div>

    </div>
    <div class="col-sm-3 pr-sm-0">
      <div class="img_box">
        <div class="img-div">
          <img src="https://dummyimage.com/300x150/000/ffffff&text=related_imges" alt="" srcset="" class="w-100 img-fluid">
        </div>
        <div class="text_img">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, vel?
          <div class="text-float">
            $50
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
        </div>



      </section>
    </main>

  </body>
  <script>
 $('.slider-for').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: false,
   fade: true,
   asNavFor: '.slider-nav'
 });
 $('.slider-nav').slick({
   slidesToShow: 3,
   slidesToScroll: 1,
   asNavFor: '.slider-for',
   dots: false,
   focusOnSelect: true
 });

 $('a[data-slide]').click(function(e) {
   e.preventDefault();
   var slideno = $(this).data('slide');
   $('.slider-nav').slick('slickGoTo', slideno - 1);
 });



  $('#closemodal').click(function() {
    $('#staticBackdrop').modal('hide');
});


$(document).ready(function() {
    $('.btn-sub-cat-details').on('click',function(){
      var id = $(this).data('id');
      var url = '{{url("sub_category_detail_search")}}' + '/' + id;
      $.ajax({
      type: 'GET',
      url: url,
      cache: false,
      success: function(html){
        console.log('here it is');
        console.log(html);
        $('.delivery_time').html(html.delivery_time);
        $('.description').html(html.description);
        $('.pages').html(html.pages);
        $('.price').html(html.price);
        $('.sub_details').html(html.sub_details);
      }
    });
    })
  })

  </script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


  <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
    crossorigin="anonymous"
  ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>

</html>


@endsection

@push('js')

<script>

</script>

@endpush
