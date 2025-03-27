@extends('website.layouts.master')
@push('title')
    Blogs
@endpush

@section('content')
    <main>
        <section class="quiz_contest_section">
            <div class="container">
                <div class="text-capitalize mt-5 mb-5 font-weight-bold">
                    others > {{$quiz->title}}
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <div class="card_quiz_contest">
                            <div class="card_quiz">
                                <img
                                    src="assets/images/quiz-game-sample.svg"
                                    class="card-img-top"
                                    alt="..."
                                />
                                <div class="card-body">
                                    <p class="card-text">
                                        {{$quiz->description}}
                                        <button href="#" class="btn btn_share">
                                            <div class="icon_quiz">
                                                <i class="fa-solid fa-share-nodes"></i>
                                            </div>
                                            <div class="text_capitalize">share</div>
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box_with_img_icons">
                                    <div class="icon_img">
                                        <img src="assets/images/50-coins.svg" alt="" class="img-fluid"/>
                                    </div>
                                    <div class="text_box_quiz_img">
                                        pay and earn 50 points
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box_with_img_icons">
                                    <div class="icon_img">
                                        <img src="assets/images/10-coins.svg" alt="" class="img-fluid"/>
                                    </div>
                                    <div class="text_box_quiz_img">
                                        share and earn 50 points
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box_with_img_icons">
                                    <div class="icon_img">
                                        <img src="assets/images/Gift.svg" alt="" class="img-fluid"/>
                                    </div>
                                    <div class="text_box_quiz_img">
                                        earn unlimited points & win an amazing gift
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box_with_img_icons">
                                    <div class="icon_img">
                                        <i class="fa-solid fa-share"></i>
                                    </div>
                                    <div class="text_box_quiz_img">
                                        every share on social media count 10 points
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md col-lg-2 col-xl-2">
                        <div class="box_confir_pay">
                            <a href="{{route('quiz-test',$quiz->id)}}" class="btn btn-main pay_now_btn">Play now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('js')
@endpush
