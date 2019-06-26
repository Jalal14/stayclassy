$(document).ready(function () {
    $("#footer-form").validate({
        rules: {
            heading: {
                required: true,
                maxlength: 20,
            },
            title:{
                required: true,
                maxlength: 60,
            },
        }
    });
});