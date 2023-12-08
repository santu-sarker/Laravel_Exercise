jQuery(document).ready(function () {
    $("#contact_datatable_paginate").on("load", function () {
        console.log("loaded");
    });

    console.log($("#contact_datatable_paginate").val());
});
