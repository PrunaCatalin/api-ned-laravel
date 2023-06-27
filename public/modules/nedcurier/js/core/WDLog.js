const Logger = ns("NSWD.Logger");
window.onerror = function (message, file, line, col, error) {
    let error_message = {
        message_error : message,
        filename : file,
        line : line,
        col_line : col
    }
    Logger.error(error_message);
} ;
/*
    typeOfMessage : fn , warn , error, log
 */
Logger.error = function (message) {
    Logger.parseMessage({
        type: 'error',
        message: message.message_error,
        filename: message.filename,
        start_line: message.line,
        col_line: message.col_line,
        when: 'ErrorStart'
    });
}
Logger.add = function (message , typeOfMessage = "log",element = null, when  = "isReady") {
    const e = new Error();
    if (!e.stack) {
        try {
            // IE requires the Error to actually be thrown or else the
            // Error's 'stack' property is undefined.
            throw e;
        } catch (e) {
            if (!e.stack) {
                //return 0; // IE < 10, likely
            }
        }
    }

    const stack = e.stack.toString().split(/\r\n|\n/);
    const info = Logger.getFileInfo(stack[1]);
    Logger.parseMessage({
        type: typeOfMessage,
        message: message,
        filename: info.filename,
        start_line: info.start_line,
        col_line: info.col_line,
        when: when
    },element);
};
Logger.parseMessage = function (message, element) {
    /*
    console.log('%cconsole.log', 'color: green;');
    console.info('%cconsole.info', 'color: green;');
    console.debug('%cconsole.debug', 'color: green;');
    console.warn('%cconsole.warn', 'color: green;');
    console.error('%cconsole.error', 'color: green;');
     */
    console.log("============== Start " + message.type + " ==============");
    if (element) {
        console.log("%cDOMElement: ","color: #d19b3d;", element);
    }
    console.log("%cFilename : " + message.filename + " >> %cStart Line : " + message.start_line
                    + " >> %cCol Line : " + message.col_line +
                    " >> %cEventStart : " + message.when +
                    "\n%c#> " + message.message
                    , 'color: #1c84c6;',  'color: #d19b3d ' ,  'color: #d19b3d ',  'color: gray ');
    console.log("============== End " + message.type + " ==============");
};

Logger.getFileInfo = function (url) {
    let parseUrl = url.split(/(\/)/g).pop();
    const result = parseUrl.match(/(\w+?(\.)js)|\w+?(\d+)/g);
    let start_line = result[result.length - 1]; // start line
    let col_line = result[result.length - 2]; // end line
    return {"filename" : result[0] , "start_line" : start_line , "col_line" : col_line};
};
