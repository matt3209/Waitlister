const container = document.getElementById("container");
const SERVER_BASE_URL = "property.php";
const user = document.getElementById("username");
const username = user.innerHTML;
const SERVER_WAITLIST_URL = "waitlist.php";
let exists = false;

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
      card.style= "width: 18rem; height: 24rem; margin-bottom: 100px;"
    }
    else {
      card.style = "width: 18rem; height: 24rem;";
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
    pAddress.innerHTML = `${property.address}` + "<br>" + `${property.city}` +
      "<br>" + `${property.bedrooms}` + "<br>" + `${property.price}` + "<br>" + `${property.open}`;
    
    exists = false;      
    let button = document.createElement("button"); 
    checkIfOnWaitlist(`${property.name}`, button);

    row.appendChild(column);
    column.appendChild(card);
    card.appendChild(image);
    card.appendChild(cardBody);
    cardBody.appendChild(headerName);
    cardBody.appendChild(pAddress);
    cardBody.appendChild(button);
  }
}

function buttonCreator(button, id, test){
   
  if (test) {
    button.className = "btn btn-success";
    button.innerHTML = "Joined!";
    button.style = "height: 46px; width: 180px;"
    button.id = id;
  } 
  else {
    button.className = "btn btn-dark";
    button.innerHTML = "Join Waitlist";
    button.id = id;
    button.style = "height: 46px; width: 180px;"
    button.setAttribute("onclick", "goWaitlist(this.id)");
  }
}

function goWaitlist(id) {
  let currButton = document.getElementById(id);
  currButton.className = "btn btn-success";
  currButton.innerHTML = "Joined!";
  updateWaitlist(id);
}

function updateWaitlist(id) {
  let ajax = new XMLHttpRequest();
  ajax.addEventListener("load", function () {
    console.log(this);    
  });
  ajax.open("POST", SERVER_BASE_URL);
  ajax.setRequestHeader("Content-Type", "application/json");
  //update below into user info in db
  let data = JSON.stringify({
    id: id,
    username: username
  });
  ajax.responseType = "json";
  ajax.send(data);
}


function checkIfOnWaitlist(id, button) {
  let ajax = new XMLHttpRequest();
  ajax.addEventListener("load", function () {
    console.log(this);
    checkUserAndId(this.response.waitlisters, id, button);
  });
  ajax.open("GET", SERVER_WAITLIST_URL);
  ajax.responseType = "json";
  ajax.send();
}

function checkUserAndId(waitlisters, id, button){
  for (let waitlistee of waitlisters) {
    if (`${waitlistee.property}` == id && `${waitlistee.username}` == username){
      let test = true;
      return buttonCreator(button, id, test);
    }
    }
    let test = false;
    buttonCreator(button, id, test);
  }
      
