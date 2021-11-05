//to add tickers to the table, you have to update the array, add the stream, and add the event.

var tickerArray = ["ADA", "ETH", "BTC"];
var arrayLength = tickerArray.length;

let adaStream = new WebSocket("wss://stream.binance.com:9443/ws/adausdt@trade");
let ethStream = new WebSocket("wss://stream.binance.com:9443/ws/ethusdt@trade");
let btcStream = new WebSocket("wss://stream.binance.com:9443/ws/btcusdt@trade");

adaStream.onmessage = (event) => {
    let adaObject = JSON.parse(event.data);
    document.getElementById("ada").innerText = parseFloat(adaObject.p).toLocaleString();
    showPctChange("ada");
}
ethStream.onmessage = (event) => {
    let ethObject = JSON.parse(event.data);
    document.getElementById("eth").innerText = parseFloat(ethObject.p).toLocaleString();
    showPctChange("eth");
}
btcStream.onmessage = (event) => {
    let btcObject = JSON.parse(event.data);
    document.getElementById("btc").innerText = parseFloat(btcObject.p).toLocaleString();
    showPctChange("btc");
}

function generateRows(array, length){
    var tableEL = document.getElementById("cryptoTable");
    for ( i = 0; i < length; i++){
        tableEL.innerHTML += "<tr><td>" + array[i] + "</td><td id='" + array[i].toLowerCase() + "'></td><td id='" + array[i].toLowerCase() + "PctChange'></td></tr>";
    }
}

var showPctChange = function(ticker){
    ticker = ticker.toUpperCase();
    var baseUrl = "https://api.binance.com";
    var query = "/api/v1/ticker/24hr";
    query += "?symbol=" + ticker + "USDT";
    var url = baseUrl + query;
    var request = new XMLHttpRequest();
    request.open("GET", url);
    request.onload = () => {
        var jsonObj = JSON.parse(request.responseText);
        var changePercent = jsonObj.priceChangePercent;
        var displayedPercentage = document.getElementById(ticker.toLowerCase() + "PctChange");
        displayedPercentage.innerText = changePercent;
        changePercent < 0 ? displayedPercentage.style.color="red" : displayedPercentage.style.color="green";
    }
    request.send();
}