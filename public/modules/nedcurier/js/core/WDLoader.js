var Loader = ns('NSWD.Loader');
var scriptListenerOnLoad = [];
var scriptListenerAfterLoad = [];
//The DOMContentLoaded event fires when all the nodes in the page have been constructed in the DOM tree.
Loader.docReady = function (cb, params = []) {
    scriptListenerOnLoad.push(cb);
}
Loader.windowReady = function (cb) {
    scriptListenerAfterLoad.push(cb);
}
Loader.docBefore = function (cb, params) {
    document.readyState === 'loading' ? cb(params, "loading") : "";
}
//The load event fires when all resources such as images and sub-frames are loaded completely.
window.addEventListener("load", function (e) {
    scriptListenerAfterLoad.forEach(function (fn) {
        if(typeof fn !== "undefined")
            return fn();
    });
});
//Used for binds
document.addEventListener('DOMContentLoaded', function (e) {
    scriptListenerOnLoad.forEach(function (fn) {
        return fn();
    });
});
