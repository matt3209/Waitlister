const container = document.getElementById("container");
const SERVER_BASE_URL = "property.php";
const user = document.getElementById("username");
const username = user.innerHTML;
const SERVER_WAITLIST_URL = "waitlistAdmin.php";
let exists = false;
let count = 0;

//on load call WaitlistPageLOad
waitlistPageLoad();


//starts Building Dropdown
function waitlistPageLoad() {
  container.innerHTML = "";
  getProperties(SERVER_BASE_URL);
}

//calls endpoint for database
function getProperties(endpoint) {
  let ajax = new XMLHttpRequest();
  ajax.addEventListener("load", function () {
    console.log(this);
    cardPopulater(this.response.properties);
  });
  ajax.open("GET", endpoint);
  ajax.responseType = "json";
  ajax.send();
}

//display cards of current properties available for waitlist
function cardPopulater(properties) {

  let row = document.createElement("div");
  row.className = "row card-group card-deck justify-content-center";
  container.appendChild(row);
  let cardIndex = 0;

  for (let property of properties) {

    
    let column = document.createElement("div");
    column.className = "col-auto mb-3";
    column.style = "align: center;"

    let card = document.createElement("div");
    card.className = "card";
    
    if (properties.length - 1 == cardIndex){
      card.style= "width: 18rem; height: 22rem; margin-bottom: 100px;"
    }
    else {
      card.style = "width: 18rem; height: 22rem;";
    }
    
    cardIndex++;
    let image = document.createElement("img");
    image.className = "card-img-top";
    image.src = `${property.image}`;
    image.style = "width: 288px;"
    image.style = "height: 125px;"

    let cardBody = document.createElement("div");
    cardBody.className = "card-body";

    let headerName = document.createElement("h4")
    headerName.className = "card-title";
    headerName.innerHTML = `${property.name}`;
    let pAddress = document.createElement("p");
    pAddress.className = "card-text";
    pAddress.innerHTML = "Click Below to view the waitlist for this property.";  
    let button = document.createElement("button");
    button.className = "btn btn-dark";
    button.innerHTML = "View Waitlist";
    button.id = `${property.name}`;
    button.style = "height: 46px; width: 180px;"
    button.setAttribute("onclick", "clearPage(this.id)");

    row.appendChild(column);
    column.appendChild(card);
    card.appendChild(image);
    card.appendChild(cardBody);
    cardBody.appendChild(headerName);
    cardBody.appendChild(pAddress);
    cardBody.appendChild(button);
  }
}

function clearPage(propId){
  container.innerHTML = "";
  viewWaitlist(propId);
}

function viewWaitlist(propId){
  let ajax = new XMLHttpRequest();
  ajax.addEventListener("load", function () {
    console.log(this);
    displayWaitlist(this.response.waitlisters, propId);
  });
  ajax.open("GET", SERVER_WAITLIST_URL);
  ajax.responseType = "json";
  ajax.send();
}

function displayWaitlist(waitlisters, propId){
 let table = document.createElement("table");
 table.className = "card-table table table-striped table-dark";
 table.Id = "waitlist";
 container.appendChild(table);
 let tHead = document.createElement("thead");
 table.appendChild(tHead);
 let tr = document.createElement("tr");
 tHead.appendChild(tr);
 let thProperty = document.createElement("th");
 let thUsername = document.createElement("th");
 thProperty.innerHTML = "Property";
 thUsername.innerHTML = "Username";
 tr.appendChild(thProperty);
 tr.appendChild(thUsername);
 let tBody = document.createElement("tbody");
 table.appendChild(tBody);
 
  for (let waitlist of waitlisters) {
    if (`${waitlist.property}` == propId){
       let row = document.createElement("tr");
       let propertyName = document.createElement("td");
       let username = document.createElement("td");
       propertyName.innerHTML = `${waitlist.property}`;
       username.innerHTML = `${waitlist.username}`;
       tBody.appendChild(row);
       row.appendChild(propertyName);
       row.appendChild(username);
       count++;
    }    
  }
}