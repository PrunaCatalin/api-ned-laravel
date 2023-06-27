var Request = ns('NSWD.Request');
Request.getJSON = function (url = null , callback = null) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    // xhr.responseType = 'json';
    xhr.onload = () => {
        let status = xhr.status;
        if (status === 200 && callback) {
            callback(xhr);
        }
    };
    xhr.send();
}
Request.postJSON = function (url = null , options = {} , data = "" , callback = null , async = true) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url, async);
    if (typeof options.fileUpload === "undefined") {
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    // xhr.responseType = 'json';
    xhr.onload = () => {
        let status = xhr.status;
        if (status === 200 && callback) {
            callback(xhr);
        }
    };
    xhr.send(data);
}
Request.tunnel = function (url = null , options = {} , data = "" , timeout = 5) {
    setInterval(function () {
        Request.postJSON(url , options , data);
    },
        timeout);
}
