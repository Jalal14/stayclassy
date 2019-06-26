$(document).ready(function () {
    $("#submit-button").hide();
    $("#search-box").hide();
    $("#search-icon").click(function () {
        $("#search-box").fadeToggle();
    });


    $('.owl-carousel').owlCarousel({
        navText : ["<i class=\"fa fa-arrow-circle-left\" style=\"font-size:36px\"></i>","<i class=\"fa fa-arrow-circle-right\" style=\"font-size:36px\"></i>"],
        loop:false,
        margin:10,
        nav:true,
        dots: false,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
});

$(document).ready(function () {
    $('#product-image1').click(function () {
        var src = $("#product-image1").attr('src');
        console.log(src);
         $("#main-image").attr('src', src);
    });
    $('#product-image2').click(function () {
        var src = $("#product-image2").attr('src');
        $("#main-image").attr('src',src);
    });
    $('#product-image3').click(function () {
        var src = $("#product-image3").attr('src');
        $("#main-image").attr('src',src);
    });
});