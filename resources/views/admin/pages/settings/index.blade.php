@extends('admin.layouts.master')

@push('title')
    Setting
@endpush

@section('content')
<main>
  <section class="manage_order_section">

  <div class=" container_wrapper">
<h5 class="text-heading">Manage Settings</h5>

    <div class="row">
      <div class="w-100">
        <div class="table_section smal_device_margin_padding">
          <tr class="nav_table_row">
          @include('admin.layouts.partials.message')
            <div class="to_nav_table">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-link active" id="nav-active-tab" data-toggle="tab" href="#nav-active" role="tab" aria-controls="nav-active" aria-selected="true">Acount</a>
                  <a class="nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false">Password</a>
                  {{-- <a class="nav-link" id="nav-payment-tab" data-toggle="tab" href="#nav-payment" role="tab" aria-controls="nav-payment" aria-selected="false">Pyayments Methods</a> --}}
                  <a class="nav-link" id="nav-payment-listing-tab" data-toggle="tab" href="#nav-payment-listing" role="tab" aria-controls="nav-payment-listing" aria-selected="false">Payments Methods</a>
                </div>
              </nav>
            </div>
            </tr>
            <div class="tab-content" id="nav-tabContent">

              <div class="tab-pane fade show active" id="nav-active" role="tabpanel" aria-labelledby="nav-active-tab">  <div class="table_box">
                <div class="text_center">

               <div class="card-body">
                <form id="createCategory" method="POST" action="{{ route('admin.settings.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row form_spacing_setting">

                  <div class="col-sm-6">
                    <div class="box_form_setting">
                      <div class="form_group_setting">
                        <label for="">First Name</label>
                        <br />
                        <input type="text" name="first_name" required class="form-control" value="@if (!empty( auth()->user()->first_name)){{auth()->user()->first_name}} @endif" />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="box_form_setting">
                      <div class="form_group_setting">
                        <label for="">Last Name</label>
                        <br />
                        <input type="text" name="last_name" required class="form-control" value="@if (!empty( auth()->user()->last_name)){{auth()->user()->last_name}} @endif" />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="box_form_setting">
                      <div class="form_group_setting">
                        <label for="">Email</label>
                        <br />
                        <input
                          type="email"
                          class="control_field form-control"
                          placeholder="xyz@design.com" required name="email" value="@if (!empty( auth()->user()->email)){{auth()->user()->email}} @endif"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="box_form_setting">
                      <div class="form_group_setting">
                        <label for="">Conatct Number</label>
                        <br />
                        <input
                          type="number"
                          class="control_field form-control"
                          placeholder="Enter Phone Number" required name="phone_number" value="@if (!empty( auth()->user()->phone_number)){{auth()->user()->phone_number}} @endif"
                        />
                      </div>
                    </div>
                  </div>


                  <div class="col-sm-6">
                    <div class="box_form_setting">
                      <div class="form_group_setting">
                        <label for="">Bio</label>
                        <br />
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter here..." name="description" value="@if (!empty( auth()->user()->description)){{auth()->user()->description}} @endif"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-8">
                    <div class="box_form_setting">
                    </div>
                    <div class="setting_frm_btn">
                      <button type="submit" class="btn btn-main mt-4 ml-2 btn_setting submit">Update</button>
                    </div>
                  </div>

                </div>
            </form>
               </div>

                </div>
             </div>
          </div>

              <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">


               <div class="card-body">
                <form method="post" action="{{ route('admin.password.update') }}">
                  @csrf
                  <div class="row form_spacing_setting">
                      <div class="col-sm-6">
                          <div class="box_form_setting">
                              <div class="form_group_setting">
                                  <label for="">Old-Password</label>
                                  <br />
                                  <input type="password" name="old_password" class="form-control" placeholder="old password"  />
                              </div>
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="box_form_setting">
                              <div class="form_group_setting">
                                  <label for="">New Password</label>
                                  <br />
                                  <input type="password" name="new_password" class="form-control" placeholder="new password"  />
                              </div>
                          </div>
                      </div>

                      <div class="setting_frm_btn">
                          <button type="submit" class="btn btn-main mt-4 ml-2 btn_setting submit">Update</button>
                      </div>
                  </div>
              </form>
               </div>

              </div>

              <div class="tab-pane fade" id="nav-payment-listing" role="tabpanel" aria-labelledby="nav-payment-listing-tab">
                <button class="btn btn-main btn-congs"  data-toggle="modal" data-target="#staticBackdrop">Add Method</button>

                <div class="row form_spacing_setting">

              <div class="card-body">
                <table class="table" id="example">
                  <thead>
                    <tr>
                      <th scope="col" class="main_heading_top">ID</th>
                      <th scope="col" class="main_heading_top">Payment Method</th>
                      <th scope="col" class="main_heading_top">Name</th>
                      <th scope="col" class="main_heading_top">Status</th>
                      <th scope="col" class="main_heading_top">Action</th>

                    </tr>
                  </thead>
                  <tbody>

                    @if (!empty($paymentMethods ) && count($paymentMethods ) > 0)
                    @foreach ($paymentMethods  as $key => $paymentMethod)
                    <tr>
                      <td> {{$paymentMethod->id}}</td>
                      <td>{{$paymentMethod->payment_method}}</td>
                      <td>{{ $paymentMethod->name }}</td>
                      @if ($paymentMethod->status == 1)
                      <td>Active</td>
                  @else
                      <td>InActive</td>
                  @endif

                  <td>
                    <div class="d_flexs_table">
                     <a class="btn btn_secondary" href="{{ route('admin.PaymentMethod.edit',$paymentMethod->id)}}">
                       <i class="fa-solid fa-pen-to-square"></i>
                     </a>
                       <form action="{{ route('admin.PaymentMethod.destroy', $paymentMethod->id) }}" method="POST">
                         @csrf
                         @method('delete')
                         <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                     </form>
                    </div>
                 </td>

                  </tr>
                    @endforeach
                    @endif


                  </tbody>
                </table>
              </div>

              </div>


            </div>
        </div>
      </div>
    </div>
  </div>

  </section>


  <div class="inner_modal">
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add Method</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           <div class="modal_upload_file">
            <div>
                <div class="row">
                  <form id="paymentmethodform" method="post" action="{{ route('admin.PaymentMethod.store') }}">
                    @csrf
                    <div class="row form_spacing_setting">

                      <div class="col-sm-6">
                      <label for="payment_method">Payment Method</label>
                      <select id="payment" name="payment_method">
                        <option value="Perfect Money">Perfect Money</option>
                        <option value="Binance Pay">Binance Pay</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Stripe">Stripe</option>
                        <option value="Amar Pay">Amar Pay</option>
                      </select>
                    </div>


                    {{-- <select value="" class="form-control custom-select" id="selected_money" >
    @foreach($payment_method_lists as $payment_method_list)name
       <option value="{{ $payment_method_list->name}}" >{{ $payment_method_list->name}}</option>
    @endforeach
    </select>
    @if ($errors->first('payment_method_lists_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('payment_method_lists_id') }}</strong>
        </span>
    @endif --}}

                        <div class="col-sm-6">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for="">NAME</label>
                            <br />
                            <input type="text" name="name"  placeholder="Enter here..."  class="form-control" value="{{old('name')}}" />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6 perfectmoney-fields">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for="">PM ACCOUNT ID</label>
                            <br />
                            <input type="text" name="pm_account_id"  placeholder="Enter here..."  class="form-control" value="{{old('pm_account_id')}}" />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6 perfectmoney-fields">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for="">PM PASSPHRASE</label>
                            <br />
                            <input type="text" name="pm_passphrase"  placeholder="Enter here..."  class="form-control" value="{{old('pm_passphrase')}}" />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6 paypal-fields">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for="">PAYPAL SANDBOX CLIENT ID</label>
                            <br />
                            <input
                              type="text"
                              class="control_field form-control"
                              placeholder="Enter here..."  name="paypal_sandbox_client_id" value="{{old('paypal_sandbox_client_id')}}"
                            />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6 paypal-fields">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for="">PAYPAL SANDBOX CLIENT SECRET</label>
                            <br />
                            <input
                              type="text"
                              class="control_field form-control"
                              placeholder="Enter here.."  name="paypal_sandbox_client_secret" value="{{old('paypal_sandbox_client_secret')}}"
                            />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6 stripe-fields">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for="">Secret key</label>
                            <br />
                            <input
                              type="text"
                              class="control_field form-control"
                              placeholder="Enter here.."  name="secret_key" value="{{old('secret_key')}}"
                            />
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-6 stripe-fields">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for="">STRIPE SECRET</label>
                            <br />
                            <input
                              type="text"
                              class="control_field form-control"
                              placeholder="Enter here.."  name="stripe_secret" value="{{old('stripe_secret')}}"
                            />
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-6 aamarpay-fields">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for="">AAMARPAY SANDBOX </label>
                            <br />
                            <input
                              type="text"
                              class="control_field form-control"
                              placeholder="Enter here.."  name="aamarpay_sandbox" value="{{old('aamarpay_sandbox')}}"
                            />
                          </div>
                        </div>
                      </div>



                      <div class="col-sm-6 aamarpay-fields">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for="">AAMARPAY KEY </label>
                            <br />
                            <input
                              type="text"
                              class="control_field form-control"
                              placeholder="Enter here.."  name="aamarpay_key" value="{{old('aamarpay_key')}}"
                            />
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-6 aamarpay-fields">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for=""> AAMARPAY STORE ID  </label>
                            <br />
                            <input
                              type="text"
                              class="control_field form-control"
                              placeholder="Enter here.."  name="aamarpay_store_id" value="{{old('aamarpay_store_id')}}"
                            />
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="box_form_setting">
                          <div class="form_group_setting">
                            <label for="sub_category_id">Status</label>
                            <select name="status" id="status" class="custom-select">
                              <option value="1">Active</option>
                              <option value="0">InActive</option>
                            </select>
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-12">
                        <div class="form_group_of_profile">
                            <label for="sub_category_id">Display Order</label>
                            <div class="input">
                                <input type="number" class="control_field form-control" id="fv-display_order"
                                        name="display_order" value="" placeholder="Type here...">
                             </div>
                        </div>
                     </div>

                      <div class="col-sm-8">
                        <div class="box_form_setting">
                        </div>
                        <div class="setting_frm_btn">
                          <button type="submit" class="btn btn-main mt-4 ml-2 btn_setting submit">Save</button>
                          <button class="btn btn-main mt-4 ml-2" class="close" data-dismiss="modal">Cancel</button>

                        </div>
                      </div>


                    </div>
                </form>




                 </div>
               </div>

           </div>
            </div>

          </div>
        </div>
      </div>
 </div>


  </main>

@endsection

@push('js')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$("#payment").on("change",function(){
   let val=$(this).val();
   console.log(val);
   if(val=="Paypal"){
      $('.paypal-fields').show();
      $('.perfectmoney-fields, .stripe-fields, .aamarpay-fields').hide();
   }else if(val=="Perfect Money"){
      $('.perfectmoney-fields').show();
      $('.paypal-fields, .stripe-fields, .aamarpay-fields').hide();
   }else if(val=="Stripe" || val=="Binance Pay"){
      $('.stripe-fields').show();
      $('.perfectmoney-fields, .paypal-fields, .aamarpay-fields').hide();
   }else if(val=="Amar Pay"){
      $('.aamarpay-fields').show();
      $('.perfectmoney-fields, .paypal-fields, .stripe-fields').hide();
   }else{
      console.log("error");
   }
});




    // $(function () {
    //     $('#paymentmethodform').submit(function () {
    //         var additionalParameters = $('#additional_parameters').val();
    //         try {
    //             JSON.parse(additionalParameters);
    //         } catch (e) {
    //             alert('Additional Parameters must be a valid JSON string.');
    //             return false;
    //         }
    //     });
    // });
</script>


@endpush


