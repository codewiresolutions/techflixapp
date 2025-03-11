@extends('website.layouts.master')

@push('title')
    Home
@endpush

@section('content')

<main class="main_homepage">

     <section class="dashbord_bg_img">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <img src="{{ asset('assets/images/sucessfulman.webp') }}" />
          <div class="carousel-item active">
              <div class="container">
                <div class="row">
                  <div class="">

                  <div class="main_bg_text_box">
                 <div class="quotes">
                  ""
                 </div>
                    explore your <span class="span_color">deals</span>
                    <div class="">
                      achieve your dreams
                      <div class="quotes2">
                        ""
                       </div>
                    </div>
                  </div>

                </div>
                  </div>
                </div>
              </div>
          </div>

        </div>
      </div>
     </section>


     <section class="dash_services">
      <div class="container_flex ">
<div class="row">
  <div class="col-sm-12">
    <div class="img_banner">

      <img src="{{ asset('assets/images/Banner.png') }}" alt="" class="banner_child_img">
      <div class="text_banner_img">
      <p>  services</p>
        <div class="we_offer_text">
          we offer
          </div>
      </div>
    </div>
  </div>

</div>
      </div>
           </section>

            <section class="buy_services" style="margin: 0px !important;">

              <div class="row bg_row-service nav nav-tabs">
                @if(isset($products))
                @foreach($products as $product)
                <div class="col-sm-4">
                 <a href="{{route('product.search',$product->id)}}" class="nav-link active">
                  <div class="box_services_border active">
                    <div class="icons_services_img">
                      <i class="{{$product->url}}"></i>
                      <img src="" alt="" class="img" />
                    </div>
                    <div class="text_serives_box">{{$product->name}}</div>
                  </div>
                 </a>
                </div>
                @endforeach
                @endif
              </div>


            <div class="container">
             <div class="margin_contain">
               <div class="row targetting_child">
                @if(isset($subCategory))
                @foreach($subCategory as $subcat)
                  <button class="btn bt_editing">
                       <div class="box_services_colr first">
                         <div class="content_service">
                          <a href="{{ route('service.page',encryptstring($subcat->id)) }}"><img src="{{ asset($subcat->image) }}" alt=""></a>
                         </div>
                         <div class="text_blog">{{$subcat->name}}</div>
                       </div>
                     </button>
                     @endforeach
                     @endif
               </div>
             </div>
           </div>

            </section>

     <section class="slider_services text-center">
      <div class="container">
        <div class="heading_main">
          our clients
        </div>
      </div>
     </section>
    <section id="section_slider"  class="container ">
      <div class="your  ">
        <div >
          <div class="slider_images">
            <figure>
              <img src="https://dummyimage.com/200x100/000/fff&text=logo" alt="" class="">
            </figure>
          </div>
        </div>
        <div><div class="slider_images">
          <figure>
            <img src="https://dummyimage.com/200x100/000/fff&text=logo" class="" alt="">
          </figure>
        </div></div>
        <div><div class="slider_images">
          <figure>
            <img src="https://dummyimage.com/200x100/000/fff&text=logo" class="" alt="">
          </figure>
        </div></div>
        <div><div class="slider_images">
          <figure>
            <img src="https://dummyimage.com/200x100/000/fff&text=logo" class="" alt="">
          </figure>
        </div></div>
        <div><div class="slider_images">
          <figure>
            <img src="https://dummyimage.com/200x100/000/fff&text=logo" class="" alt="">
          </figure>
        </div></div>
        <div><div class="slider_images">
          <figure>
            <img src="https://dummyimage.com/200x100/000/fff&text=logo" class="" alt="">
          </figure>
        </div></div>
      </div>
    </section>

    <section class="section_client_reviews">
      <div class="special_container">
        <div class="row">
          <div class="col-sm-4">
        <div class="client_reviews">
          what our
          <br>
          client
          <br>
          say?
        </div>
          </div>
          <div class="col-sm-8 full_width_col">

<div class="white_client_box">
  <div class="quotes">
    <img srcset="https://img.icons8.com/sf-regular-filled/2x/quote-left.png 2x" alt="Quote Left icon" loading="lazy" style="filter: invert(0%) sepia(1%) saturate(5%) hue-rotate(304deg) brightness(97%) contrast(103%);">
  </div>
<div class="box_align_text">
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam suscipit, iusto sint sed, sit nam beatae quam quidem illo maxime quaerat temporibus non. Maiores adipisci consequuntur rem cumque veniam a!
</div>

<div class="slider_small_box">
<div class="little_slider">
  <div>
    <div class="card_avtar">
      <div class="avtar">
<img src="https://dummyimage.com/50x50/000/fff" class=" rounded-circle avtar_img" alt="">
      </div>
      <div class="avtar_text">
      <p>  sarah fernandez</p>
      <span class="title_job">
        team lead @ fingly
       </span>
      </div>
    </div>
  </div>
  <div>

    <div class="card_avtar">
      <div class="avtar">
<img src="https://dummyimage.com/50x50/000/fff" class=" rounded-circle avtar_img" alt="">
      </div>
      <div class="avtar_text">
        <p>  sarah fernandez</p>
        <span class="title_job">
          team lead @ fingly
         </span>
      </div>
    </div>
  </div>
  <div> <div class="card_avtar">
    <div class="avtar">
<img src="https://dummyimage.com/50x50/000/fff" class=" rounded-circle avtar_img" alt="">
    </div>
    <div class="avtar_text">
      <p>  sarah fernandez</p>
      <span class="title_job">
        team lead @ fingly
       </span>
    </div>
  </div></div>
  <div>
    <div class="card_avtar">
      <div class="avtar">
<img src="https://dummyimage.com/50x50/000/fff" class=" rounded-circle avtar_img" alt="">
      </div>
      <div class="avtar_text">
        <p>  sarah fernandez</p>
        <span class="title_job">
         team lead @ fingly
        </span>
      </div>
    </div>
  </div>

</div>
</div>
</div>
          </div>
        </div>
      </div>
    </section>
</main>


@endsection

@push('js')
<script>
    var successMessage = "{{ session('success') }}";
    if (successMessage) {
        alert(successMessage);

    }
</script>
@endpush
