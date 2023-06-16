<?php
/**
 * File Name: ${NAME}
 * Author: pruna
 * Created: 6/9/2023
 *
 * License:
 * --------------
 * SC WEBDIRECT TEHNOLOGIES SRL
 *
 * Change Log:
 * --------------
 * Date         | Author         | Description
 * 6/9/2023 | pruna | Initial version
 *
 */

?>
<script>
    var CURRENT_URL = '{{ url()->current() }}';
    var consoleMessages = [];
    console.log = function(message) {
        consoleMessages.push(message);
    };
</script>

<script src="{{ asset('modules/admin/js/core/WDAxios.js') }}"></script>
<script src="{{ asset('modules/admin/js/core/WDCore.js') }}"></script>
<script src="{{ asset('modules/admin/js/core/WDLoader.js') }}"></script>
<script src="{{ asset('modules/admin/js/core/WDLog.js') }}"></script>
<script src="{{ asset('modules/admin/js/core/WDRequest.js') }}"></script>
<script src="{{ asset('modules/admin/js/core/WDUtils.js') }}"></script>
<script src="{{ asset('modules/admin/js/core/WDGoogle.js') }}">
    NSWD.Google.add();
</script>
