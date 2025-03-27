
@extends('website.layouts.master')
@push('title')
    Blogs
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
                        your points
                        <br>
                        <span>
                              {{$score*5}}
                         </span>
                    </div>
{{--                    <div class="btns">--}}
{{--                        <a href="After_quiz_login.php" class="btn btn-main btn-congs">--}}
{{--                           Home--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>

    </section>



</main>
@endsection

@push('js')
@endpush
