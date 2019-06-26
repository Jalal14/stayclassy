$(document).ready(function () {
    $("#select-all-categories").change(function() {
        searchByCategory();
    });
    $('.categories-checkbox').change(function(){
        searchByCategory();
    });
    $("#select-all-types").change(function() {
        searchByCategory();
    });
    $('.types-checkbox').change(function(){
        searchByCategory();
    });
});

function searchByCategory() {
    var selectedCats = new Array();
    var n = jQuery(".categories-checkbox:checked").length;
    if (n > 0){
        jQuery(".categories-checkbox:checked").each(function(){
            selectedCats.push($(this).val());
        });
    }
    var cats = JSON.stringify(selectedCats);
    var selectedTypes= new Array();
    var n = jQuery(".types-checkbox:checked").length;
    if (n > 0){
        jQuery(".types-checkbox:checked").each(function(){
            selectedTypes.push($(this).val());
        });
    }
    var typeList = JSON.stringify(selectedTypes);
    $.ajax({
        url: "/admin/search-by-category",
        method: "GET",
        data: { 
            categories : cats,
            types : typeList
        },
        success: function (response) {
            console.log(response);
            $("#product-list").html(response);
        },
        error: function(data){
            console.log(data.status);
        }
    });

}