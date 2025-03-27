@extends('website.layouts.master')

@push('title')
    Congratulations
@endpush

@section('content') 

  <main>
  <section class="section_congrats" id="section_congrats">

     <div class="container">
          <div class="row">
               <div class="box_contract">
                    <div class="imgs">
                         <img src="../images/clapping.svg" alt="" class="img_congs">
                    </div>
                    <div class="text_congs">
                         congratulations !
                    </div>
                    <div class="points">
                         Your Order Has Been Placed Successfully
                         <br>
                    </div>
                    <div class="btns">

                <button class="btn btn-main btn-congs"  data-toggle="modal" data-target="#staticBackdrop">show result</button>
                         {{-- <a href="After_quiz_login.php" class="btn btn-main btn-congs">show result</a> --}}
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
                                     value="{{ $transaction->name ? $transaction->name : '' }}" readonly>
                          </div>
                       </div>
                    </div>

                    <div class="col-sm-12">
                     <div class="form_group_of_profile">
                        <label for="">  Price </label>
                        <div class="input">
                           <input type="text" class="control_field form-control" id="fv-price" name="price"
                                   value="$ {{ $transaction->price ? $transaction->price : ''}}" readonly>
                        </div>
                     </div>
                  </div>

                  {{-- <div class="col-sm-12">
                    <div class="form_group_of_profile">
                       <label for="">  Image </label>
                       <div class="input">
                        <img src="{{asset($subCategory->image)}}" class="w-100 img-fluid" alt="" srcset="">
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
