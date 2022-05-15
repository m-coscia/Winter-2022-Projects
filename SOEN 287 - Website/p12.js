// Add Button Event Listeners
var addButtons = document.getElementsByClassName("btn btn-success");
for (var i = 0; i < addButtons.length; i++) {
  var addButton = addButtons[i];
  addButton.addEventListener("click", addClicked);
}
// Decrease(?) Button Event Listeners
var decreaseButtons = document.getElementsByClassName("btn btn-warning");
for (var i = 0; i < decreaseButtons.length; i++) {
  var decreaseButton = decreaseButtons[i];
  decreaseButton.addEventListener("click", decreaseClicked);
}

var deleteButtons = document.getElementsByClassName("btn btn-danger");
for (var i = 0; i < deleteButtons.length; i++) {
  var deleteButton = deleteButtons[i];
  deleteButton.addEventListener("click", deleteClicked);
}
// + Button Function
function addClicked(event) {
    var quantitySection = event.target.parentElement.parentElement;
    var quantityInputStart = quantitySection.getElementsByClassName(
      "quant"
    )[0].value;
    
    quantitySection.getElementsByClassName("quant")[0].value = parseInt(quantityInputStart) + 1;
    updateOrderInfo(quantitySection.getElementsByClassName("quant")[0].id, "add", 0);
  }
  
  // - Button Function
  function decreaseClicked(event) {
    
    var buttonClicked = event.target;
    var quantitySection = event.target.parentElement.parentElement;
    var quantityInputStart = parseInt(quantitySection.getElementsByClassName("quant")[0].value);
    
    if (quantityInputStart - 1 <= 0) {
      buttonClicked.parentElement.parentElement.remove();
    }
    quantitySection.getElementsByClassName("quant")[0].value =
      parseInt(quantityInputStart) - 1;
    updateOrderInfo(quantitySection.getElementsByClassName("quant")[0].id, "sub", 0);
  }

  // - Button Function
  function deleteClicked(event) {
    
    var buttonClicked = event.target;
    var quantitySection = event.target.parentElement.parentElement;
    var quantityInputStart = parseInt(quantitySection.getElementsByClassName("quant")[0].value);
    buttonClicked.parentElement.parentElement.remove();
    quantitySection.getElementsByClassName("quant")[0].value = 0;
    
    
    updateOrderInfo(quantitySection.getElementsByClassName("quant")[0].id, "del", quantityInputStart);
  }

  function updateOrderInfo(productID, op, quant) {
    
    var totalPrice = document.getElementsByClassName("totalPrice")[0];
    
    //var shoppingRows = shoppingCart.getElementsByClassName("shopping-row");
    var xmlhttp, xmlDoc;

    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "product_list.xml", false);
    xmlhttp.send();
    xmlDoc = xmlhttp.responseXML;

    itemIDs = [];
    let itemPrices = [];

    let allItemIDs = xmlDoc.getElementsByTagName("itemID");
    let allItemPrices = xmlDoc.getElementsByTagName("itemPrice");

    for (let i = 0; i < allItemIDs.length; i++) {
        itemIDs.push(allItemIDs[i].childNodes[0].nodeValue);
        itemPrices.push(allItemPrices[i].childNodes[0].nodeValue);
      }
      
    for (let i = 0; i < itemIDs.length; i++){
        if (productID == "quantity"+itemIDs[i]){
          if (op == "add"){
            totalPrice.innerText = "Total Order's price: $ "+ ((parseFloat(totalPrice.innerText.substring(23,totalPrice.innerText.length)) + parseFloat(itemPrices[i])).toFixed(2));
          } else if (op == "sub"){
            totalPrice.innerText = "Total Order's price: $ "+ ((parseFloat(totalPrice.innerText.substring(23,totalPrice.innerText.length)) - parseFloat(itemPrices[i])).toFixed(2));
          } else if (op =="del"){
            totalPrice.innerText = "Total Order's price: $ "+ ((parseFloat(totalPrice.innerText.substring(23,totalPrice.innerText.length)) - parseFloat(itemPrices[i])*quant).toFixed(2));

          }
        }
    }
    /*var cartSubTotal = 0;
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
    //saveCart();    */
  }

  function valFinder(IDOfProd){
    return document.getElementById("quantity"+IDOfProd).value;
  }