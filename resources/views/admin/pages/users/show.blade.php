@extends('admin.layouts.master')

@push('title')
   Order Detail
@endpush

@section('content') 

<style>
  .section_time_line_secondary{
    position: relative;
    padding-bottom: 100px;
  }
  .timeline_fororder {
  position: relative;
  }
  .timeline_fororder .left_col{
  display: flex;
  justify-content: end;
  position: relative;
  }
  .timeline_fororder .right_col{
  display: flex;
  justify-content: flex-start;
  position: relative;
  }
  .timeline_fororder .timeline_messges{
  box-sizing: border-box;
  padding: 0.5rem 1rem;
  margin: 1rem;
  min-height: 2.25rem;
  width: -webkit-fit-content;
  width: -moz-fit-content;
  width: fit-content;
  max-width: 66%;
  box-shadow: 0 0 2rem rgba(0, 0, 0, 0.075), 0rem 1rem 1rem -1rem rgba(0, 0, 0, 0.1);
  }
  .timeline_fororder .left_messages{
  border-radius: 1.125rem 1.125rem 1.125rem 0;
  background: #FFF;
  position: absolute;
  top: 80px;
  }
  .timeline_fororder .right_messages{
  border-radius: 1.125rem 1.125rem 0 1.125rem;
  background: #333;
  color: white;
  }
</style>

  <main >
 
<section class="container_wrapper">


<section class="checkout_section">
    <div class="">
    <div class="">
      <div class="row">
        <div class="col-sm-12 col-xl-2 col-lg-2 col-md-4">
          <div class="box_coloring_bg_checkout">
            <div class="box_card_heading">
              <div class="text_child_head active">Order detail</div>
            </div>
            <hr />
            <div class="box_card_heading">
              <div class="text_child_head active">Submit Requirements</div>
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
                  <th scope="col" class="main_heading_top">Description</th>
                  <th scope="col" class="main_heading_top">Qty</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  
                  <td>
                    <div class="checckout_img_box_table">
                      <img src="https://dummyimage.com/200x100/000/dcdce0&text=table_img" 
                      class="w-sm-25" alt="">
                      <span class="
                      word_wrap_table

                     ">{{$order_deatil->name}}
                       
                        {{-- <button class="btn btn_detail_img_table"> View Detail</button> --}}
                <button class="btn btn_detail_img_table"  data-toggle="modal" data-target="#staticBackdrop">View Detail</button>

                      </span>
                    </div>
                  </td>
                  <td>
                   ${{$order_deatil->price}}
                  </td>
                  <td>
                    {{$order_deatil->description}}
                   </td>
                  <td>
                    <div class="quantity">
                      <button class="btn minus-btn disabled" type="button" onclick="'javscript', document.getElementById('quantity').value--">-</button>
                      <input type="text" id="quantity" value="1">
                      <button class="btn plus-btn" type="button" onclick="'javscript', document.getElementById('quantity').value++">+</button>
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
            <input type="radio">   <span>
              Lorem ipsum dolor sit.
            </span>
            <div class="text_child">
        <div class="wrap_padding">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa autem, dolorum iste id quibusdam officia.
        </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-xl-3 col-lg-3 col-md-12">
          <div class="box_coloring_bg_checkout secondr_option_padding">
            <div class="text_align_card_main">Price Summary</div>
            <div class="box_parent_text">
              <div class="sub_div_text">Subtotal</div>
              <div class="prcie_child">$ {{$order_deatil->price}}</div>
            </div>

            <div class="box_parent_text">
              <div class="sub_div_text">Service Fee</div>
              <div class="prcie_child">$0.00</div>
            </div>
            <div class="box_parent_text">
              <div class="sub_div_text">Total</div>
              <div class="prcie_child">$ {{$order_deatil->price}}</div>
            </div>

            {{-- <div class="box_parent_text">
              <div class="sub_div_text">voucher code</div>
              <div class="prcie_child"></div>
            </div> --}}

            <div class="form_group_checkout row">
             {{-- <div class="col-sm-12 p-sm-0 flex-column justify-content-center">
             <input type="text" class="form_checkout form-control" />
              <button class="btn validate_btn">validate</button>
            </div> --}}
            <button class="btn btn-main btn_continue_chekout">
              continue
            </button>
             </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>



  <section class="section_time_line_secondary">
    <div class="timeline_fororder">
      <div class="row">
         <div class="col-6 ">
          <div class="left_col">
            <div class="left_messages timeline_messges">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius facere id corrupti nostrum voluptas. Quas omnis eaque consequuntur tempora dicta.
           </div>
          </div>
         
         </div>
         <div class="col-6 ">
          <div class="right_col">
            <div class="right_messages timeline_messges">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde iure animi in eius doloremque libero perspiciatis illo, ratione id est?
           </div>
          </div>
            
         </div>
      </div>
    </div>
</section>


</section>
</section> 






<div class="inner_modal view_order_details">
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Order Deatil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
         <div class="modal_upload_file">
          <div>
              <div class="row">
                  <div class="col-sm-12">
                     <div class="form_group_of_profile">
                        <label for="">  Name </label>
                        <div class="input">
                           <input type="text" class="control_field form-control" id="fv-name" name="name"
                                   value="{{ $order_deatil->name }}" readonly>
                        </div>
                     </div>
                  </div>

                  <div class="col-sm-12">
                   <div class="form_group_of_profile">
                      <label for="">  Price </label>
                      <div class="input">
                         <input type="text" class="control_field form-control" id="fv-price" name="price"
                                 value="$ {{ $order_deatil->price }}" readonly>
                      </div>
                   </div>
                </div>


                <div class="col-sm-12">
                  <div class="form_group_of_profile">
                     <label for="">  Description </label>
                     <div class="input">
                        <input type="text" class="control_field form-control" id="fv-price" name="price"
                                value="{{ $order_deatil->description }}" readonly>
                     </div>
                  </div>
               </div>
{{-- 
                <div class="col-sm-12">
                  <div class="form_group_of_profile">
                     <label for="">  Image </label>
                     <div class="input">
                      <img src="{{asset($order_deatil->image)}}" class="w-100 img-fluid" alt="" srcset="">
                     </div>
                  </div>
               </div> --}}
                
               </div>
             </div>

             <button class="btn btn-main w-100 p-2 mt-3 mb-2" class="close" data-dismiss="modal">Close</button>
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
  

 
  </script>
@endpush