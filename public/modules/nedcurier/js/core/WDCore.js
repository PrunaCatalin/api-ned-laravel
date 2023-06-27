const ns = function (path, object, root) {
    const parts = path.split('.');
    const len = parts.length;
    let i = 0;
    let def = {};
    object = object || (object = {});
    root = root || (root = window);
    for (; i < len; i++) {
        if (i === len - 1) {
            def = object;
        }
        root = root[parts[i]] || (root[parts[i]] = def);
    }
    return root;
};
const NSWD = ns('NSWD');
const custom_tools = true;
const custom_tools_force_output = 1;
const protocol = location.protocol;
const slashes = protocol.concat("//");
const host = slashes.concat(window.location.hostname);
let listEvents_POST = {};
let stats = [];
let timeoutId = null;
let prev_hash = '';
window.onhashchange = NSWD.CallDebugger;
NSWD.ns = ns;
NSWD.WDAxios = axios;
NSWD.WDAxios.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
NSWD.BaseUrl = function (path) {
    let url = $('body').data('baseUrl');
    url = url && url !== 'undefined' ? url : window.location.origin + '/';
    return url + (path ? path : '');
};
NSWD.Agent = {
    isIe9: function () {
        return navigator.userAgent.match(/MSIE 9/);
    },
    isSafariMobile: function () {
        let userAgent = window.navigator.userAgent;
        return  !!(userAgent.match(/iPad/i) || userAgent.match(/iPhone/i));
    },
    isIOSApp: function () {
        const userAgent = window.navigator.userAgent.toLowerCase();
        const safari = /safari/.test(userAgent);
        const ios = /iphone|ipod|ipad/.test(userAgent);
        if (ios) {
            if (!safari) {
                return true;
            }
        }
        return '';
    }
};
NSWD.JSONParse = function (input) {
    let result = {data: null, error: false, error_message: ''};
    try {
        result.data = JSON.parse(input);
    } catch (e) {
        result.error = true;
        result.error_message = e;
    }
    return result;
};
NSWD.XhrGetCall = function (url, target_id,status,answer, ctfo) {
    url = url || "";
    target_id = target_id || "";
    ctfo = (typeof ctfo == 'undefined') ? custom_tools_force_output : ctfo;
    NSWD._XhrCall("GET", url, "", target_id,status,answer, ctfo);
};
NSWD.XhrPostCall = function (url, data, target_id,status,answer,typeResponse, ctfo) {
    url = url || "";
    target_id = target_id || "";
    ctfo = (typeof ctfo == 'undefined') ? custom_tools_force_output : ctfo;
    NSWD._XhrCall("POST", url, data, target_id,status,answer,typeResponse, ctfo);
};
NSWD._XhrCall = function (_method, _url, _data, _target_id,status,answer,typeResponse, _ctfo) {
    let xhr_call_message = "";
    if (custom_tools) {
        xhr_call_message = "From '" + host + "' was called '" + _url + "'[" + _method + "] on target '" + _target_id + "'<br>" +
            "sending the following data: " + _data + "<br>";
    }
    let cur_time_of_request = Date.now();
    if (custom_tools && status === true) {
        let elapsed_time_or_request = Date.now() - cur_time_of_request;
        xhr_call_message += ">>>>>>>>>>>>>>>>>>>> REQUEST <<<<<<<<<<<<<<<<<<<<<br>" +
            "Took <font color='cyan'>" + (elapsed_time_or_request / 1000) + "</font> second(s).<br>" +
            "From '<font color='red'>" + host + "</font>' was called '<font color='red'>" + _url +
            "</font>'[<font color='cyan'>" + _method + "</font>] on target '" + _target_id + "'<br>" +
            "sending the following data: <font color='yellow'><br>" + _data + "</font><br>" +
            (_data.length && _method === "GET" ? "<font color='red'>!!! You are using data information in a GET type request !!!</font><br>" : "");
        document.getElementById("_tools_console").append(xhr_call_message);
        console.log(xhr_call_message);
    }
    NSWD._XhrHandleAnswer(_target_id, answer,typeResponse, _ctfo);
    if (custom_tools) {
        let answer_tag = ">>>>>>>>>>>>>>>>>>>>>> END <<<<<<<<<<<<<<<<<<<<<<<br>";
        document.getElementById("_tools_console").append(answer_tag);
    }
    if (custom_tools && status === false) {
        let error_tag = "<font color='red'>:: " + status + "</font";
        let error_text = document.createTextNode(answer);
        document.getElementById("_tools_console").append(error_tag);
        document.getElementById("_tools_console").append(error_text);
    }
};
NSWD._XhrHandleAnswer = function (target_id, answer, typeResponse, ctfo) {
    if (typeResponse === "application/json") {
        let jsonObj = NSWD.JSONParse(answer);
        if (!jsonObj.error) {
            answer = jsonObj.data;

            if (answer['use_debugger']) {
                if (answer['debugger'] === undefined) {
                    $('._tools').css('display', 'none');
                    $('#_tools_debugger').html('');
                } else {
                    $('._tools').css('display', 'block');
                    $('#_tools_debugger').append(answer['debugger']);
                    $('#_tools_debugger').append("<br>");
                }
            } else {
                $('._tools').css('display', 'none');
                $('#_tools_debugger').html('');
                $('#_tools_console').html('');
            }

            if (custom_tools && (ctfo == 1 || ctfo == 2)) { // force output to custom console
                if (answer['RAW']) {
                    let raw_tag = "<font color='green'>====================== RAW ======================</font><br>";
                    $('#_tools_console').append(raw_tag);
                    $('#_tools_console').append(document.createTextNode(answer['RAW']));
                    $('#_tools_console').append("<br>");
                }
                if (answer['target'] && answer['target'] instanceof Array) {
                    let target_tag = "<font color='fuchsia'>==================== Targets ====================</font><br>";
                    $('#_tools_console').append(target_tag);
                    answer['target'].forEach(function (key) {
                        let target_tag = "<font color='red'>></font> " + key['index'] + "[" + key['type'] + "] : ";
                        let text_node = document.createTextNode(key['data']);
                        $('#_tools_console').append(target_tag);
                        $('#_tools_console').append(text_node);
                        $('#_tools_console').append("<br>");
                    });
                }

                let answer_tag = "<font color='fuchsia'>=================== Response ====================</font><br>";
                $('#_tools_console').append(answer_tag);

                for (let key in answer) {
                    if (key != 'RAW' &&  key != 'target' && key != 'debugger' && key != 'use_debugger') {
                        let target_tag = "<font color='red'>></font> answer['" + key + "'] : ";
                        let text_node = document.createTextNode(JSON.stringify(answer[key]));

                        $('#_tools_console').append(target_tag);
                        $('#_tools_console').append(text_node);
                        $('#_tools_console').append("<br>");
                    }
                }
            }

            if (ctfo == 0 || ctfo == 1) {
                if (target_id.length) {
                    let var_target = $('#' + target_id);
                    if (var_target.length) {
                        if (answer['RAW']) {
                            NSWD._XhrCallAction(var_target, answer['RAW'], 'html');
                        }
                    } else {
                        if (answer['use_debugger']) {
                            let text_node = document.createTextNode("Target node '" + target_id + "' not found!");
                            $('._tools').css('display', 'block');
                            $('#_tools_console').append(text_node);
                        }
                    }
                } else {
                    if (answer['target'] && answer['target'] instanceof Array) {
                        answer['target'].forEach(function (key) {
                            let var_target = $('#' + key['index']);
                            if (var_target.length) {
                                if (key['data']) {
                                    NSWD._XhrCallAction(var_target, key['data'], key['type']);
                                }
                            } else {
                                if (answer['use_debugger']) {
                                    let text_node = document.createTextNode("Target node '" + key['index'] + "' not found!");
                                    $('._tools').css('display', 'block');
                                    $('#_tools_console').append(text_node);
                                }
                            }
                        });
                    }
                }
            }
        } else {
            let answer_tag = "<font color='fuchsia'>=================== JSON PARSE ERROR ====================</font><br>";
            let answer_error = "<font color='red'>" + jsonObj.error_message + "</font><br>";
            let answer_separator = "---------------------------------------------------------";


            $('._tools').css('display', 'block');
            $('#_tools_debugger').append(answer_tag);
            $('#_tools_debugger').append(answer_error);
            $('#_tools_debugger').append(answer_separator);
            $('#_tools_debugger').append("<br>");
            $('#_tools_debugger').append(answer);
            $('#_tools_debugger').append("<br>");
        }
    }
};
NSWD.DebuggerLog = function (message) {
    var answer = {
        use_debugger : true,
        debugger: message,
    };
    answer = JSON.stringify(answer);
    NSWD._XhrHandleAnswer("", answer, "application/json");
}
NSWD._XhrCallAction = function ($el, data, type) {
    if (type === 'html') {
        $el.html(data);
    } else if (type === 'html_append') {
        $el.append(data);
    } else if (type === 'html_prepend') {
        $el.prepend(data);
    } else if (type === 'text_append') {
        $el.append(document.createTextNode(data));
    } else if (type === 'text_prepend') {
        $el.prepend(document.createTextNode(data));
    } else {
        $el.html(document.createTextNode(data));
    }
};


let countEventsPost  = 0;

(function (XHR) {
    "use strict";
    let open = XHR.open;
    let send = XHR.send;




    XHR.open = function (method, url, async, user, pass) {

        this.addEventListener("readystatechange", function (e) {
            if (this.readyState === 4 && (this.status !== 200 && this.status !== 301 && this.status !== 302)) {
                if (method === "POST") {
                    NSWD.XhrPostCall(url,listEvents_POST.data, "",false,this.response,this.getResponseHeader('Content-Type'));

                } else {
                    NSWD.XhrGetCall(url,"",false);
                }
            } else {
                if (this.readyState === 4 /* complete */) {
                    if (this.statusText === "OK") {
                        if (method === "POST") {
                            console.log(listEvents_POST,countEventsPost);
                            NSWD.XhrPostCall(url,listEvents_POST.data, "",true,this.response,this.getResponseHeader('Content-Type'));

                        } else {
                            NSWD.XhrGetCall(url,"",true);
                        }
                    }
                }
            }
        }, false);
        this._url = url;
        open.call(this, method, url, async, user, pass);
    };

    XHR.send = function (data) {
        let self = this;
        let start;
        let oldOnReadyStateChange;
        let url = this._url;

        function onReadyStateChange()
        {
            if (self.readyState === 4 /* complete */) {
                let time = new Date() - start;
                stats.push({
                    url: url,
                    duration: time
                });
                if (!timeoutId) {
                    timeoutId = window.setTimeout(function () {
                        var xhr = new XHR();
                        xhr.noIntercept = true;
                        timeoutId = null;
                        stats = [];
                    }, 2000);
                }
            }

            if (oldOnReadyStateChange) {
                oldOnReadyStateChange();
            }
        }

        if (!this.noIntercept) {
            start = new Date();

            if (this.addEventListener) {
                this.addEventListener("readystatechange", onReadyStateChange, false);
            } else {
                oldOnReadyStateChange = this.onreadystatechange;
                this.onreadystatechange = onReadyStateChange;
            }
        }
        if ( data !== null) {
            listEvents_POST = {"url": url,"data": data};
        }
        send.call(this, data);
    }
})(XMLHttpRequest);
