$(document).ready(function () {
    $("#edit-password").validate({
        rules: {
            old_password: "required",
            new_password: {
                required: true,
                minlength: 6,
            },
            confirm_new_password: {
                equalTo: '#new-password'
            },
        }
    });
});