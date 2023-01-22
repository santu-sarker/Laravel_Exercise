<!-- edit user modal section  -->
<div class="modal fade text-center" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body justify-content-center">
                    <!-- for edit id hidden input field -->
                    <input type="hidden" name="edit_id" id="edit_id" />
                    <div class="row">
                        <label for="edit_name" class="col-2 col-form-label">Name</label>
                        <div class="col-md-10 col-sm-12">
                            <input type="text" name="edit_name" id="edit_name"
                                class="form-control col-lg-12 col-md-12 col-sm-12 col-12" placeholder="Enter user Name"
                                required autofocus />
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="edit_email" class="col-2 col-form-label">Email</label>
                        <div class="col-md-10 col-sm-12">
                            <input type="email" name="edit_email" id="edit_email" class="form-control col-12"
                                placeholder="Enter user Email Address" required autofocus />
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="edit_phone" class="col-2 col-form-label">Phone</label>
                        <div class="col-md-10 col-sm-12">
                            <input type="string" name="edit_phone" id="edit_phone" class="form-control col-12"
                                placeholder="Enter Contact Number" required autofocus />
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="select_company" class="col-2 col-form-label">Company</label>
                        <div class="col-md-10 col-sm-12">
                            <select class="select_company form-select" id="select_company"
                                aria-label="company section area ">
                                <option selected disabled>Select Company Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="edit_address" class="col-2 col-form-label">Address</label>
                        <div class="col-md-10 col-sm-12">
                            <input type="text" name="edit_address" id="edit_address" class="form-control col-12"
                                placeholder="Enter User Address" required autofocus />
                        </div>
                    </div>
                    <div class="row my-3 justify-content-center">
                        <div class="form-check form-check-inline col-2">
                            <input class="form-check-input edit_gender" type="radio" name="edit_gender" id="edit_male"
                                value="male" />
                            <label class="form-check-label col-2" for="edit_male">male</label>
                        </div>
                        <div class="form-check form-check-inline col-2 ms-4">
                            <input class="form-check-input edit_gender" type="radio" name="edit_gender" id="edit_female"
                                value="female" />
                            <label class="form-check-label col-2" for="edit_female">female</label>
                        </div>
                    </div>
                    <div class="row my-3">
                        <button class="btn btn-lg btn-warning btn-block" id="edit_submit" type="submit">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- edit modal section end  -->
