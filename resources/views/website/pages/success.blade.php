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
{{--            <div class="">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="box_quiz_img">--}}
{{--                            <img src="../images/quiz-contest-tab.svg" alt="" class="img" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <h4 style="text-align: center;"> congratulations ! </h4></br>

{{--                </div>--}}
                <h6 style="text-align: center;" style="margin-top: 6px;">Your Order Completed Successfully</h6>
            </div>
        </section>
    </main>

    @endsection

    @push('js')

    @endpush

