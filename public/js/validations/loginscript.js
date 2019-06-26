$(document).ready(function () {
    $("#login").validate({
        rules: {
            username: "required",
            password: "required",
        }
    });
});