// signup.js

// Clear Button Event Listeners
var clearButtons = document.getElementsByClassName("cancelbtn");
for (var i = 0; i < clearButtons.length; i++) {
  var removeButton = clearButtons[i];
  removeButton.addEventListener("click", resetClicked);
}

function resetClicked(event) {
  var formbox = event.target.parentElement.parentElement;
  var email = document.getElementById("email");
  var password = document.getElementById("password");
  email.value = password.value = null;
}
