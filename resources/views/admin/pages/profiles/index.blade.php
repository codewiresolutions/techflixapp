@extends('admin.layouts.master')

@push('title')
   Order Detail
@endpush

@section('content') 

<main>
  <section class="login_page">
         
    <section class="dashbord_profile">
     <div class="">
      <div class="box_with_overlay">
       <div class="parent_childs">
        <div class="text_overlay">
          Hello {{ $user->name ?  $user->name : '' }}  !
          
        </div>
        <div class="child_text">
          this is your profile page . you can see your
          <br>
          details here!
        </div>
       </div>
      </div>
     </div>
      <div class="container-fluid  container_wrapper">
      
        <div class="row">
          <div class="col-md-8">
            <div class="for_prifile_section">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form_group_of_profile">
                    <label for=""> First Name </label>
                    <div class="input">
                      <input type="text" class="form-control control_field" value="{{ $user->first_name ?  $user->first_name : '' }}" readonly />
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form_group_of_profile">
                    <label for=""> Last Name </label>
                    <div class="input">
                      <input type="email" class="form-control control_field" value="{{ $user->last_name ?  $user->last_name : '' }}" readonly />
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form_group_of_profile">
                    <label for=""> Email </label>
                    <div class="input">
                      <input type="email" class="form-control control_field" value="{{ $user->email ?  $user->email : '' }}" readonly />
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form_group_of_profile">
                    <label for=""> username </label>
                    <div class="input">
                      <input type="email" class="form-control control_field" value="{{ $user->first_name ?  $user->first_name : '' }} {{ $user->last_name ?  $user->last_name : '' }}" readonly />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box_stephen_joe">
              <div class="img_position">
                <img
                  src="https://dummyimage.com/100x100/000/fff&text=profile_stephen_doe"
                  alt=""
                  class="img rounded-circle"
                />
                <div class="text_img">Name</div>
              </div>
              <div class="text_align_center">{{ $user->name ?  $user->name : '' }}</div>
              <div class="email_div">
                Email
                <div class="name-email">{{ $user->email ?  $user->email : '' }}</div>
              </div>

              <div class="email_div">
                Member Since
                <div class="name-email">{{ $user->created_at ?  date_format($user->created_at,"M d Y") : '' }}</div>  
              </div>

              <div class="box_alix_left">
                <div class="heading">total order</div>
                <div class="text_align_left">
                  <div class="img_center">
                    <img src="../images/order.svg" class="img" alt="" />
                  </div>
                  <div class="text_price">{{$total_orders}}</div>
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

<script type="text/javascript">
  

 
  </script>
@endpush
    

