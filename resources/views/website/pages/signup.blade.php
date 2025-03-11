@extends('website.layouts.master')

@push('title')
Sign Up
@endpush

@section('content')

    <style>
      .sign_up_section .panel-body{
      display: flex;
      justify-content: center;
      flex-direction: column;
      }
      .sign_up_section .form_group_signip {
      margin-top: 20px;
      }
      .sign_up_section .form_group_signip label {
      font-weight: 500;
      text-transform: capitalize;
      font-size: 18px;
      float: left !important;
      }
      .sign_up_section  .sucessfull{
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      }
      .sign_up_section  .sucessfull .img{
      width: 50px;
      margin: auto;
      padding:20px 0px;
      }
      .modal-content  .btn_close_modal{
      display: flex;
      justify-content: end;
      padding: 10px;
      }
      .modal-content  .btn_close_modal:focus{
      outline: none;
      border: none;
      box-shadow: none;
      }
      .panel-body img{
        height:50px;
      }
    </style>

    <main>
      <section class="sign_up_section">
        <div class="container">
          <div class="row">
            <!-- Modal -->
            <!-- <div class="modal fade" id="signupmoadl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">
                      sign up
                    </h5>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="stepwizard">
                        <div class="stepwizard-row setup-panel d-none">
                          <div class="stepwizard-step col-xs-3 d-none">
                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                            <p><small>Shipper</small></p>
                          </div>
                          <div class="stepwizard-step col-xs-3">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p><small>Destination</small></p>
                          </div>
                          <div class="stepwizard-step col-xs-3">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p><small>Schedule</small></p>
                          </div>
                          <div class="stepwizard-step col-xs-3">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                            <p><small>Cargo</small></p>
                          </div>
                        </div>
                      </div>
                      <form role="form">
                        {{-- <div class="panel panel-primary setup-content" id="step-1">
                          <div class="container">
                            <div class="
                              contec_with_box fb">
                              <div class="icon_social">
                                <i class="fa-brands fa-facebook"></i>
                              </div>
                              <div class="heading_text">
                                <a href="#">
                                continue with facebook
                                </a>
                              </div>
                            </div>
                            <div class="
                              contec_with_box ">
                              <div class="icon_social">
                                <i class="fa-brands fa-google"></i>
                              </div>
                              <div class="heading_text-sec">
                                <a href="#">
                                continue with google
                                </a>
                              </div>
                            </div>
                            <div class="
                              contec_with_box">
                              <div class="icon_social">
                                <i class="fa-brands fa-apple"></i>
                              </div>
                              <div class="heading_text-sec">
                                <a href="#">
                                continue with apple
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="text-center text_maring_bottom">
                            or
                          </div>
                        </div> --}}
                        <div class="panel panel-primary setup-content" id="step-2">
                          <div class="panel-body">
                            <div class="form-group form_group_signip">
                              <label class="control-label">retype password</label>
                              <input maxlength="200" type="text" required="required" class="form-control form_sognup_contron" placeholder="" />
                            </div>
                            <div class="form-group form_group_signip">
                              <label class="control-label ">first name</label>
                              <input maxlength="200" type="text" required="required" class="form-control form_sognup_contron" placeholder="" />
                            </div>
                            <div class="form-group form_group_signip">
                              <label class="control-label">last name</label>
                              <input maxlength="200" type="text" required="required" class="form-control form_sognup_contron" placeholder="" />
                            </div>
                            <button class="btn nextBtn pull-right btn-main btn_sign_up" type="button">continue</button>
                          </div>
                        </div>
                        <div class="panel panel-primary setup-content" id="step-3">
                          <div class="PANNEL_HEADING text-center">
                            THANK YOU
                          </div>
                          <div class="panel-body text-center">
                            <img src="assets/images/registartion-complete.svg" alt="" class="img-fluid ">
                            <div class="text_sucessful mt-3 mb-3">
                              registration
                              <br>
                              completed
                            </div>
                            <button class="btn  nextBtn pull-right btn-main btn_sign_up" type="button">
                            continue
                            </button>
                          </div>
                        </div>
                      </form>

                      @include('admin.layouts.partials.message')

                      <form action="{{ route('user.registration') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-12 col-form-label ">Name</label>
                              <div class="col-md-12">
                                  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email_address" class="col-md-12 col-form-label ">E-Mail Address</label>
                              <div class="col-md-12">
                                  <input type="text" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}" autocomplete="email" autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-12 col-form-label ">Password</label>
                              <div class="col-md-12">
                                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-6 ">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-6 ">
                              <button type="submit" class="btn btn-main w-100 btn-primary">
                                  Register
                              </button>
                          </div>
                      </form>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="already_account">
                      already hava an account ?
                      <span>
                      <a href="#">sign in</a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            <!-- </div> -->
          </div>
        </div>
      </section>
    </main>
    @endsection

@push('js')

@endpush
