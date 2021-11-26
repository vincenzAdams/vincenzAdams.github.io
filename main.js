//to add tickers to the table, you have to update the array, add the stream, and add the case to the switch statement.

var tickerArray = ["ADA", "ETH", "BTC", "SOL", "DOGE", "SHIB", "MANA"];
var arrayLength = tickerArray.length;

let allStreams = new WebSocket("wss://stream.binance.com:9443/ws/adausdt@trade/ethusdt@trade/btcusdt@trade/solusdt@trade/dogeusdt@trade/shibusdt@trade/manausdt@trade");
// let stream2 = new WebSocket("wss://stream.binance.com:9443/ws/adausdt@kline_1m");

function loadPriceColumn(){
  allStreams.onmessage = (event) => {
      let message = JSON.parse(event.data);
      switch (message.s){
          case "ADAUSDT":
              document.getElementById("ada").textContent = "$ " + parseFloat(message.p).toLocaleString();
              break;
          case "ETHUSDT":
              document.getElementById("eth").textContent = "$ " + parseFloat(message.p).toLocaleString();
              break;
          case "BTCUSDT":
              document.getElementById("btc").textContent = "$ " + parseFloat(message.p).toLocaleString();
              break;
          case "SOLUSDT":
              document.getElementById("sol").textContent = "$ " + parseFloat(message.p).toLocaleString();
              break;
          case "DOGEUSDT":
              document.getElementById("doge").textContent = "$ " + parseFloat(message.p).toLocaleString();
              break;
          case "SHIBUSDT":
              document.getElementById("shib").textContent = "$ " + parseFloat(message.p);
              break;
          case "MANAUSDT":
              document.getElementById("mana").textContent = "$ " + parseFloat(message.p).toLocaleString();
              break;  
        }
    }
}

function loadPercentColumn(tickerArray){
        for(i = 0; i < tickerArray.length; i++){
            tickerArray[i] = tickerArray[i].toLowerCase();
            showPctChange(tickerArray[i]);
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
    
    for (i = 0; i < length; i++){
        //OLD CODE
        // var currentSymbol = array[i];
        // tableEL.innerHTML += "<tr data-toggle='collapse' data-target='#showData" + currentSymbol + "' class='clickable'><td><span id='" + currentSymbol + "badge'></span>" + " " + currentSymbol + "</td><td id='" + currentSymbol.toLowerCase() + "'></td><td id='" + currentSymbol.toLowerCase() + "PctChange'></td></tr><tr><td><div id='showData" + currentSymbol + "' class='collapse'>Fuck</div></td></tr>";
        let currentSymbol = array[i];
        //create row
        let row = tableEL.insertRow();
        row.setAttribute('id', 'row' + i);
        row.classList.add("clickable");
        row.setAttribute('data-toggle', 'collapse');
        row.setAttribute('data-target', '#showData' + currentSymbol);

        //first column: badge and symbol
        let cell1 = row.insertCell();
        let badge = document.createElement('span');
        badge.setAttribute('id', currentSymbol + 'badge');
        cell1.appendChild(badge);
        let tickerSymbol = document.createElement('span');
        tickerSymbol.innerText = ' ' + currentSymbol;
        cell1.appendChild(tickerSymbol);

        //second column: price
        let cell2 = row.insertCell();
        cell2.setAttribute('id', currentSymbol.toLowerCase());

        //third column: percent change
        let cell3 = row.insertCell();
        cell3.setAttribute('id', currentSymbol.toLowerCase() + 'PctChange');

        let accordionRow = tableEL.insertRow();
        let accordionDiv = document.createElement('div');
        accordionDiv.setAttribute('id', 'showData' + currentSymbol);
        accordionDiv.classList.add('collapse');
        accordionRow.appendChild(accordionDiv);
        accordionDiv.innerText = `Some info about ${currentSymbol} will go here.`;

    }

    loadPriceColumn();
    loadPercentColumn(tickerArray);
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
        var momentumBadge = document.getElementById(ticker + "badge");
        displayedPercentage.textContent = changePercent + " %" ;
        changePercent < 0 ? displayedPercentage.style.color="red" : displayedPercentage.style.color="green";
        if (changePercent > 5){
            displayedPercentage.classList.add("table-success");
            displayedPercentage.previousSibling.classList.add("table-success");
            displayedPercentage.previousSibling.previousSibling.classList.add("table-success");
            momentumBadge.textContent = " ";
            momentumBadge.classList.add("fab", "fa-gripfire")
            momentumBadge.style.color="red";
        } else if(changePercent < -5){
            displayedPercentage.classList.add("table-danger");
            displayedPercentage.previousSibling.classList.add("table-danger");
            displayedPercentage.previousSibling.previousSibling.classList.add("table-danger");
            momentumBadge.textContent = " ";
            momentumBadge.classList.add("fas", "fa-cubes");
            momentumBadge.style.color="blue";
            
        }
    }
    request.send();
}
