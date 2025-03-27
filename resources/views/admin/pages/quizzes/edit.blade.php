@extends('admin.layouts.master')

@push('title')
    Edit Quiz
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
                                <form id="editQuiz" method="POST" action="{{ route('admin.quizzes.update', $quiz) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="for_prifile_section">
                                        <div class="row mb-4">
                                            <div class="col-sm-12">
                                                <h4>Edit Quiz</h4>
                                                <hr>
                                            </div>
                                            <input type="hidden" name="added_by" value="{{ auth()->user()->id }}">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Title</label>
                                                    <div class="input">
                                                        <input type="text"
                                                               class="control_field form-control"
                                                               id="fv-title"
                                                               name="title"
                                                               value="{{ old('title', $quiz->title) }}"
                                                               placeholder="Type here...">
                                                    </div>
                                                    @error('title')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <div class="input">
                                                        <textarea class="control_field form-control"
                                                                  id="fv-description"
                                                                  name="description"
                                                                  rows="12"
                                                                  placeholder="Type here...">{{ old('description', $quiz->description) }}</textarea>
                                                    </div>
                                                    @error('description')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>


                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <div class="input">
                                                            <select class="control_field form-control"
                                                                    id="fv-status"
                                                                    name="status">
                                                                <option value="1" {{ old('status', $quiz->status) ? 'selected' : '' }}>
                                                                    Active
                                                                </option>
                                                                <option value="0" {{ old('status', $quiz->status) ? '' : 'selected' }}>
                                                                    Inactive
                                                                </option>
                                                            </select>
                                                        </div>
                                                        @error('status')
                                                        <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Expire Date</label>
                                                        <div class="input">
                                                            <input type="datetime-local"
                                                                   class="control_field form-control"
                                                                   id="fv-expire_date"
                                                                   name="expire_date"
                                                                   value="{{ old('expire_date', $quiz->expire_date ? \Carbon\Carbon::parse($quiz->expire_date)->format('Y-m-d\TH:i') : '') }}"

                                                                   placeholder="Select date and time...">
                                                        </div>
                                                        @error('expire_date')
                                                        <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                        </div>

                                        <div class="btn_flex mt-5 mb-2">
                                            <a class="btn-main btn" href="{{ route('admin.quizzes.index') }}">Back</a>  
                                            <button type="submit" class="btn-main btn submit">Update</button>
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
