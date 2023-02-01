$(document).ready(function () {
    $("#add_contact").on("click", function (event) {
        event.preventDefault();
        $("#add_modal").modal("show");
    });

    // add contact AJAX Request

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#create_contact").click(function (e) {
        e.preventDefault();

        let name = $("input[name=name]").val();
        let email = $("input[name=email]").val();
        let phone = $("input[name=phone]").val();
        let company = $("input[name=company]").val();
        let address = $("input[name=address]").val();
        let gender = $("input[name='gender']:checked").val();

        $.ajax({
            type: "POST",
            url: "contact/add_contact",
            data: {
                name: name,
                email: email,
                phone: phone,
                company: company,
                address: address,
                gender: gender,
            },
            success: function (data) {
                let error_msg = data.msg;
                switch (data.type) {
                    case "success":
                        // $("#add_contact").trigger("reset");
                        $("#add_modal").modal("hide");
                        toastr.success(data.msg);
                        window.location.reload(); //reloading whole page

                        break;
                    case "warning":
                        let fields = [
                            "name",
                            "email",
                            "phone",
                            "company",
                            "address",
                        ];
                        let errors = [];
                        Object.keys(error_msg).forEach(function (key) {
                            errors.push(key);
                            console.log(key + " : " + error_msg[key]);
                            if (key == "gender") {
                                $("#" + key).removeClass("d-none");
                            } else {
                                $("#" + key).addClass("is-invalid");
                                $("#" + key)
                                    .next()
                                    .removeClass("d-none");
                                $("#" + key)
                                    .next()
                                    .html(error_msg[key]);
                            }
                        });
                        let safe_field = fields.filter(
                            (x) => errors.indexOf(x) === -1
                        );
                        // console.log(safe_field);
                        for (let safe of safe_field) {
                            console.log(safe);
                            if (safe == "gender") {
                                $("#gender").addClass("d-none");
                            } else {
                                $("#" + safe).removeClass("is-invalid");
                                $("#" + safe)
                                    .next()
                                    .addClass("d-none");
                                $("#" + safe)
                                    .next()
                                    .html();
                            }
                        }
                }

                // localtion.reload();

                // console.log(error_msg);
            },
            error: function (error) {
                console.log("error");
            },
        });
    });

    // edit contact modal event
    $(document).on("click", ".edit_contact", function (event) {
        event.preventDefault();
        let closest_tr = $(this).closest("tr");

        $(contact_id).val(closest_tr.find(".id").text());
        $(edit_name).val(closest_tr.find(".name").text());
        $(edit_email).val(closest_tr.find(".email").text());
        $(edit_phone).val(closest_tr.find(".phone").text());
        $(edit_address).val(closest_tr.find(".address").text());
        $(edit_company).val(closest_tr.find(".company").text());

        // for(let option in $() )
        // console.log(closest_tr.find(".company").text());
        let gender = closest_tr.find(".gender").text();
        gender == "Male"
            ? $("#edit_male").prop("checked", true)
            : $("#edit_female").prop("checked", true);
        // console.log(gender);
        $.ajax({
            url: "/contact/company_names",
            type: "GET",
            dataType: "json",
            success: function (data) {
                $(".select2bs4").select2({
                    data: data,
                    theme: "bootstrap4",
                });
            },
        });

        $("#edit_modal").modal("show");

        $("#edit_contact").click(function (e) {
            e.preventDefault();

            let contact_id = $("input[name=contact_id]").val();
            let edit_name = $("input[name=edit_name]").val();
            let edit_email = $("input[name=edit_email]").val();
            let edit_phone = $("input[name=edit_phone]").val();
            let edit_company = $("#edit_company").find(":selected").val();
            // console.log(edit_company);
            let edit_address = $("input[name=edit_address]").val();
            let edit_gender = $("input[name='edit_gender']:checked").val();

            $.ajax({
                type: "POST",
                url: "contact/edit_contact",
                data: {
                    id: contact_id,
                    edit_name: edit_name,
                    edit_email: edit_email,
                    edit_phone: edit_phone,
                    edit_company: edit_company,
                    edit_address: edit_address,
                    edit_gender: edit_gender,
                },
                success: function (response) {
                    // resetting all error field validation error messages
                    // name field
                    $("#edit_error_name").addClass("d-none");
                    $("#edit_name").removeClass("is-invalid");

                    //email field
                    $("#edit_error_email").addClass("d-none");
                    $("#edit_email").removeClass("is-invalid");
                    //phone field
                    $("#edit_error_phone").addClass("d-none");
                    $("#edit_phone").removeClass("is-invalid");
                    //address field
                    $("#edit_error_address").addClass("d-none");
                    $("#edit_address").removeClass("is-invalid");
                    //gender field
                    $("#edit_gender").addClass("d-none");

                    switch (response.type) {
                        case "success":
                            toastr.success(response.msg);
                            $("#edit_modal").modal("hide");
                            window.location.reload(); //reloading whole page
                            break;
                        case "warning":
                            Object.keys(response.msg).forEach(function (key) {
                                // console.log(key + " : " + response.msg[key]);
                                switch (key) {
                                    case "edit_name":
                                        $("#edit_error_name")
                                            .removeClass("d-none")
                                            .html(response.msg[key]);
                                        $("#edit_name").addClass("is-invalid");

                                        break;

                                    case "edit_email":
                                        $("#edit_error_email")
                                            .removeClass("d-none")
                                            .html(response.msg[key]);
                                        $("#edit_email").addClass("is-invalid");
                                        break;

                                    case "edit_phone":
                                        $("#edit_error_phone")
                                            .removeClass("d-none")
                                            .html(response.msg[key]);
                                        $("#edit_phone").addClass("is-invalid");
                                        break;

                                    case "edit_address":
                                        $("#edit_error_address")
                                            .removeClass("d-none")
                                            .html(response.msg[key]);
                                        $("#edit_address").addClass(
                                            "is-invalid"
                                        );
                                        break;

                                    case "edit_gender":
                                        $("#edit_gender").removeClass("d-none");
                                        break;
                                }
                            });
                            break;
                    }
                },
                error: function (error) {
                    console.log("error");
                },
            });
        });
    });

    // Showing delete modal onclick event

    $(document).on("click", ".delete_contact", function (event) {
        // event.preventDefault();
        $("#delete_id").val(event.target.value);
        $("#delete_modal").modal("show");
        // console.log($(this).text);
    });
});
