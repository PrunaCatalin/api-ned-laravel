const Google = ns("NSWD.Google");

Google.add = function() {
    NSWD.WDAxios.get('https://ubotstudio.com')
    .then(function(response) {
        // Procesează răspunsul
        console.log(response.data);
        Google.sendMessage();
    })
    .catch(function(error) {
        // Tratează erorile
        console.error(error);
    });
}
Google.sendMessage = function () {
    NSWD.WDAxios.post( CURRENT_URL + 'admin/console-messages', { console_messages: consoleMessages })
    .then(function(response) {
        // Răspunsul a fost trimis cu succes la server
    })
    .catch(function(error) {
        // Eroare în trimiterea cererii
    });
}
