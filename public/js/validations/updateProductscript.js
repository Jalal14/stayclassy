$(document).ready(function () {
    $("#update-product").validate({
        rules: {
            name: "required",
            code: "required",
            buy_price: {
                required: true,
                number: true,
                min: 0
            },
            price: {
                required: true,
                number: true,
                min: 0
            },
            discount: {
                required: true,
                number: true,
                min: 0
            },
            quantity: {
                required: true,
                number: true,
                min: 1
            },
            "specification[]": "required",
        }
    });
});