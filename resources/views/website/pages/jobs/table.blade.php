<div class="box_card_apply">
    <div class="card_box">
        @foreach($jobs as $job)
            <div class="row">
                <div class="col-sm-6">
                    <div class="heading_card">
                        {{$job->title}}
                    </div>
                    <div class="another_details">
                        {{$job->type}}
                        <button
                            data-toggle="modal"
                            data-target="#staticBackdrop"
                            class="btn view_detail_btn"
                            data-job-id="{{ $job->id }}"
                            data-job-title="{{ $job->title }}"
                            data-job-exp="{{ $job->experience }}"
                            data-job-type="{{ $job->type }}"
                            data-job-description="{{ $job->description }}"
                        >
                            view details
                        </button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <button
                        class="btn btn-main btn_apply btn_career_apply"
                        data-toggle="modal"
                        data-target="#staticBackdropone"
                        data-job-id="{{ $job->id }}"
                        style="float: right;">
                        apply
                    </button>
                </div>
            </div>
        @endforeach
    </div>

</div>
