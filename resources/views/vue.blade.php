<!DOCTYPE html>
<html>
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <body>
        <div id="app">
            <router-view></router-view>
        </div>
    </body>
    <style scoped>
        @import "css/app.css";
    </style>
</html>
