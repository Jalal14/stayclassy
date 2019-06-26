$(document).ready(function () {
    $("#promotion").validate({
        rules: {
            title: {
                maxlength: 100,
            }
        }
    });
});