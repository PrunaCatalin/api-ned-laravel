var Utils = ns("NSWD.Utils");

Utils.parseToJsonEntries = function (object) {
    let data = new FormData(object);
    let forms = data.entries();
    return JSON.stringify(Object.fromEntries(forms));
};
Utils.parseToFormEntries = function (object) {
    let formData = new FormData(object);
    const searchParams = new URLSearchParams(formData);
    return searchParams.toString();
}
Utils.getRequestDataFromForm = function (form){
    let data = [];
    for (let elements of form) {
        data.push(elements[0] + "=" + elements[1]);
    }
    return data.join("&");
}
Utils.getFormData = function (object) {
    const formData = new FormData();
    Object.keys(object).forEach(key => formData.append(key, object[key]));
    return formData;
}
Utils.parseToUpload = function (object){
    return new FormData(object);
}
/*
    string @route
    int @seconds
    return void();
 */
Utils.Redirect = function (route = "" , seconds = 1000) {
    setTimeout(function () {
        window.location.replace(route);
    },
    seconds);
};
Utils.RedirectNewTab = function (route = "") {
    window.open(route, '_blank');
};
/*
    return Current Route
 */
Utils.CurrentRoute = function () {
    let currentRoute = window.location.pathname
    if (typeof wdCustomSettings.ignoreRoute !== "undefined" && wdCustomSettings.ignoreRoute.includes(currentRoute)) {
        currentRoute = wdCustomSettings.redirectTo;
    }
    return currentRoute;
};
//Save with CTRL + S
Utils.saveWithKeyboard = function (id_trigger) {
    var saveButtonId = document.getElementById(id_trigger);
    if (saveButtonId !== null) {
        document.addEventListener('keydown', function (event) {
            var S = 83;
            if ((event.key === "s" || event.keyCode === S) && (event.metaKey || event.ctrlKey)) {
                event.preventDefault();
                saveButtonId.click();
            }
        });
    }
};
// Utils.addActionsToTable() // TODO
