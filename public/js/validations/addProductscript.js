$(document).ready(function () {
    $("#add-product").validate({
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
            image1: {
                required: true,
            },
            "specification[]": "required",
        }
    });
});