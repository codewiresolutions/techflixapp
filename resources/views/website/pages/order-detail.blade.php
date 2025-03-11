@extends('website.layouts.master') @push('title') Dashboard @endpush
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
                    <div class="text_child_head active">Order Detail</div>
                  </div>
                  <hr />
                  <div class="box_card_heading">
                    <div class="text_child_head active">
                      Submit Requirements
                    </div>
                  </div>
                  <hr />
                  <div class="box_card_heading">
                    <div class="text_child_head active">Confirm And Pay</div>
                  </div>
                  <hr />
                </div>
              </div>
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
                            <img
                              src="{{ asset($subCategory->image) }}"
                              class=" img-fluid"
                              alt=""
                              style="width: 100px !important;"
                            />
                            <span class="word_wrap_table"
                              >{{ $subCategory->name }}
                              <button class="btn btn_detail_img_table">
                                view detail
                              </button>
                            </span>
                          </div>
                        </td>
                        <td>${{ $subCategory->price }}</td>
                        <td>
                          <div class="quantity">
                            <button
                              class="btn minus-btn disabled"
                              type="button"
                              onclick="'javscript', document.getElementById('quantity').value--"
                            >
                              -
                            </button>
                            <input type="text" id="quantity" value="1" />
                            <button
                              class="btn plus-btn"
                              type="button"
                              onclick="'javscript', document.getElementById('quantity').value++"
                            >
                              +
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="another_table_txt_bottom">

                  <div class="heading_parent">
                    upgrade your order with lorem ipsum [optional]
                  </div>
                  <input type="radio" /> <span> Lorem ipsum dolor sit. </span>
                  <div class="text_child">
                    <div class="wrap_padding">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Culpa autem, dolorum iste id quibusdam officia.
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-xl-3 col-lg-3 col-md-12">
                <div class="box_coloring_bg_checkout secondr_option_padding">
                  <div class="text_align_card_main">Price summary</div>
                  <div class="box_parent_text">
                    <div class="sub_div_text">Subtotal</div>
                    <div class="prcie_child">${{$subCategory->price}}</div>
                  </div>
                  <div class="box_parent_text">
                    <div class="sub_div_text">Service Fee</div>
                    <div class="prcie_child">$0.0</div>
                  </div>
                  <div class="box_parent_text">
                    <div class="sub_div_text">Total</div>
                    <div class="prcie_child">${{$subCategory->price}}</div>
                  </div>
                  {{--
                  <div class="box_parent_text">
                    <div class="sub_div_text">Voucher code</div>
                    <div class="prcie_child"></div>
                  </div>
                  --}} {{--
                  <div class="form_group_checkout row">
                    <div
                      class="col-sm-12 p-sm-0 flex-column justify-content-center"
                    >
                      <input type="text" class="form_checkout form-control" />
                      <button class="btn validate_btn">Validate</button>
                    </div>
                    --}}
                    <a
                      href="{{ route('upload_file.page',encryptstring($subCategory->id)) }}"
                      class="btn btn-main btn_continue_chekout"
                      >Continue</a
                    >
                    {{--
                  </div>
                  --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
    {{--
    <section class="section_time_line_secondary">
      <div class="container">
        <div class="timeline">
          <div class="timeline-container primary">
            <div class="timeline-icon">
              <i class="far fa-grin-wink"></i>
            </div>
            <div class="timeline-body">
              <h4 class="timeline-title"><span class="badge">Primary</span></h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aliquam necessitatibus numquam earum ipsa fugiat veniam
                suscipit, officiis repudiandae, eum recusandae neque
                dignissimos. Cum fugit laboriosam culpa, repellendus esse
                commodi deserunt.
              </p>
              <p class="timeline-subtitle">1 Hours Ago</p>
            </div>
          </div>
          <div class="timeline-container danger">
            <div class="timeline-icon">
              <i class="far fa-grin-hearts"></i>
            </div>
            <div class="timeline-body">
              <h4 class="timeline-title"><span class="badge">Danger</span></h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aliquam necessitatibus numquam earum ipsa fugiat veniam
                suscipit, officiis repudiandae, eum recusandae neque
                dignissimos. Cum fugit laboriosam culpa, repellendus esse
                commodi deserunt.
              </p>
              <p class="timeline-subtitle">2 Hours Ago</p>
            </div>
          </div>
          <div class="timeline-container success">
            <div class="timeline-icon">
              <i class="far fa-grin-tears"></i>
            </div>
            <div class="timeline-body">
              <h4 class="timeline-title"><span class="badge">Success</span></h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aliquam necessitatibus numquam earum ipsa fugiat veniam
                suscipit, officiis repudiandae, eum recusandae neque
                dignissimos. Cum fugit laboriosam culpa, repellendus esse
                commodi deserunt.
              </p>
              <p class="timeline-subtitle">6 Hours Ago</p>
            </div>
          </div>
          <div class="timeline-container warning">
            <div class="timeline-icon">
              <i class="far fa-grimace"></i>
            </div>
            <div class="timeline-body">
              <h4 class="timeline-title"><span class="badge">Warning</span></h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aliquam necessitatibus numquam earum ipsa fugiat veniam
                suscipit, officiis repudiandae, eum recusandae neque
                dignissimos. Cum fugit laboriosam culpa, repellendus esse
                commodi deserunt.
              </p>
              <p class="timeline-subtitle">1 Day Ago</p>
            </div>
          </div>
          <div class="timeline-container">
            <div class="timeline-icon">
              <i class="far fa-grin-beam-sweat"></i>
            </div>
            <div class="timeline-body">
              <h4 class="timeline-title">
                <span class="badge">Secondary</span>
              </h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aliquam necessitatibus numquam earum ipsa fugiat veniam
                suscipit, officiis repudiandae, eum recusandae neque
                dignissimos. Cum fugit laboriosam culpa, repellendus esse
                commodi deserunt.
              </p>
              <p class="timeline-subtitle">3 Days Ago</p>
            </div>
          </div>
          <div class="timeline-container info">
            <div class="timeline-icon">
              <i class="far fa-grin"></i>
            </div>
            <div class="timeline-body">
              <h4 class="timeline-title"><span class="badge">Info</span></h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aliquam necessitatibus numquam earum ipsa fugiat veniam
                suscipit, officiis repudiandae, eum recusandae neque
                dignissimos. Cum fugit laboriosam culpa, repellendus esse
                commodi deserunt.
              </p>
              <p class="timeline-subtitle">4 Days Ago</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    --}}
  </section>
</main>

@endsection @push('js') @endpush
