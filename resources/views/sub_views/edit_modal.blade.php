<!-- contact edit modal section  -->
<div class="modal fade text-center" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Contacts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body justify-content-center">
                    <form action="" method="post">
                        @csrf
                        <input type="text" id="contact_id" name="contact_id" hidden>
                        <div class="row">
                            <label for="edit_name" class="col-2 col-form-label">Name</label>

                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="edit_name" id="edit_name" class="form-control"
                                    placeholder="Enter user Name" autofocus required />
                                <div class="invalid-feedback text-left d-none" id="edit_error_name">

                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="edit_email" class="col-2 col-form-label">Email</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="email" name="edit_email" id="edit_email" class="form-control col-12"
                                    placeholder="Enter user Email Address" autofocus required />
                                <div class="invalid-feedback text-left d-none" id="edit_error_email">

                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="edit_phone" class="col-2 col-form-label">Phone</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="string" name="edit_phone" id="edit_phone" class="form-control col-12"
                                    placeholder="Enter Contact Number" autofocus required />
                                <div class="invalid-feedback text-left d-none" id="edit_error_number">

                                </div>
                            </div>
                        </div>
                        <div class="row my-3 text-left">
                            <label for="edit_company" class="col-2 col-form-label">Company</label>
                            <div class="col-md-10 col-sm-12 text-left">
                                <select class="form-control select2bs4" id="edit_company" style="width: 100%;">
                                    {{-- <option>Alabama</option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="row my-3">
                            <label for="edit_address" class="col-2 col-form-label">Address</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="edit_address" id="edit_address" class="form-control col-12"
                                    placeholder="Enter User Address" autofocus required />
                                <div class="invalid-feedback text-left d-none" id="edit_error_address">

                                </div>
                            </div>
                        </div>
                        <div class=" text-center d-none" id="edit_gender">
                            <p style="color:red ; font-size:13px"> invalid gender selection </p>
                        </div>
                        <div class="row my-3 justify-content-center">
                            <div class="form-check form-check-inline col-auto">
                                <input class="form-check-input gender" type="radio" name="edit_gender" id="edit_male"
                                    value="Male" />
                                <label class="form-check-label col-2" for="edit_male">male</label>
                            </div>
                            <div class="form-check form-check-inline col-auto ms-4">
                                <input class="form-check-input gender" type="radio" name="edit_gender" id="edit_female"
                                    value="Female" />

                                <label class="form-check-label col-2" for="edit_female">female</label>

                            </div>

                        </div>

                        <div class="row my-3">
                            <button class="btn btn-lg btn-outline-warning btn-block" id="edit_contact" type="submit">
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
