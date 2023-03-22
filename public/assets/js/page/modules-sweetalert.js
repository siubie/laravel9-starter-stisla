"use strict";

$(".confirm-delete").on("click", function (event) {
    let form = $(this).closest("form");
    event.preventDefault();
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            //submit the form
            form.trigger("submit");
        }
    });
});
