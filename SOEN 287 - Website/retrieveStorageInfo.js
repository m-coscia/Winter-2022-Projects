var xmlhttp, xmlDoc;

xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "product_list.xml", false);
xmlhttp.send();
xmlDoc = xmlhttp.responseXML;
/*
itemIDs = [];
let itemPrices = [];
let itemNames = [];

let allItemIDs = xmlDoc.getElementsByTagName("itemID");
let allItemPrices = xmlDoc.getElementsByTagName("itemPrice");
let allItemNames = xmlDoc.getElementsByTagName("itemName");

for (let i = 0; i < allItemIDs.length; i++) {
  itemIDs.push(allItemIDs[i].childNodes[0].nodeValue);
  itemPrices.push(allItemPrices[i].childNodes[0].nodeValue);
  itemNames.push(allItemNames[i].childNodes[0].nodeValue);
}*/

var shoppingItemBox = document.getElementsByClassName("box-shoppingcart");
//console.log(itemIDs[0]);
//console.log(itemPrices[0]);
/*var tempItem = document.createElement("div");
tempItem.className = "shopping-row";
shoppingItemBox[0].appendChild(tempItem);*/
for (let i = 0; i < itemIDs.length; i++) {
  var itemName = itemIDs[i];
  //console.log(itemPrices[i]);
  if (localStorage.getItem(itemIDs[i]) == null) {
    //console.log(itemIDs[i] + " is null");
    //Items that were not added to cart, just leave this empty
  } else if (localStorage.getItem(itemIDs[i] + "InCart") == null) {
    //console.log(itemIDs[i] + "In Cart is null");
  } else if (localStorage.getItem(itemIDs[i] + "InCart") == 1) {
    //alert("Caught item " + itemIDs[i]);
    var tempItem = document.createElement("div");
    tempItem.className = "shopping-row";
    tempItem.id = itemName;
    shoppingItemBox[0].appendChild(tempItem);

    //Setting item's Image
    var itemImgTag = document.createElement("div");
    itemImgTag.className = "prod-img";
    var itemIMG = document.createElement("img");
    itemIMG.src = itemName + ".jpg";

    // Appending to Parent
    itemImgTag.appendChild(itemIMG);
    tempItem.appendChild(itemImgTag);

    // Product Info
    var prodInfo = document.createElement("div");
    prodInfo.className = "prod-info";
    var prodName = document.createElement("h2");
    prodName.className = "prod-name";
    prodName.innerHTML = itemNames[i];
    var prodPrice = document.createElement("h4");
    prodPrice.className = "cartPrice";
    prodPrice.innerHTML = "$" + itemPrices[i].toString();

    // Appending to Parent
    prodInfo.appendChild(prodName);
    prodInfo.appendChild(prodPrice);
    tempItem.appendChild(prodInfo);

    // Buttons
    var prodQuantity = document.createElement("div");
    prodQuantity.className = "prod-quantity";
    var buttonplus = document.createElement("button");
    buttonplus.className = "btn-plus";
    buttonplus.innerHTML = "+";
    buttonplus.onclick = function(){
      localStorage.setItem(itemIDs[i], incrementProduct(localStorage.getItem(itemIDs[i])))
    }
    var prodQuantityInput = document.createElement("input");
    prodQuantityInput.className = "prod-quantity-input";
    prodQuantityInput.name = "prod-quantity[]";
    var prodNameInputHidden = document.createElement("input");
    prodNameInputHidden.type = "hidden";
    prodNameInputHidden.name = "prod-name[]";
    if (localStorage.getItem(itemIDs[i]) <= 0) {
      prodQuantityInput.value = 1;
      prodNameInputHidden.value = itemIDs[i];
    }
    else {
      prodQuantityInput.value = localStorage.getItem(itemIDs[i]);
      prodNameInputHidden.value = itemIDs[i]; //test
      // console.log(itemIDs[i]);
    } 
    var buttonminus = document.createElement("button");
    buttonminus.innerHTML = "-";
    buttonminus.className = "btn-minus";
    buttonminus.onclick = function(){
      localStorage.setItem(itemIDs[i], decrementProduct(localStorage.getItem(itemIDs[i]), itemIDs[i]))
    }

    // Appending
    prodQuantity.appendChild(buttonplus);
    prodQuantity.appendChild(prodQuantityInput);
    prodQuantity.appendChild(prodNameInputHidden);
    prodQuantity.appendChild(buttonminus);
    tempItem.appendChild(prodQuantity);

    // Functions
    var functions = document.createElement("div");
    functions.className = "functions";
    var removeButton = document.createElement("button");
    removeButton.className = "btn-remove";
    //var onClickField = "removeItemFromCart("+itemIDs[i]+")";
    removeButton.onclick = function () {
      localStorage.setItem(itemIDs[i] + "InCart", 0);
      location.reload();
    };
    removeButton.innerHTML = "Remove";
    // Appending
    functions.appendChild(removeButton);
    tempItem.appendChild(functions);
  }

  function incrementProduct(num){
    return 1 + parseInt(num);
 }
 function decrementProduct(num, item){
   if (parseInt(num) - 1 == 0){
     localStorage.setItem(item+"InCart", 0);
   }
  return parseInt(num) - 1;
}
  //function removeItemFromCart(prodID) {}
}
