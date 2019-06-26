$(document).ready(function () {
    $("#checkout").validate({
        rules: {
            name: "required",
            mobile1: "required",
            address: "required"
        }
    });
});