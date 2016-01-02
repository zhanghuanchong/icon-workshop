angular.module('rhIcon', []);

function jsonResponse(response, successCallback, failCallback) {
    try {
        var json = JSON.parse(response);
        if (json.e) {
            swal({
                title : json.d,
                type : 'error',
                confirmButtonText : '确定'
            }, failCallback);
        } else {
            if (typeof(successCallback) == 'function') {
                successCallback(json.d);
            }
        }
    } catch (e) {
        console.log(response);
        console.log(e);
        throw e;
    }
}

$.material.init();

$(function(){
    var if_btn = $("#if_btn");
    if (if_btn.length) {
        if_btn.on('click', function(){
            $("#if").click();
        });

        $("#platform").select2({
            minimumResultsForSearch: Infinity
        });

        var enableDropping = true;

        function startUploading(file) {
            enableDropping = false;

            var oFReader = new FileReader();
            oFReader.readAsDataURL(file);

            oFReader.onload = function (oFREvent) {
                if (file.type != '' && file.type != 'image/vnd.adobe.photoshop') {
                    $("#jumbotron_img").get(0).src = oFREvent.target.result;
                }
                $("#jumbotron_img_loading").show();
            };

            $("#if_btn_box").hide();
            $("#if_submitting").show();

            var formData = new FormData();
            formData.append('file', file);
            formData.append('platform', $("#platform").val());

            var oReq = new XMLHttpRequest();
            oReq.open("POST", "/icon/upload", true);
            oReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            oReq.onreadystatechange = function() {
                if (oReq.readyState == 4) {
                    if (oReq.status == 200) {
                        jsonResponse(oReq.responseText, function(id){
                            location.href = '/icon/detail/' + id;
                        }, function(){
                            enableDropping = true;
                            $("#if_btn_box").show();
                            $("#if_submitting, #jumbotron_img_loading").hide();
                            $("#jumbotron_img").get(0).src = 'img/launcher.png';
                        });
                    }
                }
            };
            oReq.send(formData);
        }

        $("#if").on('change', function(){
            var t = $(this);
            startUploading(t.get(0).files[0]);
        });

        var if_form = $("#if_form");
        if_form.get(0).addEventListener("dragover", function(e){
            e.stopPropagation();
            e.preventDefault();

            if (!enableDropping) {
                return;
            }

            if_form.addClass('dropping');
        }, false);
        if_form.get(0).addEventListener("dragleave", function(e){
            e.stopPropagation();
            e.preventDefault();

            if (!enableDropping) {
                return;
            }

            if_form.removeClass('dropping');
        }, false);
        if_form.get(0).addEventListener("drop", function(e){
            e.stopPropagation();
            e.preventDefault();

            if (!enableDropping) {
                return;
            }

            if_form.removeClass('dropping');

            if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files.length) {
                startUploading(e.dataTransfer.files[0]);
            }
        }, false);
    }

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
