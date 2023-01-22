<!-- add user modal section  -->
<div class="modal fade text-center" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add A New Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body justify-content-center">
                    <form action="contact/add_contact" method="post">
                        @csrf
                        <div class="row text-center error_div d-none">
                            <p class="error_text">* Please Fill All Information. *</p>
                        </div>
                        <div class="row">
                            <label for="name" class="col-2 col-form-label">Name</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter user Name" required autofocus />
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="email" class="col-2 col-form-label">Email</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="email" name="email" id="email" class="form-control col-12"
                                    placeholder="Enter user Email Address" required autofocus />
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="phone" class="col-2 col-form-label">Phone</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="string" name="phone" id="phone" class="form-control col-12"
                                    placeholder="Enter Contact Number" required autofocus />
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="company" class="col-2 col-form-label">Company</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="company" id="company" class="form-control col-12"
                                    placeholder="Enter company Name" required autofocus />
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="address" class="col-2 col-form-label">Address</label>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" name="address" id="address" class="form-control col-12"
                                    placeholder="Enter User Address" required autofocus />
                            </div>
                        </div>
                        <div class="row my-3 justify-content-center">
                            <div class="form-check form-check-inline col-auto">
                                <input class="form-check-input gender" type="radio" name="gender" id="male"
                                    value="male" />
                                <label class="form-check-label col-2" for="male">male</label>
                            </div>
                            <div class="form-check form-check-inline col-auto ms-4">
                                <input class="form-check-input gender" type="radio" name="gender" id="female"
                                    value="female" />
                                <label class="form-check-label col-2" for="female">female</label>
                            </div>
                        </div>
                        <div class="row my-3">
                            <button class="btn btn-lg btn-primary btn-block" id="user_submit" type="submit">
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

{{-- <div class="modal fade" id="add_contact">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div> --}}
