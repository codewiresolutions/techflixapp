@extends('admin.layouts.master')

@push('title')
    Edit Job
@endpush

@section('content')

    <main>
        <section class="login_page">
            <section class="container-fluid container_wrapper">
                @include('admin.layouts.partials.message')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card_wrap">
                            <div class="card-body">


                                <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="added_by" value="{{ auth()->user()->id }}">
                                    <div class="for_prifile_section">
                                        <div class="row">
                                            <!-- Left Column -->
                                            <div class="col-md-12 mb-4">
                                                <div class="form-section">
                                                    <h4>Edit Job</h4>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="title" name="title"
                                                               value="{{ old('title', $job->title) }}">
                                                        @error('title')
                                                        <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="type" class="form-label">Type</label>
                                                        <input type="text" class="form-control" id="type" name="type"
                                                               value="{{ old('type', $job->type) }}">
                                                        @error('type')
                                                        <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sub_title" class="form-label">Sub Title</label>
                                                        <input type="text" class="form-control" id="sub_title"
                                                               name="sub_title"
                                                               value="{{ old('sub_title', $job->sub_title) }}">
                                                        @error('sub_title')
                                                        <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea class="form-control" id="description"
                                                                  name="description"
                                                                  rows="4">{{ old('description', $job->description) }}</textarea>
                                                        @error('description')
                                                        <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="experience" class="form-label">Experience</label>
                                                    <textarea class="form-control" id="experience" name="experience"
                                                              rows="3">{{ old('experience', $job->experience) }}</textarea>
                                                    @error('experience')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="expire_date" class="form-label">Expire Date</label>
                                                            <input type="date" class="form-control" id="expire_date" name="expire_date"
                                                                   value="{{ old('expire_date', $job->expire_date ? \Carbon\Carbon::parse($job->expire_date)->format('Y-m-d') : '') }}">
                                                            @error('expire_date')
                                                            <p style="color: red">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select class="form-control" id="status" name="status">
                                                                <option value="1" {{ old('status', $job->status) ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ old('status', $job->status) ? '' : 'selected' }}>Inactive</option>
                                                            </select>
                                                            @error('status')
                                                            <p style="color: red">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group text-left">
                                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                                <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Cancel</a>
                                            </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endpush
