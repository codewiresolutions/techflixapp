<section class="modalone_full">
    <!-- Modal -->
    <div class="modal fade" id="staticBackdropone" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="" alt="" />
                            <div class="box_modal_colr">
                                <div class="textcol">creative head</div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="box_form_modal">
                                <form id="modalForm" enctype="multipart/form-data">
                                    <input type="hidden" id="job_id" name="jod_id" value="" class="form-control modal_form_control" />

                                    @csrf
                                    <div class="form_group_modal">
                                        <label for="">Full Name *</label>
                                        <div class="">
                                            <input type="text" name="full_name" class="form-control modal_form_control" />
                                            <span class="error text-danger" id="full_name_error"></span>
                                        </div>
                                    </div>
                                    <div class="form_group_modal">
                                        <label for="">Email *</label>
                                        <div class="">
                                            <input type="email" name="email" class="form-control modal_form_control" />
                                            <span class="error text-danger" id="email_error"></span>
                                        </div>
                                    </div>
                                    <div class="form_group_modal">
                                        <label for="">Contact Number *</label>
                                        <div class="">
                                            <input type="text" name="contact_number" class="form-control modal_form_control" />
                                            <span class="error text-danger" id="contact_number_error"></span>
                                        </div>
                                    </div>
                                    <div class="form_group_modal">
                                        <label for="">Upload Resume *</label>
                                        <div class="box_input">
                                            <label>Upload
                                                <input type="file" name="resume" />
                                            </label>
                                            <span class="error text-danger" id="resume_error"></span>
                                        </div>
                                    </div>
                                    <div class="form_group_modal">
                                        <label for="">Upload Portfolio [Optional]</label>
                                        <div class="box_input">
                                            <label>Upload
                                                <input type="file" name="portfolio" />
                                            </label>
                                            <span class="error text-danger" id="portfolio_error"></span>
                                        </div>
                                    </div>
                                    <div class="modal_footh">
                                        <button type="submit" class="btn btn-main btn-apply">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
