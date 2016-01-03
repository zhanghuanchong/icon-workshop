(function(){
    angular.module('rhIcon.icon')
        .controller('IconCtrl', function($scope){
            var btnSubscribe = $("#subscribe");
            if (btnSubscribe.length) {
                var form = btnSubscribe.parents('form').eq(0);
                btnSubscribe.on('click', function(){
                    var t = $(this);
                    var input = form.find('input[type=email]');
                    var v = $.trim(input.val());
                    var reg = /^[a-z0-9-_]([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i;
                    if (!v || !reg.test(v)) {
                        input.focus();
                        return;
                    }
                    form.hide().after('<div style="margin-top: 5px">订阅成功！即将发送到您的邮箱，请随后查收！</div>');
                    $.post('/icon/subscribe', {
                        design_id : '<?php echo $design->id ?>',
                        mail : v
                    });
                });

                form.on('submit', function(){
                    btnSubscribe.click();
                });
            }

            var tp_tabs = $("#tp_tabs");
            if (tp_tabs.length) {
                $("#tp_tabs li a").first().click();
            }
        });
})();