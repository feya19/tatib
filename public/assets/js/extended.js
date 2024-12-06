const swalBootstrap = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-primary",
        cancelButton: "btn btn-secondary me-2",
        denyButton: "btn btn-danger me-2"
    },
    buttonsStyling: false
});

$.fn.select2.defaults.set("theme", "bootstrap-5");
