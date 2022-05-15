// signup.js

// Clear Button Event Listeners
var clearButton = document.getElementsByClassName("resetbtn");
for (var i = 0; i < clearButton.length; i++) {
  var removeButton = clearButton[i];
  removeButton.addEventListener("click", resetClicked);
}

function resetClicked(event) {
  var formbox = event.target.parentElement.parentElement;
  var firstName = document.getElementById("firstName");
  var lastName = document.getElementById("lastName");
  var email = document.getElementById("email");
  var password = document.getElementById("password");
  var confirmPassword = document.getElementById("confirmPassword");
  firstName.value =
    lastName.value =
    email.value =
    password.value =
    confirmPassword.value =
      null;
}
