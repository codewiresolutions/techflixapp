@extends('admin.layouts.master')

@push('title')
    Add Question - {{ $quiz->title }}
@endpush

@section('content')
    <main>
        <section class="login_page">
            <section class="container-fluid container_wrapper">
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card_wrap">
                            <div class="card-body">
                                <form id="createQuiz" method="POST" action="{{ route('admin.quizzes.store') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="for_prifile_section">
                                        <!-- First Section (Half of the Fields) -->
                                        <div class="row mb-4">
                                            <div class="col-sm-12">
                                                <h4>Create Question</h4>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input">
                                                        <label for="text">Question Text</label>
                                                        <textarea name="text" id="text" class="form-control" required></textarea>
                                                    </div>
                                                    @error('text')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>

                                        <div class="btn_flex mt-5 mb-2">
                                            <a href="{{ route('admin.questions.index', $quiz->id) }}" class="btn btn-secondary">Back</a>
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
