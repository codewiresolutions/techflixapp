@extends('website.layouts.master')

@push('title')
    Blogs
@endpush

@section('content') 

<style>
     .quiz_contest_section .btn_share:hover{
  color:var(--blackcolor);
}
</style>

  </head>
  <body>
  <main>
  <section class="quit_contest">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="box_quiz_img">
              <img src="../images/quiz-contest-tab.svg" alt="" class="img" />
            </div>
          </div>
        <h6>Terms and conditions</h6>
        </div>
      </div>
    </section>
</main>

@endsection

@push('js')

@endpush
