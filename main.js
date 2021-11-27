//to add tickers to the table, you have to update the array, add the stream, and add the case to the switch statement.

var tickerArray = ["ADA", "ETH", "BTC", "SOL", "DOGE", "SHIB", "MANA"];
var arrayLength = tickerArray.length;
var dataArray = [];

let allStreams = new WebSocket("wss://stream.binance.com:9443/ws/adausdt@trade/ethusdt@trade/btcusdt@trade/solusdt@trade/dogeusdt@trade/shibusdt@trade/manausdt@trade");

function loadPriceColumn(){
  allStreams.onmessage = (event) => {
      let message = JSON.parse(event.data);
      let answer = parseFloat(message.p).toLocaleString();
      switch (message.s){
          case "ADAUSDT":
              document.getElementById("ada").textContent = `$${answer}`;
              break;
          case "ETHUSDT":
              document.getElementById("eth").textContent = `$${answer}`;
              break;
          case "BTCUSDT":
              document.getElementById("btc").textContent = `$${answer}`;
              break;
          case "SOLUSDT":
              document.getElementById("sol").textContent = `$${answer}`;
              break;
          case "DOGEUSDT":
              document.getElementById("doge").textContent = `$${answer}`;
              break;
          case "SHIBUSDT":
              document.getElementById("shib").textContent = "$ " + parseFloat(message.p);
              break;
          case "MANAUSDT":
              document.getElementById("mana").textContent = `$${answer}`;
              break;  
        }
    }
}

function loadPercentColumn(tickerArray){
        for(i = 0; i < arrayLength; i++){
            tickerArray[i] = tickerArray[i].toLowerCase();
            showPctChange(tickerArray[i]);
        } 
    }

function generateRows(array, length){
    
    //get table element created in HTML document
    var tableEL = document.getElementById("cryptoTable");
    
    for (i = 0; i < length; i++){
        let currentSymbol = array[i];
        //create row1
        let row1 = tableEL.insertRow();
        row1.setAttribute('id', 'row' + i); 
        row1.classList.add("clickable"); 
        row1.setAttribute('data-toggle', 'collapse');
        row1.setAttribute('data-target', '#showData' + currentSymbol);

        //first column: badge and symbol
        let cell1 = row1.insertCell(); //<td>
        let badge = document.createElement('span');
        badge.setAttribute('id', currentSymbol + 'badge');
        cell1.appendChild(badge);
        let tickerSymbol = document.createElement('span');
        tickerSymbol.innerText = ' ' + currentSymbol;
        cell1.appendChild(tickerSymbol);

        //second column: price
        //price is loaded by loadPriceColumn() and uses this cell's id to insert the correct data
        let cell2 = row1.insertCell();
        cell2.setAttribute('id', currentSymbol.toLowerCase());

        //third column: percent change
        let cell3 = row1.insertCell();
        cell3.setAttribute('id', currentSymbol.toLowerCase() + 'PctChange');

        //second row
        let accordionRow = tableEL.insertRow();
        accordionRow.setAttribute('colspan', '3');
        let cell4 = accordionRow.insertCell();
        cell4.setAttribute('id', 'cell4' + currentSymbol)
        cell4.setAttribute('colspan', '3');//make row all 3 columns
        cell4.style.padding = '0px'; //removes extra padding from the bootstrap css
        accordionRow.appendChild(cell4);
        let accordionDiv = document.createElement('div');
        accordionDiv.setAttribute('id', 'showData' + currentSymbol);
        accordionDiv.classList.add('collapse');
        cell4.appendChild(accordionDiv);
        accordionDiv.innerHTML = `Some info about ${currentSymbol} will go <a href='https://www.youtube.com/watch?v=iik25wqIuFo'>here</a>.`;
    }
    loadPriceColumn();
    loadPercentColumn(tickerArray);
    // showMe();
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
            if(changePercent > 10) {
                momentumBadge.textContent = " ";
                momentumBadge.classList.add("fab", "fa-gripfire")
                momentumBadge.style.color="red";
            }
        } else if(changePercent < -5){
            displayedPercentage.classList.add("table-danger");
            displayedPercentage.previousSibling.classList.add("table-danger");
            displayedPercentage.previousSibling.previousSibling.classList.add("table-danger");
            if(changePercent < -10){
                momentumBadge.textContent = " ";
                momentumBadge.classList.add("fas", "fa-cubes");
                momentumBadge.style.color="blue";
            }
        }
    }
    request.send();
}


//Working on this
var showMe = function(){
    var url = "https://api.cryptowat.ch/markets/kraken/adausd/summary";
    var request = new XMLHttpRequest();
    request.open("GET", url, true);
    request.onload = () => {
        var jsonObj = JSON.parse(request.responseText);
        console.log(readyState);
    }
    request.send();
}