var elementIsClicked = false; // declare the variable that tracks the state
function clickHandler(){ // declare a function that updates the state
  elementIsClicked = true;
  checkTime()
}

var element = document.getElementById('submit'); // grab a reference to your element
element.addEventListener('click', clickHandler); 


function checkTime(){
    var from = document.getElementById("availableFrom").value;
    var till = document.getElementById("availableTill").value;
    console.log(from);
}

