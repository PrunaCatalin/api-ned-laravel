var WDApp = ns('NSWD.WDApp');
document.addEventListener('touchstart', function(e) {
    this.startX = e.touches[0].pageX;
    this.startY = e.touches[0].pageY;
}, { passive: true });

document.addEventListener('touchmove', function(e) {
    var x = e.touches[0].pageX;
    var y = e.touches[0].pageY;

    var xDiff = this.startX - x;
    var yDiff = this.startY - y;

    // Lock scroll horizontally
    if (Math.abs(xDiff) > Math.abs(yDiff)) {
        e.preventDefault();
    }
}, { passive:false});


WDApp.loadObjects = function () {
    $(".sn_header_toggle").click(function(event){
        event.stopPropagation(); // Prevent the click event from bubbling up to the document
        $(".sn_header_menu").toggle(); // Toggle the visibility of the menu
    });

    $(document).click(function() {
        if ($(".sn_header_menu").is(":visible")) {
            $(".sn_header_menu").hide();
        }
    });

    $(".sn_header_menu").click(function(event){
        event.stopPropagation(); // Prevent the click event from bubbling up to the document
    });
    if(document.querySelector('#accept-cookies')) {
        document.querySelector('#accept-cookies').addEventListener('click', function () {
            NSWD.WDAxios.post(APP_URL + "/accept-cookies", {}).then(function (response) {
                document.querySelector('.cookie-banner').remove();
            }).catch(function (error) {
                NSWD.Log(error);
            });
        });
    }
};

NSWD.Loader.windowReady(WDApp.loadObjects);
