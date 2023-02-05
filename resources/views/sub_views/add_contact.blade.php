<!-- add user modal section  -->
<div class="modal fade text-center" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title card_title" id="exampleModalLabel">Add A New Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body justify-content-center">
                    <form action="" method="post" id="add_contact">
                        @csrf
                        <div class="row text-center error_div d-none">
                            <p class="error_text">* Please Fill All Information. *</p>
                        </div>
                        <div class="row">
                            <label for="name" class="col-2 col-form-label">Name</label>

                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter user Name" autofocus required />
                                <div class="invalid-feedback text-left d-none" id="error_name">

                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="email" class="col-2 col-form-label">Email</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="email" name="email" id="email" class="form-control col-12"
                                    placeholder="Enter user Email Address" autofocus required />
                                <div class="invalid-feedback text-left d-none" id="error_email">

                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="phone" class="col-2 col-form-label">Phone</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="string" name="phone" id="phone" class="form-control col-12"
                                    placeholder="Enter Contact Number" autofocus required />
                                <div class="invalid-feedback text-left d-none" id="error_number">

                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="company" class="col-2 col-form-label">Company</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="company" id="company" class="form-control col-12"
                                    placeholder="Enter company Name" autofocus required />
                                <div class="invalid-feedback text-left d-none" id="error_company">

                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="address" class="col-2 col-form-label">Address</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="address" id="address" class="form-control col-12"
                                    placeholder="Enter User Address" autofocus required />
                                <div class="invalid-feedback text-left d-none" id="error_address">

                                </div>
                            </div>
                        </div>
                        <div class=" text-center d-none" id="gender">
                            <p style="color:red ; font-size:13px"> invalid gender selection </p>
                        </div>
                        <div class="row my-3 justify-content-center">
                            <div class="form-check form-check-inline col-auto">
                                <input class="form-check-input gender" type="radio" name="gender" id="male"
                                    value="Male" />
                                <label class="form-check-label col-2" for="male">male</label>
                            </div>
                            <div class="form-check form-check-inline col-auto ms-4">
                                <input class="form-check-input gender" type="radio" name="gender" id="female"
                                    value="Female" />

                                <label class="form-check-label col-2" for="female">female</label>

                            </div>

                        </div>

                        <div class="row my-3">
                            <button class="btn btn-primary btn-block button-32 submit_btn" id="create_contact"
                                type="submit">
                                Add User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- user modal end  -->
