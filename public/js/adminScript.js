$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    $(document).on('click','.add-specification',function(){
        // var row = $('.specification-area').eq(0).clone().show();
        var row = '<div class="form-group row specification-area">';
        row = row + '<label for="spcification" class="col-sm-3 col-form-label">Specification: </label>';
        row = row + '<div class="col-sm-7">';
        row = row + '<input type="text" class="form-control specification-text" name="specification[]" placeholder="Product specification">';
        row = row + '</div>';
        row = row + '<div class="col-sm-2">';
        row = row + '<input type="button" class="remove-specification btn btn-danger" value="Remove">';
        row = row + '</div>';
        row = row + '</div>';
        $('.element-wrapper').append(row);
    });
    $(document).on('click','.remove-specification',function(){
        var row = $('.remove-specification').index(this);
        $('.specification-area').eq(row).remove();
    });
});
$(document).ready(function () {
    $('.remove-button').hide();
    $('#image-upoad-1').change(function (event) {
        var output = $("#img-1")[0];
        output.src = URL.createObjectURL(event.target.files[0]);
        $('#remove-btn-1').show();
    });
    $('#image-upoad-2').change(function (event) {
        var output = $("#img-2")[0];
        output.src = URL.createObjectURL(event.target.files[0]);
        $('#remove-btn-2').show();
        $('#img2').val("1");
    });
    $('#image-upoad-3').change(function (event) {
        var output = $("#img-3")[0];
        output.src = URL.createObjectURL(event.target.files[0]);
        $('#remove-btn-3').show();
        $('#img3').val("1");
    });

    $('#remove-btn-2').click(function () {
        $('#image-upoad-2').val('');
        $('#img-2').removeAttr('src');
        $('#remove-btn-2').hide();
        $('#img2').val("0");
    });
    $('#remove-btn-3').click(function () {
        $('#image-upoad-3').val('');
        $('#img-3').removeAttr('src');
        $('#remove-btn-3').hide();
        $('#img3').val("0");
    });
});

$(document).ready(function () {
    $("#select-all-categories").change(function(){
        $(".categories-checkbox").prop('checked', $(this).prop("checked"));
    });

    $('.categories-checkbox').change(function(){
        if(false == $(this).prop("checked")){
            $("#select-all-categories").prop('checked', false);
        }
        checkboxSelect("#select-all-categories",".categories-checkbox");
    });

    $("#select-all-types").change(function(){
        $(".types-checkbox").prop('checked', $(this).prop("checked"));
    });

    $('.types-checkbox').change(function(){
        if(false == $(this).prop("checked")){
            $("#select-all-types").prop('checked', false);
        }
        checkboxSelect("#select-all-types",".types-checkbox");
    });
});
function checkboxSelect(id, cls) {
    var item = $(cls+':checked').length;
    var all = $(cls).length;
    if (item == all){
        $(id).prop('checked', true);
    }
}