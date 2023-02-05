<!-- contact edit modal section  -->
<div class="modal fade text-center" id="edit_global_modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title card_title" id="exampleModalLabel">Update Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body justify-content-center">
                    <form action="" method="post">
                        @csrf
                        <input type="text" id="global_id" name="global_id" hidden>
                        <div class="row">
                            <label for="global_name" class="col-2 col-form-label">Name</label>

                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="global_name" id="global_name" class="form-control"
                                    placeholder="Enter Contact Name" autofocus />
                                <div class="invalid-feedback text-left d-none" id="error_global_name">

                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="global_email" class="col-2 col-form-label">Email</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="email" name="global_email" id="global_email" class="form-control col-12"
                                    placeholder="Enter Contact Email Address" autofocus />
                                <div class="invalid-feedback text-left d-none" id="error_global_email">

                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="global_phone" class="col-2 col-form-label">Phone</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="string" name="global_phone" id="global_phone" class="form-control col-12"
                                    placeholder="Enter Contact Number" autofocus required />
                                <div class="invalid-feedback text-left d-none" id="error_global_phone">

                                </div>
                            </div>
                        </div>
                        <div class="row my-3 text-left">
                            <label for="global_company" class="col-2 col-form-label">Company</label>
                            <div class="col-md-10 col-sm-12 text-left">
                                <select class="form-control select2bs4" id="global_company" style="width: 100%;">
                                    {{-- <option>Alabama</option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="row my-3">
                            <label for="global_address" class="col-2 col-form-label">Address</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="global_address" id="global_address" class="form-control col-12"
                                    placeholder="Enter User Address" autofocus />
                                <div class="invalid-feedback text-left d-none" id="error_global_address">

                                </div>
                            </div>
                        </div>
                        <div class=" text-center d-none" id="error_global_gender">
                            <p style="color:red ; font-size:13px"> invalid gender selection </p>
                        </div>
                        <div class="row my-3 justify-content-center">
                            <div class="form-check form-check-inline col-auto">
                                <input class="form-check-input global_gender" type="radio" name="global_gender"
                                    id="global_male" value="Male" />
                                <label class="form-check-label col-2" for="global_male">male</label>
                            </div>
                            <div class="form-check form-check-inline col-auto ms-4">
                                <input class="form-check-input global_gender" type="radio" name="global_gender"
                                    id="global_female" value="Female" />

                                <label class="form-check-label col-2" for="global_female">female</label>

                            </div>

                        </div>

                        <div class="row my-3">
                            <button class="btn btn-lg  btn-block button-32 edit_btn" id="global_contact" type="submit">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact edit modal end  -->
