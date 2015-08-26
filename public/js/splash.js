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

            bg.css('background-image', 'none');
            bg.css('background-color', inputBgColor.val());
        });

        var radioImage = $("#inputBgRadioImage");
        radioImage.on('click', function(){
            inputBgFile.removeAttr('disabled');
            inputBgColor.attr('disabled', 'disabled');

            setTimeout(function(){
                inputBgFile.click();
            }, 100);

            bg.css('background-image', 'none');
            bg.css('background-color', 'white');
        });

        var orientation_portrait = $("#orientation_portrait");
        var orientation_landscape = $("#orientation_landscape");
        var jumbotron_img_box = $("#jumbotron_img_box");

        orientation_portrait.on('click', function(){
            jumbotron_img_box.removeClass('landscape');
            movePreviewLogo();
        });

        orientation_landscape.on('click', function(){
            jumbotron_img_box.addClass('landscape');
            movePreviewLogo();
        });

        $("#platform").select2({
            minimumResultsForSearch: Infinity
        });

        generate_splash.on('click', function(){
            $(this).hide();
            $("#if_submitting").show();
            $("#if_form")[0].submit();
        });

        var splash_preview_logo = $("#splash_preview_logo");

        $("#inputLogoFile").on('change', function(){
            if (this.files && this.files.length) {
                var oFReader = new FileReader();
                var file = this.files[0];
                oFReader.readAsDataURL(file);

                oFReader.onload = function (oFREvent) {
                    if (file.type != '') {
                        splash_preview_logo.attr('src', oFREvent.target.result);
                        movePreviewLogo();
                    }
                };
            } else {
                splash_preview_logo.attr('src', 'img/ruihong.sm.png');
                movePreviewLogo();
            }
        });

        function movePreviewLogo() {
            var top = 0,
                left = 0,
                width = bg.width(),
                height = bg.height(),
                w = splash_preview_logo.width(),
                h = splash_preview_logo.height();
            if (jumbotron_img_box.hasClass('landscape')) {
                w = w * 1.1;
                h = h * 1.1;
                left = (width + h) / 2;
                top = (height - w) / 2;
            } else {
                left = (width - w) / 2;
                top = height * .45 - h / 2;
            }
            splash_preview_logo.css({
                left: left,
                top: top
            });
        }

        setTimeout(function(){
            movePreviewLogo();
        }, 500);

        inputBgFile.on('change', function(){
            if (this.files && this.files.length) {
                var oFReader = new FileReader();
                var file = this.files[0];
                oFReader.readAsDataURL(file);

                oFReader.onload = function (oFREvent) {
                    if (file.type != '') {
                        bg.css('background-image', 'url(' + oFREvent.target.result + ')');
                    }
                };
            } else {
                bg.css('background-image', 'none');
            }
        }
        );
    }
});