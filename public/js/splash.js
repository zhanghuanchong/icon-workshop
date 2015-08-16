$(function(){
    var generate_splash = $("#generate_splash");
    if (generate_splash.length) {
        var bg = $("#splash_preview_bg");
        $('#inputBgColor').colpick({
            layout: 'rgbhex',
            submit: false,
            color: '#0073d1',
            onChange:function(hsb, hex, rgb, el, bySetColor) {
                if(!bySetColor) {
                    $(el).val('#' + hex);
                    bg.css('background-color', '#' + hex);
                }
            }
        }).keyup(function(){
            $(this).colpickSetColor(this.value);
        });
    }
});