function delete_server_contact(id) {
    console.log("inside");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: window.location.origin + "/server_side/delete" + "/" + id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    //  console.log(data);
                    if (data.type == "success") {
                        console.log(data);
                        Swal.fire(
                            "Deleted!",
                            "Rider has been deleted.",
                            "success"
                        ).then((result) => {
                            // window.location.reload();
                            // load_table.ajax.reload();
                            $("#contact_datatable").DataTable().ajax.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Failed !",
                            text: "" + data.msg + "!",
                            type: "error",
                        }).then((result) => {
                            window.location.reload();
                        });
                    }
                },
            });
        }
    });
}
