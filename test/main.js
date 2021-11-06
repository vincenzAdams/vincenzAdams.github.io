//to add tickers to the table, you have to update the array, add the stream, and add the event.

var tickerArray = ["ADA", "ETH", "BTC", "SOL", "DOGE", "SHIB", "MANA"];
var arrayLength = tickerArray.length;

let adaStream = new WebSocket("wss://stream.binance.com:9443/ws/adausdt@trade");
let ethStream = new WebSocket("wss://stream.binance.com:9443/ws/ethusdt@trade");
let btcStream = new WebSocket("wss://stream.binance.com:9443/ws/btcusdt@trade");
let solStream = new WebSocket("wss://stream.binance.com:9443/ws/solusdt@trade");
let dogeStream = new WebSocket("wss://stream.binance.com:9443/ws/dogeusdt@trade");
let shibStream = new WebSocket("wss://stream.binance.com:9443/ws/shibusdt@trade");
let manaStream = new WebSocket("wss://stream.binance.com:9443/ws/manausdt@trade");

// var streamArray = [adaStream, ethStream, btcStream, solStream, dogeStream, shibStream, manaStream];
// function displayPrice(array){
//     var arrayLen = array.length;
//     for (i = 0; i < arrayLen; i++){
//         var tickerId = tickerArray[i].toLowerCase();
//         array[i].onmessage = (event) =>{
//             let object = JSON.parse(event.data);
//             document.getElementById(tickerId).innerText = "$ " + parseFloat(object.p).toLocaleString();
//             showPctChange(tickerId);
//         }
//     }
// }

adaStream.onmessage = (event) => {
    let adaObject = JSON.parse(event.data);
    document.getElementById("ada").innerText = "$ " + parseFloat(adaObject.p).toLocaleString();
    showPctChange("ada");
}
ethStream.onmessage = (event) => {
    let ethObject = JSON.parse(event.data);
    document.getElementById("eth").innerText = "$ " + parseFloat(ethObject.p).toLocaleString();
    showPctChange("eth");
}
btcStream.onmessage = (event) => {
    let btcObject = JSON.parse(event.data);
    document.getElementById("btc").innerText = "$ " + parseFloat(btcObject.p).toLocaleString();
    showPctChange("btc");
}

solStream.onmessage = (event) => {
    let solObject = JSON.parse(event.data);
    document.getElementById("sol").innerText = "$ " + parseFloat(solObject.p).toLocaleString();
    showPctChange("sol");
}

dogeStream.onmessage = (event) => {
    let dogeObject = JSON.parse(event.data);
    document.getElementById("doge").innerText = "$ " + parseFloat(dogeObject.p).toLocaleString();
    showPctChange("doge");
}

shibStream.onmessage = (event) => {
    let shibObject = JSON.parse(event.data);
    document.getElementById("shib").innerText = "$ " + parseFloat(shibObject.p);
    showPctChange("shib");
}

manaStream.onmessage = (event) => {
    let manaObject = JSON.parse(event.data);
    document.getElementById("mana").innerText = "$ " + parseFloat(manaObject.p).toLocaleString();
    showPctChange("mana");
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
        displayedPercentage.innerText = changePercent + " %" ;
        changePercent < 0 ? displayedPercentage.style.color="red" : displayedPercentage.style.color="green";
        if (changePercent > 5){
            displayedPercentage.classList.add("success");
            displayedPercentage.previousSibling.classList.add("success");
            displayedPercentage.previousSibling.previousSibling.classList.add("success");
        } else if(changePercent < -5){
            displayedPercentage.classList.add("danger");
            displayedPercentage.previousSibling.classList.add("danger");
            displayedPercentage.previousSibling.previousSibling.classList.add("danger");
        }
    }
    request.send();
}