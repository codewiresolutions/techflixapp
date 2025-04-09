@extends('website.layouts.master')

@push('title')
    Dashboard
@endpush

@section('content')

    <main class="main_contact">

        <section class="conatct_us_section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="conatct_img">
              <figure>
                <img src="https://dummyimage.com/500x500/000/fff&text=Contact+us" alt=""  class="img"/>
              </figure>
            </div>
          </div>

          <div class="col-md-6">
               <div class="top_text_frorm">
                  we are here to help you ! write your query below
               </div>
            <div class="conatct_form">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form_group">
                        <label for="name">Full Name</label>
                        <div class="">
                            <input type="text" name="name" id="name" required class="form-control form_adjust">
                        </div>
                    </div>
                    <div class="form_group">
                        <label for="email">Email</label>
                        <div class="">
                            <input type="email" name="email" id="email" required class="form-control form_adjust">
                        </div>
                    </div>
                    <div class="form_group">
                        <label for="phone">Contact Number</label>
                        <div class="">
                            <input type="text" name="phone" id="phone" required class="form-control form_adjust">
                        </div>
                    </div>
                    <div class="form_group">
                        <label for="subject">Subject</label>
                        <div class="">
                            <input type="text" name="subject" id="subject" required class="form-control form_adjust">
                        </div>
                    </div>
                    <div class="form_group">
                        <label for="message">Message</label>
                        <div class="">
                            <textarea name="message" id="message" class="form-control textArea"
                                      style="max-height: 200px; height: 200px !important;"
                                      maxlength="500" required></textarea>
                            <div class="no_more_charct">
                                no more character than 500
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn contact_btn btn-main">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  @endsection

@push('js')

@endpush
