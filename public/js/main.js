$(function(){
    $('#if_btn').on('click', function(){
        $("#if").click();
    });

    $("#if").on('change', function(){
        var t = $(this);
        var oFReader = new FileReader();
        oFReader.readAsDataURL(t.get(0).files[0]);

        oFReader.onload = function (oFREvent) {
            $("#jumbotron_img").get(0).src = oFREvent.target.result;
            $("#jumbotron_img_loading").show();
        };
    });
});