@extends('admin.layouts.master')

@push('title')
    Create Job
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
                                <form id="createJob" method="POST" action="{{ route('admin.jobs.store') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="for_prifile_section">
                                        <!-- First Section (Half of the Fields) -->
                                        <div class="row mb-4">
                                            <div class="col-sm-12">
                                                <h4>Create Job</h4>
                                                <hr>
                                            </div>
                                            <input type="hidden" name="added_by" value="{{ auth()->user()->id }}">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for=""> Title </label>
                                                    <div class="input">
                                                        <input type="text"
                                                               class="control_field form-control"
                                                               id="fv-title"
                                                               name="title"
                                                               value="{{ old('title') }}"
                                                               placeholder="Type here...">
                                                    </div>
                                                    @error('title')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for=""> Type </label>
                                                    <div class="input">
                                                        <input type="text"
                                                               class="control_field form-control"
                                                               id="fv-type"
                                                               name="type"
                                                               value="{{ old('type') }}"
                                                               placeholder="Type here...">
                                                    </div>
                                                    @error('type')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for=""> Sub Title </label>
                                                    <div class="input">
                                                        <input type="text"
                                                               class="control_field form-control"
                                                               id="fv-sub_title"
                                                               name="sub_title"
                                                               value="{{ old('sub_title') }}"
                                                               placeholder="Type here...">
                                                    </div>
                                                    @error('sub_title')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for=""> Description </label>
                                                    <div class="input">
                                                        <textarea class="control_field form-control"
                                                                  id="fv-description"
                                                                  name="description"
                                                                  rows="12"
                                                                  placeholder="Type here...">{{ old('description') }}</textarea>
                                                    </div>
                                                    @error('description')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for=""> Experience </label>
                                            <div class="input">
                                                <textarea class="control_field form-control"
                                                          id="fv-experience"
                                                          name="experience"
                                                          placeholder="Type here...">{{ old('experience') }}</textarea>
                                            </div>
                                            @error('experience')
                                            <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <p class="form-group">
                                            <label for=""> Experience Type </label>
                                        <div class="input">
                                            <input type="text"
                                                   class="control_field form-control"
                                                   id="fv-exp_type"
                                                   name="exp_type"
                                                   value="{{ old('exp_type') }}"
                                                   placeholder="Type here...">
                                        </div>
                                        @error('exp_type')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                        </p>

                                        <div class="row px-1">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for=""> Status </label>
                                                    <div class="input">
                                                        <select class="control_field form-control"
                                                                id="fv-status"
                                                                name="status">
                                                            <option value="1" {{ old('status', true) ? 'selected' : '' }}>
                                                                Active
                                                            </option>
                                                            <option value="0" {{ old('status', true) ? '' : 'selected' }}>
                                                                Inactive
                                                            </option>
                                                        </select>
                                                    </div>
                                                    @error('status')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for=""> Expire Date </label>
                                                    <div class="input">
                                                        <input type="datetime-local"
                                                               class="control_field form-control"
                                                               id="fv-expire_date"
                                                               name="expire_date"
                                                               value="{{ old('expire_date') }}"
                                                               placeholder="Select date and time...">
                                                    </div>
                                                    @error('expire_date')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn_flex mt-5 mb-2">
                                            <a class="btn-main btn" href="{{ route('admin.jobs.index') }}">Back</a>  
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
