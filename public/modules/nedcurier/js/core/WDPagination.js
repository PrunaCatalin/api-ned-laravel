var WDPagination = ns("NSWD.WDPagination");

WDPagination.go  = function ( page) {

    var currentForm = $("#filterTable");
    currentForm.attr('action' , page);
    currentForm.submit();
}
