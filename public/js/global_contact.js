$(document).ready(function () {
    // add contact AJAX Request

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // // edit contact modal event
    $(".edit_global_contact").on("click", function (event) {
        event.preventDefault();

        let contact_id = $(".edit_global_contact").val();
        let url = window.location.origin + "/global_contact/" + contact_id;
        // console.log(contact_id);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $(global_id).val(data.id);
                $(global_name).val(data.name);
                $(global_email).val(data.email);
                $(global_phone).val(data.phone);
                $(global_address).val(data.address);
                $(global_company).val(data.company);

                let gender = data.gender;
                gender == "Male"
                    ? $("#global_male").prop("checked", true)
                    : $("#global_female").prop("checked", true);

                // fetching company names
                $.ajax({
                    url: window.location.origin + "/contact/company_names",
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $(".select2bs4").select2({
                            data: data,
                            theme: "bootstrap4",
                        });
                    },
                });
            },
        });
        $("#edit_global_modal").modal("show");
    });
    // save change button click event here

    $("#global_contact").click(function (e) {
        e.preventDefault();

        let id = $("input[name=global_id]").val();
        let name = $("input[name=global_name]").val();
        let email = $("input[name=global_email]").val();
        let phone = $("input[name=global_phone]").val();
        let company = $("#global_company").find(":selected").val();
        // console.log(edit_company);
        let address = $("input[name=global_address]").val();
        let gender = $("input[name='global_gender']:checked").val();
        // console.log(id, name, email, phone, company, address, gender);
        $.ajax({
            type: "POST",
            url: window.location.origin + "/global_contact/edit_contact",
            data: {
                contact_id: id,
                name: name,
                email: email,
                phone: phone,
                company: company,
                address: address,
                gender: gender,
            },
            success: function (response) {
                // console.log(response);
                // resetting all error field validation error messages
                // name field
                $("#error_global_name").addClass("d-none");
                $("#global_name").removeClass("is-invalid");

                //email field
                $("#error_global_email").addClass("d-none");
                $("#global_email").removeClass("is-invalid");
                //phone field
                $("#error_global_phone").addClass("d-none");
                $("#global_phone").removeClass("is-invalid");
                //address field
                $("#error_global_address").addClass("d-none");
                $("#global_address").removeClass("is-invalid");
                //gender field
                $("#error_global_gender").addClass("d-none");

                switch (response.type) {
                    case "success":
                        toastr.success(response.msg);
                        $("#edit_global_modal").modal("hide");
                        window.location.reload(); //reloading whole page
                        break;
                    case "warning":
                        Object.keys(response.msg).forEach(function (key) {
                            // console.log(key + " : " + response.msg[key]);
                            switch (key) {
                                case "name":
                                    $("#error_global_name")
                                        .removeClass("d-none")
                                        .html(response.msg[key]);
                                    $("#global_name").addClass("is-invalid");

                                    break;
                                case "email":
                                    $("#error_global_email")
                                        .removeClass("d-none")
                                        .html(response.msg[key]);
                                    $("#global_email").addClass("is-invalid");
                                    break;
                                case "phone":
                                    $("#error_global_phone")
                                        .removeClass("d-none")
                                        .html(response.msg[key]);
                                    $("#global_phone").addClass("is-invalid");
                                    break;
                                case "address":
                                    $("#error_global_address")
                                        .removeClass("d-none")
                                        .html(response.msg[key]);
                                    $("#global_address").addClass("is-invalid");
                                    break;
                                case "gender":
                                    $("#error_global_gender").removeClass(
                                        "d-none"
                                    );
                                    break;
                            }
                        });
                        break;
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
