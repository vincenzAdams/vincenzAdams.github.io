//to add tickers to the table, you have to update the array, add the stream, and add the case to the switch statement.

var tickerArray = ["ADA", "ETH", "BTC", "SOL", "DOGE", "SHIB", "MANA"];
var arrayLength = tickerArray.length;

let allStreams = new WebSocket("wss://stream.binance.com:9443/ws/adausdt@trade/ethusdt@trade/btcusdt@trade/solusdt@trade/dogeusdt@trade/shibusdt@trade/manausdt@trade");

function loadPriceColumn(){
  allStreams.onmessage = (event) => {
      let message = JSON.parse(event.data);
      switch (message.s){
          case "ADAUSDT":
              document.getElementById("ada").innerHTML = "<span>$ " + parseFloat(message.p).toLocaleString() + "</span>";
              showPctChange("ada");
              break;
          case "ETHUSDT":
              document.getElementById("eth").innerHTML = "<span>$ " + parseFloat(message.p).toLocaleString() + "</span>";
              showPctChange("eth");
              break;
          case "BTCUSDT":
              document.getElementById("btc").innerHTML = "<span>$ " + parseFloat(message.p).toLocaleString() + "</span>";
              showPctChange("btc");
              break;
          case "SOLUSDT":
              document.getElementById("sol").innerHTML = "<span>$ " + parseFloat(message.p).toLocaleString() + "</span>";
              showPctChange("sol");
              break;
          case "DOGEUSDT":
              document.getElementById("doge").innerHTML = "<span>$ " + parseFloat(message.p).toLocaleString() + "</span>";
              showPctChange("doge");
              break;
          case "SHIBUSDT":
              document.getElementById("shib").innerHTML = "<span>$ " + parseFloat(message.p) + "</span>";
              showPctChange("shib");
              break;
          case "MANAUSDT":
              document.getElementById("mana").innerHTML = "<span>$ " + parseFloat(message.p).toLocaleString() + "</span>";
              showPctChange("mana");
              break;  
        }
    }
}

//OLD CODE

// let adaStream = new WebSocket("wss://stream.binance.com:9443/ws/adausdt@trade");
// let ethStream = new WebSocket("wss://stream.binance.com:9443/ws/ethusdt@trade");
// let btcStream = new WebSocket("wss://stream.binance.com:9443/ws/btcusdt@trade");
// let solStream = new WebSocket("wss://stream.binance.com:9443/ws/solusdt@trade");
// let dogeStream = new WebSocket("wss://stream.binance.com:9443/ws/dogeusdt@trade");
// let shibStream = new WebSocket("wss://stream.binance.com:9443/ws/shibusdt@trade");
// let manaStream = new WebSocket("wss://stream.binance.com:9443/ws/manausdt@trade");

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
// function loadPriceColumn(){
//     adaStream.onmessage = (event) => {
//         let adaObject = JSON.parse(event.data);
//         document.getElementById("ada").textContent = "$ " + parseFloat(adaObject.p).toLocaleString();
//         showPctChange("ada");
//     }
//     ethStream.onmessage = (event) => {
//         let ethObject = JSON.parse(event.data);
//         document.getElementById("eth").textContent = "$ " + parseFloat(ethObject.p).toLocaleString();
//         showPctChange("eth");
//     }
//     btcStream.onmessage = (event) => {
//         let btcObject = JSON.parse(event.data);
//         document.getElementById("btc").textContent = "$ " + parseFloat(btcObject.p).toLocaleString();
//         showPctChange("btc");
//     }

//     solStream.onmessage = (event) => {
//         let solObject = JSON.parse(event.data);
//         document.getElementById("sol").textContent = "$ " + parseFloat(solObject.p).toLocaleString();
//         showPctChange("sol");
//     }

//     dogeStream.onmessage = (event) => {
//         let dogeObject = JSON.parse(event.data);
//         document.getElementById("doge").textContent = "$ " + parseFloat(dogeObject.p).toLocaleString();
//         showPctChange("doge");
//     }

//     shibStream.onmessage = (event) => {
//         let shibObject = JSON.parse(event.data);
//         document.getElementById("shib").textContent = "$ " + parseFloat(shibObject.p);
//         showPctChange("shib");
//     }

//     manaStream.onmessage = (event) => {
//         let manaObject = JSON.parse(event.data);
//         document.getElementById("mana").textContent = "$ " + parseFloat(manaObject.p).toLocaleString();
//         showPctChange("mana");
//     }
// }

function generateRows(array, length){
    var tableEL = document.getElementById("cryptoTable");
    for ( i = 0; i < length; i++){
        tableEL.innerHTML += "<tr><td>" + array[i] + "</td><td id='" + array[i].toLowerCase() + "'></td><td id='" + array[i].toLowerCase() + "PctChange'></td></tr>";
    }
    loadPriceColumn();
}

var showPctChange = function(ticker){
    ticker = ticker.toUpperCase();
    var baseUrl = "https://api.binance.com";
    var query = "/api/v1/ticker/24hr";
    query += "?symbol=" + ticker + "USDT";
    var url = baseUrl + query;
    var request = new XMLHttpRequest();
    request.open("GET", url, true);
    request.onload = () => {
        var jsonObj = JSON.parse(request.responseText);
        var changePercent = jsonObj.priceChangePercent;
        var displayedPercentage = document.getElementById(ticker.toLowerCase() + "PctChange");
        displayedPercentage.textContent = changePercent + " %" ;
        changePercent < 0 ? displayedPercentage.style.color="red" : displayedPercentage.style.color="green";
        if (changePercent > 5){
            displayedPercentage.classList.add("table-success");
            displayedPercentage.previousSibling.classList.add("table-success");
            displayedPercentage.previousSibling.previousSibling.classList.add("table-success");
        } else if(changePercent < -5){
            displayedPercentage.classList.add("table-danger");
            displayedPercentage.previousSibling.classList.add("table-danger");
            displayedPercentage.previousSibling.previousSibling.classList.add("table-danger");
        }
    }
    request.send();
}