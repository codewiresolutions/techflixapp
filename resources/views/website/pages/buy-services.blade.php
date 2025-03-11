@extends('website.layouts.master')

@push('title')
    Dashboard
@endpush

@section('content')

 <main class="main_buyservices">
    <section class="buy_services">
      @include('admin.layouts.partials.message')
      <div class="heading-main px-2">buy services</div>

      <div class="row bg_row-service nav nav-tabs">
        @if(isset($products))
        @foreach($products as $product)
        <div class="col-sm-4">
         <a href="{{route('product.search',$product->id)}}" class="nav-link ">
          <div class="box_services_border {{ isset($activeCategory) && $product->id == $activeCategory ? 'active' : '' }}">
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
               <div class="box_services_colr first" style="background-color: {{rand_color()}}">
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
<!-- this is again webs hostings things -->
     {{-- <div class="seervicecloun">
          <div class="container">
               <div class="row">
                    <div class="col-sm-4">
                        <a href="">
                          <div class="box_services_border">
                            <div class="icons_services_img">
                              <img src="assets/images/Domain-registration.svg" alt="" class="img" />
                            </div>
                            <div class="text_serives_box">domain registration</div>
                          </div>
                        </a>
                    </div>
                    <div class="col-sm-4">
                  <a href="">
                    <div class="box_services_border">
                      <div class="icons_services_img">
                        <img src="assets/images/payment-gateway-solution.svg" alt="" class="img" />
                      </div>
                      <div class="text_serives_box">
                           payment gateway solution
                      </div>
                    </div>
                  </a>
                    </div>
                    <div class="col-sm-4">
                    <a href="">
                      <div class="box_services_border">
                        <div class="icons_services_img">
                          <img src="assets/images/DIGITAL-MARKETING.svg" alt="" class="img" />
                        </div>
                        <div class="text_serives_box">digital marketing</div>
                      </div>
                    </a>
                    </div>
               </div>
          </div>
      </div> --}}
    </section>
   </main>


   @endsection

@push('js')

@endpush
