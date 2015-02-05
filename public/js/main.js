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
