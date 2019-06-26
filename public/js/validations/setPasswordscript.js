$(document).ready(function () {
    $("#set-password").validate({
        rules: {
            new_password: {
                required: true,
                minlength: 6,
            },
            confirm_password: {
                required: true,
            }
        }
    });
});