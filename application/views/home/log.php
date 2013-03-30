
    var key = "<?php echo $key?>";

    window.onerror = function (message, url, linenumber) {
//       postError();
    };
    function log(key, message, error_type, file_name, line, priority) {
        postError(key, message, error_type, file_name, line, priority);
    }


    //Construct the script tag at Runtime
    function requestServerCall(url) {
        var head = document.head;
        var script = document.createElement("script");

        script.setAttribute("src", url);
        head.appendChild(script);
        head.removeChild(script);
    }

    //Predefined callback function
    function jsonpCallback(data) {
        alert(data.message); // Response data from the server
    }


    //Send Request to Server
    function postError(key, message, error_type, file_name, line, priority) {
        var baseUrl = "http://jslogger.localhost.com/logger/log_exception";
        requestServerCall(baseUrl + "?callback=jsonpCallback&project_key=" + key + "&file_name=" + file_name +
            "&message=" + message + "&error_type=" + error_type + "&line=" + line + "&priority=" + priority);
    }
    log(key, "dummy message", "caught", "log.js", "1", "Error");
