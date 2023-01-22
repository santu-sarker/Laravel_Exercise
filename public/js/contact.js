$(document).ready(function () {
    $("#add_contact").on("click", function (event) {
        event.preventDefault();
        $("#add_modal").modal("show");
    });
    $;
    $(".delete_contact").on("click", function (event) {
        // event.preventDefault();
        $("#delete_id").val(event.target.value);
        $("#delete_modal").modal("show");
        // console.log(document.getElementById("delete_id").value);
    });
});
