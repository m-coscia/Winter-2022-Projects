// General Coding Area
updateCartInfo();
//saveCart();
// Remove Button Event Listeners
var removeButtons = document.getElementsByClassName("btn-remove");
for (var i = 0; i < removeButtons.length; i++) {
  var removeButton = removeButtons[i];
  removeButton.addEventListener("click", removeClicked);
}

// Quantity Buttons Event Listeners

// Add Button Event Listeners
var addButtons = document.getElementsByClassName("btn-plus");
for (var i = 0; i < addButtons.length; i++) {
  var addButton = addButtons[i];
  addButton.addEventListener("click", addClicked);
}
// Decrease(?) Button Event Listeners
var decreaseButtons = document.getElementsByClassName("btn-minus");
for (var i = 0; i < decreaseButtons.length; i++) {
  var decreaseButton = decreaseButtons[i];
  decreaseButton.addEventListener("click", decreaseClicked);
}
// Checkout Button Event Listener
var checkoutButtons = document.getElementsByClassName("btn-checkout");
for (var i = 0; i < checkoutButtons.length; i++) {
  var checkoutButton = checkoutButtons[i];
  checkoutButton.addEventListener("click", checkout);
}
// Continue Shopping Event Listener
var contShoppingButtons = document.getElementsByClassName(
  "btn-continueshopping"
);
for (var i = 0; i < contShoppingButtons.length; i++) {
  var contShoppingButton = contShoppingButtons[i];
  contShoppingButton.addEventListener("click", continueShoppingClicked);
}

// Input Change Event Listeners
var quantityFields = document.getElementsByClassName("prod-quantity-input");
for (var i = 0; i < quantityFields.length; i++) {
  var quantityField = quantityFields[i];
  quantityField.addEventListener("change", quantityChanged);
}

// Remove Function
function removeClicked(event) {
  var buttonClicked = event.target;
  var parentElement = buttonClicked.parentElement.parentElement;
  var prodName = parentElement.getElementsByClassName("prod-name")[0].innerHTML;
  localStorage.removeItem(prodName);
  parentElement.remove();
  updateCartInfo();
}

// + Button Function
function addClicked(event) {
  var quantitySection = event.target.parentElement;
  var quantityInputStart = quantitySection.getElementsByClassName(
    "prod-quantity-input"
  )[0].value;
  quantitySection.getElementsByClassName("prod-quantity-input")[0].value =
    parseInt(quantityInputStart) + 1;
  updateCartInfo();
}

// - Button Function
function decreaseClicked(event) {
  var buttonClicked = event.target;
  var quantitySection = event.target.parentElement;
  var quantityInputStart = parseInt(
    quantitySection.getElementsByClassName("prod-quantity-input")[0].value
  );
  if (quantityInputStart - 1 <= 0) {
    buttonClicked.parentElement.parentElement.remove();
  }
  quantitySection.getElementsByClassName("prod-quantity-input")[0].value =
    parseInt(quantityInputStart) - 1;
  updateCartInfo();
}

// Input Quantity Changed Function
function quantityChanged(event) {
  var input = event.target;
  if (isNaN(input.value)) {
    input.value = 1;
  }
  if (input.value <= 0) {
    input.parentElement.parentElement.remove();
  }
  updateCartInfo();
}

// Update Checkout Section
function updateCartInfo() {
  var shoppingCart = document.getElementsByClassName("box-shoppingcart")[0];
  var shoppingRows = shoppingCart.getElementsByClassName("shopping-row");
  var cartSubTotal = 0;
  var numItems = 0;
  for (var i = 0; i < shoppingRows.length; i++) {
    var shoppingRow = shoppingRows[i];
    var priceElement = shoppingRow.getElementsByClassName("cartPrice")[0];
    var price = parseFloat(priceElement.innerText.replace("$", ""));
    var quantityElement = shoppingRow.getElementsByClassName(
      "prod-quantity-input"
    )[0];
    numItems += parseInt(
      shoppingRow.getElementsByClassName("prod-quantity-input")[0].value
    );
    var quantity = quantityElement.value;
    cartSubTotal += price * quantity;
  }
  var GST = cartSubTotal * 0.05;
  var QST = cartSubTotal * 0.09975;
  var cartTotal = cartSubTotal + GST + QST;
  document.getElementsByClassName("cartSubTotal")[0].innerText =
    "$" + cartSubTotal.toFixed(2);
  document.getElementsByClassName("GST")[0].innerText = "$" + GST.toFixed(2);
  document.getElementsByClassName("QST")[0].innerText = "$" + QST.toFixed(2);
  document.getElementsByClassName("numItems")[0].innerText = numItems;
  document.getElementsByClassName("cartTotal")[0].innerText =
    "$" + cartTotal.toFixed(2);
  //saveCart();
}

// Storage
function saveCart() {
  // clearCart();
  var itemQuantity = document.getElementsByClassName("prod-quantity-input");
  var itemNames = document.getElementsByClassName("prod-name");
  var itemPrice = document.getElementsByClassName("cartPrice");

  for (i = 0; i < itemNames.length; i++) {
    localStorage.setItem(
      itemNames[i].innerHTML + " " + itemPrice[i].innerHTML + "/pc",
      itemQuantity[i].value
    );
  }
}

// Continue Shopping Button Function
function continueShoppingClicked() {
  saveCart();
  alert("Your order has been saved!");
  location.href = "index.php";
}

// Clear Cart function
function clearCart() {
  var cart = document.querySelectorAll(".prod-quantity-input");
  localStorage.clear();
}

// Checkout function
function checkout() {
  clearCart();
  // if(document.getElementsByClassName('numItems')[0].innerHTML !== "0"){
  // alert("Thank you for shopping with us!");
  // }
  location.href = "index.php";
}