$(function(){
    var generate_splash = $("#generate_splash");
    if (generate_splash.length) {
        var bg = $("#splash_preview_bg");

        var inputBgColor = $("#inputBgColor");
        var inputBgFile = $("#inputBgFile");

        inputBgColor.colpick({
            layout: 'rgbhex',
            submit: false,
            color: '#0088cb',
            onChange:function(hsb, hex, rgb, el, bySetColor) {
                if(!bySetColor) {
                    $(el).val('#' + hex);
                    bg.css('background-color', '#' + hex);
                }
            }
        }).keyup(function(){
            $(this).colpickSetColor(this.value);
        });

        var radioColor = $("#inputBgRadioColor");
        radioColor.on('click', function(){
            inputBgColor.removeAttr('disabled');
            inputBgFile.attr('disabled', 'disabled');

            inputBgColor.focus().click();
        });

        var radioImage = $("#inputBgRadioImage");
        radioImage.on('click', function(){
            inputBgFile.removeAttr('disabled');
            inputBgColor.attr('disabled', 'disabled');

            setTimeout(function(){
                inputBgFile.click();
            }, 100);
        });

        var orientation_portrait = $("#orientation_portrait");
        var orientation_landscape = $("#orientation_landscape");
        var jumbotron_img_box = $("#jumbotron_img_box");

        orientation_portrait.on('click', function(){
            jumbotron_img_box.removeClass('landscape');
        });

        orientation_landscape.on('click', function(){
            jumbotron_img_box.addClass('landscape');
        });
    }
});