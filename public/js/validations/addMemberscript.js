$(document).ready(function () {
    $("#add-member").validate({
        rules: {
            name: "required",
            username: "required",
            phone: "required",
            email: "required",
            password: {
                required: true,
                minlength: 6,
            },
            confirm_password: {
                required: true,
                equalTo: "#password",
            },
        }
    });
});