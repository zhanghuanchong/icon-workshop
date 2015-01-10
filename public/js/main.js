$(function(){
    $('#if_btn').on('click', function(){
        $("#if").click();
    });

    var enableDropping = true;

    function startUploading(file) {
        enableDropping = false;

        var oFReader = new FileReader();
        oFReader.readAsDataURL(file);

        oFReader.onload = function (oFREvent) {
            $("#jumbotron_img").get(0).src = oFREvent.target.result;
            $("#jumbotron_img_loading").show();
        };

        $("#if_btn").hide();
        $("#if_submitting").show();

        var formData = new FormData();
        formData.append('file', file);

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
                        $("#if_btn").show();
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
});

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
