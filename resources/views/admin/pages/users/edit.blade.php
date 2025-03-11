@extends('admin.layouts.master')

@push('title')
   Users
@endpush

@section('content') 
<main>

    <section class="login_page">
        <section class="container-fluid container_wrapper">
    <div class="text_main_pages">
        Edit User
      </div>

    @if ($errors->any())
    <div class="example-alert">
        <div class="alert alert-danger alert-icon alert-dismissible">
            <strong>Error</strong>! {{ $errors->first() }} <button class="close"
                data-dismiss="alert"></button>
        </div>
    </div>
@endif
<br>
<div class="row">

 <div class="col-md-8">
    <div class="card_wrap">
        <div class="card-body">
            <form id="updateUser" method="post" action="{{ route('admin.users.update',encryptstring($user->id)) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
                <div class="for_prifile_section">
                    <div class="row">
                       <div class="col-sm-12">
                          <div class="form_group_of_profile">
                             <label for="">  Name </label>
                             <div class="input">
                                <input type="text" class="control_field form-control" id="fv-name" name="name"
                                        value="{{ $user->name ? $user->name : '' }}" required placeholder="Type here...">
                             </div>
                          </div>
                       </div>

                       <div class="col-sm-12">
                        <div class="form_group_of_profile">
                           <label for="">  Email </label>
                           <div class="input">
                              <input type="text" class="control_field form-control" id="fv-name" name="email"
                                      value="{{ $user->email ? $user->email : '' }}" required placeholder="Type here...">
                           </div>
                        </div>
                     </div>

                       <div class="col-sm-12">
                        <div class="col-sm-12">
                            <div class="form-group mb-3 mt-3 team-full" id="sub_category_id">
                                <label for="sub_category_id">User Status</label>
                                    <select name="status" id="status" class="custom-select">
                                      <option value="1">Active</option>
                                      <option value="0">InActive</option>
                                    </select>
                                </div>
                              </div>
                     </div>
                    </div>
                    <div class="btn_flex mt-5 mb-2">
                        <a class="btn-main btn" href="{{ route('admin.users.index') }}">Back</a>&nbsp;&nbsp;
                        <button type="submit" class="btn-main btn submit">Save</button>
                       </div>
                 </div>
            </form>
        </div>
    </div>
 </div>

</div>

        </section>
       
    </section>
</main>
@endsection

@push('js')

<script type="text/javascript">
  
  </script>
@endpush