export const  streamData  = () => {
    let es = new EventSource("api/tunnel/stream?access_token=" + localStorage.getItem('token'));
    es.addEventListener('message', event => {
        let data = JSON.parse(event.data);
        this.stockData = data.stockData;
        console.log("Stock Pilo" , data);
    }, false);

    es.addEventListener('error', event => {
        if (event.readyState == EventSource.CLOSED) {
            console.log('Event was closed');
            console.log(EventSource);
        }
    }, false);
}
